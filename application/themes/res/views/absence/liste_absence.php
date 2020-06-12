<section class="content">
  <!-- Default box -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des groupes</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="exampleME" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Groupe</th>
                <th>Filiére</th>
                <th>Effectif</th>
                <th>Niveau</th>
                <th>Année scolaire</th>
                <th></th>
              </tr>
            </thead>
            <tbody>

              <?php foreach($GroupeAbsents as $rowDetail ):?>
              <tr>
                <td><?=$rowDetail->libelle_groupe;?></td>
                <td><?=$rowDetail->libelle_filiere;?></td>
                <td><?php
                                     $sql="SELECT count(*) as count
                                     from inscription ,etablissement ,anneeinscription ,groupe
                                     WHERE inscription.Etablissement_idEtablissement=etablissement.idEtablissement
                                     AND inscription.AnneeInscription_idAnneeInscription=anneeinscription.idAnneeInscription
                                     AND inscription.Groupe_idGroupe=groupe.idGroupe
                                     AND groupe.idGroupe='$rowDetail->idGroupe'
                                     AND etablissement.active_etablissement='1'
                                     AND anneeinscription.active_anneeinscription='1'
                                     AND inscription.deleted_inscription='0'
                                     and etablissement.deleted_etablissement='0'
                                     AND anneeinscription.deleted_annee_inscription='0'
                                     AND groupe.deleted_groupe='0' ";

                                      $NbrStagiaires = $this->db->query($sql);
                                      $effectif = $NbrStagiaires->result();
                                        echo $effectif[0]->count;

                                  ?></td>
                <td><?=$rowDetail->niveau_filiere;?></td>
                <td><?=$rowDetail->Niveau_idNiveau;?>A</td>
                <td>
                  <a href="#">
                    <i class="fas fa-info linev" title="Derniéres scéances" data-groupe="<?=$rowDetail->idGroupe;?>"></i>
                  <a>&nbsp;
                  <a href="#">
                    <i class="fas fa-users effectif_groupe" title="Effectif" data-groupe="<?=$rowDetail->idGroupe;?>"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
</section>


  <!-- /.content-wrapper -->
            <div class="modal fade bd-example-modal-lg" id="ModalModification" tabindex="-1" style="z-index:9999;" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                      &nbsp;<i class="fas fa-arrow-left return" data-dismiss="modal" aria-label="Close" style="color: blue; cursor:pointer;"> </i><h5 class="modal-title" id="exampleModalLongTitle">&nbsp;&nbsp;&nbsp;&nbsp;Autoriser l'acces aux cours</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <form id="form_justifier" role="form">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-12">
                          <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Justification de l'absence</label>
                                  <input type="text" name="name" rows="8" cols="80" class="form-control" id="justification_absence"></input>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                      <button type="submit" class="btn btn-primary" id="justifier_absence" value='Print'  ><i class="fas fa-print" ></i> Imprimer billet d'absence</button>
                    </div>
                    <div id='DivIdToPrint' style="display:none;">
                      <img src="<?=base_url('assets/img/logo_ofppt_officiel.png')?>" alt="AdminLTE Logo" class="img-responsive" style="width:10%;height:10%;">
                      <h1 style="text-align: center;">Justification d'absence</h1><hr width="350" size="2" align=center color ="#00ff00"><br><br>
                        <p>Le stagiaire :<b id="nom_complet">ARCHANE Zakaria</b> est autoriser a rentrer en classe</p>
                        <p>Justification d'absence :<span id="justificationAbsence">COVID19</span></p>
              </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="modal fade bd-example-modal-lg" id="ModalHistorique" tabindex="-1" style="z-index:9999;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    &nbsp;<i class="fas fa-arrow-left" data-dismiss="modal" aria-label="Close" style="color: blue; cursor: pointer;"> </i><h5 class="modal-title" id="exampleModalLongTitle">&nbsp;&nbsp;&nbsp;&nbsp;Historique d'absences</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form id="form_modifier" role="form">
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <h3 class="card-title name_stagiaire" ></h3>
                            </div>
                            <div class="card-body">
                              <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                  <div class="col-md-12">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <table class="table table-bordered table-hover exampleME" id="historique">
                                    <thead>
                                      <tr>
                                        <th>Date d'absence</th>
                                        <th>Durée de la scéance</th>
                                        <th>Formateur</th>
                                        <th>Module</th>
                                        <th>Salle</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>






                      <div class="modal fade bd-example-modal-lg" id="ModalStagiaireAbsListe" tabindex="-1" style="z-index:9999;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              &nbsp;<i class="fas fa-arrow-left return" data-dismiss="modal" aria-label="Close" style="color: blue; cursor:pointer;"> </i><h5 class="modal-title" id="exampleModalLongTitle">&nbsp;&nbsp;&nbsp;&nbsp;Les dernier absence</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="form_suppression">
                              <div class="modal-body">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>Date d'absence</th>
                                      <th>Durée</th>
                                      <th>Formateur</th>
                                      <th>Module</th>
                                      <th>Salle</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>20-10-2020</td>
                                      <td>5h</td>
                                      <td>Bialliten zineb</td>
                                      <td>Systéme de gestion de base de données</td>
                                      <td>INFO 5</td>
                                    </tr>
                                    <tr>
                                      <td>10-10-2020</td>
                                      <td>5h</td>
                                      <td>Bialliten zineb</td>
                                      <td>ASP.net</td>
                                      <td>INFO 5</td>
                                    </tr>
                                    <tr>
                                      <td>07-10-2020</td>
                                      <td>5h</td>
                                      <td>Belyazidi hamid</td>
                                      <td>Programmation orienté objet</td>
                                      <td>INFO 2</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>


                      <div class="modal fade bd-example-modal-lg" id="ModalDernierAbs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Les dernières séances</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form id="form_modifier" role="form">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="card">
                                      <div class="card-header">
                                        <h3 class="card-title">Les dernières séances</h3>
                                      </div>
                                      <div class="card-body">
                                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                          <div class="row">
                                            <div class="col-md-12"></div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-sm-12">
                                            <table class="table table-bordered table-hover exampleME"  id="historique_seance">
                                              <thead>
                                                <tr>
                                                  <th>Date de la scéance</th>
                                                  <th>Heure début</th>
                                                  <th>Heure fin</th>
                                                  <th>Stagiaires absents</th>
                                                  <th>Module</th>
                                                  <th>Formateur</th>
                                                </tr>
                                              </thead>
                                              <tbody>

                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                  <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>









                      <div class="modal fade bd-example-modal-lg" id="ModalEffectif" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Effectif</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="form_suppression">
                              <div class="modal-body">
                                <table  class="table table-bordered table-hover " id="effectif">
                                  <thead>
                                    <tr>
                                      <th>Nom</th>
                                      <th>Prénom</th>
                                      <th title="Numéro d'inscription">CEF</th>
                                      <th>Sexe</th>
                                      <th>Nombre total d'absence</th>
                                      <th></th>
                                    </tr>
                                  </thead>
                                  <tbody id="effectif_groupe">
                                  </tbody>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                              </div>
                              </form>
                          </div>
                        </div>
                      </div>
<script >
  $(function () {
    $('#exampleME,#stagiareTable,#absenceTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });

  $('.tree_last_absence ').on('click',function(){
    $('#ModalStagiaireAbsListe').modal('show');
  });
  id_groupe="";
  $('.effectif_groupe').on('click',function(){
    var t = $('#effectif').DataTable();
    id_groupe = $(this).attr("data-groupe");
    t.rows().remove().draw();
     $.ajax({
        type: 'POST',
        url: base_url + 'absence/ajax/getStagiairesGroupe',
        dataType: "JSON",
        data :{id_groupe:id_groupe} ,
        cache:false,
        success: function(msg){
          $("#effectif_groupe").empty();
          msg.forEach(function (m/*, index */){

            $.ajax({
               type: 'POST',
               url: base_url + 'absence/ajax/getAbsenceNJ',
               dataType: "JSON",
               data : {stagiaireI: m.idStagiaire},
               cache:false,
               success: function(msg1){
                 var nombre_absence="";
                  msg1.forEach(function (m/*, index */){
                 nombre_absence=m.counta;
                 })
                 if(nombre_absence>= 3){
                 var rowNode = t.row.add( [
                       m.NomStagiaire ,
                      m.PrenomStagiaire,
                      m.CefStagiaire,
                      m.Sexe,
                      nombre_absence,
                      "<a href=\"#\"><i class=\" fas fa-history historique_stagiaire \" title=\"Historique d'absence\" data-stagiaireI=\""+m.idStagiaire+"\"  data-nom=\""+m.NomStagiaire+"\" data-prenom=\""+m.PrenomStagiaire+"\"></i></a>&nbsp<a href=\"#\"><i class=\"fas fa-check-square autorisation\" title=\"Autoriser l'acces aux cours\" data-stagiaireI=\""+m.idStagiaire+"\"  data-nom=\""+m.NomStagiaire+"\" data-prenom=\""+m.PrenomStagiaire+"\"></i></a>"
                  ] ).draw( false ).node();
                  $( rowNode ).css( 'background-color', '#ff5757' );
                }else if(nombre_absence >= 1){
                  var rowNode = t.row.add( [
                        m.NomStagiaire ,
                       m.PrenomStagiaire,
                       m.CefStagiaire,
                       m.Sexe,
                       nombre_absence,
                       "<a href=\"#\"><i class=\" fas fa-history historique_stagiaire \" title=\"Historique d'absence\" data-stagiaireI=\""+m.idStagiaire+"\"  data-nom=\""+m.NomStagiaire+"\" data-prenom=\""+m.PrenomStagiaire+"\"></i></a>&nbsp<a href=\"#\"><i class=\"fas fa-check-square autorisation\" title=\"Autoriser l'acces aux cours\" data-stagiaireI=\""+m.idStagiaire+"\"  data-nom=\""+m.NomStagiaire+"\" data-prenom=\""+m.PrenomStagiaire+"\"></i></a>"
                   ] ).draw( false ).node();
                   $( rowNode ).css( 'background-color', '#ffef99' );

                }else{
                  t.row.add( [
                        m.NomStagiaire ,
                       m.PrenomStagiaire,
                       m.CefStagiaire,
                       m.Sexe,
                       nombre_absence,
                       "<a href=\"#\"><i class=\" fas fa-history historique_stagiaire \" title=\"Historique d'absence\" data-stagiaireI=\""+m.idStagiaire+"\"  data-nom=\""+m.NomStagiaire+"\" data-prenom=\""+m.PrenomStagiaire+"\"></i></a>&nbsp<a href=\"#\"><i class=\"fas fa-check-square autorisation\" title=\"Autoriser l'acces aux cours\" data-stagiaireI=\""+m.idStagiaire+"\"  data-nom=\""+m.NomStagiaire+"\" data-prenom=\""+m.PrenomStagiaire+"\"></i></a>"
                   ] ).draw( false );
                }

               },
            });




               })
              // $(".libelleGroupe").html("Liste des stagiaires du groupe : " + msg[0].libelle_groupe );
        }
     });
    $('#ModalEffectif').modal('show');
  });



  $('body').on('click','.historique_stagiaire',function(event){

    stagiaireI = $(this).attr("data-stagiaireI");
    inscriptionI = $(this).attr("data-inscriptionI");
    nomStagiaire = $(this).attr("data-nom");
    prenomStagiaire = $(this).attr("data-prenom");
    var t = $('#historique').DataTable();
    t.rows().remove().draw();
    $.ajax({
       type: 'POST',
       url: base_url + 'stagiaire/ajax/getHistoriqueStagiaire',
       dataType: "JSON",
       data : {stagiaireI: stagiaireI},
       cache:false,
       success: function(msg){
         msg.forEach(function (m/*, index */){

                if(m.etat_absence!="J"){
                var rowNode = t.row.add( [
                      m.date_seance ,
                     m.heure_debut_seance,
                     m.heure_fin_seance,
                     m.libelle_formation,
                     m.Nom +" "+ m.Prenom
                 ] ).draw( false ).node();
                 $( rowNode ).css( 'background-color', '#ffef99' );
               }else{
                 t.row.add( [
                       m.date_seance ,
                      m.heure_debut_seance,
                      m.heure_fin_seance,
                      m.libelle_formation,
                      m.Nom +" "+ m.Prenom
                  ] ).draw( false );
               }

              })
              $(".name_stagiaire").html("Historique d'absence du stagiaire : " + nomStagiaire +" "+ prenomStagiaire );
              $('#ModalHistorique').modal('show');
       }
    });

  });



  //les dérnieres seances
var id_groupe= "";
  $('.linev').on('click',function(){
     id_groupe = $(this).attr("data-groupe");
     var table1 = $('#historique_seance').DataTable();
     table1.rows().remove().draw();
      $.ajax({
         type: 'POST',
         url: base_url + 'absence/ajax/getSeancesByGroupe',
         dataType: "JSON",
         data : {id_groupe:id_groupe},
         cache:false,
         success: function(msg){

           msg.forEach(function (m/*, index */){
                /*  var ligne = $("<tr></tr>");
                  ligne.append($("<td>" + m.date_seance + "</td>"));
                  ligne.append($("<td>" + m.heure_debut_seance + "</td>"));
                  ligne.append($("<td>" + m.heure_fin_seance + "</td>"));*/
                  var nom_stagiaires="";
                  $.ajax({
                     type: 'POST',
                     url: base_url + 'absence/ajax/getStagiaireAbsent',
                     dataType: "JSON",
                     data : {id_seance:m.id_seance},
                     cache:false,
                     success: function(msg){
                       msg.forEach(function (m/*, index */){
                              nom_stagiaires = nom_stagiaires+"-"+ m.NomStagiaire +" "+ m.PrenomStagiaire+" ";
                            })
                            /*ligne.append($("<td>" + nom_stagiaires + "</td>"));*/
                            table1.row.add( [
                                  m.date_seance ,
                                 m.heure_debut_seance,
                                 m.heure_fin_seance,
                                 nom_stagiaires,
                                 m.libelle_formation,
                                 m.Nom+" "+m.Prenom
                             ] ).draw( false );
                     }
                  });

                })
         }
      });
        $('#ModalDernierAbs').modal('show');
  });
  function printDiv()
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  //setTimeout(function(){newWin.close();},10);

}

stagiaireI ="";
nomStagiaire ="";
prenomStagiaire ="";
$('body').on('click','.autorisation',function(event){
stagiaireI = $(this).attr("data-stagiaireI");
nomStagiaire = $(this).attr("data-nom");
prenomStagiaire = $(this).attr("data-prenom");
  $('#ModalModification').modal('show');
});


  $('#justifier_absence').on('click',function(event){
var justification_absence=$('#justification_absence').val();
$('#nom_complet').html(nomStagiaire+" "+prenomStagiaire);
$('#justificationAbsence').html(justification_absence);

printDiv();
//window.printPreview('gggg');
      $.ajax({
        type: 'POST',
        url: base_url + 'absence/ajax/AutoriserAcces',
        dataType: "JSON",
        data : {justification_absence : justification_absence, stagiaireI : stagiaireI, nomStagiaire : nomStagiaire ,prenomStagiaire : prenomStagiaire},
        success: function(msg){

          if(msg.status == '1'){
            $("#form_justifier").trigger("reset");

            $(document).Toasts('create', {
              class: 'bg-success',
              title: 'Stagiaire autorisé ',
              position: 'bottomRight',
              autohide: true,
              delay: 1200,
              body: msg.message
            });
            setTimeout(function(){
             window.location.href=base_url + 'absence/liste';
           }, 1300)
          }else if(msg.status == '0'){
            $(document).Toasts('create', {
              class: 'bg-warning',
              title: 'Veuillez remplir les champs !',
              position: 'bottomRight',
              autohide: true,
              delay: 1200,
              body: msg.message
            });

          }
        },
        error: function(dataR){
          $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Erreur',
            position: 'bottomRight',
            autohide: true,
            delay: 1200,
            body: dataR.message
          });
        }
      });
      return false;
    }
  );
</script>
