<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"> Créer un survéillant général </h3>
    </div>
    <form id="formSurveillantGeneral" role="form">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Matricule / CIN </label>
          <input required type="text" class="form-control" id="cin_Matricule" placeholder="Entrer votre Matricule ou CIN">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Nom </label>
          <input required type="text" class="form-control" id="nom" placeholder="Entrer votre Nom">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Prénom </label>
          <input required type="text" class="form-control" id="prenom" placeholder="Entrer votre Prénom">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1"> Email </label>
          <input required type="email" class="form-control" id="email" placeholder="Entrer votre email">
        </div>
        <div class="form-group">
          <label>Date de naissance:</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
            </div>
            <input required id="dateNaissance" type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
          </div>
        </div>
        <div class="form-group clearfix">
          <label>Sexe:</label><br>
          <div class="icheck-primary d-inline">
            <input required type="radio" id="sexe_Masculin" name="sexe">
            <label for="sexe_Masculin"> Masculin </label>
          </div>
          <div class="icheck-primary d-inline">
            <input required type="radio" id="sexe_Feminin" name="sexe">
            <label for="sexe_Feminin"> Feminin </label>
          </div>
        </div>
        <div class="form-group">
          <label>Etablissement</label>
          <select required class="form-control select2" id="etablissement">
            <option value="" selected>Selectionner une Etablissement</option>
            <?php foreach ($listEtablissement as $Etablissement): ?>
              <option value="<?= $Etablissement->idEtablissement ?>"><?= $Etablissement->libelle_etablissement ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Créer</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
      </div>
    </form>
  </div>
</section>

<script>
  $("#formSurveillantGeneral").on("submit",function(){
    var cin           = $("#cin_Matricule").val();
    var nom           = $("#nom").val();
    var prenom        = $("#prenom").val();
    var email         = $("#email").val();
    var dateNaissance = $("#dateNaissance").val();
    var etablissement = $("#etablissement").val();
    var sexe   = "";
    if ($("#sexe_Masculin").is(':checked')) {
      sexe = "Masculin";
    } else if ($("#sexe_Feminin").is(':checked')) {
      sexe = "Feminin";
    }else {
      $(document).Toasts('create', {
        class: 'bg-warning',
        title: 'Erreur',
        position: 'topRight',
        autohide: true,
        delay: 1500,
        body: "le sexe de survéillant général est obligatoire !"
      });
      return false;
    }

    /* //Test
    alert("cin: "+cin+" nom: "+nom+" prenom: "+prenom+" email"+email+" sexe: "+sexe+" etablissement: "+etablissement);
    return false;
    */

    $.ajax({
       type: 'POST',
       url: base_url + 'surveillant_general/ajax/createSurveillantGeneral',
       dataType: "JSON",
       data : {cin:cin,nom:nom,prenom:prenom,email:email,sexe:sexe,dateNaissance:dateNaissance,etablissement:etablissement},
       cache:false,
       success: function(msg){
         if(msg.status == '1'){
           $("#formSurveillantGeneral").trigger("reset");
           $(document).Toasts('create', {
             class: 'bg-success',
             title: 'Succès',
             position: 'topRight',
             autohide: true,
             delay: 1500,
             body: msg.message
           });
           setTimeout(function(){
            window.location.href = base_url + 'surveillant_general/liste';
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
