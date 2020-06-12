<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des survéillants général</h3>
        </div>
        <div class="card-body">
          <table id="exampleME" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Matricule/CIN</th>
              <th>Email</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Sexe</th>
              <th>Etablissement</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              <?php foreach ($listSurveillant_General as $Surveillant_General):?>
                <tr>
                  <td><?= $Surveillant_General->matricule_utilisateur ?></td>
                  <td><?= $Surveillant_General->Email ?></td>
                  <td><?= $Surveillant_General->Nom ?></td>
                  <td><?= $Surveillant_General->Prenom ?></td>
                  <td><?= $Surveillant_General->sexe_utilisateur ?></td>
                  <td><?= $Surveillant_General->libelle_etablissement ?></td>
                  <td>
                      <a href="#">
                        <i class="fas fa-edit modifierSurveillantG" data-dateNaissance="<?= $Surveillant_General->DateNaissance  ?>"
                        data-etablissement="<?= $Surveillant_General->Etablissement_idEtablissement ?>" data-sexe="<?= $Surveillant_General->sexe_utilisateur ?>"
                        data-prenom="<?= $Surveillant_General->Prenom ?>" data-nom="<?= $Surveillant_General->Nom  ?>" data-matricule="<?= $Surveillant_General->matricule_utilisateur ?>"
                        data-email="<?= $Surveillant_General->Email ?>" data-surveillantI="<?= $Surveillant_General->idUtilisateur ?>" title="Modifier etablissement"></i>
                      <a>
                      <a href="#">
                        <i style="color: red;" class="fas fa-trash supprimerSurveillantG" data-prenom="<?= $Surveillant_General->Prenom ?>" data-nom="<?= $Surveillant_General->Nom  ?>" title="Supprimer etablissement" data-surveillantI="<?= $Surveillant_General->idUtilisateur ?>"></i>
                      <a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
      </div>
    </div>
  </div>

</section>

  <!-- edit model -->
  <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier survéillant général</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formModelEditsurveillantgenerale" role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Matricule / CIN</label>
              <input required type="text" class="form-control" id="modelEditMatricule" placeholder="Entrer votre Matricule/CIN">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nom</label>
              <input required type="text" class="form-control" id="modelEditNom" placeholder="Entrer votre Nom">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Prénom</label>
              <input required type="text" class="form-control" id="modelEditPrenom" placeholder="Entrer votre Prenom">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1"> Email </label>
              <input required type="email" class="form-control" id="modelEditemail" placeholder="Entrer votre email">
            </div>
            <div class="form-group">
              <label>Date de naissance:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                </div>
                <input required id="modelEditdateNaissance" type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
              </div>
            </div>
            <div class="form-group clearfix">
              <label>Sexe:</label><br>
              <div class="icheck-primary d-inline">
                <input required type="radio" id="modelEditSexe_Masculin" name="sexe">
                <label for="modelEditSexe_Masculin"> Masculin </label>
              </div>
              <div class="icheck-primary d-inline">
                <input required type="radio" id="modelEditSexe_Feminin" name="sexe">
                <label for="modelEditSexe_Feminin"> Feminin </label>
              </div>
            </div>
            <div class="form-group">
              <label>Etablissement</label>
              <select required class="form-control select2" id="etablissement">
                <option value="" selected>Selectionner une Etablissement</option>
                <?php foreach ($listEtablissement as $Etablissement): ?>
                  <option value="<?= $Etablissement->idEtablissement ?>"><?= $Etablissement->libelle_etablissement ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /edit model -->

  <!-- delete model -->
  <div class="modal fade" id="ModalDeleteSVG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supprimer survéillant général</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formModelDeleteSVG" role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Voulez vous vraiment supprimer le survéillant général ?</label>
                <p style="text-align:center;" id="deletelabNom"></p>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-danger">Supprimer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /delete model -->

  <!-- Add etablissement model-->
  <div class="modal fade" id="exampleModalAddEtablissement" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalAddEtablissementLabel">Ajouter etablissement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputselectEatb">Selectionner Etablissement</label><br>
                <select class="form-control select2">
                  <option>Etablissement 1</option>
                  <option>Etablissement 2</option>
                  <option>Etablissement 3</option>
                  <option>Etablissement 4</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /Add etablissement model-->
  <script>
    //DataTable
    $(function () {
      $('#exampleME').DataTable({
        "paging": false,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
  <script>
    //Edit Surveillant General
    var survGI="";
    $('.modifierSurveillantG').on("click",function(){
      survGI = $(this).attr("data-surveillantI");
      $("#modelEditNom").val($(this).attr("data-nom"));
      $("#modelEditPrenom").val($(this).attr("data-prenom"));
      $("#modelEditdateNaissance").val($(this).attr("data-dateNaissance"));
      $("#modelEditemail").val($(this).attr("data-email"));
      $("#modelEditMatricule").val($(this).attr("data-matricule"));
      $('#etablissement option[value="'+ $(this).attr("data-etablissement") +'"]').attr('selected', true);
      var sexe = $(this).attr("data-sexe");
      if (sexe === "Masculin") {//sexe
        $("#modelEditSexe_Masculin").attr('checked', 'true');
      }else {
        $("#modelEditSexe_Feminin").attr('checked', 'true');
      }
      $('#exampleModalEdit').modal('show');
    });

    $("#formModelEditsurveillantgenerale").on("submit",function() {
      var matr   = $("#modelEditMatricule").val();
      var nom    = $("#modelEditNom").val();
      var prenom = $("#modelEditPrenom").val();
      var dateNaissance = $("#modelEditdateNaissance").val();
      var email  = $("#modelEditemail").val();
      var etablissement = $("#etablissement").val();
      var sexe   = "";
      if ($("#modelEditSexe_Masculin").is(':checked')) {
        sexe = "Masculin";
      } else if ($("#modelEditSexe_Feminin").is(':checked')) {
        sexe = "Feminin";
      } else {
        $(document).Toasts('create', {
          class: 'bg-warning',
          title: 'Erreur',
          position: 'topRight',
          autohide: true,
          delay: 1500,
          body: "le sexe de survéillant général est obligatoire !"
        });
        return false;
      }
      /*
      Test
      alert(" id: "+survGI+"\n matr: "+matr+"\n nom: "+nom+"\n prenom: "+prenom+"\n sexe: "+sexe+"\n etablissement: "+etablissement+" \ndateNaissance: "+dateNaissance);
      return false;
      */

      $.ajax({
         type: 'POST',
         url: base_url + 'surveillant_general/ajax/createSurveillantGeneral',
         dataType: "JSON",
         data : {survGI:survGI,cin:matr,nom:nom,prenom:prenom,email:email,sexe:sexe,etablissement:etablissement,dateNaissance:dateNaissance},
         cache:false,
         success: function(msg){
           if(msg.status == '1'){
             $("#formModelEditsurveillantgenerale").trigger("reset");
             $(document).Toasts('create', {
               class: 'bg-success',
               title: 'Succès',
               position: 'topRight',
               autohide: true,
               delay: 1500,
               body: msg.message
             });
             $('#exampleModalEdit').modal('hide');
             setTimeout(function(){
              window.location.href = base_url + 'surveillant_general/liste';
            }, 1500);
           }else if(msg.status == '0'){
             $(document).Toasts('create', {
               class: 'bg-warning',
               title: 'Erreur',
               position: 'topRight',
               autohide: true,
               delay: 1500,
               body: msg.message
             });
           }
         },
         error : function(msg) {
           $(document).Toasts('create', {
             class: 'bg-success',
             title: 'Succès',
             subtitle: 'close',
             body: 'Erreur de traitement'
           });
         }
      });
      return false;
    });
  </script>
  <script>
    //delete Surveillant General
    var survGI="";
    $('.supprimerSurveillantG').on("click",function(){
      survGI = $(this).attr("data-surveillantI");
      $("#deletelabNom").text($(this).attr("data-nom") + ' ' + $(this).attr("data-prenom"));
      $('#ModalDeleteSVG').modal('show');
    });

    $("#formModelDeleteSVG").on("submit",function() {
      $.ajax({
         type: 'POST',
         url: base_url + 'surveillant_general/ajax/deleteSurveillantGeneral',
         dataType: "JSON",
         data : {survGI:survGI},
         cache:false,
         success: function(msg){
           if(msg.status == '1'){
             $("#formModelDeleteSVG").trigger("reset");
             $(document).Toasts('create', {
               class: 'bg-success',
               title: 'Succès',
               position: 'topRight',
               autohide: true,
               delay: 1500,
               body: msg.message
             });
             $('#ModalDeleteSVG').modal('hide');
             setTimeout(function(){
              window.location.href = base_url + 'surveillant_general/liste';
            }, 1500);
           }else if(msg.status == '0'){
             $(document).Toasts('create', {
               class: 'bg-warning',
               title: 'Erreur',
               position: 'topRight',
               autohide: true,
               delay: 1500,
               body: msg.message
             });
           }
         },
         error : function(msg) {
           $(document).Toasts('create', {
             class: 'bg-success',
             title: 'Succès',
             subtitle: 'close',
             body: 'Erreur de traitement'
           });
         }
      });
      return false;
    });
  </script>
