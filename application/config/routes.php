<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

/**** absence ***/
$route['home']                           = "Ctr_home";
/** absence ***/


/**** absence ***/
$route['absence']                           = "Ctr_absence";
$route['absence/ajax/(:any)']               = "Ctr_absence/$1";
$route['absence/(:any)']                    = "Ctr_absence/absence/$1";
$route['absence/(:any)/(:any)']             = "Ctr_absence/absence/$1/$2";
/** absence ***/

/**** stagiaire ***/
$route['stagiaire']                         = "Ctr_stagiaire";
$route['stagiaire/ajax/(:any)']             = "Ctr_stagiaire/$1";
$route['stagiaire/(:any)']                  = "Ctr_stagiaire/stagiaire/$1";
$route['stagiaire/(:any)/(:any)']           = "Ctr_stagiaire/stagiaire/$1/$2";
/** stagiaire ***/

/**** formateur ***/
$route['formateur']                         = "Ctr_formateur";
$route['formateur/ajax/(:any)']             = "Ctr_formateur/$1";
$route['formateur/(:any)']                  = "Ctr_formateur/formateur/$1";
$route['formateur/(:any)/(:any)']           = "Ctr_formateur/formateur/$1/$2";
/** formateur ***/

/**** groupe ***/
$route['groupe']                            = "Ctr_groupe";
$route['groupe/ajax/(:any)']                = "Ctr_groupe/$1";
$route['groupe/(:any)']                     = "Ctr_groupe/groupe/$1";
$route['groupe/(:any)/(:any)']              = "Ctr_groupe/groupe/$1/$2";
/** groupe ***/

/**** filiere ***/
$route['filiere']                           = "Ctr_filiere";
$route['filiere/ajax/(:any)']               = "Ctr_filiere/$1";
$route['filiere/(:any)']                    = "Ctr_filiere/filiere/$1";
$route['filiere/(:any)/(:any)']             = "Ctr_filiere/filiere/$1/$2";
/** filiere ***/

/**** module ***/
$route['module']                            = "Ctr_module";
$route['module/ajax/(:any)']                = "Ctr_module/$1";
$route['module/(:any)']                     = "Ctr_module/module/$1";
$route['module/(:any)/(:any)']              = "Ctr_module/module/$1/$2";
/** module ***/

/**** surveillant_general ***/
$route['surveillant_general']               = "Ctr_surveillant_general";
$route['surveillant_general/ajax/(:any)']   = "Ctr_surveillant_general/$1";
$route['surveillant_general/(:any)']        = "Ctr_surveillant_general/surveillant_general/$1";
$route['surveillant_general/(:any)/(:any)'] = "Ctr_surveillant_general/surveillant_general/$1/$2";
/** surveillant_general ***/

/**** administrateur ***/
$route['administrateur']                    = "Ctr_administrateur";
$route['administrateur/ajax/(:any)']        = "Ctr_administrateur/$1";
$route['administrateur/(:any)']             = "Ctr_administrateur/administrateur/$1";
$route['administrateur/(:any)/(:any)']      = "Ctr_administrateur/administrateur/$1/$2";
/** administrateur ***/

/**** etablissement ***/
$route['etablissement']                     = "Ctr_etablissement";
$route['etablissement/ajax/(:any)']         = "Ctr_etablissement/$1";
$route['etablissement/(:any)']              = "Ctr_etablissement/etablissement/$1";
$route['etablissement/(:any)/(:any)']       = "Ctr_etablissement/etablissement/$1/$2";
/** etablissement ***/

/**** annee_inscription ***/
$route['annee_inscription']                 = "Ctr_annee_inscription";
$route['annee_inscription/ajax/(:any)']     = "Ctr_annee_inscription/$1";
$route['annee_inscription/(:any)']          = "Ctr_annee_inscription/annee_inscription/$1";
$route['annee_inscription/(:any)/(:any)']   = "Ctr_annee_inscription/annee_inscription/$1/$2";
/** annee_inscription ***/

/**** statistic ***/
$route['statistic']                         = "Ctr_statistic";
/** statistic ***/

$route['default_controller'] = "Ctr_home";
$route['404_override'] = 'Ctr_home/error';
$route['translate_uri_dashes'] = TRUE;
