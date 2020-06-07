
<style>
.layout-navbar-fixed.sidebar-collapse .wrapper .brand-link {
    height: 60px;
    width: 4.6rem;
}


  .brand-text.font-weight-light{
    font-size: 23px !important;
  }

.layout-navbar-fixed.layout-fixed .wrapper .sidebar {
    margin-top: 30px;
}
.mt-3, .my-3 {
  margin-top: 3rem !important;
  }
  .brand-link .brand-image {
    max-height: 41px;
    margin-left:0px;
}
</style>


<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #716f6f;">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>" class="brand-link" style="background-color:#716f6f !important;">
      <img src="<?=base_url('assets/img/Logo_ofppt.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Gestion d'absence</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url('assets/dist/img/user2-160x160.jpg')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Mahdi cheikh</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview <?php if($activedFromMenu == 'Noter absence' || $activedFromMenu == 'Liste des absences'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($activedFromMenu == 'Noter absence' || $activedFromMenu == 'Liste des absences'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Noter absence' || $activedFromMenu == 'Liste des absences'){ echo 'style="background-color: #2aa647;"'; } ?> > <!-- class active pour l'activation de l'effet-->
              <i class="nav-icon fas fa-clock"></i>
              <p>Absence<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('absence/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Noter absence'){ echo 'active'; } ?>"> <!-- class active pour l'activation de l'effet-->
                  <i class="fas fa-plus-square nav-icon" style="margin-left:10px !important;"></i>
                  <p>Noter absence</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('absence/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des absences'){ echo 'active'; } ?>"> <!-- class active pour l'activation de l'effet-->
                  <i class="fas fa-list nav-icon" style="margin-left:10px !important;"></i>
                  <p>Liste des absences</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer un stagiaire' || $activedFromMenu == 'Liste des stagiaires'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer un stagiaire' || $activedFromMenu == 'Liste des stagiaires'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer un stagiaire' || $activedFromMenu == 'Liste des stagiaires'){ echo 'style="background-color: #2aa647;"'; } ?>> <!-- class active pour l'activation de l'effet-->
              <i class="nav-icon fas fa-address-card"></i>
              <p>Stagiaire<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('stagiaire/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Créer un stagiaire'){ echo 'active'; } ?>"> <!-- class active pour l'activation de l'effet-->
                  <i class="fas fa-plus-square nav-icon" style="margin-left:10px !important;"></i>
                  <p>Créer un stagiaire</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('stagiaire/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des stagiaires'){ echo 'active'; } ?>">
                  <i class="fas fa-list nav-icon" style="margin-left:10px !important;"></i>
                  <p>Liste des stagiaires</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer un formateur' || $activedFromMenu == 'Liste des formateurs'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer un formateur' || $activedFromMenu == 'Liste des formateurs'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer un formateur' || $activedFromMenu == 'Liste des formateurs'){ echo 'style="background-color: #2aa647;"'; } ?>> <!-- class active pour l'activation de l'effet-->
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
              <p>Formateur<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('formateur/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Créer un formateur'){ echo 'active'; } ?>"> <!-- class active pour l'activation de l'effet-->
                  <i class="fas fa-plus-square nav-icon" style="margin-left:10px !important;"></i>
                  <p>Créer un formateur</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('formateur/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des formateurs'){ echo 'active'; } ?>">
                  <i class="fas fa-list nav-icon" style="margin-left:10px !important;"></i>
                  <p>Liste des formateurs</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer un groupe' || $activedFromMenu == 'Liste des groupes'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer un groupe' || $activedFromMenu == 'Liste des groupes'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer un groupe' || $activedFromMenu == 'Liste des groupes'){ echo 'style="background-color: #2aa647;"'; } ?>> <!-- class active pour l'activation de l'effet-->
              <i class="fas fa-users nav-icon"></i>
              <p>Groupe<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('groupe/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Créer un groupe'){ echo 'active'; } ?>"> <!-- class active pour l'activation de l'effet-->
                  <i class="fas fa-plus-square nav-icon" style="margin-left:10px !important;"></i>
                  <p>Créer un groupe</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('groupe/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des groupes'){ echo 'active'; } ?>">
                  <i class="fas fa-list nav-icon" style="margin-left:10px !important;"></i>
                  <p>Liste des groupes</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer une filiére' || $activedFromMenu == 'Liste des filiéres'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer une filiére' || $activedFromMenu == 'Liste des filiéres'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer une filiére' || $activedFromMenu == 'Liste des filiéres'){ echo 'style="background-color: #2aa647;"'; } ?>> <!-- class active pour l'activation de l'effet-->
              <i class="nav-icon fas fa-th-large"></i>
              <p>Filiére<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('filiere/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Créer une filiére'){ echo 'active'; } ?>"> <!-- class active pour l'activation de l'effet-->
                  <i class="fas fa-plus-square nav-icon" style="margin-left:10px !important;"></i>
                  <p>Créer une filiére</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('filiere/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des filiéres'){ echo 'active'; } ?>">
                  <i class="fas fa-list nav-icon" style="margin-left:10px !important;"></i>
                  <p>Liste des filiéres</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer un module' || $activedFromMenu == 'Liste des modules'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer un module' || $activedFromMenu == 'Liste des modules'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer un module' || $activedFromMenu == 'Liste des modules'){ echo 'style="background-color: #2aa647;"'; } ?>> <!-- class active pour l'activation de l'effet-->
              <i class="nav-icon fas fa-user-clock"></i>
              <p>Module<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('module/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Créer un module'){ echo 'active'; } ?>"> <!-- class active pour l'activation de l'effet-->
                  <i class="fas fa-plus-square nav-icon" style="margin-left:10px !important;"></i>
                  <p>Créer un module</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('module/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des modules'){ echo 'active'; } ?>">
                  <i class="fas fa-list nav-icon" style="margin-left:10px !important;"></i>
                  <p>Liste des modules</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer un survéillant général' || $activedFromMenu == 'Liste des survéillants généraux' || $activedFromMenu == 'Créer un administrateur' || $activedFromMenu == 'Liste des administrateurs'){ echo 'menu-open'; } ?>">

            <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer un survéillant général' || $activedFromMenu == 'Liste des survéillants généraux' || $activedFromMenu == 'Créer un administrateur' || $activedFromMenu == 'Liste des administrateurs'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer un administrateur' || $activedFromMenu == 'Liste des administrateurs' || $activedFromMenu == 'Créer un survéillant général' || $activedFromMenu == 'Liste des survéillants généraux'){ echo 'style="background-color: #2aa647;"'; } ?>>
              <i class="nav-icon fas fa-address-book"></i>
              <p>Contact<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer un survéillant général' || $activedFromMenu == 'Liste des survéillants généraux'){ echo 'menu-open'; } ?>">
                <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer un survéillant général' || $activedFromMenu == 'Liste des survéillants généraux'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer un survéillant général' || $activedFromMenu == 'Liste des survéillants généraux'){ echo 'style="background-color: #1E90FF; color: white;"'; } ?>>
                  <i class="fas fa-user-cog nav-icon" style="margin-left:10px !important;"></i>
                  <p>Survéillants généraux<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('surveillant_general/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Créer un survéillant général'){ echo 'active'; } ?>">
                      <i class="fas fa-plus-square nav-icon" style="margin-left:20px !important;"></i>
                      <p>Créer un survéillant général</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('surveillant_general/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des survéillants généraux'){ echo 'active'; } ?>">
                      <i class="fas fa-list nav-icon" style="margin-left:20px !important;"></i>
                      <p>Liste des survéillants généraux</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer un administrateur' || $activedFromMenu == 'Liste des administrateurs'){ echo 'menu-open'; } ?>">
                <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer un administrateur' || $activedFromMenu == 'Liste des administrateurs'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer un administrateur' || $activedFromMenu == 'Liste des administrateurs'){ echo 'style="background-color: #1E90FF; color: white;"'; } ?>>
                  <i class="fas fa-user-cog nav-icon" style="margin-left:10px !important;"></i>
                  <p>Administrateurs<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('administrateur/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Créer un administrateur'){ echo 'active'; } ?>">
                      <i class="fas fa-plus-square nav-icon" style="margin-left:20px !important;"></i>
                      <p>Créer un administrateur</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('administrateur/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des administrateurs'){ echo 'active'; } ?>">
                      <i class="fas fa-list nav-icon" style="margin-left:20px !important;"></i>
                      <p>Liste des administrateurs</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer une Etablissement' || $activedFromMenu == 'Liste des Etablissements' || $activedFromMenu == 'Créer une année inscription' || $activedFromMenu == 'Liste des années inscription'){ echo 'menu-open'; } ?>">
            <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer une Etablissement' || $activedFromMenu == 'Liste des Etablissements' || $activedFromMenu == 'Créer une année inscription' || $activedFromMenu == 'Liste des années inscription'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer une année inscription' || $activedFromMenu == 'Liste des années inscription' || $activedFromMenu == 'Créer une Etablissement' || $activedFromMenu == 'Liste des Etablissements'){ echo 'style="background-color: #2aa647;"'; } ?>>
              <i class="nav-icon fas fa-user-cog"></i>
              <p>Administration<i class="right fas fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer une Etablissement' || $activedFromMenu == 'Liste des Etablissements'){ echo 'menu-open'; } ?>">
                <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer une Etablissement' || $activedFromMenu == 'Liste des Etablissements'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer une Etablissement' || $activedFromMenu == 'Liste des Etablissements'){ echo 'style="background-color: #1E90FF; color: white;"'; } ?>>
                  <i class="fas fa-school nav-icon" style="margin-left:10px !important;"></i>
                  <p>Etablissement<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('etablissement/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Créer une Etablissement'){ echo 'active'; } ?>">
                      <i class="fas fa-plus-square nav-icon" style="margin-left:20px !important;"></i>
                      <p>Créer une Etablissement</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('etablissement/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des Etablissements'){ echo 'active'; } ?>">
                      <i class="fas fa-list nav-icon" style="margin-left:20px !important;"></i>
                      <p>Liste des Etablissements</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview <?php if($activedFromMenu == 'Créer une année inscription' || $activedFromMenu == 'Liste des années inscription'){ echo 'menu-open'; } ?>">
                <a href="#" class="nav-link <?php if($activedFromMenu == 'Créer une année inscription' || $activedFromMenu == 'Liste des années inscription'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Créer une année inscription' || $activedFromMenu == 'Liste des années inscription'){ echo 'style="background-color: #1E90FF; color: white;"'; } ?>>
                  <i class="fas fa-calendar-alt nav-icon" style="margin-left:10px !important;"></i>
                  <p>Années inscription<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= base_url('annee_inscription/ajouter') ?>" class="nav-link <?php if($activedFromMenu == 'Créer une année inscription'){ echo 'active'; } ?>">
                      <i class="fas fa-plus-square nav-icon" style="margin-left:20px !important;"></i>
                      <p>Créer une année inscription</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?= base_url('annee_inscription/liste') ?>" class="nav-link <?php if($activedFromMenu == 'Liste des années inscription'){ echo 'active'; } ?>">
                      <i class="fas fa-list nav-icon" style="margin-left:20px !important;"></i>
                      <p>Liste des années inscription</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($activedFromMenu == 'Statistic'){ echo 'menu-open'; } ?>">
            <a href="<?= base_url('statistic') ?>" class="nav-link <?php if($activedFromMenu == 'Statistic'){ echo 'active'; } ?>"
            <?php if($activedFromMenu == 'Statistic'){ echo 'style="background-color: #2aa647;"'; } ?>> <!-- class active pour l'activation de l'effet-->
              <i class="nav-icon fas fa-user-cog"></i>
              <p>statistic</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
