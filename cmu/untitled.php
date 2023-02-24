<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="cliniccss.css">

</head>
<body>

<div class="header">
  <h1>Clinic </h1>
  <p>La Clinic est une Clinique de réference.</p>
</div>

<div class="topnav">
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#" style="float:right">Link</a>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>Ajouter Un Membre</h2>
        <div>
    <form method="POST" action="addmember.php">
      <label>Nom Complet:</label><input type="text" name="firstname">
      <label>Tel:</label><input type="text" name="lastname">
      <label>Email:</label><input type="text" name="lastname">
      <label>Position:</label><input type="text" name="lastname">
      <label>Role:</label><input type="text" name="lastname">
      <button type="submit">Envoyé</button>
    </form>
  </div>
  <br>
 
    </div>
    <div class="card">
      <h2>Liste des Membres</h2>
      <h5></h5>

 <div>
    <table border="1">
      <thead>
        <th>Nom Complet</th>
        <th>Email</th>
        <th>Tel</th>
        <th>Position</th>
        <th>Role</th>
        <th>Option</th>
      </thead>
      <tbody>
        <?php
          include('db/config.php');
          // $query=mysqli_query($conn,"select * from `users`");
          $sql = "SELECT * FROM users ";
        
        if($stmt = $pdo->prepare($sql)){
            
            if($stmt->execute()){
                                        
                if($stmt->rowCount()>0){
                    $arraystable= $stmt->fetchAll();
                    $timetablearray=array();
                   foreach ($arraystable as $row) {
                    ?>
                    <tr>
              <td><?php echo $row['fullname']; ?></td>
              <td><?php echo $row['email']; ?></td>

               <td><?php echo $row['tel']; ?></td>
              <td><?php echo $row['position']; ?></td>
               <td><?php echo $row['role']; ?></td>
              <td>
                <a href="#" onclick="document.getElementById('id02').style.display='block'" <?php $idmatricule=$row['matricule'] ?> >Edit</a>
                <a href="delete.php?id=<?php echo $row['matricule']; ?>">Delete</a>
              </td>
            </tr><?php

                   }}}}
          
           
            
          
        ?>
      </tbody>
    </table>
  </div>      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>
   <div class="rightcolumn">
    <div class="card shadowexempl">
      <h2>Profile </h2>
            <div class="fakeimg" style="height:100px;"><img src="images/contact.png" style="height:80px;"></div>
<b>Bonjour Mr <?php echo htmlspecialchars($_SESSION["fullname"]); ?></b>
      <br>
      <br>
      <b>role: <?php echo htmlspecialchars($_SESSION["role"]); ?></b>
            <br>
      <b>tel: <?php echo htmlspecialchars($_SESSION["tel"]); ?></b>
        <br>
      <b>email: <?php echo htmlspecialchars($_SESSION["email"]); ?></b>
    </div>
    <div class="card">
      <h3>Type Role</h3>
      <div class="fakeimg"><p>Super Admin</p></div>
      <div class="fakeimg"><p>Admin</p></div>
      <div class="fakeimg"><p>Comptable</p></div>
      <div class="fakeimg"><p>Gestionnaire de Stock</p></div>
      <div class="fakeimg"><p>Coursier</p></div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
<div id="id02" class="modal2">
  <?php
 
   // include('db/config.php');
          // $query=mysqli_query($conn,"select * from `users`");
          $sql = "SELECT * FROM users WHERE matricule = :matricule";
            
            // Set parameters
            // $param_username = trim($_POST["email"]);
        
        if($stmt = $pdo->prepare($sql)){
                     $stmt->bindParam(":matricule", $param_username, PDO::PARAM_STR);

                      $param_username = $idmatricule;

            
            if($stmt->execute()){
                                        
                if($stmt->rowCount()>0){
                                      $arraysmember= $stmt->fetchAll();



                }}}
?>
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

    <div class="container">
            <h3>Membre Modification</h3>

      <label for="libeller"><b>Nom Complet</b></label>
      <input type="text" placeholder="Entrer mom" name="libeller" value="<?php echo $arraysmember[0]["fullname"]; ?>"required>

      <label for="tel"><b>Tel</b></label>
      <input type="text" placeholder="Entrer le tel" value="<?php echo $arraysmember[0]["tel"];?>" name="tel" required>
      <label for="comandnum"><b>Email</b></label>
      <input type="text" placeholder="Entrer email" name="comandnum" value="<?php echo $arraysmember[0]["email"];?>"required>
      <label for="facturnum"><b>Position</b></label>
      <input type="text" placeholder="Entrer la Position" name="facturnum" value="<?php echo $arraysmember[0]["position"];?> "required>
      <label for="date"><b>Role</b></label>
      <?php
      $rolearray=array();
      $rolearrayfull=array("SuperAdmin", "Admin", "Comptable","Gestionaire de Stock","Coursier");
      $currentrole=$arraysmember[0]["role"];
      array_push($rolearray,$currentrole);
      for($i=0;$i<sizeof($rolearrayfull);$i++){
        if($rolearrayfull[$i]==$currentrole){}else{
                array_push($rolearray,$rolearrayfull[$i]);

        }
      }


      ?>
      <select name="role">
        <?php 
              // $rolearray=array("SuperAdmin", "Admin", "Comptable","Gestionaire de Stock","Coursier");

        for($i=0;$i<sizeof($rolearray);$i++){
          ?>

                  <option value="<?php echo $rolearray[$i];?>"><?php echo $rolearray[$i];?> </option>


        <?php }


        ?>
      </select>
      <br> <br> 
      
      <button type="submit">Envoyé</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>
</body>
</html>