<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Créer Formateur</h3>
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
          <label for="exampleInputEmail1">Prénom</label>
          <input type="prenom" class="form-control" id="exampleInputPrenom" placeholder="Entrer votre Prénom">
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
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Créer</button>
        <button type="reset" class="btn btn-primary">Annuler</button>
        <button  class="btn btn-primary float-right">Importer</button>
      </div>
    </form>
  </div>
</section>
