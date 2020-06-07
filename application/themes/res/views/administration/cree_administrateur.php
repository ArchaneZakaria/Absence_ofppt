<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Créer un administrateur</h3>
    </div>
    <form role="form">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Matricule / CIN</label>
          <input type="matricule" class="form-control" id="exampleInputMatricule" placeholder="Entrer votre Matricule/CIN">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nom</label>
          <input type="nom" class="form-control" id="exampleInputNom" placeholder="Entrer votre Nom">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Prenom</label>
          <input type="prenom" class="form-control" id="exampleInputPrenom" placeholder="Entrer votre Prenom">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" id="exampleInputPrenom" placeholder="Entrer votre email">
        </div>
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
    </form>
  </div>
</section>
