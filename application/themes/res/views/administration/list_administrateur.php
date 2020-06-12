<section class="content">
  <!-- Default box -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des administrateurs</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="exampleME" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Matricule/CIN</th>
                <th>Email</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Sexe</th>
                <th>Utilisateur</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listAdministrateurs as $administrateurs): ?>
                <tr>
                  <td><?= $administrateurs->matricule_utilisateur ?></td>
                  <td><?= $administrateurs->Email ?></td>
                  <td><?= $administrateurs->Nom ?></td>
                  <td><?= $administrateurs->Prenom ?></td>
                  <td><?= $administrateurs->sexe_utilisateur ?></td>
                  <td><?= $administrateurs->libelle_etablissement ?></td>
                  <td>
                      <a href="#">
                        <i class="fas fa-edit modifierUtilisateur" data-dateNaissance="<?= $administrateurs->DateNaissance  ?>"
                        data-admin="<?= $administrateurs->idUtilisateur ?>" data-email="<?= $administrateurs->Email ?>"
                        data-sexe="<?= $administrateurs->sexe_utilisateur ?>" data-prenom="<?= $administrateurs->Prenom ?>"
                        data-nom="<?= $administrateurs->Nom ?>" data-matricule="<?= $administrateurs->matricule_utilisateur ?>"
                        data-etablissement="<?= $administrateurs->idEtablissement ?>" title="Modifier utilisateur"></i>
                      <a>
                      <a href="#">
                        <i style="color: red;" class="fas fa-trash supprimerUtilisateur" data-admin="<?= $administrateurs->idUtilisateur ?>" data-prenom="<?= $administrateurs->Prenom ?>" data-nom="<?= $administrateurs->Nom ?>" title="Supprimer utilisateur" data-toggle="modal" data-target="#exampleModalDelete"></i>
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
        <h5 class="modal-title" id="exampleModalLabel">Modifier administrateur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formModelEditutilisateur" role="form">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Matricule / CIN</label>
            <input required type="text" class="form-control" id="modelEditMatricule" placeholder="Entrer le Matricule/CIN">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Nom</label>
            <input required type="text" class="form-control" id="modelEditNom" placeholder="Entrer le Nom">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Prénom</label>
            <input required type="text" class="form-control" id="modelEditPrenom" placeholder="Entrer le prénom">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1"> Email </label>
            <input required type="email" class="form-control" id="modelEditemail" placeholder="Entrer l'email">
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
  <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supprimer administrateur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Voulez vous vraiment supprimer l'administrateur ?</label>
                <p style="text-align:center;" id="deletelabNom"></p>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /delete model -->

  <script>

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
    //Edit Utilisateur
    var admin="";
    $('.modifierUtilisateur').on("click",function(){
      admin = $(this).attr("data-admin");
      $("#modelEditNom").val($(this).attr("data-nom"));
      $("#modelEditdateNaissance").val($(this).attr("data-dateNaissance"));
      $("#modelEditPrenom").val($(this).attr("data-prenom"));
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

    $("#formModelEditutilisateur").on("submit",function() {
      var matr           = $("#modelEditMatricule").val();
      var nom            = $("#modelEditNom").val();
      var prenom         = $("#modelEditPrenom").val();
      var email          = $("#modelEditemail").val();
      var dateNaissance  = $("#modelEditdateNaissance").val();
      var etablissement  = $("#etablissement").val();
      var sexe           = "";
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
          body: "le sexe de l'administrateur est obligatoire !"
        });
        return false;
      }
      /*
      //Test
      alert(" id: "+admin+"\n matr: "+matr+"\n nom: "+nom+"\n prenom: "+prenom+"\n sexe: "+sexe+"\n etablissement: "+etablissement);
      return false;
      */

      $.ajax({
         type: 'POST',
         url: base_url + 'administrateur/ajax/createAdministrateur',
         dataType: "JSON",
         data : {admin:admin,cin:matr,nom:nom,prenom:prenom,email:email,sexe:sexe,etablissement:etablissement,dateNaissance:dateNaissance},
         cache:false,
         success: function(msg){
           if(msg.status == '1'){
             $("#formModelEditutilisateur").trigger("reset");
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
               window.location.href = base_url + 'administrateur/liste';
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
    //supprimer utilisateur
    $('.supprimerUtilisateur').on("click",function(){
      $("#deletelabNom").text($(this).attr("data-nom") + ' ' + $(this).attr("data-prenom"));
    });
  </script>
