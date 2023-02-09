<!--  -->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal,.modal2 {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 80%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 0px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
  <center>
    <div style="width:50%">
  <h2>Cette page est strictement réserver aux membres de l'entreprise. Accceder a cette page sans authorisation est passible de poursuite judiciare.</h2>
  <img src="images/traffic-sign-38589_1280.png" style="width:50%">
  <div>
    <h3>Cliquer sur s'enregistrer pour une première fois ou se connecter si votre compte existe déjà</h3>
  </div>
  <div>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Se Connecter</button>
    <button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">S'Inscrire</button>

  </div>


</div>
  </center>



<div id="id01" class="modal">
  
  <form class="modal-content animate" action="loginmember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/1550389719.jpeg" width="200" height="200" alt="Avatar" class="avatar">
    </div>

    <div class="container">
            <h3>Se Connecter</h3>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> se Souvenir
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Annulé</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<div id="id02" class="modal2">
  
  <form class="modal-content animate" action="regismember.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="images/1550389719.jpeg" width="200" height="250" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <h3>S'Inscrire</h3>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Entrer l'email" name="email" required>

      <label for="psw"><b>Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
      <label for="psw"><b>Confirmer Mot de Passe</b></label>
      <input type="password" placeholder="Entrer Mot de Passe" name="psw" required>
        
      <button type="submit">S'Enregistrer</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> se Souvenir
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Annulé</button>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it

window.onclick = function(event) {
    
     if (event.target == modal2) {
        modal2.style.display = "none";
    }
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>