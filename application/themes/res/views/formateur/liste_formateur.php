
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Liste des Formateurs</h3>
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
                  <th>Type Vac</th>
                  <th>Statut</th>
                  <th>MS</th>
                  <th>HS</th>
                  <th>MHH</th>
                  <th>Métier DRH</th>
                  <th></th>
                </tr>
                </thead>
                <tbody>

                <tr>
                  <td>AA9999</td>
                  <td>Biallaten</td>
                  <td>Zineb</td>
                  <td>F</td>
                  <td>FP</td>
                  <td>Actif</td>
                  <td>10</td>
                  <td>4</td>
                  <td>20</td>
                  <td>DEVELOPPEMENT INFORMATIQUE</td>
                  <td>

                    <a href="#">
                        <i class="fas fa-school nav-icon addgroupe" title="Affectation"></i>
                    </a>

                    <a href="#">
                      <i class="fas fa-edit nav-icon editFormateur"  title="Modifier formateur"></i>
                    </a>
                    <a href="#">
                      <i class="fas fa-trash nav-icon deleteFormateur" style="color: red;" title="Supprimer formateur"></i>
                    </a>
                  </td>
                </tr>
                <tr>
                    <td>AA9999</td>
                    <td>Biallaten</td>
                    <td>Zineb</td>
                    <td>F</td>
                    <td>FP</td>
                    <td>Actif</td>
                    <td>10</td>
                    <td>4</td>
                    <td>20</td>
                    <td>Plomberie</td>
                    <td>
                         <a href="#">
                             <i class="fas fa-school nav-icon addgroupe" title="Affectation"></i>
                         </a>
                           <a href="#">
                            <i class="fas fa-edit nav-icon editFormateur"  title="Modifier formateur"></i>
                          </a>
                          <a href="#">
                            <i class="fas fa-trash nav-icon deleteFormateur" style="color: red;" title="Supprimer formateur"></i>
                          </a>
                    </td>
                  </tr>
                    <td>AA9999</td>
                    <td>Biallaten</td>
                    <td>Zineb</td>
                    <td>F</td>
                    <td>FP</td>
                    <td>Actif</td>
                    <td>10</td>
                    <td>4</td>
                    <td>20</td>
                    <td>Electromecanique des systémes automatisés</td>
                    <td>
                         <a href="#">
                             <i class="fas fa-school nav-icon addgroupe" title="Affectation"></i>
                         </a>
                           <a href="#">
                            <i class="fas fa-edit nav-icon editFormateur"  title="Modifier formateur"></i>
                          </a>
                          <a href="#">
                            <i class="fas fa-trash nav-icon deleteFormateur" style="color: red;" title="Supprimer formateur"></i>
                          </a>
                    </td>
                  </tr>

                  <tr>
                    <td>AA9999</td>
                    <td>Biallaten</td>
                    <td>Zineb</td>
                    <td>F</td>
                    <td>FP</td>
                    <td>Actif</td>
                    <td>10</td>
                    <td>4</td>
                    <td>20</td>
                    <td>Génie civil</td>
                    <td>
                         <a href="#">
                             <i class="fas fa-school nav-icon addgroupe" title="Affectation"></i>
                         </a>
                           <a href="#">
                            <i class="fas fa-edit nav-icon editFormateur"  title="Modifier formateur"></i>
                          </a>
                          <a href="#">
                            <i class="fas fa-trash nav-icon deleteFormateur" style="color: red;" title="Supprimer formateur"></i>
                          </a>
                    </td>
                  </tr>
                  <tr>
                    <td>AA9999</td>
                    <td>Biallaten</td>
                    <td>Zineb</td>
                    <td>F</td>
                    <td>FP</td>
                    <td>Actif</td>
                    <td>10</td>
                    <td>4</td>
                    <td>20</td>
                    <td>Gestion des entreprises</td>
                    <td>
                         <a href="#">
                             <i class="fas fa-school nav-icon addgroupe" title="Affectation"></i>
                         </a>
                           <a href="#">
                            <i class="fas fa-edit nav-icon editFormateur"  title="Modifier formateur"></i>
                          </a>
                          <a href="#">
                            <i class="fas fa-trash nav-icon deleteFormateur" style="color: red;" title="Supprimer formateur"></i>
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


    <!-- /.content-wrapper -->
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modifier formateurs</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Matricule/CIN	</label>
                <input type="text" class="form-control" id="exampleInputLibelle" placeholder="Entrer Matricule/CIN">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" class="form-control" id="exampleInputNumero" placeholder="Entrer Nom">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Prénom</label>
                <input type="text" class="form-control" id="exampleInputMasseHorraireTotale" placeholder="Entrer Prénom ">
              </div>
              <div class="form-group">
                <div class="form-group clearfix">
                  <label>Sexe:</label><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary1" name="r1" checked>
                    <label for="radioPrimary1">
                      Masculin
                    </label>
                  </div>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary2" name="r1">
                    <label for="radioPrimary2">
                      Feminin
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                  <label>Type Vac</label>
                  <select class="form-control select2" style="width: 100%;">
                    <option>FP</option>
                    <option>FV</option>
                  </select>
                </div>
                <div class="form-group clearfix">
                  <label>Statut:</label><br>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary3" name="statut" checked>
                    <label for="radioPrimary3">
                      Perm
                    </label>
                  </div>
                  <div class="icheck-primary d-inline">
                    <input type="radio" id="radioPrimary4" name="statut">
                    <label for="radioPrimary4">
                      Actif
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">MS</label>
                  <input type="nom" class="form-control" id="exampleInputNom" placeholder="Entrer votre MS">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">HS</label>
                  <input type="nom" class="form-control" id="exampleInputNom" placeholder="Entrer votre HS">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">MHH</label>
                  <input type="nom" class="form-control" id="exampleInputNom" placeholder="Entrer votre MHH">
                </div>
              <div class="form-group">
                <label>Metier DRH</label>
                <select class="form-control select2" style="width: 100%;">
                  <option>Techniques de développement informatique</option>
                  <option>Gestion des entreprises</option>
                  <option>Génie civil</option>
                  <option>Electromecanique des systémes automatisés</option>
                  <option>Plomberie</option>
                  <option>Réseaux informatique</option>
                </select>
              </div>
              <!-- /.input group -->
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


  <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Affectation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label>Selectionner une Etablissement</label>
            <select name="activer_edit" id="activer_edit" class="form-control">
              <option>Etablissement1</option>
              <option>Etablissement2</option>
              <option>Etablissement3</option>
              <option>Etablissement4</option>
            </select>
          </div>
          <div class="form-group ">
            <label>Selectionner un groupe</label>
            <select name="activer_edit" id="activer_edit" class="form-control">
              <option>Groupe 1</option>
              <option>Groupe 2</option>
              <option>Groupe 3</option>
              <option>Groupe 4</option>
            </select>
          </div>
          <div class="form-group ">
            <label>Selectionner un module</label>
            <select name="activer_edit" id="activer_edit" class="form-control">
              <option>Module 1</option>
              <option>Module 2</option>
              <option>Module 3</option>
              <option>Module 4</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter un module</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group ">
          </div>
          <div class="form-group ">
            <label>Selectionner un module</label>
            <select name="activer_edit" id="activer_edit" class="form-control">
              <option>Module 1</option>
              <option>Module 2</option>
              <option>Module 3</option>
              <option>Module 4</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
      </div>
    </div>
  </div>
 <!--END MODAL EDIT-->

  <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une Etablissement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Selectionner une Etablissement</label>
            <select name="activer_edit" id="activer_edit" class="form-control">
              <option>Etablissement1</option>
              <option>Etablissement2</option>
              <option>Etablissement3</option>
              <option>Etablissement4</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="Modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter une année d'inscription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="card-body">
              <div class="form-group">
                <label>Selectionner une année d'inscription </label>
                <select name="activer_edit" id="activer_edit" class="form-control">
                  <option>annee d'inscription 1</option>
                  <option>annee d'inscription 2</option>
                  <option>annee d'inscription 3</option>
                  <option>annee d'inscription 4</option>
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
<!-- delete model -->
  <div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supprimer Formateurs</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Voulez vous vraiment supprimer le formateur ?</label>
              <p style="text-align:center;" id="deletelabNom">Biallaten Zineb</p>
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
  $( ".linev" ).click(
    function(){
    var id="#lineVers_1"/*+$(this).attr("data")*/;
      if($(this).hasClass('fas fa-user-plus')){
       $(this).removeClass('fas fa-user-plus').addClass('fas fa-angle-down');
       $(id).show();
      }else{
        $(this).removeClass('fas fa-angle-down').addClass('fas fa-angle-up');
        $(id).hide();
      }
    }
  );
  $(".addEtablissement").on("click",function(){
    $('#Modal').modal('show');
  });
  $(".editFormateur").on("click",function(){
    $('#exampleModalEdit').modal('show');
  });
  $(".deleteFormateur").on("click",function(){
    $('#exampleModalDelete').modal('show');
  });
  $(".addgroupe").on("click",function(){
    $('#Modal2').modal('show');
  });
  $(".addmodule").on("click",function(){
    $('#Modal3').modal('show');
  });
  $(".addannee").on("click",function(){
    $('#Modal4').modal('show');
  });
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
