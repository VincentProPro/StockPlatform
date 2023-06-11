<?php 
    if($_SESSION['role']=="SuperAdmin"){

      ?>
      <div class="card">
      <h3>Type Role</h3>
      <div class="rolebtn"><a href="http://localhost/StockPlatform/coursier/welcomecoursier.php"><button >Coursier</button></div>
      <div class="rolebtn"><a href="http://localhost/StockPlatform/gestionnairestock/welcomestocker.php"><button >Gestionnaire de Stock</button></div>
      <div class="rolebtn"><a href="http://localhost/StockPlatform/cmu/welcomecmu.php"><button >Gestion Boutique</button></div>
      <div class="rolebtn"><a href="http://localhost/StockPlatform/caisse/welcomecaisse.php"><button >Caisse</button></div>
      <div class="rolebtn"><a href="http://localhost/StockPlatform/surveillante/welcomsurveillante.php"><button >Surveillante</button></div>        
      <div class="rolebtn"><a href="http://localhost/StockPlatform/comptable/welcomecomptable.php"><button >Comptable</button></div>
      <div class="rolebtn"><a href="http://localhost/StockPlatform"><button >Admin</button></div>
      <div class="rolebtn"><a href="http://localhost/StockPlatform/welcomesuperAdmin.php"><button >Super Admin</button></div>
      
      <a href="logout.php"><button class="fakeimg" >Log Out</button></a>
    </div>

      <?php
    }

    ?>