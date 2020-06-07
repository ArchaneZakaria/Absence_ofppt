<style media="screen">
    *{
      font-size:13px !important;
    }
    [class*="sidebar-dark"] .brand-link {
      border-bottom: 1px solid #775b5b !important;
      color: rgba(255,255,255,.8) !important;
    }
    [class*="sidebar-dark"] .user-panel {
      border-bottom: 1px solid #775b5b !important;
    }
  </style>
  <style>
    .material-switch > input[type="checkbox"] {
      display: none !important;
    }

    .material-switch > label {
      cursor: pointer !important;
      height: 0px !important;
      position: relative !important;
      width: 40px !important;
    }

    .material-switch > label::before {
      background: red !important;
      box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.3) !important;
      border-radius: 8px !important;
      content: '' !important;
      height: 16px !important;
      margin-top: -8px !important;
      position:absolute !important;
      opacity: 0.3 !important;
      transition: all 0.4s ease-in-out !important;
      width: 40px !important;
    }
    .material-switch > label::after {
      background: red !important;
      border-radius: 16px !important;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3) !important;
      content: '' !important;
      height: 24px !important;
      left: -4px !important;
      margin-top: -8px !important;
      position: absolute !important;
      top: -4px !important;
      transition: all 0.3s ease-in-out !important;
      width: 24px !important;
    }
    .material-switch > input[type="checkbox"]:checked + label::before {
      background: inherit !important;
      opacity: 0.5 !important;
    }
    .material-switch > input[type="checkbox"]:checked + label::after {
      background: inherit !important;
      left: 20px !important;
    }
  </style>

<section class="content">
  <!-- Default box -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des années inscription</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="exampleME" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Année</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2018</td>
                <td>
                  <a href="#">
                    <i class="fas fa-edit modifierannee" data-nomAnnee="2018" data-address="Address 1" title="Modifier annee" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  </a>
                  <a href="#">
                    <i class="fas fa-trash red supprimerannee" data-nomAnnee="2018" style="color: red;" title="ajouter annee" data-toggle="modal" data-target="#exampleModalDelete"></i>
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
                <td>2019</td>
                <td>
                  <a href="#">
                    <i class="fas fa-edit modifierannee" data-nomAnnee="2019" data-address="Address 2" title="Modifier annee" data-toggle="modal" data-target="#exampleModalEdit" ></i>
                  <a>
                  <a href="#">
                    <i class="fas fa-trash red supprimerannee" data-nomAnnee="2019" style="color: red;" title="ajouter annee" data-toggle="modal" data-target="#exampleModalDelete"></i>
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
                <td>2020</td>
                <td>
                  <a href="#">
                    <i class="fas fa-edit modifierannee" data-nomAnnee="2020" data-address="Address 3" title="Modifier annee" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  <a>
                  <a href="#">
                    <i class="fas fa-trash supprimerannee" data-nomAnnee="2020" style="color: red;" title="ajouter annee" data-toggle="modal" data-target="#exampleModalDelete"></i>
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
          <h5 class="modal-title" id="exampleModalLabel">Modifier année</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
        <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Année</label>
              <input type="number" min="2018" class="form-control" id="exampleInputNom" placeholder="Entrer le une de l'annee">
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
          <h5 class="modal-title" id="exampleModalLabel">Supprimer année</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Voulez vous vraiment supprimer cette annee ?</label>
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
    $('.modifierannee').on("click",function(){
      $("#exampleInputNom").val($(this).attr("data-nomAnnee"));
    });
    $('.supprimerannee').on("click",function(){
      $("#deletelabNom").text($(this).attr("data-nomAnnee"));
    });
  </script>

    <script>
      $(".checkboxEtabActiv").on("change",function() {
        if(this.checked) {
            alert("Event change annee !");
        }
      });
    </script>
