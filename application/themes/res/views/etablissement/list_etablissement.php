
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
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des Etablissements</h3>
        </div>
        <div class="card-body">
          <table id="exampleME" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Nom Etablissement</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listeEtablissements as $etablissement): ?>
                <tr>
                  <td><?= $etablissement->libelle_etablissement ?></td>
                  <td>
                    <a href="#">
                      <i class="fas fa-edit modifierEtablissement" data-etab="<?= $etablissement->idEtablissement ?>" data-nomEtab="<?= $etablissement->libelle_etablissement ?>" title="Modifier etablissement"></i>
                    </a>
                    <a href="#">
                      <i class="fas fa-trash red supprimerEtablissement" data-etab="<?= $etablissement->idEtablissement ?>" data-nomEtab="<?= $etablissement->libelle_etablissement ?>" style="color: red;" title="ajouter etablissement"></i>
                    </a>
                    <a href="#">
                      <div class="material-switch float-right">
                          <input class="checkboxEtabActiv" id="<?= $etablissement->idEtablissement ?>_activerA" data-etab="<?= $etablissement->idEtablissement ?>" name="switch" type="checkbox" <?php if ($etablissement->active_etablissement==1) { echo "checked";}?> />
                          <label for="<?= $etablissement->idEtablissement ?>_activerA" class="btn-primary"></label>
                      </div>
                    </a>
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
          <h5 class="modal-title" id="exampleModalLabel">Modifier l'Etablissement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formModel_editEtab" role="form">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Nom de l'Etablissement</label>
              <input type="matricule" class="form-control" id="formModel_editEtabNom" placeholder="Entrer le nom de l'etablissement">
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
          <h5 class="modal-title" id="exampleModalLabel">Supprimer etablissement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formModel_delete" role="form">
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
    var etabEdit="";
    $('.modifierEtablissement').on("click",function(){
      $("#formModel_editEtabNom").val($(this).attr("data-nomEtab"));
      etabEdit = $(this).attr("data-etab");
      $('#exampleModalEdit').modal('show');
    });
    $("#formModel_editEtab").on("submit",function() {
      var nom = $("#formModel_editEtabNom").val();
      $.ajax({
         type: 'POST',
         url: base_url + 'etablissement/ajax/ajouterEtablissement',
         dataType: "JSON",
         data : {nom:nom,etabEdit:etabEdit},
         cache:false,
         success: function(msg){
           if(msg.status == '1'){
             $("#formModel_editEtab").trigger("reset");
             $('#exampleModalEdit').modal('hide');
             $(document).Toasts('create', {
               class: 'bg-success',
               title: 'Succès',
               position: 'topRight',
               autohide: true,
               delay: 1500,
               body: msg.message
             });
             setTimeout(function(){
              window.location.href = base_url + 'etablissement/liste';
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
             class: 'bg-danger',
             title: 'Erreur',
             position: 'topRight',
             autohide: true,
             delay: 1500,
             body: 'Erreur de traitement'
           });
         }
      });
      return false;
    });
  </script>
  <script>
    //delete etablissement
    var etabdel="";
    $('.supprimerEtablissement').on("click",function(){
      $("#deletelabNom").text($(this).attr("data-nomEtab"));
      etabdel = $(this).attr("data-etab");
      $('#exampleModalDelete').modal('show');
    });

    $("#formModel_delete").on("submit",function() {
      $.ajax({
         type: 'POST',
         url: base_url + 'etablissement/ajax/deleteEtablissement',
         dataType: "JSON",
         data : {etabdel:etabdel},
         cache:false,
         success: function(msg){
           if(msg.status == '1'){
             $("#formModel_delete").trigger("reset");
             $('#exampleModalDelete').modal('hide');
             $(document).Toasts('create', {
               class: 'bg-success',
               title: 'Succès',
               position: 'topRight',
               autohide: true,
               delay: 1500,
               body: msg.message
             });
             setTimeout(function(){
              window.location.href = base_url + 'etablissement/liste';
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
             class: 'bg-danger',
             title: 'Erreur',
             position: 'topRight',
             autohide: true,
             delay: 1500,
             body: 'Erreur de traitement'
           });
         }
      });
      return false;
    });



  </script>
  <script>
    //Chanege Etablissement
    $(".checkboxEtabActiv").on("change",function() {
      if(this.checked) {
        $(".checkboxEtabActiv").removeAttr("checked");
        var etabEnable = $(this).attr("data-etab");
        $.ajax({
           type: 'POST',
           url: base_url + 'etablissement/ajax/activerEtablissement',
           dataType: "JSON",
           data : {etabEnable:etabEnable},
           cache:false,
           success: function(msg){
             if(msg.status == '1'){
               $(document).Toasts('create', {
                 class: 'bg-success',
                 title: 'Succès',
                 position: 'topRight',
                 autohide: true,
                 delay: 1500,
                 body: msg.message
               });
               setTimeout(function(){
                window.location.href = base_url + 'etablissement/liste';
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
               class: 'bg-danger',
               title: 'Erreur',
               position: 'topRight',
               autohide: true,
               delay: 1500,
               body: 'Erreur de traitement'
             });
           }
        });
      }
    });
  </script>
