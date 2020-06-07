<section class="content">
  <!-- Default box -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des modules</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="exampleME" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Libelle</th>
              <th>Numéro</th>
              <th>Masse Horaire Total</th>
              <th>Libelle Metier</th>
              <th>Code Metier</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>application mobile</td>
              <td>M12</td>
              <td>100</td>
              <td>metier1</td>
              <td>12</td>
              <td>
                  <a href="#">
                    <i class="fas fa-edit modifierModule" data-libelle="application mobile" data-numero="M12" data-masseHT="100" data-libMerier="metier1" data-codeMitier="12" title="Modifier Module" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  <a>
                  <a href="#">
                    <i style="color: red;" class="fas fa-trash supprimerModule" data-libelle="application mobile" title="Supprimer Module" data-toggle="modal" data-target="#exampleModalDelete"></i>
                  <a>
              </td>
            </tr>
            <tr>
              <td>asp</td>
              <td>M11</td>
              <td>120</td>
              <td>metier2</td>
              <td>11</td>
              <td>
                  <a href="#">
                    <i class="fas fa-edit modifierModule" data-libelle="asp" data-numero="M11" data-masseHT="120" data-libMerier="metier2" data-codeMitier="11" title="Modifier Module" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  <a>
                  <a href="#">
                    <i style="color: red;" class="fas fa-trash supprimerModule" data-libelle="asp" title="Supprimer Module" data-toggle="modal" data-target="#exampleModalDelete"></i>
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
          <h5 class="modal-title" id="exampleModalLabel">Modifier module</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Libelle</label>
              <input type="libelle" class="form-control" id="exampleInputLibelle" placeholder="Entrer Libelle Module">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Numero</label>

              <input type="nom" class="form-control" id="exampleInputNumero" placeholder="Entrer Numero Module">
            </div>
            <div class="form-group">

              <label for="exampleInputEmail1">Masse Horaire Totale</label>
              <input type="prenom" class="form-control" id="exampleInputMasseHorraireTotale" placeholder="Entrer Masse Horaire ">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Libelle Metier</label>

              <input type="libelle" class="form-control" id="exampleInputLibelleMetier" placeholder="Entrer Libelle Metier">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Code Metier</label>

              <input type="libelle" class="form-control" id="exampleInputCodeMetier" placeholder="Entrer Code Metier">
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
          <h5 class="modal-title" id="exampleModalLabel">Supprimer module</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Voulez vous vraiment supprimer le module ?</label>
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

    $('.modifierModule').on("click",function(){




      $("#exampleInputLibelle").val($(this).attr("data-libelle"));
      $("#exampleInputNumero").val($(this).attr("data-numero"));
      $("#exampleInputMasseHorraireTotale").val($(this).attr("data-masseHT"));
      $("#exampleInputLibelleMetier").val($(this).attr("data-libMerier"));
      $("#exampleInputCodeMetier").val($(this).attr("data-codeMitier"));

      //$("#typeVacModel").find('option[text="'+ $(this).attr("data-address") +'"]').attr('selected', 'selected');

    });
    $('.supprimerModule').on("click",function(){

      $("#deletelabNom").text($(this).attr("data-libelle"));
    });
  </script>
