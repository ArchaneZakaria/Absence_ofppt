<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Créer un etablissement</h3>
    </div>
    <form id="formEtablissement" role="form">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nom etablissement</label>
          <input type="text" class="form-control" id="nom" placeholder="Entrer le nom de l'etablissement">
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
  $("#formEtablissement").on("submit",function() {
    var nom = $("#nom").val();
    /* test
    alert("nom: "+nom);
    return false;
    */

    $.ajax({
       type: 'POST',
       url: base_url + 'etablissement/ajax/ajouterEtablissement',
       dataType: "JSON",
       data : {nom:nom},
       cache:false,
       success: function(msg){
         if(msg.status == '1'){
           $("#creer_stagiaire").trigger("reset");
           $(document).Toasts('create', {
             class: 'bg-success',
             title: 'Créer etablissement',
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
