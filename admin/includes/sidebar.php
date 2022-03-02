<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Bibliothèque Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?=URL_ADMIN?>index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Livres
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Livres</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des livres:</h6>
            <a class="collapse-item" href="<?= URL_ADMIN?>livres/index.php">Liste des Livres</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>livres/add.php">Ajouter des livres</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAuteurs"
        aria-expanded="true" aria-controls="collapseAuteurs">
        <i class="fas fa-fw fa-cog"></i>
        <span>Auteurs</span>
    </a>
    <div id="collapseAuteurs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des auteurs:</h6>
            <a class="collapse-item" href="<?= URL_ADMIN?>auteurs/index.php">Liste des auteurs</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>auteurs/add.php">Ajouter des auteurs</a>
        </div>
    </div>
</li>




<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Catégories</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= URL_ADMIN?>cat/index.php">Liste des catégories</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>cat/add.php">Ajouter une catégories</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEditeur"
        aria-expanded="true" aria-controls="collapseEditeur">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Éditeurs</span>
    </a>
    <div id="collapseEditeur" class="collapse" aria-labelledby="headingEditeur"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= URL_ADMIN?>editeur/index.php">Liste des éditeurs</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>editeur/add.php">Ajouter une éditeur</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<?php if (isAdmin()):?>
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilisateurs"
        aria-expanded="true" aria-controls="collapseUtilisateurs">
        <i class="fas fa-fw fa-cog"></i>
        <span>Utilisateurs</span>
    </a>
    <div id="collapseUtilisateurs" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion des Utilisateurs:</h6>
            <a class="collapse-item" href="<?=URL_ADMIN?>utilisateur/index.php">Liste des utilisateurs</a>
            <a class="collapse-item" href="<?=URL_ADMIN?>utilisateur/add.php">Ajouter des utilisateurs</a>
        </div>
    </div>
</li>
<?php endif; ?>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsager"
        aria-expanded="true" aria-controls="collapseUsager">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Usagers</span>
    </a>
    <div id="collapseUsager" class="collapse" aria-labelledby="headingUsager"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= URL_ADMIN?>usager/index.php">Liste des usagers</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>usager/add.php">Ajouter un usager</a>
        </div>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLoc"
        aria-expanded="true" aria-controls="collapseLoc">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Locations</span>
    </a>
    <div id="collapseLoc" class="collapse" aria-labelledby="headingLoc"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= URL_ADMIN?>location/index.php">Liste des locations</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>location/add.php">Ajouter une location</a>
            <a class="collapse-item" href="<?= URL_ADMIN?>location/add.php">Conclure une location</a>
        </div>
    </div>
</li>
<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

<!-- Sidebar Message -->
<div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="<?=URL_ADMIN?>img/undraw_rocket.svg" alt="...">

</div>

</ul>