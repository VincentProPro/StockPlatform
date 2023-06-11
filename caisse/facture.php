
<?php
ob_start();

date_default_timezone_set('Africa/Porto-Novo');
$current_time = date('H:i:s');
// date("Y-m-d H:i:s",$t);
$current_date = date('Y-m-d');
$dateentrer = $_POST['dateentrer'];
$modulename = $_POST['modulename'];
$reglement = $_POST['reglement'];

$nameClient = $_POST['nameClient'];
$phoneClient = $_POST['phoneClient'];
$payement = $_POST['payement'];
$prix = $_POST['prix'];
$recu = $_POST['recu'];
$titre = $_POST['titre'];
$descrip = $_POST['descrip'];
$EmailCaisse = $_POST['EmailCaisse'];
$FullnameCaisse = $_POST['FullnameCaisse'];
$TelCaisse = $_POST['TelCaisse'];

?>
<!DOCTYPE html>
<html lang="en-US">
<head>
   <title>
  	  Facture
   </title>
   <style>
 .info{
   font-size:16px;
   margin-left: 10%;

 }     
 img {
   width: 210mm;
  height: 297mm;
  /* margin: auto; */
  position: absolute;
    z-index: -1;
    /* left: 32%; */
 }
      div#myDiv{
         width: 210mm;
  height: 297mm;
  /* margin: auto; */
  /* background-image: url('../images/facture.png'); */
  background-size: cover; /* Adjust as needed */
  background-position: center; /* Adjust as needed */


      }
      .sameline{

      }
      .row {
  display: grid;
  grid-template-columns: 1fr 1fr; /* Two equal columns */
  grid-gap: 5px; /* Gap between columns */
}

.column {
  /* background-color: #f1f1f1; */
  padding: 10px;
  padding-left: 10%;
    margin-top: 5%;
}
.titre1{
   text-align: center;
   font-size: 12px;


}
.titre2{
   font-size: 34px;
  font-weight: bold;
  color: #333;
  margin-bottom: 10px;
   margin-top: 30px;
   text-align: center;
}
table {
  width: 90%;
  border-collapse: collapse;
  margin: auto;
}
.divsmalltb{
   display: block;
    /* width: 100%; */
    /* height: 8px; */
    margin-right: 5%;
    padding: 1px;
    text-align: right;
    padding: 1px;
    font-size:20px;
    font-weight: 800;

}
table th,
table td {
  padding: 5px;
  text-align: left;
}

.space{
   display:block;
   width:100%;
   height:20%;
}
.note{
   width:20%;
   margin-left: 5%;


}
table td {
  border: 1px solid black; /* Set default border */
}

table td.highlight {
  border: 1px solid red; /* Set red border for specific cells */
}

table th {
  background-color: #f2f2f2;
  font-weight: bold;
  border: 1px solid black;
}

table tr:nth-child(even) {
  background-color: #f9f9f9;
}

table tr:hover {
  background-color: #eaeaea;
}

      

      </style>
</head>
   <body style="color: black;">
   <img src="http://localhost/StockPlatform/images/facture.png" />
   <br>
      <div id="myDiv">
            <h3 class="titre1">TechPlus Technology!</h3>
            <h2 class="titre2" >Facture Pro Format!</h2>

            <div class="row">
            
            
            <div id="pour" class=" column sameline left">
               <h3>Facturé Pour :</h3>
               <p>Nom du client : <?php echo$nameClient ?></p>
               <p>Télephone du client : <?php echo$phoneClient ?></p>
               <p>Date: <?php echo$dateentrer ?></p>
               
                  
            </div>
            <div id="provenant" class="column sameline right">
               <h3>De :</h3>
               <p>Gérant(e) caisse : <?php echo$FullnameCaisse ?></p>
               <p>Gérant(e) Télephone : <?php echo$TelCaisse ?></p>
                  
            </div>
            <p class="info">A payer : <?php echo$payement ?>
            <br>Moyen : <?php echo$reglement ?>
            <br>Module : <?php echo$modulename ?>
            
            </p>

      </div>
      <div id="tablecontent">
   


      </div>
      <div class="divsmalltb">

      
      <p class="smalltable">Total à payer : <?php echo$prix ?>
            <br>Reçu : <?php echo$recu ?>
            
            </p>

      </div>
      <div class="space"></div>
      <div class="note">
         <p>Le paiement est exigé dans
             14 jours ouvrables à compter de la date de facturation. Tout produits acheté n'est pas remboursé.
</div>

  
   


   </div>
      
      

      <script type="text/javascript">
        if (typeof window.history.pushState === 'function') {
  window.history.pushState({}, '', '/');
}
var actContents = document.body.innerHTML;
            document.body.innerHTML = actContents;
            window.print();

        
         const handlePrint = () => {
            if (typeof window.history.pushState === 'function') {
  window.history.pushState({}, '', '/');
}

            var actContents = document.body.innerHTML;
            document.body.innerHTML = actContents;
            window.print();
         }


         var obj = <?php echo  json_encode(html_entity_decode($descrip)); ?>;
                       
// Parse the string into a JavaScript array
      var dataArray = JSON.parse(obj);
      console.log(dataArray);       
// Create an HTML table
var table = document.createElement('table');

// Create table header row
var thead = document.createElement('thead');
var headerRow = document.createElement('tr');
Object.keys(dataArray[0]).forEach(function(key) {
  var th = document.createElement('th');
  th.textContent = key;
  headerRow.appendChild(th);
});
thead.appendChild(headerRow);
table.appendChild(thead);

// Create table body
var tbody = document.createElement('tbody');
dataArray.forEach(function(rowData) {
  var tr = document.createElement('tr');
  Object.values(rowData).forEach(function(value) {
    var td = document.createElement('td');
    td.textContent = value;
    tr.appendChild(td);
  });
  tbody.appendChild(tr);
});
table.appendChild(tbody);

// Append the table to the document body
// document.body.appendChild(table); 
// Create a div element reference
var myDiv = document.getElementById('tablecontent');

// Append the table to the div element
myDiv.appendChild(table);


      </script>
   </body>
</html>