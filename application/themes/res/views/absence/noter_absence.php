<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des groupes</h3>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-hover exampleME">
            <thead>
              <tr>
	                <th>Groupe</th>
	                <th>Filiére</th>
	                <th>Module</th>
	                <th>Effectif</th>
	                <th>Niveau</th>
	                <th>Année scolaire</th>
	                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($AllEnseigner as $rowDetail ):?>
              <tr>
	                <td><?=$rowDetail->libelle_groupe;?></td>
	                <td><?=$rowDetail->libelle_filiere;?></td>
	                <td><?=$rowDetail->libelle_formation;?></td>
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

	                                  ?>

	                                  </td>
	                <td><?=$rowDetail->niveau_filiere;?></td>
	                <td><?=$rowDetail->Niveau_idNiveau;?>A</td>
	                <td>
	                  <a href="#">
	                    <i class="fas fa-info linev" title="Derniéres scéances" data-enseigner="<?=$rowDetail->idEnseigner;?>"></i>
	                  </a>&nbsp;
	                  <a href="#">
	                    <i class="fas fa-edit noter_absence" title="Noter l'absence" data-enseigner="<?=$rowDetail->idEnseigner;?>"></i>
	                  </a>&nbsp;
	                  <a href="#">
	                    <i class="fas fa-users effectif_groupe" title="Effectif" data-enseigner="<?=$rowDetail->idEnseigner;?>"></i>
	                  </a>
	                </td>
              </tr>
              <?php endforeach; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>



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

<div class="modal fade bd-example-modal-lg" id="ModalModification" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Noter l'absence</h5>
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
                  <h3 class="card-title libelleGroupe"></h3>
                </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-md-12">

                        <div class="form-group">
                          <label>Date de la scéance:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="date" class="form-control" id="date_seance">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-6">
                            <label>Heure de début:</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                              </div>
                              <input type="time" class="form-control float-right" id="heure_debut" >
                            </div>
                          </div>
                          <div class="col-md-6">
                            <label>Heure de fin:</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                              </div>
                              <input type="time" class="form-control float-right" id="heure_fin" >
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <sub>Cocher les stagiaire absents</sub>
                  <div class="row">
                    <div class="col-sm-12">
                      <table  class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>CEF</th>
                            <th>Sexe</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody id="cocher_stagiaire">

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
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary" id="note_absence">Valider</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" id="ModalDernierAbsEffectif" tabindex="-1" style="z-index:9999;" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
          &nbsp;
          <i class="fas fa-arrow-left" data-dismiss="modal" aria-label="Close" style="color: blue; cursor:pointer;"> </i><h5 class="modal-title" id="exampleModalLongTitle">&nbsp;&nbsp;&nbsp;&nbsp;Les dernières absence</h5>
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
                  <h3 class="card-title">Les dernières absences</h3>
                </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-md-12"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table table-bordered table-hover exampleME">
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
                <th>Nombre d'absence non justifiées</th>
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

<div class="modal fade bd-example-modal-lg" id="ModalHistorique" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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

<script >
  $(function () {
    $('.exampleME,#stagiareTable,#absenceTable').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  });


  //les dérnieres seances
  var id_enseigner= "";

  $('.noter_absence').on('click',function(){
    id_enseigner = $(this).attr("data-enseigner");
     $.ajax({
        type: 'POST',
        url: base_url + 'absence/ajax/getStagiaireaEnseigner',
        dataType: "JSON",
        data : {id_enseigner:id_enseigner},
        cache:false,
        success: function(msg){
          $("#cocher_stagiaire").empty();
          msg.forEach(function (m/*, index */){

            $.ajax({
               type: 'POST',
               url: base_url + 'absence/ajax/getAbsenceNJ',
               dataType: "JSON",
               data : {stagiaireI: m.idStagiaire},
               cache:false,
               success: function(msg1){
                 var backcolor="";
                  msg1.forEach(function (m/*, index */){
                 if(m.counta >= 3){
                   backcolor="style=\"background-color:#ff5757;\"";
                 }else if(m.counta >= 1 ){
                   backcolor="style=\"background-color:#ffef99;\"";
                 }})
                 var ligne = $("<tr "+backcolor+"></tr>");
                 ligne.append($("<td>" + m.NomStagiaire + "</td>"));
                 ligne.append($("<td>" + m.PrenomStagiaire + "</td>"));
                 ligne.append($("<td>" + m.CefStagiaire + "</td>"));
                 ligne.append($("<td>" + m.Sexe + "</td>"));
                 ligne.append($("<td><div class=\"form-check\"><input class=\"form-check-input checkbox_absent\" type=\"checkbox\" value=\""+m.idStagiaire+"\" data-nom=\""+m.NomStagiaire+"\"><label class=\"form-check-label\"></label></div></td>"));
                 var nom_stagiaires="";
                 $("#cocher_stagiaire").append(ligne);
               },
            });




               })
              // $(".libelleGroupe").html("Liste des stagiaires du groupe : " + msg[0].libelle_groupe );
        }
     });
    $('#ModalModification').modal('show');
  });
  $('#note_absence').on('click',function(){

    var date_seance=$('#date_seance').val();
    var heure_debut=$('#heure_debut').val();
    var heure_fin=$('#heure_fin').val();
    var checkbox = $('.checkbox_absent:checked');
    if(checkbox.length > 0){
      var checkbox_value = [];
      $(checkbox).each(function(){
        checkbox_value.push($(this).val());
      });
    }
      $.ajax({
        type: 'POST',
        url: base_url + 'absence/ajax/NoterAbsence',
        dataType: "JSON",
        data : {checkbox_value : checkbox_value , id_enseigner : id_enseigner , date_seance : date_seance , heure_debut : heure_debut , heure_fin : heure_fin},
        success: function(msg){
          if(msg.status == '1'){
            $("#note_absence").trigger("reset");
            $(document).Toasts('create', {
              class: 'bg-success',
              title: 'Séance créé ',
              position: 'bottomRight',
              autohide: true,
              delay: 1200,
              body: msg.message
            });
            setTimeout(function(){
             window.location.href=base_url + 'absence/ajouter';
           }, 1300)
          } else if(msg.status == '0'){
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
  //les dérnieres seances
var id_enseigner= "";
  $('.linev').on('click',function(){
     id_enseigner = $(this).attr("data-enseigner");
     var table1 = $('#historique_seance').DataTable();
     table1.rows().remove().draw();
      $.ajax({
         type: 'POST',
         url: base_url + 'absence/ajax/getSeances',
         dataType: "JSON",
         data : {id_enseigner:id_enseigner},
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
                                 nom_stagiaires
                             ] ).draw( false );
                     }
                  });

          			})
         }
      });
        $('#ModalDernierAbs').modal('show');
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

  $('.effectif_groupe').on('click',function(){
    var t = $('#effectif').DataTable();
    t.rows().remove().draw();
    id_enseigner = $(this).attr("data-enseigner");
     $.ajax({
        type: 'POST',
        url: base_url + 'absence/ajax/getStagiaireaEnseigner',
        dataType: "JSON",
        data : {id_enseigner:id_enseigner},
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
                      "<a href=\"#\"><i class=\" fas fa-history historique_stagiaire \" title=\"Historique d'absence\" data-stagiaireI=\""+m.idStagiaire+"\"  data-nom=\""+m.NomStagiaire+"\" data-prenom=\""+m.PrenomStagiaire+"\"></i></a>"
                  ] ).draw( false ).node();
                  $( rowNode ).css( 'background-color', '#ff5757' );
                }else if(nombre_absence >= 1){
                  var rowNode = t.row.add( [
                        m.NomStagiaire ,
                       m.PrenomStagiaire,
                       m.CefStagiaire,
                       m.Sexe,
                       nombre_absence,
                       "<a href=\"#\"><i class=\" fas fa-history historique_stagiaire \" title=\"Historique d'absence\" data-stagiaireI=\""+m.idStagiaire+"\"  data-nom=\""+m.NomStagiaire+"\" data-prenom=\""+m.PrenomStagiaire+"\"></i></a> "
                   ] ).draw( false ).node();
                   $( rowNode ).css( 'background-color', '#ffef99' );

                }else{
                  t.row.add( [
                        m.NomStagiaire ,
                       m.PrenomStagiaire,
                       m.CefStagiaire,
                       m.Sexe,
                       nombre_absence,
                       "<a href=\"#\"><i class=\" fas fa-history historique_stagiaire \" title=\"Historique d'absence\" data-stagiaireI=\""+m.idStagiaire+"\"  data-nom=\""+m.NomStagiaire+"\" data-prenom=\""+m.PrenomStagiaire+"\"></i></a> "
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

</script>
