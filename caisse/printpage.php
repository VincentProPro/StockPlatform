
<?php
date_default_timezone_set('Africa/Porto-Novo');
$current_time = date('H:i:s');
// date("Y-m-d H:i:s",$t);
$current_date = date('Y-m-d');
$Libellé = $_POST['Libellé'];
$Situation = $_POST['Situation'];
$Tarif = $_POST['Tarif'];
$Description = $_POST['Description'];
$EmailCaisse = $_POST['EmailCaisse'];
$FullnameCaisse = $_POST['FullnameCaisse'];
$TelCaisse = $_POST['TelCaisse'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 500px;
  margin: auto;
  text-align: left;
  font-family: arial;
}
.centerthis{
    margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
h2, p,h3{
    margin-left:10px;
}
a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
@media only print {
         body {
            visibility: hidden;
         }
         .cssInp {
            visibility: visible;
         }
      }
</style>
</head>
<body>




<div class="card cssInp" id="divToPrint">
    <div class="centerthis"><img  src="../images/1550389719.jpeg" alt="John" style="width:50%"></div>
  
  <h1 class="centerthis">Clinique Ste Vincent </h1>
  <p class="title" class="centerthis">Bon De Commande</p>
<h2>Libellé: <?php echo$Libellé;?></h2>
<h2>Description: <?php echo$Description;?></h2>
<h2>Situation: <?php echo$Situation;?></h2>
<h2>Tarif <?php echo$Tarif;?></h2>
<h3>Date <?php echo$current_date;?> Heure <?php echo$current_time;?></h3>

  
  <p>Détail</p>
<h3>Nom: <?php echo$FullnameCaisse;?></h3>
<h3>Tel: <?php echo$TelCaisse;?></h3>
  <div>  <p><button onclick="PrintDiv();">Pour une Santé Meilleur</button></p></div>
</div>
</body>
<script type="text/javascript">     
    function PrintDiv() {    
    //    var divToPrint = document.getElementById('divToPrint');
    //    var popupWin = window.open('', '_blank', 'width=300,height=300');
    //    popupWin.document.open();
    //    popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
    //     popupWin.document.close();
    print();
            }
 </script>
</html>
