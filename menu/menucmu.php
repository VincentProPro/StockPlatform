<?php include("constant.php"); ?>
<div class="navbar">
    <a href="#entrerarticle">Entrer Boutique</a>
    <a href="#retraitarticle">Sorti Boutique</a>
   

 
   

   <div class="dropdown">
    <button class="dropbtn">Statistique 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="<?php echo$urlsite; ?>/cmu/statisticcmu.php">Statistique Geeneral</a>
       <a href="<?php echo$urlsite; ?>/cmu/statisticcmu.php#situationstock">Situation Stock</a>
      <a href="<?php echo$urlsite; ?>/cmu/statisticcmu.php#frequencesorties">Frequence des sorties</a>
      <a href="<?php echo$urlsite; ?>/cmu/statisticcmu.php#rentabiliarticle">Rentabilité par article </a>
      <a href="<?php echo$urlsite; ?>/cmu/statisticcmu.php#evolutionrecette">Evolution Recette</a>
    </div>
  </div> 

</div>