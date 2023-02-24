*/<?php
// Initialize the session
session_start();
error_reporting(0);

require("viewcmu.php");
// echo json_encode($gerantcmu->viewstockcmu());
echo json_encode($gerantcmu->viewsorticmuAllYear());


// echo json_encode($gerantcmu->viewsorticmu());

//  echo$gerantcmu->viewstockcmu()[0][4]; 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>
<head>
<!--  <meta charset="ISO-8859-1">
 -->
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="../cliniccss.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
     <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
       <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
               <!-- <script src="plotly-2.8.3.min.js"></script> -->
               <script src='https://cdn.plot.ly/plotly-2.18.0.min.js'></script>

               <script type="text/javascript" src="../jqueryforperode1.js"></script>
<script type="text/javascript" src="../jqueryforperiode2.js"></script>
<script type="text/javascript" src="../jqueryforperiode3.js"></script>
<link rel="stylesheet" type="text/css" href="../jquerycssforperiode.css" />
<script src="../plotlatestmin.js"></script>

</head>
<body>

<div class="header">
  <h1>Clinic</h1>
  <p>La Clinic est une Clinique de réference.</p>
</div>

<div class="topnav">
  <a href="#">Accueil</a>
  <a href="#">Connexion</a>
  <a href="#">Apropos</a>
<!--   <a href="#" style="float:right">Link</a>
 -->
</div>

<div class="navbar">
    <a href="#entrerarticle">Entrer CMU</a>
    <a href="#retraitarticle">Sorti CMU</a>
   

 
   

   <div class="dropdown">
    <button class="dropbtn">Statistique 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#situationstock">Situation Stock</a>
      <a href="#frequencesorties">Frequence des sorties</a>
      <a href="#rentabiliarticle">Rentabilité par article </a>
      <a href="#evolutionrecette">Evolution Recette</a>
    </div>
  </div> 
 
   
 
</div>

<div class="row">
  <div class="leftcolumn">
                  <div class="card shadowexempl">
                           <div id="situationstock">

                <h2>Situation Stock </h2>
                <h5>statistique sur la situation du stock par article</h5>
                <div id="graphsituationstock" style="width:auto;height:550px;">
                  
                </div>

                  <div>

                  </div>
                  <p>Autres fonctions..</p>
                <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
              </div>
                      </div>
               
     <div class="card shadowexempl">
            <div id="revenusorties">

                <h2>Revenu des sorties </h2>
                <div class="btn-group">
                <button onclick="dothisgraphrevenumoi()">Du Mois</button>
                <button onclick="dothisgraphrevenuthree()">Sur 3 Mois</butto
                n>
                <button onclick="dothisgraphrevenusix()">Sur 6 Mois</button>
                <label>Debut</label> <input type="date" id="date3">
                    <label>Fin</label><input type="date" id="date4">
                        <button onclick="dothisgraphrevenuperiode()">Sur Période</button>
                </div>
                <h5>statistique sur les revenus du CMU </h5>

                  <div id="graphrevenugeneral" style="width:auto;height:550px;">
                  
                </div>
                  <p>Autres fonctions..</p>
                <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
              </div>
    </div>
    <div class="card shadowexempl">
            <div id="frequencesorties">

                <h2>Frequence des sorties </h2>
                <div class="btn-group">
                <button>Du Mois</button>
                <button>Sur 3 Mois</butto
                n>
                <button>Sur 6 Mois</button>
                <label>Debut</label> <input type="date" id="date3">
                    <label>Fin</label><input type="date" id="date4">
                        <button onclick="dothisgraphrentabiliarticle()">Sur Période</button>
                </div>
                <h5>statistique sur la frequence de sortie par article</h5>

                  <div id="graphsortigeneral" style="width:auto;height:550px;">
                  
                </div>
                  <p>Autres fonctions..</p>
                <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
              </div>
    </div>

   

         <div class="card shadowexempl">
                          <div id="sortiperiodearticle">

                              <h2>Frequence de Sorti par article sur periode</h2>
                              <h5>Gérant CMU Fonction</h5>
                             
                                   <label>Debut</label> <input type="date" id="date1">
                    <label>Fin</label><input type="date" id="date2">
                        <button onclick="dothisgraphperiodesortiarticle()">Voir</button>
                        <div id="graphperiodesortiarticle"></div>
                                <p>Autres fonctions..</p>
                              <p>Le Gérant du CMU est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
                            </div>
                      </div>

       <div class="card shadowexempl">
                          <div id="rentabiliarticle">

                              <h2>Rentabilité par article</h2>
                              <h5>Gérant CMU Fonction</h5>
                             
                                   <label>Debut</label> <input type="date" id="date3">
                    <label>Fin</label><input type="date" id="date4">
                        <button onclick="dothisgraphrentabiliarticle()">Voir</button>
                        <div id="graphrentabiliarticle"></div>
                                <p>Autres fonctions..</p>
                              <p>Le Gérant du CMU est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
                            </div>
                      </div>
                      
               
     <div class="card shadowexempl">
            <div id="evolutionrecette">

                <h2>Evolution Des Recettes </h2>
                <h5>statistique sur l'évolution des recettes sur les mois</h5>

                  <div>


                  </div>
                  <p>Autres fonctions..</p>
                <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
              </div>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>Profile </h2>
            <div class="fakeimg" style="height:100px;"><img src="../images/contact.png" style="height:80px;"></div>
<b>Bonjour Mr <?php echo htmlspecialchars($_SESSION["fullname"]); ?></b>
      <br>
      <br>
      <b>role: <?php echo htmlspecialchars($_SESSION["role"]); ?></b>
            <br>
      <b>tel: <?php echo htmlspecialchars($_SESSION["tel"]); ?></b>
        <br>
      <b>email: <?php echo htmlspecialchars($_SESSION["email"]); ?></b>
                  <a href="../logout.php"><button class="fakeimg" >Log Out</button></a>

    </div>
    <div class="card">
      <h3>Gestionnaire De Stock </h3>
      
      <div class="fakeimg"><p>Le Gestionnaire de stock est chargé de saisir les sorties d'articles, ajouter des articles, fournisseurs et catégories dans la base de donnée.</p></div>
    </div>
<div class="card">
       <h3>Laisser un Commentaire</h3>
      
      <form>
        <label>A qui?</label>
         <select name="aqui">

         <?php
 
                                    include('../db/config.php');

          // $query=mysqli_query($conn,"select * from `users`");
          $sql = "SELECT DISTINCT role FROM users";
            
            // Set parameters
            // $param_username = trim($_POST["email"]);
        
        if($stmt = $pdo->prepare($sql)){

            
            if($stmt->execute()){
                                        
                if($stmt->rowCount()>0){
                                      $arrayrole= $stmt->fetchAll();
                                      foreach($arrayrole as $roleelement){
                                        ?> 
                                          <option value="<?php echo $roleelement[0];?>"><?php echo $roleelement[0];?></option>
                                        <?php
                                      }  }}}?>
                                        </select><br><br>

        <label>Object:</label>
        <input type="text" name="" placeholder="L'object du sujet">
        
   
        <textarea placeholder="Entrer votre message ici"> Entrer votre message ici</textarea>
              <button type="submit">Envoyé</button>

      </form>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
<script type="text/javascript">
    
    var datadesignation=[];
    var dataquantity=[];
    <?php foreach ($gerantcmu->viewstockcmu() as $element){ ?>
      var designation=<?php echo json_encode($element["designation"]); ?>;
      var quantity=<?php echo json_encode($element["quantity"]); ?>;
      // alert("designation is "+designation);

      datadesignation.push(designation);
      dataquantity.push(quantity);
      <?php
    }
      ?>

    var data = [{
      x:datadesignation,
      y:dataquantity,
      type:"bar"
    }];

var layout = {title:"Vue du StockCMU"};
document.getElementById("graphsituationstock").style.width = 'auto';
document.getElementById("graphsituationstock").style.height = '550px';
Plotly.newPlot("graphsituationstock", data, layout);
dothisgraphrevenu()
function dothisgraphrevenu(){
  var datadate1=[];
  var databenefice1=[];
  var datatotalbenefice=0;
                        <?php foreach ($gerantcmu->viewsorticmuAllYear() as $element){ ?>
                          var datearr=<?php echo json_encode($element["date"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadate1.push(datearr);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>
                          alert(datadate1.toString());
                          var formateddatearr=[];
                          var formatedbenefice=[];
                          var match=false;
                          var position=0;

                          for(var i=0; i<datadate1.length;i++){
                            //initialize
                            if(formateddatearr.length===0){
                                formateddatearr.push(datadate1[i]);
                                formatedbenefice.push(databenefice1[i]);

                            }else{
                                //search if element has been added
                                for(var srch=0; srch<formateddatearr.length;srch++){
                                    if(formateddatearr[srch]===datadate1[i]){
                                        //do update quantity by adding to previous qty
                                        match=true;
                                        position=srch;
                                        break;
                                    }else{
                                        //add new element
                                        match=false;
                                    }

                                }
                                if(match===true){
                                    //do update quantity by adding to previous qty
                                    var previousbenefice=formatedbenefice[position];
                                    formatedbenefice[position]=previousbenefice+databenefice1[i];

                                }else{
                                    //add new elements
                                    formateddatearr.push(datadate1[i]);
                                    formatedbenefice.push(databenefice1[i]);


                                }

                            }
                            



                          }
                          if(formateddatearr.length>0){
                            alert(formateddatearr.toString());
                            alert(formatedbenefice.toString());
                            formatedbenefice.forEach(item => {
                                  datatotalbenefice += item;
                                 });

                            var data = [{
                                  x:formateddatearr,
                                  y:formatedbenefice,
                                  type: "scatter",
                                  mode: "lines",
                                  name: 'Benefice Year',
                                  line: {color: '#7F7F7F'}
                                }];
                                

                            var layout = {title:"Benefice total: "+datatotalbenefice};
                            document.getElementById("graphrevenugeneral").style.width = 'auto';
                            document.getElementById("graphrevenugeneral").style.height = '550px';
                            Plotly.newPlot("graphrevenugeneral", data, layout); 
                            

                          }else{
                            alert("no data to display");
                          }
  




  
 

}

function dothisgraphrentabiliarticle(){
    alert(document.cookie);

                         var x1 = document.getElementById("date3").value; 
                         var x2 = document.getElementById("date4").value;
                         var date = new Date();
                            date.setTime(date.getTime() + 30);
                            expires = "; expires=" + date.toGMTString()+ "; path=/";
                         document.cookie = "periodrentbltdate1="+x1+expires;
                         document.cookie = "periodrentbltdate2="+x2+expires;
                             alert(document.cookie);

                         var datadesignation1=[];
                        var dataquantity1=[];
                        var databenefice1=[];
                        alert("dothisgraphrentabiliarticle "+x1+'|'+x2);
                        alert(<?php echo$_COOKIE['periodrentbltdate2'] ;?>);
                        <?php foreach ($gerantcmu->viewsorticmuPeriode("2022-02-04","2023-02-04") as $element){ ?>
                          var designation=<?php echo json_encode($element["designation"]); ?>;
                          var quantity=<?php echo json_encode($element["quantity"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          dataquantity1.push(quantity);
                          datadesignation1.push(designation);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>
                          alert(datadesignation1.toString());
                          var formateddesignation=[];
                          var formatedquantity=[];
                          var formatedbenefice=[];
                          var match=false;
                          var position=0;

                          for(var i=0; i<datadesignation1.length;i++){
                            //initialize
                            if(formateddesignation.length===0){
                                formateddesignation.push(datadesignation1[i]);
                                formatedquantity.push(dataquantity1[i]);
                                formatedbenefice.push(databenefice1[i]);

                            }else{
                                //search if element has been added
                                for(var srch=0; srch<formateddesignation.length;srch++){
                                    if(formateddesignation[srch]===datadesignation1[i]){
                                        //do update quantity by adding to previous qty
                                        match=true;
                                        position=srch;
                                        break;
                                    }else{
                                        //add new element
                                        match=false;
                                    }

                                }
                                if(match===true){
                                    //do update quantity by adding to previous qty
                                    var previous=formatedquantity[position];
                                    var previousbenefice=formatedbenefice[position];
                                    formatedquantity[position]=previous+dataquantity1[i];
                                    formatedbenefice[position]=previousbenefice+databenefice1[i];

                                }else{
                                    //add new elements
                                    formateddesignation.push(datadesignation1[i]);
                                    formatedquantity.push(dataquantity1[i]);
                                    formatedbenefice.push(databenefice1[i]);


                                }

                            }
                            



                          }
                          if(formateddesignation.length>0){
                            var data = [{
                                  x:formateddesignation,
                                  y:formatedbenefice,
                                  type:"bar"
                                }];

                            var layout = {title:"Benefice par Article"};
                            document.getElementById("graphrentabiliarticle").style.width = 'auto';
                            document.getElementById("graphrentabiliarticle").style.height = '550px';
                            Plotly.newPlot("graphrentabiliarticle", data, layout); 
                            

                          }else{
                            alert("no data to display");
                          }
                          
                          
}

function dothisgraphperiodesortiarticle(){

                 var x1 = document.getElementById("date1").value; 
                 var x2 = document.getElementById("date2").value;
                 var x3=x1+'|'+x2; 
                  document.getElementById("graphperiodesortiarticle").style.width = 'auto';
                  document.getElementById("graphperiodesortiarticle").style.height = '550px';
                  // document.getElementById("p2").style.background-color = 'yellow';
                         alert(x3);
                try {


                }
                catch(err){


                }

                    

}



</script>
</body>
</html>
