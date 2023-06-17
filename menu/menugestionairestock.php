<?php include("constant.php"); ?>
<div class="navbar">
    <a href="<?php echo$urlsite; ?>/gestionnairestock/welcomestocker.php#entrerarticle">Entrer Magasin</a>
    <a href="<?php echo$urlsite; ?>/gestionnairestock/welcomestocker.php#retraitarticleperunit">Retrait Détailé Magasin</a>
   <div class="dropdown">
    <button class="dropbtn">Transfert 
      <i class="fa fa-caret-down"></i>
    </button>
      <div class="dropdown-content">
        <a href="<?php echo$urlsite; ?>/"onclick="document.getElementById('id07').style.display='block'">A Destination d'un autre magasin</a>
        <a href="<?php echo$urlsite; ?>/"onclick="document.getElementById('id08').style.display='block'">En Provenance d'un autre magasin<</a>
      </div>
    </div>
    <a href="<?php echo$urlsite; ?>/gestionnairestock/statistiquestock.php">Statistique</a>


</div>
<div class="navbar">
  <div class="dropdown">
      <button class="dropbtn">Fournisseur 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Fournisseur/fournisseurmanage.php">Ajouter </a>
        <a href="<?php echo$urlsite; ?>/gestionnairestock/Fournisseur/fournisseurmanage.php">Modifier</a>
        <a href="<?php echo$urlsite; ?>/gestionnairestock/Fournisseur/fournisseurmanage.php">Supprimer</a>
      </div>
    </div> 
      <div class="dropdown">
      <button class="dropbtn">Article 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="<?php echo$urlsite; ?>/gestionnairestock/Article/articlemanage.php">Ajouter </a>
        <a href="<?php echo$urlsite; ?>/gestionnairestock/Article/articlemanage.php">Modifier</a>
        <a href="<?php echo$urlsite; ?>/gestionnairestock/Article/articlemanage.php">Supprimer</a>
      </div>
    </div> 
      <div class="dropdown">
      <button class="dropbtn">Catégorie 
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <a href="<?php echo$urlsite; ?>/gestionnairestock/Category/categorymanage.php">Voir </a>
        <a href="<?php echo$urlsite; ?>/gestionnairestock/Category/categorymanage.php">Ajouter </a>
        <a href="<?php echo$urlsite; ?>/gestionnairestock/Category/categorymanage.php">Modifier </a>
        <a href="<?php echo$urlsite; ?>/gestionnairestock/Category/categorymanage.php">Supprimer </a>
      </div>
    </div> 
        
    <div class="dropdown">
          <button class="dropbtn">Format 
          <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Format/formatmanage.php">Ajouter </a>
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Format/formatmanage.php">Modifier</a>
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Format/formatmanage.php">Supprimer</a>
          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn">Situation 
          <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Situation/situationmanage.php">Ajouter </a>
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Situation/situationmanage.php">Modifier</a>
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Situation/situationmanage.php">Supprimer</a>
          </div>
        </div>
        <div class="dropdown">
          <button class="dropbtn">Lieu 
          <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Lieu/lieumanage.php">Ajouter </a>
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Lieu/lieumanage.php">Modifier</a>
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Lieu/lieumanage.php">Supprimer</a>
          </div>
        </div>

</div>