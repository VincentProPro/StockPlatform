<?php include("constant.php"); ?>
<?php 
    if($_SESSION['role']=="SuperAdmin"){

      ?>
      <div class="card">
      <h3>Type Role</h3>
      <div class="dropdown">
    <button class="dropbtn"><div class="navbar">Voir les roles</div> 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="<?php echo$urlsite; ?>/coursier/welcomecoursier.php">Coursier</a>
       <a href="<?php echo$urlsite; ?>/gestionnairestock/welcomestocker.php">Gestionnaire de Stock</a>
      <a href="<?php echo$urlsite; ?>/cmu/welcomecmu.php">Boutique</a>
      <a href="<?php echo$urlsite; ?>/caisse/welcomecaisse.php">Caisse </a>
      <a href="<?php echo$urlsite; ?>/comptable/welcomecomptable.php">Comptable</a>
      <a href="<?php echo$urlsite; ?>/">Admin</a>
      <a href="<?php echo$urlsite; ?>/welcomesuperAdmin.php">Super Admin</a>
    </div>
  </div>

      
      <a href="logout.php"><button class="fakeimg" >Log Out</button></a>
    </div>

      <?php
    }

    ?>