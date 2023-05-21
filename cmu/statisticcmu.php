<?php
  // header("Content-Security-Policy: default-src 'self'; style-src 'self' http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css ; script-src 'self' https://cdn.plot.ly/plotly-2.18.0.min.js http://code.jquery.com/jquery-1.9.1.js http://code.jquery.com/ui/1.10.4/jquery-ui.js http://localhost/*  http://code.jquery.com/*;");

// Initialize the session
session_start();
error_reporting(0);
// ob_start();
// ob_end_flush(); // Flush the output from the buffer

// header("refresh: 5"); 
require("viewcmu.php");
// echo json_encode($gerantcmu->viewsorticmuSixMois());
// echo json_encode($gerantcmu->viewsorticmuPeriode('2022-01-02','2023-01-02'));

// echo json_encode($gerantcmu->viewsorticmuAllYear());


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
<link rel="stylesheet" href="../css/jquery-ui.css">
     <script src="../js/jquery19.js"></script>
       <script src="../js/jquery-ui.js"></script>
               <!-- <script src="plotly-2.8.3.min.js"></script> -->
               <script src='https://cdn.plot.ly/plotly-2.18.0.min.js'></script>
               <!-- <script src='../js/plotly.js'></script> -->

               <script type="text/javascript" src="../jqueryforperode1.js"></script>
<script type="text/javascript" src="../jqueryforperiode2.js"></script>
<script type="text/javascript" src="../jqueryforperiode3.js"></script>
<link rel="stylesheet" type="text/css" href="../jquerycssforperiode.css" />
<!-- <script src="../plotlatestmin.js"></script> -->

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
                <button onclick="generategraphrevenu(1)">Du Mois</button>
                <button onclick="generategraphrevenu(3)">Sur 3 Mois</butto
                n>
                <button onclick="generategraphrevenu(6)">Sur 6 Mois</button>
                <div class="labelperiode">
                <label class="labelperiode">Debut</label> 
                </div>

                <input type="date" id="date1">
                <div class="labelperiode">
                  <label class="labelperiode">Fin</label>
                </div>  
                <input type="date" id="date2">
                        <button onclick="generategraphrevenu(7)">Sur Période</button>
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
                <button onclick="generategraphfrequencesorti(1)">Du Mois</button>
                <button onclick="generategraphfrequencesorti(3)">Sur 3 Mois</butto
                n>
                <button onclick="generategraphfrequencesorti(6)">Sur 6 Mois</button>
                <div class="labelperiode">
                <label class="labelperiode">Debut</label> 
                </div>

                <input type="date" id="date3">
                <div class="labelperiode">
                  <label class="labelperiode">Fin</label>
                </div>  
                <input type="date" id="date4">
                        <button onclick="generategraphfrequencesorti(7)">Sur Période</button>
                </div>
                <h5>statistique sur la frequence de sortie par article</h5>

                  <div id="graphfreqsortigeneral" style="width:auto;height:550px;">
                  
                </div>
                  <p>Autres fonctions..</p>
                <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories, format et articles.</p>
              </div>
    </div>
                      
               
     <div class="card shadowexempl">
            <div id="evolutionrecette">

                <h2>Prevision </h2>
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
  generategraphstock();
generategraphrevenu(0);
generategraphfrequencesorti(0);
function generategraphstock(){
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
}

function getCookie(name) {
  // Split the cookie string into an array of individual cookies
  var cookies = document.cookie.split(';');

  // Loop through the cookies and find the one with the specified name
  for(var i = 0; i < cookies.length; i++) {
    var cookie = cookies[i].trim();
    if(cookie.startsWith(name + '=')) {
      // Return the value of the cookie
      return cookie.substring(name.length + 1);
    }
  }

  // If the cookie isn't found, return null
  return null;
}

function generategraphrevenu(para){
                      //declare all variable
                      var x1, x2;
                      //first create an array to contain each element (column-rows)  of the table
                      var datadesignation1=[];
                      var dataquantity1=[];
                      var databenefice1=[];
                      var datatotalbenefice=0;
                      var datadate1=[];
                      if (para==1){
                        //display on 1 month
                        <?php foreach ($gerantcmu->viewsorticmuMois() as $element){ ?>
                          var datearr=<?php echo json_encode($element["date"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadate1.push(datearr);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>
                        

                      }
                      else if(para==3){
                           //display on 3 months
                           <?php foreach ($gerantcmu->viewsorticmuThreeMois() as $element){ ?>
                          var datearr=<?php echo json_encode($element["date"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadate1.push(datearr);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>
                           


                      }
                      else if(para==6){
                           //display on 6 months
                           <?php foreach ($gerantcmu->viewsorticmuSixMois() as $element){ ?>
                          var datearr=<?php echo json_encode($element["date"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadate1.push(datearr);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>
                          


                      }else if(para==7){
                           //display on periode months
                            x1 = document.getElementById("date1").value; 
                            x2 = document.getElementById("date2").value;
                            var date = new Date();
                            date.setTime(date.getTime() + 30);
                            expires = "; expires=" + date.toGMTString()+ "; path=/";
                            var expirationDate = new Date();
                            expirationDate.setDate(expirationDate.getDate() + 1);

                            // Set the cookie value
                            document.cookie = "periodrentbltdate1="+x1+"; expires=" + expirationDate.toUTCString() + "; path=/";
                            document.cookie = "periodrentbltdate2="+x2+"; expires=" + expirationDate.toUTCString() + "; path=/";
                            //  document.cookie = "periodrentbltdate1="+x1+expires;
                            //  document.cookie = "periodrentbltdate2="+x2+expires;
                            alert("dothisgraphrentabiliarticle "+x1+'|'+x2);
                            var cookieValue1 = getCookie("periodrentbltdate1");
                            var cookieValue2 = getCookie("periodrentbltdate2");
                            alert("in cookie "+cookieValue1+'|'+cookieValue2);


                         
                        <?php foreach ($gerantcmu->viewsorticmuPeriode($_COOKIE['periodrentbltdate1'],$_COOKIE['periodrentbltdate2']) as $element){ ?>
                          var datearr=<?php echo json_encode($element["date"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadate1.push(datearr);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>
                          alert(databenefice1.toString());



                      }else{
                        <?php foreach ($gerantcmu->viewsorticmuAllYear() as $element){ ?>
                          var datearr=<?php echo json_encode($element["date"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadate1.push(datearr);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>
                        

                      }




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

function generategraphfrequencesorti(para){
                      //declare all variable
                      var x1, x2;
                      //first create an array to contain each element (column-rows)  of the table
                      var datadesignation1=[];
                      var dataquantity1=[];
                        
                      // var datadate1=[];
                      var databenefice1=[];
                      var datatotalbenefice=0;
                      if (para==1){
                        //display on 1 month
                        <?php foreach ($gerantcmu->viewsorticmuMois() as $element){ ?>
                          var designation=<?php echo json_encode($element["designation"]); ?>;
                          var quantity=<?php echo json_encode($element["quantity"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadesignation1.push(designation);
                          dataquantity1.push(quantity);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>

                      }
                      else if(para==3){
                           //display on 3 months
                           var b=0;
                           <?php foreach ($gerantcmu->viewsorticmuThreeMois() as $element){ ?>
                          var designation=<?php echo json_encode($element["designation"]); ?>;
                          var quantity=<?php echo json_encode($element["quantity"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadesignation1.push(designation);
                          dataquantity1.push(quantity);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>


                      }
                      else if(para==6){
                           //display on 6 months
                           <?php foreach ($gerantcmu->viewsorticmuSixMois() as $element){ ?>
                          var designation=<?php echo json_encode($element["designation"]); ?>;
                          var quantity=<?php echo json_encode($element["quantity"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadesignation1.push(designation);
                          dataquantity1.push(quantity);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>


                      }else if(para==7){

                           //display on periode months

                            x1 = document.getElementById("date3").value; 
                          x2 = document.getElementById("date4").value;
                          // alert("date1: "+x1+"date2: "+x2);
                         var date = new Date();
                            date.setTime(date.getTime() + 30);
                            expires = "; expires=" + date.toGMTString()+ "; path=/";
                            var expirationDate = new Date();
                      expirationDate.setDate(expirationDate.getDate() + 1);

                        // Set the cookie value
                        document.cookie = "periodrentbltdate1="+x1+";  path=/";
                        document.cookie = "periodrentbltdate2="+x2+";  path=/";
                   
                         cookieValue1 = getCookie("periodrentbltdate1");
                         cookieValue2 = getCookie("periodrentbltdate2");
                         alert("in cookie "+cookieValue1+'|'+cookieValue2);
                        <?php foreach ($gerantcmu->viewsorticmuPeriode($_COOKIE['periodrentbltdate1'],$_COOKIE['periodrentbltdate2']) as $element){ ?>
                          var designation=<?php echo json_encode($element["designation"]); ?>;
                          var quantity=<?php echo json_encode($element["quantity"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;
                          alert("designation : "+designation);
                          alert("quantity : "+quantity);

                          datadesignation1.push(designation);
                          dataquantity1.push(quantity);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>


                      }else{
                        <?php foreach ($gerantcmu->viewsorticmuAllYear() as $element){ ?>
                          var designation=<?php echo json_encode($element["designation"]); ?>;
                          var quantity=<?php echo json_encode($element["quantity"]); ?>;
                          var benefice=<?php echo json_encode($element["benefice"]*$element["quantity"]); ?>;

                          datadesignation1.push(designation);
                          dataquantity1.push(quantity);
                          databenefice1.push(benefice);
                          <?php
                        }
                          ?>

                      }

                        

                      
                        
                          // alert(datadesignation1.toString());
                          // var formateddatearr=[];
                          var formatedbenefice=[];
                          var formateddesignation=[];
                          var formatedquantity=[];
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
                                    var previousbenefice=formatedbenefice[position];
                                    formatedbenefice[position]=previousbenefice+databenefice1[i];
                                    var previousquantity=formatedquantity[position];
                                    formatedquantity[position]=previousquantity+dataquantity1[i];

                                }else{
                                    //add new elements
                                    formateddesignation.push(datadesignation1[i]);
                                    formatedbenefice.push(databenefice1[i]);
                                    formatedquantity.push(dataquantity1[i]);


                                }

                            }
                            



                          }
                          if(formateddesignation.length>0){
                            // alert(formateddesignation.toString());
                            // alert(formatedbenefice.toString());
                            formatedbenefice.forEach(item => {
                                  datatotalbenefice += item;
                                 });

                            // var data = [{
                            //       x:formateddesignation,
                            //       y:formatedquantity,
                            //       z:formatedbenefice,
                            //       type: "scatter",
                            //       mode: "lines",
                            //       name: 'Benefice Year',
                            //       line: {color: '#7F7F7F'}
                            //     }];
                                

                            // var layout = {title:"Sorti par article: "};
                            var trace1 = {
                                  x: formateddesignation,
                                  y: formatedquantity,
                                  name: 'Quantité',
                                  type: 'bar'
                                };

                                var trace2 = {
                                  x: formateddesignation,
                                  y: formatedbenefice,
                                  name: 'Benefice',
                                  type: 'bar'
                                };

                                var data = [trace1];

                                var layout = {barmode: 'group'};
                            document.getElementById("graphfreqsortigeneral").style.width = 'auto';
                            document.getElementById("graphfreqsortigeneral").style.height = '550px';
                            Plotly.newPlot("graphfreqsortigeneral", data, layout); 
                            

                          }else{
                            alert("no data to display");
                          }
  




  
 

}




</script>
</body>
</html>
