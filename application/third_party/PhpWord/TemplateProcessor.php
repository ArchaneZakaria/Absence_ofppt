<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2014 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord;

use PhpOffice\PhpWord\Exception\CopyFileException;
use PhpOffice\PhpWord\Exception\CreateTemporaryFileException;
use PhpOffice\PhpWord\Exception\Exception;
use PhpOffice\PhpWord\Shared\StringHelper;
use PhpOffice\PhpWord\Shared\ZipArchive;

class TemplateProcessor
{
    const MAXIMUM_REPLACEMENTS_DEFAULT = -1;

    /**
     * ZipArchive object.
     *
     * @var mixed
     */
    protected $zipClass;

    /**
     * @var string Temporary document filename (with path).
     */
    protected $tempDocumentFilename;

    /**
     * Content of main document part (in XML format) of the temporary document.
     *
     * @var string
     */
    protected $tempDocumentMainPart;

    /**
     * Content of headers (in XML format) of the temporary document.
     *
     * @var string[]
     */
    protected $tempDocumentHeaders = array();

    /**
     * Content of footers (in XML format) of the temporary document.
     *
     * @var string[]
     */
    protected $tempDocumentFooters = array();

    /**
     * @since 0.12.0 Throws CreateTemporaryFileException and CopyFileException instead of Exception.
     *
     * @param string $documentTemplate The fully qualified template filename.
     *
     * @throws \PhpOffice\PhpWord\Exception\CreateTemporaryFileException
     * @throws \PhpOffice\PhpWord\Exception\CopyFileException
     */

    protected $_countRels=100;
    protected $_rels;

    public function __construct($documentTemplate)
    {
        // Temporary document filename initialization
        $this->tempDocumentFilename = tempnam(Settings::getTempDir(), 'PhpWord');
        if (false === $this->tempDocumentFilename) {
            throw new CreateTemporaryFileException();
        }

        // Template file cloning
        if (false === copy($documentTemplate, $this->tempDocumentFilename)) {
            throw new CopyFileException($documentTemplate, $this->tempDocumentFilename);
        }

        // Temporary document content extraction
        $this->zipClass = new ZipArchive();
        $this->zipClass->open($this->tempDocumentFilename);
        $index = 1;
        while (false !== $this->zipClass->locateName($this->getHeaderName($index))) {
            $this->tempDocumentHeaders[$index] = $this->fixBrokenMacros(
                $this->zipClass->getFromName($this->getHeaderName($index))
            );
            $index++;
        }
        $index = 1;
        while (false !== $this->zipClass->locateName($this->getFooterName($index))) {
            $this->tempDocumentFooters[$index] = $this->fixBrokenMacros(
                $this->zipClass->getFromName($this->getFooterName($index))
            );
            $index++;
        }
        $this->tempDocumentMainPart = $this->fixBrokenMacros($this->zipClass->getFromName('word/document.xml'));
    }

    /**
     * Applies XSL style sheet to template's parts.
     *
     * @param \DOMDocument $xslDOMDocument
     * @param array $xslOptions
     * @param string $xslOptionsURI
     *
     * @return void
     *
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function applyXslStyleSheet($xslDOMDocument, $xslOptions = array(), $xslOptionsURI = '')
    {
        $xsltProcessor = new \XSLTProcessor();

        $xsltProcessor->importStylesheet($xslDOMDocument);

        if (false === $xsltProcessor->setParameter($xslOptionsURI, $xslOptions)) {
            throw new Exception('Could not set values for the given XSL style sheet parameters.');
        }

        $xmlDOMDocument = new \DOMDocument();
        if (false === $xmlDOMDocument->loadXML($this->tempDocumentMainPart)) {
            throw new Exception('Could not load XML from the given template.');
        }

        $xmlTransformed = $xsltProcessor->transformToXml($xmlDOMDocument);
        if (false === $xmlTransformed) {
            throw new Exception('Could not transform the given XML document.');
        }

        $this->tempDocumentMainPart = $xmlTransformed;
    }

    /**
     * @param mixed $macro
     * @param mixed $replace
     * @param integer $limit
     *
     * @return void
     */
    public function setValue($macro, $replace, $limit = self::MAXIMUM_REPLACEMENTS_DEFAULT)
    {
        foreach ($this->tempDocumentHeaders as $index => $headerXML) {
            $this->tempDocumentHeaders[$index] = $this->setValueForPart($this->tempDocumentHeaders[$index], $macro, $replace, $limit);
        }

        $this->tempDocumentMainPart = $this->setValueForPart($this->tempDocumentMainPart, $macro, $replace, $limit);

        foreach ($this->tempDocumentFooters as $index => $headerXML) {
            $this->tempDocumentFooters[$index] = $this->setValueForPart($this->tempDocumentFooters[$index], $macro, $replace, $limit);
        }
    }

    /**
     * Returns array of all variables in template.
     *
     * @return string[]
     */
    public function getVariables()
    {
        $variables = $this->getVariablesForPart($this->tempDocumentMainPart);

        foreach ($this->tempDocumentHeaders as $headerXML) {
            $variables = array_merge($variables, $this->getVariablesForPart($headerXML));
        }

        foreach ($this->tempDocumentFooters as $footerXML) {
            $variables = array_merge($variables, $this->getVariablesForPart($footerXML));
        }

        return array_unique($variables);
    }

    /**
     * Clone a table row in a template document.
     *
     * @param string $search
     * @param integer $numberOfClones
     *
     * @return void
     *
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function cloneRow($search, $numberOfClones)
    {
        if ('${' !== substr($search, 0, 2) && '}' !== substr($search, -1)) {
            $search = '${' . $search . '}';
        }

        $tagPos = strpos($this->tempDocumentMainPart, $search);
        if (!$tagPos) {
            throw new Exception("Can not clone row, template variable not found or variable contains markup.");
        }

        $rowStart = $this->findRowStart($tagPos);
        $rowEnd = $this->findRowEnd($tagPos);
        $xmlRow = $this->getSlice($rowStart, $rowEnd);

        // Check if there's a cell spanning multiple rows.
        if (preg_match('#<w:vMerge w:val="restart"/>#', $xmlRow)) {
            // $extraRowStart = $rowEnd;
            $extraRowEnd = $rowEnd;
            while (true) {
                $extraRowStart = $this->findRowStart($extraRowEnd + 1);
                $extraRowEnd = $this->findRowEnd($extraRowEnd + 1);

                // If extraRowEnd is lower then 7, there was no next row found.
                if ($extraRowEnd < 7) {
                    break;
                }

                // If tmpXmlRow doesn't contain continue, this row is no longer part of the spanned row.
                $tmpXmlRow = $this->getSlice($extraRowStart, $extraRowEnd);
                if (!preg_match('#<w:vMerge/>#', $tmpXmlRow) &&
                    !preg_match('#<w:vMerge w:val="continue" />#', $tmpXmlRow)) {
                    break;
                }
                // This row was a spanned row, update $rowEnd and search for the next row.
                $rowEnd = $extraRowEnd;
            }
            $xmlRow = $this->getSlice($rowStart, $rowEnd);
        }

        $result = $this->getSlice(0, $rowStart);
        for ($i = 1; $i <= $numberOfClones; $i++) {
            $result .= preg_replace('/\$\{(.*?)\}/', '\${\\1#' . $i . '}', $xmlRow);
        }
        $result .= $this->getSlice($rowEnd);

        $this->tempDocumentMainPart = $result;
    }

    /**
     * Clone a block.
     *
     * @param string $blockname
     * @param integer $clones
     * @param boolean $replace
     *
     * @return string|null
     */
    public function cloneBlock($blockname, $clones = 1, $replace = true)
    {
        $xmlBlock = null;
        preg_match(
            '/(<\?xml.*)(<w:p.*>\${' . $blockname . '}<\/w:.*?p>)(.*)(<w:p.*\${\/' . $blockname . '}<\/w:.*?p>)/is',
            $this->tempDocumentMainPart,
            $matches
        );

        if (isset($matches[3])) {
            $xmlBlock = $matches[3];
            $cloned = array();
            for ($i = 1; $i <= $clones; $i++) {
                $cloned[] = $xmlBlock;
            }

            if ($replace) {
                $this->tempDocumentMainPart = str_replace(
                    $matches[2] . $matches[3] . $matches[4],
                    implode('', $cloned),
                    $this->tempDocumentMainPart
                );
            }
        }

        return $xmlBlock;
    }

    /**
     * Replace a block.
     *
     * @param string $blockname
     * @param string $replacement
     *
     * @return void
     */
    public function replaceBlock($blockname, $replacement)
    {
        preg_match(
            '/(<\?xml.*)(<w:p.*>\${' . $blockname . '}<\/w:.*?p>)(.*)(<w:p.*\${\/' . $blockname . '}<\/w:.*?p>)/is',
            $this->tempDocumentMainPart,
            $matches
        );

        if (isset($matches[3])) {
            $this->tempDocumentMainPart = str_replace(
                $matches[2] . $matches[3] . $matches[4],
                $replacement,
                $this->tempDocumentMainPart
            );
        }
    }

    /**
     * Delete a block of text.
     *
     * @param string $blockname
     *
     * @return void
     */
    public function deleteBlock($blockname)
    {
        $this->replaceBlock($blockname, '');
    }

    /**
     * Saves the result document.
     *
     * @return string
     *
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function save()
    {
        foreach ($this->tempDocumentHeaders as $index => $headerXML) {
            $this->zipClass->addFromString($this->getHeaderName($index), $this->tempDocumentHeaders[$index]);
        }

        $this->zipClass->addFromString('word/document.xml', $this->tempDocumentMainPart);

        if($this->_rels!="")
        {
            $this->zipClass->addFromString('word/_rels/document.xml.rels', $this->_rels);
        }
        if($this->_types!="")
        {
            $this->zipClass->addFromString('[Content_Types].xml', $this->_types);
        }

        foreach ($this->tempDocumentFooters as $index => $headerXML) {
            $this->zipClass->addFromString($this->getFooterName($index), $this->tempDocumentFooters[$index]);
        }

        // Close zip file
        if (false === $this->zipClass->close()) {
            throw new Exception('Could not close zip file.');
        }

        return $this->tempDocumentFilename;
    }

    /**
     * Saves the result document to the user defined file.
     *
     * @since 0.8.0
     *
     * @param string $fileName
     *
     * @return void
     */
    public function saveAs($fileName)
    {
        $tempFileName = $this->save();

        if (file_exists($fileName)) {
            unlink($fileName);
        }

        /*
         * Note: we do not use ``rename`` function here, because it looses file ownership data on Windows platform.
         * As a result, user cannot open the file directly getting "Access denied" message.
         *
         * @see https://github.com/PHPOffice/PHPWord/issues/532
         */
        copy($tempFileName, $fileName);
        unlink($tempFileName);
    }

    /**
     * Finds parts of broken macros and sticks them together.
     * Macros, while being edited, could be implicitly broken by some of the word processors.
     *
     * @since 0.13.0
     *
     * @param string $documentPart The document part in XML representation.
     *
     * @return string
     */
    protected function fixBrokenMacros($documentPart)
    {
        $fixedDocumentPart = $documentPart;

        $fixedDocumentPart = preg_replace_callback(
            '|\$\{([^\}]+)\}|U',
            function ($match) {
                return strip_tags($match[0]);
            },
            $fixedDocumentPart
        );

        return $fixedDocumentPart;
    }

    /**
     * Find and replace macros in the given XML section.
     *
     * @param string $documentPartXML
     * @param string $search
     * @param string $replace
     * @param integer $limit
     *
     * @return string
     */
    protected function setValueForPart($documentPartXML, $search, $replace, $limit)
    {
        if (substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
            $search = '${' . $search . '}';
        }

        if (!StringHelper::isUTF8($replace)) {
            $replace = utf8_encode($replace);
        }

        // Note: we can't use the same function for both cases here, because of performance considerations.
        if (self::MAXIMUM_REPLACEMENTS_DEFAULT === $limit) {
            return str_replace($search, $replace, $documentPartXML);
        } else {
            $regExpDelim = '/';
            $escapedSearch = preg_quote($search, $regExpDelim);
            return preg_replace("{$regExpDelim}{$escapedSearch}{$regExpDelim}u", $replace, $documentPartXML, $limit);
        }
    }

    /**
     * Find all variables in $documentPartXML.
     *
     * @param string $documentPartXML
     *
     * @return string[]
     */
    protected function getVariablesForPart($documentPartXML)
    {
        preg_match_all('/\$\{(.*?)}/i', $documentPartXML, $matches);

        return $matches[1];
    }

    /**
     * Get the name of the footer file for $index.
     *
     * @param integer $index
     *
     * @return string
     */
    protected function getFooterName($index)
    {
        return sprintf('word/footer%d.xml', $index);
    }

    /**
     * Get the name of the header file for $index.
     *
     * @param integer $index
     *
     * @return string
     */
    protected function getHeaderName($index)
    {
        return sprintf('word/header%d.xml', $index);
    }

    /**
     * Find the start position of the nearest table row before $offset.
     *
     * @param integer $offset
     *
     * @return integer
     *
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    protected function findRowStart($offset)
    {
        $rowStart = strrpos($this->tempDocumentMainPart, '<w:tr ', ((strlen($this->tempDocumentMainPart) - $offset) * -1));

        if (!$rowStart) {
            $rowStart = strrpos($this->tempDocumentMainPart, '<w:tr>', ((strlen($this->tempDocumentMainPart) - $offset) * -1));
        }
        if (!$rowStart) {
            throw new Exception('Can not find the start position of the row to clone.');
        }

        return $rowStart;
    }

    /**
     * Find the end position of the nearest table row after $offset.
     *
     * @param integer $offset
     *
     * @return integer
     */
    protected function findRowEnd($offset)
    {
        return strpos($this->tempDocumentMainPart, '</w:tr>', $offset) + 7;
    }

    /**
     * Get a slice of a string.
     *
     * @param integer $startPosition
     * @param integer $endPosition
     *
     * @return string
     */
    protected function getSlice($startPosition, $endPosition = 0)
    {
        if (!$endPosition) {
            $endPosition = strlen($this->tempDocumentMainPart);
        }

        return substr($this->tempDocumentMainPart, $startPosition, ($endPosition - $startPosition));
    }

    public  function setValueAdvanced($search_replace)
    {
        foreach ($this->tempDocumentHeaders as $index => $headerXML) {
            $this->tempDocumentHeaders[$index] = $this->setValueForPartAdvanced($this->tempDocumentHeaders[$index], $search_replace);
        }

        $this->tempDocumentMainPart = $this->setValueForPartAdvanced($this->tempDocumentMainPart, $search_replace);

        foreach ($this->tempDocumentFooters as $index => $headerXML) {
            $this->tempDocumentFooters[$index] = $this->setValueForPartAdvanced($this->tempDocumentFooters[$index], $search_replace);
        }
    }
    
    protected  function setValueForPartAdvanced($documentPartXML, $search_replace)
    {
        $pattern = '/<w:t>(.*?)<\/w:t>/';
        $rplStringBeginOffcetsStack = array();
        $rplStringEndOffcetsStack = array();
        $rplCleanedStrings = array();
        $stringsToClean = array();
        preg_match_all($pattern, $documentPartXML, $words, PREG_OFFSET_CAPTURE);

        $bux_founded = false;
        $searching_started = false;
        foreach($words[1] as $key_of_words => $word)
        {
            $exploded_chars = str_split($word[0]);
            foreach($exploded_chars as $key_of_chars => $char)
            {
                if ($bux_founded)
                {
                    if ($searching_started)
                    {
                        if ($char == "}")
                        {
                            $bux_founded = false;
                            $searching_started = false;
                            array_push($rplStringEndOffcetsStack, ($word[1]+mb_strlen($word[0])+6));
                        }
                    }
                    else
                    {
                        if ($char == "{")
                        {
                            $searching_started = true;
                        }
                        else
                        {
                            $bux_founded = false;
                            array_pop($rplStringBeginOffcetsStack);
                        }
                    }
                }
                else
                {
                    if ($char == "$")
                    {
                        $bux_founded = true;
                        array_push($rplStringBeginOffcetsStack, $word[1]-5);
                    }
                }
            }
        }
        for($index=0; $index<count($rplStringEndOffcetsStack); $index++)
        {
            $string_to_clean = substr($documentPartXML, $rplStringBeginOffcetsStack[$index], ($rplStringEndOffcetsStack[$index]-$rplStringBeginOffcetsStack[$index]));
            array_push($stringsToClean, $string_to_clean);
            preg_match_all($pattern, $string_to_clean, $words_to_concat);
            $cleaned_string = implode("", $words_to_concat[1]);
            $cleaned_string = preg_replace('/[${}]+/', '', $cleaned_string);
            array_push($rplCleanedStrings, $cleaned_string);
        }
        for ($index=0; $index<count($rplCleanedStrings); $index++)
        {
            foreach($search_replace as $key_search => $replace)
            {
                if ($rplCleanedStrings[$index] == $key_search)
                {
                    $documentPartXML = str_replace($stringsToClean[$index], "<w:t>".$replace."</w:t>", $documentPartXML);
                    break;
                }
            }
        }
        return $documentPartXML;
    }

    public function setImageValue($search, $replace, $limit = self::MAXIMUM_REPLACEMENTS_DEFAULT)
    {
        // prepare $search_replace
        if (!is_array($search)) {
            $search = array($search);
        }
        $replacesList = array();
        if (!is_array($replace) || isset($replace['path'])) {
            $replacesList[] = $replace;
        } else {
            $replacesList = array_values($replace);
        }
        $searchReplace = array();
        foreach ($search as $searchIdx => $searchString) {
            $searchReplace[$searchString] = isset($replacesList[$searchIdx]) ? $replacesList[$searchIdx] : $replacesList[0];
        }
        // collect document parts
        $searchParts = array(
                            $this->getMainPartName() => &$this->tempDocumentMainPart,
                            );
        foreach (array_keys($this->tempDocumentHeaders) as $headerIndex) {
            $searchParts[$this->getHeaderName($headerIndex)] = &$this->tempDocumentHeaders[$headerIndex];
        }
        foreach (array_keys($this->tempDocumentFooters) as $headerIndex) {
            $searchParts[$this->getFooterName($headerIndex)] = &$this->tempDocumentFooters[$headerIndex];
        }
        // define templates
        // result can be verified via "Open XML SDK 2.5 Productivity Tool" (http://www.microsoft.com/en-us/download/details.aspx?id=30425)
        $imgTpl = '<w:pict><v:shape type="#_x0000_t75" style="width:{WIDTH};height:{HEIGHT}"><v:imagedata r:id="{RID}" o:title=""/></v:shape></w:pict>';
        foreach ($searchParts as $partFileName => &$partContent) {
            $partVariables = $this->getVariablesForPart($partContent);
            foreach ($searchReplace as $searchString => $replaceImage) {
                $varsToReplace = array_filter($partVariables, function ($partVar) use ($searchString) {
                    return ($partVar == $searchString) || preg_match('/^' . preg_quote($searchString) . ':/', $partVar);
                });
                foreach ($varsToReplace as $varNameWithArgs) {
                    $varInlineArgs = $this->getImageArgs($varNameWithArgs);
                    $preparedImageAttrs = $this->prepareImageAttrs($replaceImage, $varInlineArgs);
                    $imgPath = $preparedImageAttrs['src'];
                    // get image index
                    $imgIndex = $this->getNextRelationsIndex($partFileName);
                    $rid = 'rId' . $imgIndex;
                    // replace preparations
                    $this->addImageToRelations($partFileName, $rid, $imgPath, $preparedImageAttrs['mime']);
                    $xmlImage = str_replace(array('{RID}', '{WIDTH}', '{HEIGHT}'), array($rid, $preparedImageAttrs['width'], $preparedImageAttrs['height']), $imgTpl);
                    // replace variable
                    $varNameWithArgsFixed = static::ensureMacroCompleted($varNameWithArgs);
                    $matches = array();
                    if (preg_match('/(<[^<]+>)([^<]*)(' . preg_quote($varNameWithArgsFixed) . ')([^>]*)(<[^>]+>)/Uu', $partContent, $matches)) {
                        $wholeTag = $matches[0];
                        array_shift($matches);
                        list($openTag, $prefix, , $postfix, $closeTag) = $matches;
                        $replaceXml = $openTag . $prefix . $closeTag . $xmlImage . $openTag . $postfix . $closeTag;
                        // replace on each iteration, because in one tag we can have 2+ inline variables => before proceed next variable we need to change $partContent
                        $partContent = $this->setValueForPart($wholeTag, $replaceXml, $partContent, $limit);
                    }
                }
            }
        }
    }

    function limpiarString($str) {
        return str_replace(
                array('&', '<', '>', "\n"), 
                array('&amp;', '&lt;', '&gt;', "\n" . '<w:br/>'), 
                $str
        );
    }
    
    public function setImg( $strKey, $img){
        $strKey = '${'.$strKey.'}';
        $relationTmpl = '<Relationship Id="RID" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/image" Target="media/IMG"/>';

        $imgTmpl = '<w:pict><v:shape type="#_x0000_t75" style="width:WIDpx;height:HEIpx"><v:imagedata r:id="RID" o:title=""/></v:shape></w:pict>';

        $toAdd = $toAddImg = $toAddType = '';
        $aSearch = array('RID', 'IMG');
        $aSearchType = array('IMG', 'EXT');
        $countrels=$this->_countRels++;
        //I'm work for jpg files, if you are working with other images types -> Write conditions here
    $imgExt = 'jpg';
        $imgName = 'img' . $countrels . '.' . $imgExt;

            $this->zipClass->deleteName('word/media/' . $imgName);
            $this->zipClass->addFile($img['src'], 'word/media/' . $imgName);

            $typeTmpl = '<Override PartName="/word/media/'.$imgName.'" ContentType="image/EXT"/>';


            $rid = 'rId' . $countrels;
            $countrels++;
        list($w,$h) = getimagesize($img['src']);

 if(isset($img['swh'])) //Image proportionally larger side
 {
 if($w<=$h)
 {
    $ht=(int)$img['swh'];
    $ot=$w/$h;
    $wh=(int)$img['swh']*$ot;
    $wh=round($wh);
 }
 if($w>=$h)
 {
    $wh=(int)$img['swh'];
    $ot=$h/$w;
    $ht=(int)$img['swh']*$ot;
    $ht=round($ht);
 }
 $w=$wh;
 $h=$ht;
 }

if(isset($img['size']))
{
$w = $img['size'][0];
$h = $img['size'][1];           
}


            $toAddImg .= str_replace(array('RID', 'WID', 'HEI'), array($rid, $w, $h), $imgTmpl) ;
            if(isset($img['dataImg']))
            {
                $toAddImg.='<w:br/><w:t>'.$this->limpiarString($img['dataImg']).'</w:t><w:br/>';
            }

            $aReplace = array($imgName, $imgExt);
            $toAddType .= str_replace($aSearchType, $aReplace, $typeTmpl) ;

            $aReplace = array($rid, $imgName);
            $toAdd .= str_replace($aSearch, $aReplace, $relationTmpl);


        $this->tempDocumentMainPart=str_replace('<w:t>' . $strKey . '</w:t>', $toAddImg, $this->tempDocumentMainPart);
        //print $this->tempDocumentMainPart;



        if($this->_rels=="")
        {
            $this->_rels=$this->zipClass->getFromName('word/_rels/document.xml.rels');
            $this->_types=$this->zipClass->getFromName('[Content_Types].xml');
        }

        $this->_types       = str_replace('</Types>', $toAddType, $this->_types) . '</Types>';
        $this->_rels        = str_replace('</Relationships>', $toAdd, $this->_rels) . '</Relationships>';
    }

}
