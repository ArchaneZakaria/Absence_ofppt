<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Importer liste des stagiaires</h3>
      <div class="card-tools"></div>
    </div>
    <div class="card-body"> Veuillez sélectionner un fichier excel correspondant aux éxigences. </div>
    <div class="card-footer">
      <button  class="btn btn-primary" type="file">Importer</button>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Créer stagiaire</h3>
      <div class="card-tools"></div>
    </div>
    <form role="form" action="#" method="get" id="creer_stagiaire">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nom</label>
          <input  type="text" class="form-control" id="nom_stagiaire" name="nom_stagiaire" placeholder="Saisissez le nom">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Prénom</label>
          <input  type="prenom" class="form-control" id="prenom_stagiaire" name="prenom_stagiaire" placeholder="Saisissez le prénom">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">CIN</label>
          <input  type="matricule" class="form-control" id="cin_stagiaire" name="cin_stagiaire" placeholder="Saisissez le numéro de la carte d'identité nationale">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">CEF</label>
          <input  type="matricule" class="form-control" id="cef_stagiaire" name="cef_stagiaire" placeholder="Saisissez le numéro d'inscription">
        </div>
        <div class="form-group">
          <label>Date de naissance:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>
            <input  type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask id="date_naissance_stagiaire" name="date_naissance_stagiaire">
          </div></br>
          <div class="form-group clearfix">
            <label>Sexe:</label><br>
            <div class="icheck-primary d-inline">
              <input  type="radio" id="sexe_stagiaire1" name="sexe_stagiaire" value="Masculin">
              <label for="sexe_stagiaire1">
                Masculin
              </label>
            </div>
            <div class="icheck-primary d-inline">
              <input  type="radio" id="sexe_stagiaire2" name="sexe_stagiaire" value="Feminin">
              <label for="sexe_stagiaire2">
                Feminin
              </label>
            </div>
          </div>
          <div class="form-group">
            <label>Filiére</label>
            <select  class="form-control select2" id="filiere_stagiaire" name="filiere_stagiaire">
              <option value='' selected>Sélectionner une filière</option>
              <?php foreach($AllFiliere as $rowDetail ):?>
              <option value='<?=$rowDetail->idFiliere;?>'><?= $rowDetail->libelle_filiere ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label>Groupe</label>
            <select  class="form-control select2" id="groupe_stagiaire" name="groupe_stagiaire">
              <option value='' selected>Sélectionner un groupe</option>
            </select>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Créer</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
      </div>
    </div>
  </form>
</section>




<script>


  $( "#filiere_stagiaire" ).change(function() {
    var filiere = $(this).children("option:selected").val();
    $.ajax({
       type: 'POST',
       url: base_url + 'groupe/ajax/getGroupsFiliere',
       dataType: "JSON",
       data : {filiere:filiere},
       cache:false,
       success: function(msg){
         $("#groupe_stagiaire *").remove();
         $("#groupe_stagiaire").append(new Option("Sélectionner un groupe", ''));
         for (var i = 0; i < msg.length; i++) {
           $("#groupe_stagiaire").append(new Option(msg[0].libelle_groupe, msg[0].idGroupe));
         }
       },
       error: function(dataR){
       }
    });
  });


</script>











<script type="text/javascript">
<!-- Toastr -->


var base_url = '<?php echo base_url(); //you have to load the "url_helper" to use this function ?>';
$("#creer_stagiaire").on("submit",function() {


    var form = new FormData(this);
    //ajax pour envoyer les données l'controlleur
    $.ajax({
       type: 'POST',
       url: base_url + 'stagiaire/ajax/creer_stagiaire',
       dataType: "JSON",
       data : form,
       processData: false,
       contentType: false,
       cache:false,
       success: function(msg){
         if(msg.status == '1'){
           $("#creer_stagiaire").trigger("reset");
           $(document).Toasts('create', {
             class: 'bg-success',
             title: 'Stagiaire créé ',
             position: 'topRight',
             autohide: true,
             delay: 1200,
             body: msg.message
           });
           setTimeout(function(){
            window.location.href=base_url + 'stagiaire/liste';
          }, 1300)
         }else if(msg.status == '0'){
           $(document).Toasts('create', {
             class: 'bg-warning',
             title: 'Veuillez remplir les champs !',
             position: 'topRight',
             autohide: true,
             delay: 1200,
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
           delay: 1200,
           body: dataR.message
         });
       }
    });
    return false;
  });

</script>
