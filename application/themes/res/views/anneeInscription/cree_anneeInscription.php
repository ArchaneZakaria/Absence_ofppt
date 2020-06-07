<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Créer année inscription</h3>
    </div>
    <form id="formAnneeInscription" role="form">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Année:</label>
          <input type="number" class="form-control" id="anneeInscription" min="2018" max="2030" placeholder="Entrer une année">
        </div>
      </div>
      <div class="card-body" id="anneeInscriptionLabel" style="display:none;">
        <div class="form-group">
          <label for="exampleInputEmail1">Année inscription:</label> <span id="annee_inscriptionSpan"></span>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Créer</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
        <a class="btn btn-primary float-right" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Importer</a>
        <br><br>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
              <div class="card card-body">
                l'option d'importation
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</section>
<script>
  $("#anneeInscription").on('input',function() {
    $("#anneeInscriptionLabel").css("display", "block");
    $("#annee_inscriptionSpan").text($("#anneeInscription").val()+"/"+( parseInt($("#anneeInscription").val(), 10)+1));
  });

  //create Année inscription
  $("#formAnneeInscription").on("submit",function() {
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
    $.ajax({
       type: 'POST',
       url: base_url + 'annee_inscription/ajax/ajouterAnneeInscription',
       dataType: "JSON",
       data : {anneeInscription:anneeInscription},
       cache:false,
       success: function(msg){
         if(msg.status == '1'){
           $("#creer_stagiaire").trigger("reset");
           $(document).Toasts('create', {
             class: 'bg-success',
             title: 'Stagiaire créé ',
             position: 'topRight',
             autohide: true,
             delay: 1500,
             body: msg.message
           });
           setTimeout(function(){
            window.location.href = base_url + 'annee_inscription/ajouter';
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
