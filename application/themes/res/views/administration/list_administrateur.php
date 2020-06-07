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
              <th>Nom</th>
              <th>Prénom</th>
              <th>Sexe</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>AE260153</td>
              <td>Lynx</td>
              <td>Text only</td>
              <td>Feminin</td>
              <td>
                  <a href="#">
                    <i class="fas fa-edit modifierEtablissement" data-statut="Actif" data-sexe="Masculin" data-prenom="Zakaria" data-nom="Archane" data-matricule="AE260153" data-etablissement="Etablissement 1" title="Modifier etablissement" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  <a>
                  <a href="#">
                    <i style="color: red;" class="fas fa-trash supprimerEtablissement" data-statut="Actif" data-sexe="Masculin" data-prenom="Zakaria" data-nom="Archane" data-matricule="AE260153" data-etablissement="Etablissement 1" title="Supprimer etablissement" data-toggle="modal" data-target="#exampleModalDelete"></i>
                  <a>
              </td>
            </tr>
            <tr>
              <td>AE260153</td>
              <td>Archane</td>
              <td>Zakaria</td>
              <td>Masculin</td>
              <td>
                  <a href="#">
                    <i class="fas fa-edit modifierEtablissement" data-statut="Actif" data-sexe="Masculin" data-prenom="Zakaria" data-nom="Archane" data-matricule="AE260153" data-etablissement="Etablissement 1" title="Modifier etablissement" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  <a>
                  <a href="#">
                    <i style="color: red;" class="fas fa-trash supprimerEtablissement" data-statut="Actif" data-sexe="Masculin" data-prenom="Zakaria" data-nom="Archane" data-matricule="AE260153" data-etablissement="Etablissement 1" title="Supprimer etablissement" data-toggle="modal" data-target="#exampleModalDelete"></i>
                  <a>
              </td>
            </tr>
            </tbody>
          </table>
        <!-- /.card-body -->
      </div>
    </div>
    <!-- /.col -->
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
        <form role="form">
        <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Matricule / CIN</label>
              <input type="matricule" class="form-control" id="exampleInputMatricule" placeholder="Entrer votre Matricule/CIN">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Nom</label>
              <input type="nom" class="form-control" id="exampleInputNom" placeholder="Entrer votre Nom">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Prénom</label>
              <input type="prenom" class="form-control" id="exampleInputPrenom" placeholder="Entrer votre Prenom">
            </div>
            <div class="form-group clearfix">
              <label for="exampleInputEmail1">Sexe</label><br>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input " id="radioPrimary1" name="sexe">
                <label class="custom-control-label " for="radioPrimary1">Masculin</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input " id="radioPrimary2" name="sexe">
                <label class="custom-control-label " for="radioPrimary2">Féminin</label>
              </div>
            </div>
                <!--
            <div class="form-group">
              <label>Type Vac</label>
              <select class="form-control select2" id="typeVacModel" style="width: 100%;">
                <option>FP</option>
                <option>FV</option>
              </select>
            </div>
            <div class="form-group clearfix">
              <label for="exampleInputEmail1">Statut</label><br>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input " id="radioPrimary3" name="statut">
                <label class="custom-control-label " for="radioPrimary3">Perm</label>
              </div>
              <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input " id="radioPrimary4" name="statut">
                <label class="custom-control-label " for="radioPrimary4">Actif</label>
              </div>
            </div>
          -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
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

    $(function () {
      $('#exampleME').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
      });
    });

    $('.modifierEtablissement').on("click",function(){

      $("#exampleInputNom").val($(this).attr("data-nom"));
      $("#exampleInputPrenom").val($(this).attr("data-prenom"));
      $("#exampleInputMatricule").val($(this).attr("data-matricule"));

      var sexe = $(this).attr("data-sexe");

      if (sexe === "Masculin") {//sexe

        $("#radioPrimary1").attr('checked', 'true');
      }else {
        $("#radioPrimary2").attr('checked', 'true');
      }

      var statut = $(this).attr("data-statut");
      if (statut==="Actif") {//statut
        $("#radioPrimary3").attr('checked', 'true');
      }else if (statut==="Perm") {
        $("#radioPrimary4").attr('checked', 'true');
      }

      //$("#typeVacModel").find('option[text="'+ $(this).attr("data-address") +'"]').attr('selected', 'selected');

    });
    $('.supprimerEtablissement').on("click",function(){
      $("#deletelabNom").text($(this).attr("data-nom") + ' ' + $(this).attr("data-prenom"));
    });
  </script>
