<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Créer une filière</h3>
    </div>
    <form role="form">
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Libelle</label>
          <input type="libellefiliere" class="form-control" id="exampleInputlibelleFiliere" placeholder="Entrer libelle filiere">
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
          <input type="number" class="form-control" id="exampleInputDuree" placeholder="Entrer durée">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Code filière</label>
          <input type="text" class="form-control" id="exampleInputCodeFiliere" placeholder="Entrer code filière">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Secteur Filière</label>
          <input type="text" class="form-control" id="exampleInputSecteurFiliere" placeholder="Entrer Secteur Filière">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Code Secteur Filière</label>
          <input type="text" class="form-control" id="exampleInputCodeSecteurFiliere" placeholder="Entrer Code Secteur Filière">
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
