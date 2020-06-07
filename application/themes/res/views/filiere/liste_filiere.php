<section class="content">
  <!-- Default box -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des Filières</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="exampleME" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Libelle</th>
              <th>Niveau</th>
              <th>Durée Cursus</th>
              <th>Code filière</th>
              <th>Secteur filière</th>
              <th>Code Secteur filière</th>
               <th></th>
            </tr>
            </thead>
            <tbody>

            <tr>
              <td>TDI</td>
              <td>T</td>
              <td>5</td>
              <td>AS_ASE_T</td>
              <td>Action Sociale</td>
              <td>AGC</td>
               <td>
                   <a href="#">
                    <i class="fas fa-edit modifierFiliere" title="Modifier Filière" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  </a>
                  <a href="#">
                    <i style="color: red;" class="fas fa-trash supprimerFiliere" data-libelle="tdi" title="Supprimer Filière" data-toggle="modal" data-target="#exampleModalDelete"></i>
                  </a>
              </td>


            <tr>
               <td>TDI</td>
              <td>TS</td>
              <td>2</td>
              <td>AS_AS_Q</td>
              <td>Administration Gestion et Commerce</td>
              <td>AS</td>
              <td>
              <a href="#">
                    <i class="fas fa-edit modifierFiliere" title="Modifier Filière" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  </a>
                   <a href="#">
                    <i style="color: red;" class="fas fa-trash supprimerFiliere" data-libelle="tdi" title="Supprimer Filière" data-toggle="modal" data-target="#exampleModalDelete"></i>
                  </a>
              </td>

            </tr>
            <tr>
              <td>TDI</td>
              <td>Q</td>
              <td>5</td>
              <td>AS_ESPE_TS</td>
              <td>Aeronautique</td>
              <td>AE</td>
              <td>
                <a href="#">
                    <i class="fas fa-edit modifierFiliere" title="Modifier Filière" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  </a>
                   <a href="#">
                    <i style="color: red;" class="fas fa-trash supprimerFiliere" data-libelle="tdi" title="Supprimer Filière" data-toggle="modal" data-target="#exampleModalDelete"></i>
                  </a>
              </td>
            </tr>
            <tr>
              <td>TDI</td>
              <td>FQ</td>
              <td>2</td>
              <td>AS_AEP_T</td>
              <td>BTP</td>
              <td>AGR</td>
              <td>
               <a href="#">
                    <i class="fas fa-edit modifierFiliere" title="Modifier Filière" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  </a>
                    <a href="#">
                    <i style="color: red;" class="fas fa-trash supprimerFiliere" data-libelle="tdi" title="Supprimer Filière" data-toggle="modal" data-target="#exampleModalDelete"></i>
                  </a>
              </td>
            </tr>
            <tr>
               <td>TDI</td>
              <td>T</td>
              <td>5</td>
              <td>AE_MCA_T</td>
              <td>Cuir</td>
              <td>FM</td>
              <td>

                 <a href="#">
                    <i class="fas fa-edit modifierFiliere" title="Modifier Filière" data-toggle="modal" data-target="#exampleModalEdit"></i>
                  </a>
                   <a href="#">
                    <i style="color: red;" class="fas fa-trash supprimerFiliere" data-libelle="tdi" title="Supprimer Filière" data-toggle="modal" data-target="#exampleModalDelete"></i>
                  </a>

              </td>
            </tr>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
       </div>
  </div>
</section>

<!-- edit model -->
  <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modifier Filière</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       <form role="form">
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Libelle</label>
            <input type="libellefiliere" class="form-control" id="exampleInputlibelleFiliere" placeholder="Entrer libelle filière">
          </div>
         <div class="form-group">
              <label>Niveau</label>
              <select class="form-control select2" style="width: 100%;">
                <option>T</option>
                <option>TS</option>
                <option>Q</option>
                <option>FQ</option>
              </select>
            </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Durée Cursus</label>
            <input type="duree" class="form-control" id="exampleInputDuree" placeholder="Entrer durée">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Code filière</label>
            <input type="codefiliere" class="form-control" id="exampleInputCodeFiliere" placeholder="Entrer code filière">
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Secteur filière</label>
            <input type="secteur filiere" class="form-control" id="exampleInputSecteurFiliere" placeholder="Entrer Secteur filière">
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Code Secteur filière</label>
            <input type="libellecodesecteurfiliere" class="form-control" id="exampleInputCodeSecteurFiliere" placeholder="Entrer Code Secteur filière">
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
          <h5 class="modal-title" id="exampleModalLabel">Supprimer filière</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Voulez vous vraiment supprimer cette filière ?</label>
                <p style="text-align:center;" id="deletelablibelle"></p>
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

    $('.modifierFiliere').on("click",function(){

      $("#exampleModalEdit").modal('show');
     });

    $('.supprimerFiliere').on('click',function(){
      $('#exampleModalDelete').modal('show');
    });
  </script>
