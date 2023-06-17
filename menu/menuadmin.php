
<div class="navbar">
    <a href="<?php echo$urlsite; ?>/gestionnairestock/welcomestocker.php">Gestionaire</a>
    <a href="<?php echo$urlsite; ?>/comptable/welcomecomptable.php">Comptable</a>
    <a href="<?php echo$urlsite; ?>/cmu/welcomecmu.php">Boutique</a>
    <a href="<?php echo$urlsite; ?>/caisse/welcomecaisse.php">Caisse</a>
    <a href="<?php echo$urlsite; ?>/coursier/welcomecoursier.php">Coursier</a>
    <a href="<?php echo$urlsite; ?>/surveillante/welcomsurveillante.php">Surveillante</a>
</div>

<div class="navbar">
  <a href="#news" onclick="document.getElementById('id01').style.display='block'">Prévision Consommation</a>
 
   <div class="dropdown">
    <button class="dropbtn">Entrée 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id02').style.display='block'">Entrée d'achats </a>
      <a href="#"onclick="document.getElementById('id03').style.display='block'">Entrée de production</a>
    </div>
  </div> 
   <div class="dropdown">
    <button class="dropbtn">Sortie 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id04').style.display='block'">Consommation Interne</a>
      <a href="#"onclick="document.getElementById('id05').style.display='block'">Déstockage pour livraisons-clients</a>
      <a href="#"onclick="document.getElementById('id06').style.display='block'">Pertes et Avaries et péremption</a>
    </div>
  </div> 
   <div class="dropdown">
    <button class="dropbtn">Transfert 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">A Destination d'un autre magasin</a>
      <a href="#"onclick="document.getElementById('id08').style.display='block'">En Provenance d'un autre magasin<</a>
    </div>
  </div> 




   <div class="dropdown">
    <button class="dropbtn">Gestionnaire De Stock 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="<?php echo$urlsite; ?>/gestionnairestock/welcomestocker.php#entrerarticle">Entrer Maga</a>
      <a href="<?php echo$urlsite; ?>gestionnairestock/welcomestocker.php#retraitarticle">Sorti Maga</a>
    </div>
  </div> 


  <div class="dropdown">
    <button class="dropbtn">Magasin 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#"onclick="document.getElementById('id09').style.display='block'">Reports et Stock </a>
      <a href="#"onclick="document.getElementById('id010').style.display='block'">Inventaires</a>
    </div>
  </div>
  <div class="dropdown">
          <button class="dropbtn">Module 
          <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Module/modulemanage.php">Ajouter </a>
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Module/moduleedit.php">Modifier</a>
            <a href="<?php echo$urlsite; ?>/gestionnairestock/Module/delete.php">Supprimer</a>
        </div>
    </div>  
 
  <div class="dropdown">
    <button class="dropbtn">Membre 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="<?php echo$urlsite; ?>/managemembre.php"onclick="document.getElementById('id011').style.display='block'">Voir </a>
      <a href="<?php echo$urlsite; ?>/managemembre.php"onclick="document.getElementById('id012').style.display='block'">Ajouter </a>
      <a href="<?php echo$urlsite; ?>/managemembre.php" onclick="document.getElementById('id013').style.display='block'" >Modifier </a>
      <a href="<?php echo$urlsite; ?>/managemembre.php">Supprimer </a>
    </div>
  </div>


  <div class="dropdown">
    <button class="dropbtn">Statistic 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#" onclick="document.getElementById('id014').style.display='block'">Statistic Génerale </a>
      <a href="#"onclick="document.getElementById('id015').style.display='block'">Statistic Magasin </a>
    </div>
  </div> 
</div>