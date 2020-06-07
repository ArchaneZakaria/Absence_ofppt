
  <style>
    .material-switch > input[type="checkbox"] {
      display: none;
    }

    .material-switch > label {
      cursor: pointer;
      height: 0px;
      position: relative;
      width: 40px;
    }

    .material-switch > label::before {
      background: red;
      box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.3);
      border-radius: 8px;
      content: '';
      height: 16px;
      margin-top: -8px;
      position:absolute;
      opacity: 0.3;
      transition: all 0.4s ease-in-out;
      width: 40px;
    }
    .material-switch > label::after {
      background: red;
      border-radius: 16px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
      content: '';
      height: 24px;
      left: -4px;
      margin-top: -8px;
      position: absolute;
      top: -4px;
      transition: all 0.3s ease-in-out;
      width: 24px;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
      background: inherit;
      opacity: 0.5;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
      background: inherit;
      left: 20px;
    }
  </style>






<section class="content">
  <!-- Default box -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des Etablissements</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="exampleME" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nom Etablissement</th>
              <th>Adresse</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Etablissement 1</td>
              <td>Address 1</td>
              <td>
                <a href="#">
                  <i class="fas fa-edit modifierEtablissement" data-nomEtab="Etablissement 1" data-address="Address 1" title="Modifier etablissement" data-toggle="modal" data-target="#exampleModalEdit"></i>
                </a>
                <a href="#">
                  <i class="fas fa-trash red supprimerEtablissement" data-nomEtab="Etablissement 1" style="color: red;" title="ajouter etablissement" data-toggle="modal" data-target="#exampleModalDelete"></i>
                </a>
                <a href="#">
                  <div class="material-switch float-right">
                      <input class="checkboxEtabActiv" id="someSwitchOptionPrimary" name="switch" type="checkbox"/>
                      <label for="someSwitchOptionPrimary" class="btn-primary"></label>
                  </div>
                </a>
              </td>
            </tr>
            <tr>
              <td>Etablissement 2</td>
              <td>Address 2</td>
              <td>
                <a href="#">
                  <i class="fas fa-edit modifierEtablissement" data-nomEtab="Etablissement 2" data-address="Address 2" title="Modifier etablissement" data-toggle="modal" data-target="#exampleModalEdit" ></i>
                <a>
                <a href="#">
                  <i class="fas fa-trash red supprimerEtablissement" data-nomEtab="Etablissement 2" style="color: red;" title="ajouter etablissement" data-toggle="modal" data-target="#exampleModalDelete"></i>
                <a
                <a href="#">
                  <div class="material-switch float-right">
                      <input class="checkboxEtabActiv" id="someSwitchOptionPrimary2" name="switch" type="checkbox"/>
                      <label for="someSwitchOptionPrimary2" class="btn-primary"></label>
                  </div>
                </a>
              </td>
            </tr>
            <tr>
              <td>Etablissement 3</td>
              <td>Address 3</td>
              <td>
                <a href="#">
                  <i class="fas fa-edit modifierEtablissement" data-nomEtab="Etablissement 3" data-address="Address 3" title="Modifier etablissement" data-toggle="modal" data-target="#exampleModalEdit"></i>
                <a>
                <a href="#">
                  <i class="fas fa-trash supprimerEtablissement" data-nomEtab="Etablissement 3" style="color: red;" title="ajouter etablissement" data-toggle="modal" data-target="#exampleModalDelete"></i>
                <a>
                  <a href="#">
                    <div class="material-switch float-right">
                        <input class="checkboxEtabActiv" id="someSwitchOptionPrimary121212" name="switch" type="checkbox"/>
                        <label for="someSwitchOptionPrimary121212" class="btn-primary"></label>
                    </div>
                  </a>
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
          <h5 class="modal-title" id="exampleModalLabel">Modifier etablissement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
        <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nom etablissement</label>
              <input type="matricule" class="form-control" id="exampleInputNom" placeholder="Entrer le nom de l'etablissement">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Adresse Etablissement</label>
              <textarea type="matricule" class="form-control" id="exampleInputAddress" placeholder="Entrer l'Address de l'etablissement"></textarea>
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
  <!-- /edit model -->

  <!-- delete model -->
  <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supprimer etablissement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Voulez vous vraiment supprimer cette etablissement ?</label>
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
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": false,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
  <script>
    $('.modifierEtablissement').on("click",function(){
      $("#exampleInputNom").val($(this).attr("data-nomEtab"));
      $("#exampleInputAddress").val($(this).attr("data-address"));
    });
    $('.supprimerEtablissement').on("click",function(){
      $("#deletelabNom").text($(this).attr("data-nomEtab"));
    });
  </script>

    <script>
      $(".checkboxEtabActiv").on("change",function() {
        if(this.checked) {
            alert("Event change etablissement !");
        }
      });
    </script>
