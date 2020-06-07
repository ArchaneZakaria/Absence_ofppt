<section class="content">
  <!-- Default box -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des stagiaires</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            <table class="table table-bordered table-hover tableDataMe">
            <thead>
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th title="Numéro d'inscription">CEF</th>
              <th>CIN</th>
              <th>Sexe</th>
              <th>Nombre total d'absence</th>
              <th>Filière</th>
              <th>Groupe</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              <?php foreach($AllInscription as $rowDetail ):?>
                <tr>
                  <td><?=$rowDetail->NomStagiaire;?></td>
                  <td><?=$rowDetail->PrenomStagiaire;?></td>
                  <td><?=$rowDetail->CefStagiaire;?></td>
                  <td><?=$rowDetail->CniStagiaire;?></td>
                  <td><?=$rowDetail->Sexe;?></td>
                  <td><?php
                                     $sql="select COUNT(*) as count
                                     from absence
                                     WHERE absence.Stagiaire_idStagiaire='$rowDetail->idStagiaire' ";

                                      $NbrAbsences = $this->db->query($sql);
                                  $abs = $NbrAbsences->result();
                                        echo $abs[0]->count;

                                  ?></td>
                  <td><?=$rowDetail->libelle_filiere;?></td>
                  <td><?=$rowDetail->libelle_groupe;?></td>
                  <td>
                    <a href="#">
                      <i class="fas fa-history historique_stagiaire" data-stagiaireI="<?=$rowDetail->idStagiaire?>" data-inscriptionI="<?=$rowDetail->idInscription?>" data-nom="<?=$rowDetail->NomStagiaire?>" data-prenom="<?=$rowDetail->PrenomStagiaire?>" title="Historique d'absence"></i>
                    </a>&nbsp;
                      <a href="#">
                        <i class="fas fa-edit modifier_stagiaire" data-inscriptionI="<?=$rowDetail->idInscription?>" data-groupe="<?=$rowDetail->idGroupe?>" data-filiere="<?=$rowDetail->idFiliere?>" data-cfe="<?=$rowDetail->CefStagiaire;?>" data-nom="<?=$rowDetail->NomStagiaire?>" data-stagiaireI="<?=$rowDetail->idStagiaire?>" data-prenom="<?=$rowDetail->PrenomStagiaire?>" data-matricule="<?=$rowDetail->CniStagiaire ?>" data-dateN="<?=$rowDetail->DateNaissance ?>" data-sexe="<?=$rowDetail->Sexe?>" title="Modifier"></i>
                      </a>&nbsp;
                      <a href="#">
                        <i class="fas fa-user-times deperdition_stagiaire" data-stagiaireI="<?=$rowDetail->idStagiaire?>" title="Déperdition"></i>
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
          <h5 class="modal-title" id="exampleModalLongTitle">Les derniers absence</h5>
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
                  <h3 class="card-title">Les derniers absence</h3>
                </div>
                <div class="card-body">
                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                      <div class="col-md-12"></div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <table class="table tableDataMe" id="lesDerniersAbsenceModeltable">
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







  <div class="modal fade " id="ModalHistorique" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin:auto;width:100%;">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Historique d'absences</h5>
                        <!--  <div id="_results102" class="col-sm-6  alert alert-danger hide " style="margin-left:200px;text-align:center;" >
                          <span></span>
                        </div>-->
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
                                <h3 class="card-title name_stagiaire"></h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                  <div class="row">
                                    <div class="col-md-12">
                                      </div>
                                      </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-12">
                                  <table class="table table-bordered table-hover tableDataMe"  id="historique">
                                  <thead>
                                  <tr>
                                    <th>Date d'absence</th>
                                    <th>Heure de début</th>
                                    <th>Heure de fin</th>
                                    <th>Module</th>
                                    <th>Formateur</th>
                                  </tr>
                                  </thead>
                                  <tbody>


                                  </tbody>

                                </table></div>
                              </div></div>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                            <!-- /.card -->
                          </div>
                          </div>
                          <div class="modal-footer">
                              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                          </div>
                          <!-- /.col -->
                      </form>
                      </div>
                  </div>
              </div>

              <div class="modal fade" id="ModalModification" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin:auto;width:100%;">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Modifier stagiaire</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form id="formModel_modifier" role="form">
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nom</label>
                          <input required type="text" class="form-control" id="nom_stagiaire" placeholder="Saisissez le nom">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Prénom</label>
                          <input required type="text" class="form-control" id="prenom_stagiaire" placeholder="Saisissez le prénom">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">CIN</label>
                          <input required type="text" class="form-control" id="cin_stagiaire" placeholder="Saisissez le numéro de la carte d'identité nationale">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">CEF</label>
                          <input required type="text" class="form-control" id="cef_stagiaire" placeholder="Saisissez le numéro d'inscription">
                        </div>
                        <div class="form-group">
                          <label>Date de naissance:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input required type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="date_naissance_stagiaire">
                          </div></br>
                          <div class="form-group clearfix">
                            <label>Sexe:</label><br>
                            <div class="icheck-primary d-inline">
                              <input required type="radio" id="sexe_Masculin" name="sexe_stagiaire" value="Masculin">
                              <label for="sexe_Masculin">
                                Masculin
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input required type="radio" id="sexe_Feminin" name="sexe_stagiaire" value="Feminin">
                              <label for="sexe_Feminin">
                                Feminin
                              </label>
                            </div>
                          </div>

                          <div class="form-group">
                            <label>Filiére</label>
                            <select required class="form-control select2" id="filiere_stagiaire">
                              <option value='' selected>Selectinner une filière</option>
                              <?php foreach($AllFiliere as $rowDetail ):?>
                              <option value='<?=$rowDetail->idFiliere;?>'><?= $rowDetail->libelle_filiere ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Groupe</label>
                            <select required class="form-control select2" id="groupe_stagiaire">
                              <option value='' selected>Selectinner un groupe</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                          <button type="submit" class="btn btn-primary">Modifier</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>


<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin:auto;width:100%;">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Déperdition</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="form_deperdition">
                    <div class="modal-body">
                        <label>Date de déperdition:</label>

                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                          </div>
                          <input id="date_deperdition_stagiaire" type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="16:03:2000">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                    </form>
                  <!--  <div id="_results" class="col-sm-6  alert alert-danger hide " style="margin-left:200px;text-align:center;" >
                                 <span></span>
                               </div>-->
                </div>
            </div>
        </div>
  <script>
    //Modifier
    $( "#filiere_stagiaire" ).change(function() {//for popup edit
      var filiere = $(this).children("option:selected").val();
      $.ajax({
         type: 'POST',
         url: base_url + 'groupe/ajax/getGroupsFiliere',
         dataType: "JSON",
         data : {filiere:filiere},
         cache:false,
         success: function(msg){
           $("#groupe_stagiaire *").remove();
           for (var i = 0; i < msg.length; i++) {
             $("#groupe_stagiaire").append(new Option(msg[i].libelle_groupe, msg[i].idGroupe));
           }
         },
         error: function(dataR){
         }
      });
    });
    var stagiaireI   = "";
    var inscriptionI = "";
    $('.modifier_stagiaire').on('click',function(){//remplire le model
     $("#nom_stagiaire").val($(this).attr("data-nom"));
     $("#prenom_stagiaire").val($(this).attr("data-prenom"));
     stagiaireI = $(this).attr("data-stagiaireI");
     $("#cin_stagiaire").val($(this).attr("data-matricule"));
     $("#cef_stagiaire").val($(this).attr("data-cfe"));
     inscriptionI = $(this).attr("data-inscriptionI");
     $("#date_naissance_stagiaire").val($(this).attr("data-dateN"));
     var sexe = $(this).attr("data-sexe");
     if (sexe==="Masculin") { $("#sexe_Masculin").attr('checked', 'checked'); } else if (sexe==="Feminin") { $("#sexe_Feminin").attr('checked', 'checked'); }
     var groupe = $(this).attr("data-groupe");
     var filiere = $(this).attr("data-filiere");
     $('#filiere_stagiaire option[value="'+ filiere +'"]').attr('selected', true);
     filiere = $('#filiere_stagiaire').children("option:selected").val();
     $.ajax({
        type: 'POST',
        url: base_url + 'groupe/ajax/getGroupsFiliere',
        dataType: "JSON",
        data : {filiere:filiere},
        cache:false,
        success: function(msg){

          for (var i = 0; i < msg.length; i++) {
            if (groupe === msg[i].idGroupe) { $("#groupe_stagiaire").append(new Option(msg[i].libelle_groupe, msg[i].idGroupe, true, true));
            }else { $("#groupe_stagiaire").append(new Option(msg[i].libelle_groupe, msg[i].idGroupe)); }
          }
        }
     });
      $('#ModalModification').modal('show');
    });

    $("#formModel_modifier").on("submit",function() {
      var nom           = $("#nom_stagiaire").val();
      var prenom        = $("#prenom_stagiaire").val();
      var cin           = $("#cin_stagiaire").val();
      var cef           = $("#cef_stagiaire").val();
      var dateNaissance = $("#date_naissance_stagiaire").val();
      var filiere       = $("#filiere_stagiaire").val();
      var group         = $("#groupe_stagiaire").val();
      var sexe = "";

      if ($("#sexe_Masculin").is(':checked')) {
        sexe = "Masculin";
      } else if ($("#sexe_Feminin").is(':checked')) {
        sexe = "Feminin";
      }else {
        alert("le sexe de survéillant général est obligatoire !");
        return false;
      }

      $.ajax({
         type: 'POST',
         url: base_url + 'stagiaire/ajax/creer_stagiaire',
         dataType: "JSON",
         data : {inscriptionI:inscriptionI, stagiaireI: stagiaireI,nom_stagiaire:nom, prenom_stagiaire:prenom, cin_stagiaire:cin, cef_stagiaire:cef, date_naissance_stagiaire:dateNaissance, filiere_stagiaire:filiere, groupe_stagiaire:group, sexe_stagiaire:sexe},
         cache:false,
         success: function(msg){
           if(msg.status == '1'){
             $("#creer_stagiaire").trigger("reset");
             $(document).Toasts('create', {
               class: 'bg-success',
               title: 'Stagiaire modifié ',
               position: 'topRight',
               autohide: true,
               delay: 1200,
               body: msg.message
             });
             setTimeout(function(){
              window.location.href=base_url + 'stagiaire/liste';
            }, 1300)
           }else if(msg.status == '0'){
             $(document).Toasts('create', {
               class: 'bg-warning',
               title: 'Veuillez remplir les champs !',
               position: 'topRight',
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
             position: 'topRight',
             autohide: true,
             delay: 1200,
             body: dataR.message
           });
         }
      });
      return false;
    });


  </script>
  <script>
    $(function () {
      $('.tableDataMe').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
      });
    });

    $('.linev').on('click',function(){
     $('#ModalDernierAbs').modal('show');
    });

// Pour la déperdition du stagiaire
    var stagiaireI   = "";

    $('.deperdition_stagiaire').on('click',function(){
      stagiaireI = $(this).attr("data-stagiaireI");
      $('#exampleModalDelete').modal('show');
    });
    $("#form_deperdition").on("submit",function() {
      var dateDeperdition = $("#date_deperdition_stagiaire").val();
      $.ajax({
         type: 'POST',
         url: base_url + 'stagiaire/ajax/deperdition_stagiaire',
         dataType: "JSON",
         data : {stagiaireI: stagiaireI, date_deperdition_stagiaire:dateDeperdition},
         cache:false,
         success: function(msg){
           if(msg.status == '1'){
             $("#form_deperdition").trigger("reset");
             $(document).Toasts('create', {
               class: 'bg-success',
               title: 'Déperdition ',
               position: 'topRight',
               autohide: true,
               delay: 1200,
               body: msg.message
             });
             setTimeout(function(){
              window.location.href=base_url + 'stagiaire/liste';
            }, 1300)
           }else if(msg.status == '0'){
             $(document).Toasts('create', {
               class: 'bg-warning',
               title: 'Veuillez remplir les champs !',
               position: 'topRight',
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
             position: 'topRight',
             autohide: true,
             delay: 1200,
             body: dataR.message
           });
         }
      });
      return false;

    });
//Pour afficher l'historique d'absence du stagiaire
      var stagiaireI   = "";
      var inscriptionI = "";
      var nomStagiaire ="";
      var prenomStagiaire ="";
      var color ="";
    $('.historique_stagiaire').on('click',function(){
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
         data : {inscriptionI:inscriptionI, stagiaireI: stagiaireI},
         cache:false,
         success: function(msg){
           msg.forEach(function (m/*, index */){
             /*if(m.etat_absence!="J"){
               color="style=\"background-color:#ffef99;\"";
             }else{
               color="style=\"background-color:;\"";
             }*/
          			/*	var ligne = $("<tr "+color+"></tr>");
          				ligne.append($("<td>" + m.date_seance + "</td>"));
          				ligne.append($("<td>" + m.heure_debut_seance + "</td>"));
                  ligne.append($("<td>" + m.heure_fin_seance + "</td>"));
          				ligne.append($("<td>" + m.libelle_formation + "</td>"));
          				ligne.append($("<td>" + m.Nom +" "+ m.Prenom + "</td>"));
                  $("#tbody").append(ligne);*/
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
         }
      });

      $(".name_stagiaire").html("Historique d'absence du stagiaire : " + nomStagiaire +" "+ prenomStagiaire );
      $('#ModalHistorique').modal('show');
    });
  </script>
