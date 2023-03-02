<?php
// Initialize the session
session_start();

 
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
               <script src="plotly-2.8.3.min.js"></script>

               <script type="text/javascript" src="../jqueryforperode1.js"></script>
<script type="text/javascript" src="../jqueryforperiode2.js"></script>
<script type="text/javascript" src="../jqueryforperiode3.js"></script>
<link rel="stylesheet" type="text/css" href="../jquerycssforperiode.css" />

</head>
<body>

<div class="header">
  <h1>Clinic </h1>
  <p>La Clinic  est une Clinique de réference.</p>
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
            <div id="frequencesorties">

                <h2>Frequence des sorties </h2>
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
                        <button onclick="dothisgraphperiodesortiarticle()">View</button>
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
                        <button onclick="dothisgraphrentabiliarticle()">Click</button>
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
   function dothisgraphrentabiliarticle(){

                         var x1 = document.getElementById("date3").value; 
                         var x2 = document.getElementById("date4").value;
                         var x3=x1+'|'+x2; 
                          document.getElementById("graphrentabiliarticle").style.width = 'auto';
                          document.getElementById("graphrentabiliarticle").style.height = '550px';
                          // document.getElementById("p2").style.background-color = 'yellow';
                                 alert(x3);

                     var periode=x3;
                        // alert(periode);
                          var data = { perio: 'perioderentabilarticl' ,content: periode};
                    $.get("apicmustock.php",data ,function(data){
                            // Display the returned data in browser
                            try {
                var as = JSON.parse(data);
                            // alert(as[0]['code']);
                            var quantity = [];
                            var name = [];
                            for (var i = 0; i < as.length; i++) {

                          quantity.push(as[i]['benefice']);
                          name.push(as[i]['designation'].toString()+' Qty: '+as[i]['quantity'].toString());
                          // name.push(i[0][0]);


                        } 

                      // alert(as.length);
                //       var dis=name.toString()+' '+quantity.toString();


                //             // $("#result").html(dis);
                //             var trace1 = {
                //     x:name,
                //     y: quantity,
                //     type: 'bar'
                // };

                // var data = [trace1];

                // var layout = {
                //     title: 'Rentabilité (benefice) par article',
                //     showlegend: false
                // };
                //   document.getElementById("graphrentabiliarticle").innerHTML = "";

                // Plotly.newPlot('graphrentabiliarticle', data, layout, {displaylogo: false});

                                var data = [{
                  type: "pie",
                  values:quantity,
                  labels: name,
                  texttemplate: "%{label}: %{value} (%{percent})",
                  textposition: "inside"
                }];

                Plotly.newPlot("graphrentabiliarticle", data);

                }
                catch(err) {
                  document.getElementById("graphrentabiliarticle").innerHTML = err.message;
                }
                            

                            // $("#frequencesorties").html(quantity[0]);
                            // drawsta();
                        });

    }

     function dothisgraphperiodesortiarticle(){

                         var x1 = document.getElementById("date1").value; 
                         var x2 = document.getElementById("date2").value;
                         var x3=x1+'|'+x2; 
                          document.getElementById("graphperiodesortiarticle").style.width = 'auto';
                          document.getElementById("graphperiodesortiarticle").style.height = '550px';
                          // document.getElementById("p2").style.background-color = 'yellow';
                                 alert(x3);

                     var periode=x3;
                        // alert(periode);
                          var data = { perio: 'periodesortiarticle' ,content: periode};
                    $.get("apicmustock.php",data ,function(data){
                            // Display the returned data in browser
                            try {
                var as = JSON.parse(data);
                            // alert(as[0]['code']);
                            var quantity = [];
                            var name = [];
                            for (var i = 0; i < as.length; i++) {

                          quantity.push(as[i]['quantity']);
                          name.push(as[i]['designation']);
                          // name.push(i[0][0]);


                        } 

                      // alert(as.length);
                      var dis=name.toString()+' '+quantity.toString();


                            // $("#result").html(dis);
                            var trace1 = {
                    x:name,
                    y: quantity,
                    type: 'bar'
                };

                var data = [trace1];

                var layout = {
                    title: 'situation de sorti par periode en article',
                    showlegend: false
                };
                  document.getElementById("graphperiodesortiarticle").innerHTML = "";

                Plotly.newPlot('graphperiodesortiarticle', data, layout, {displaylogo: false});

                }
                catch(err) {
                  document.getElementById("graphperiodesortiarticle").innerHTML = err.message;
                }
                            

                            // $("#frequencesorties").html(quantity[0]);
                            // drawsta();
                        });

    }

  $(document).ready(function(){
     
    var message='situationstock';
              var data = { perio: 'situationstock' ,content: 'periode'};

    // var data = { idcodeis: "situationstock" };
    $.get("apicmustock.php",data ,function(data){
            // Display the returned data in browser
            var as = JSON.parse(data);
            // alert(as[0]['code']);
            var quantity = [];
            var name = [];
            for (var i = 0; i < as.length; i++) {

          quantity.push(as[i]['quantity']);
          name.push(as[i]['designation']);
          // name.push(i[0][0]);


        } 

      // alert(as.length);
      var dis=name.toString()+' '+quantity.toString();


            // $("#result").html(dis);
            var trace1 = {
    x:name,
    y: quantity,
    type: 'bar'
};

var data = [trace1];

var layout = {
    title: 'situation du stock par article',
    showlegend: false
};

Plotly.newPlot('graphsituationstock', data, layout, {displaylogo: false});

            // $("#frequencesorties").html(quantity[0]);
            // drawsta();
        });








    $.get("sortigeneral.php" ,function(data){
            // Display the returned data in browser
            var as = JSON.parse(data);
            // alert(as[0]['code']);
            var quantity = [];
            var name = [];
            for (var i = 0; i < as.length; i++) {

          quantity.push(as[i]['frequence']);
          name.push(as[i]['designation']);
          // name.push(i[0][0]);


        } 

      // alert(as.length);
      var dis=name.toString()+' '+quantity.toString();


            // $("#result").html(dis);
            var trace1 = {
    x:name,
    y: quantity,
    type: 'bar'
};

var data = [trace1];

var layout = {
    title: 'frequence sorti general par article',
    showlegend: false
};

Plotly.newPlot('graphsortigeneral', data, layout, {displaylogo: false});

            // $("#frequencesorties").html(quantity[0]);
            // drawsta();
        });





});



</script>
</body>
</html>
