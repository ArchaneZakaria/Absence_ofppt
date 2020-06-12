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
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Liste des années inscription</h3>
        </div>
        <div class="card-body">
          <table id="exampleME" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Année</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($listeAnneeInscription as $anneeInscription): ?>
                <tr>
                  <td><?= $anneeInscription->libelle_annee_inscription ?></td>
                  <td>
                    <a href="#">
                      <i class="fas fa-edit modifierannee" data-nomAnnee="<?= $anneeInscription->code_annee_inscription ?>" data-codeAnnee="<?= $anneeInscription->libelle_annee_inscription ?>" data-annee="<?= $anneeInscription->idAnneeInscription ?>" title="Modifier annee"></i>
                    </a>
                    <a href="#">
                      <i class="fas fa-trash red supprimerannee" data-annee="<?= $anneeInscription->idAnneeInscription ?>" data-nomAnnee="<?= $anneeInscription->libelle_annee_inscription ?>" style="color: red;" title="ajouter annee"></i>
                    </a>
                    <a href="#">
                      <div class="material-switch float-right">
                          <input class="checkboxEtabActiv" id="<?= $anneeInscription->idAnneeInscription ?>_activerEtabCheck" data-annee="<?= $anneeInscription->idAnneeInscription ?>" name="switch" type="checkbox" <?php if ($anneeInscription->active_anneeinscription == '1'){ echo "checked"; } ?> />
                          <label for="<?= $anneeInscription->idAnneeInscription ?>_activerEtabCheck" class="btn-primary"></label>
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
          <h5 class="modal-title" id="exampleModalLabel">Modifier année</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="formModel_edit" role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Année</label>
                <input type="number" min="2018" class="form-control" id="anneeInscription" placeholder="Entrer le une de l'annee">
              </div>
          </div>
          <div class="card-body" id="anneeInscriptionLabel">
            <div class="form-group">
              <label for="exampleInputEmail1">Année inscription:</label> <span id="annee_inscriptionSpan"></span>
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
        <form id="formModel_delete" role="form">
          <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Voulez vous vraiment supprimer cette annee ?</label>
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
    //Edit année Inscriptin
    $("#anneeInscription").on('input',function() {
      $("#anneeInscriptionLabel").css("display", "block");
      $("#annee_inscriptionSpan").text($("#anneeInscription").val()+"/"+( parseInt($("#anneeInscription").val(), 10)+1));
    });

    var anneeInscriptionI="";
    $('.modifierannee').on("click",function(){
      $("#anneeInscription").val($(this).attr("data-nomAnnee"));
      anneeInscriptionI=$(this).attr("data-annee");
      $("#annee_inscriptionSpan").text($(this).attr("data-codeAnnee"));
      $('#exampleModalEdit').modal('show');
    });

    $('#formModel_edit').on("submit",function(){
      var year             = new Date().getFullYear();
      var anneeInscription = $("#anneeInscription").val();
      if (anneeInscription != year) {
        $(document).Toasts('create', {
          class: 'bg-warning',
          title: 'Erreur',
          position: 'topRight',
          autohide: true,
          delay: 1500,
          body: "l'année d'inscription n'est pas correct !"
        });
        return false;
      }
      var anneeInscription = $("#anneeInscription").val();
      $.ajax({
         type: 'POST',
         url: base_url + 'annee_inscription/ajax/ajouterAnneeInscription',
         dataType: "JSON",
         data : {anneeInscriptionI:anneeInscriptionI,anneeInscription:anneeInscription},
         cache:false,
         success: function(msg){
           if(msg.status == '1'){
             $("#formModel_edit").trigger("reset");
             $(document).Toasts('create', {
               class: 'bg-success',
               title: 'Succès',
               position: 'topRight',
               autohide: true,
               delay: 1500,
               body: msg.message
             });
             setTimeout(function(){
              window.location.href = base_url + 'annee_inscription/liste';
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
         error: function(dataR){
           $(document).Toasts('create', {
             class: 'bg-danger',
             title: 'Erreur',
             position: 'topRight',
             autohide: true,
             delay: 1500,
             body: "Erreur de traitement !"
           });
         }
      });
      return false;
    });




  </script>


  <script>
    //delete année Inscriptin
    var anneeInscriptionI = "";
    $('.supprimerannee').on("click",function(){
      anneeInscriptionI = $(this).attr("data-annee");
      $("#deletelabNom").text($(this).attr("data-nomAnnee"));
      $('#exampleModalDelete').modal('show');
    });

    $('#formModel_delete').on("submit",function(){
      $.ajax({
         type: 'POST',
         url: base_url + 'annee_inscription/ajax/deleteAnneeInscription',
         dataType: "JSON",
         data : {anneeInscriptionI:anneeInscriptionI},
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
              window.location.href = base_url + 'annee_inscription/liste';
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
         error: function(dataR){
           $(document).Toasts('create', {
             class: 'bg-danger',
             title: 'Erreur',
             position: 'topRight',
             autohide: true,
             delay: 1500,
             body: "Erreur de traitement !"
           });
         }
      });
      return false;
    });



  </script>



  <script>
    $(".checkboxEtabActiv").on("change",function() {
      if(this.checked) {
        $(".checkboxEtabActiv").removeAttr("checked");
        var annee = $(this).attr("data-annee");
        $.ajax({
         type: 'POST',
         url: base_url + 'annee_inscription/ajax/activerAnneeInscription',
         dataType: "JSON",
         data : {annee:annee},
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
               window.location.href = base_url + 'annee_inscription/liste';
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
