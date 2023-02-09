<?php
    ob_start(); // Initiate the output buffer
?>
<?php
// Initialize the session
session_start();
// require("../config.php");
require("viewsurveillante.php");

                    include('../config.php');

 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: ../logout.php");
//     exit;
// }
?>
 
<!DOCTYPE html>
<html>
<head>
<!-- 	<meta charset="ISO-8859-1">
 -->
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="../cliniccss.css">
<link rel="stylesheet" href="../css/style2.css">

</head>
<body>

<div class="header">
  <h1>Clinic  d'Afrique</h1>
  <p>La Clinic  d'Afrique est une Clinique de réference.</p>
</div>

<div class="topnav">
  <a href="#">Accueil</a>
  <a href="#">Connexion</a>
  <a href="#">Apropos</a>
<!--   <a href="#" style="float:right">Link</a>
 -->
</div>

<div class="row">
  <div class="leftcolumn">
      <div class="card shadowexempl">
         <center>  <?php 
      if(isset($_COOKIE['messagedisplay'])) : ?>
       

         <div class="alerttext">
          
          <p>
            <?php echo $_COOKIE['messagedisplay']; ?></p>
          </div>
            <?php endif; ?>

          </center>
        <h4>Voir Commandes</h4>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'recent')">Recent</button>
  <button class="tablinks" onclick="openCity(event, 'nonexecuter')">Non Executer</button>
  <button class="tablinks" onclick="openCity(event, 'nonvalider')">Non Valider</button>
  <button class="tablinks" onclick="openCity(event, 'executer')">Executer</button>
  <button class="tablinks" onclick="openCity(event, 'valider')">Valider</button>
</div>

<div id="recent" class="tabcontent">
  <h3>Commandes Récentes</h3>
     <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandenonvalid as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>


      </div>

<div id="nonexecuter" class="tabcontent">
  <h3>Comande Non Executer</h3>
  <p>Clicker sur executer pour signaler que la Commande a été faite.</p> 
     <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandNonExecuter as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
          <form method="POST" action="apisurveillante.php">
            <input type="hidden" name="formulaire" value="executer">
            <input type="hidden" name="matricule" value="<?php echo$commande[0]; ?>">
            <button type="submit">Executer</button>
          </form>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>
</div>

<div id="nonvalider" class="tabcontent">
  <h3>Commande Non Valider</h3>
  <p>Rappeler la comptabe pour la validation de ces commandes</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandenonvalid as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>

</div>

<div id="valider" class="tabcontent">
  <h3>Commande Valider</h3>
  <p>Commande(s) validée(s) par la comptabe</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandevalid as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
      }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>

        <?php 
        echo"n result";
      }

      ?>

      
          
     </div>
    
  </div>

</div>

<div id="executer" class="tabcontent">
  <h3>Commande Executer</h3>
  <p>Liste des Commandes Executer</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($boncommandExecuter as $commande){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Commande</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$commande[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Description: </span><span><?php echo$commande[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$commande[3]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Situation: </span><span><?php echo$commande[5]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Statu: </span><span><?php echo$commande[6]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>

</div>


       
      </div>
  <div class="card shadowexempl">
        <div class="tab">
           <button class="tablinks" onclick="openCity(event, 'achatentrernonvalid')">Achat Non Valider</button>
            <button class="tablinks" onclick="openCity(event, 'achatentrervalid')">Achat Valider</button>
             <button class="tablinks" onclick="openCity(event, 'achatcoursiervalider')">Achat Coursier Validé</button>
            <button class="tablinks" onclick="openCity(event, 'achatcoursiernonvalider')">Achat Coursier Non Validé</button>
            


        </div>

<div id="achatcoursiernonvalider" class="tabcontent">
  <h3>Achat Coursier Non Validé</h3>
  <p>Clicker sur valider pour inserer dans le stock.</p> 
     <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($achatCoursiernonValider as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Achat Coursier </h5>
          <div class="row">
            <div class="columnfit"><span>Article: </span><span><?php echo$object[1]; ?></span></div>
          </div>

          <div class="row">
            <div class="columnfit"><span>Description: </span><span><?php echo$object[7]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Prix Achat: </span><span><?php echo$object[4]; ?> CFA</span></div>

          </div>


          <div class="row">
            <div class="columnfit"><span>Quantity: </span><span><?php echo$object[2]; ?></span></div>
          </div>

           <div class="row">
            <div class="columnfit"><span>Quantité par Unité: </span><span><?php echo$object[3]; ?></span></div>
          </div>
                     <div class="row">
            <div class="columnfit"><span>Format: </span><span><?php echo$object[9]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Facture Numero: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Commande: </span><span><?php echo$object[5]; ?></span></div>

          </div>   
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[8]; ?></span></div>

          </div>
          <form method="POST" action="apisurveillante.php">
            <input type="hidden" name="formulaire" value="achatcoursier">
            <input type="hidden" name="matricule" value="<?php echo$object[0]; ?>">
            <button type="submit">Validé</button>
          </form>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>
</div>

<div id="achatcoursiervalider" class="tabcontent">
  <h3>Achat Coursier Validé</h3>
  <p>Liste des Achat Coursier Validé</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($achatCoursierValider as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Achat Coursier</h5>
          <div class="row">
            <div class="columnfit"><span>Article: </span><span><?php echo$object[1]; ?></span></div>
          </div>

          <div class="row">
            <div class="columnfit"><span>Description: </span><span><?php echo$object[7]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Prix Achat: </span><span><?php echo$object[4]; ?> CFA</span></div>

          </div>


          <div class="row">
            <div class="columnfit"><span>Quantity: </span><span><?php echo$object[2]; ?></span></div>
          </div>

           <div class="row">
            <div class="columnfit"><span>Quantité par Unité: </span><span><?php echo$object[3]; ?></span></div>
          </div>
                     <div class="row">
            <div class="columnfit"><span>Format: </span><span><?php echo$object[9]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Facture Numero: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Commande: </span><span><?php echo$object[5]; ?></span></div>

          </div>   
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[8]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>

</div>

<div id="achatentrernonvalid" class="tabcontent">
  <h3>Achat Entrer Non Validé</h3>
      <!--   <p>Rappeler la comptabe pour la validation de ces commandes</p>
       -->   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($achatentrernonvalid as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Achat Entrer Non Validé</h5>
          <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$object[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Fournisseur: </span><span><?php echo$object[3]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$object[2]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Commande: </span><span><?php echo$object[4]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[5]; ?></span></div>

          </div>
          
           <form method="POST" action="apisurveillante.php">
            <input type="hidden" name="formulaire" value="validerachatentrer">
            <input type="hidden" name="matricule" value="<?php echo$object[0]; ?>">
            <button type="submit">Valider</button>
          </form>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>

</div>

<div id="achatentrervalid" class="tabcontent">
  <h3>Achat Entrer Validé </h3>
  <p>Achat Entrer Validé(s) par la surveillante</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($achatentrervalid as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Achat Entrer Validé</h5>
         <div class="row">
            <div class="columnfit"><span>Libelé: </span><span><?php echo$object[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Fournisseur: </span><span><?php echo$object[3]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Tarif: </span><span><?php echo$object[2]; ?></span></div>
          </div>
         
          <div  class="row">
            
           <div class="columnfit"><span>Commande: </span><span><?php echo$object[4]; ?></span></div>
          </div>
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[5]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
      }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>

        <?php 
        echo"n result";
      }

      ?>

      
          
     </div>
    
  </div>

</div>


        

      </div>


  <div class="card shadowexempl">
        <div class="tab">
          
             <button class="tablinks" onclick="openCity(event, 'sortinonexecuter')">Sorti Non Executer</button>
            <button class="tablinks" onclick="openCity(event, 'sortiexecuter')">Sorti Executer</button>
            <button class="tablinks" onclick="openCity(event, 'sortidetailnonvalid')">Sorti Detail Non Valider</button>
            <button class="tablinks" onclick="openCity(event, 'sortidetailvalid')">Sorti Detail Valider</button>


        </div>


<div id="sortinonexecuter" class="tabcontent">
      <h3>Sorti Non Executer</h3>
    <!--   <p>Clicker sur executer pour signaler que la Sorti a été faite.</p> 
     -->  
      <p>Liste des Sorties Non executées.</p> 
         <div class="wrapper">
         <div class="row">
          <?php
          try{
            foreach($sortimagasinNonExecuter as $object){
              ?>
              
              <div class="carddisplay columnfit">
              <h5>   🗒Sortie</h5>
              <div class="row">
                <div class="columnfit"><span>Libelé: </span><span><?php echo$object[1]; ?></span></div>
              </div>
              <div class="row">
                  <div class="columnfit"><span>Magasin: </span><span><?php echo$object[5]; ?></span></div>

              </div>
              <div class="row">
                <div class="columnfit"><span>Module: </span><span><?php echo$object[4]; ?></span></div>
              </div>
             
              <div  class="row">
                
               <div class="columnfit"><span>Date: </span><span><?php echo$object[3]; ?></span></div>
              </div>
              <div class="row">
                          <div class="columnfit"><span>Statut: </span><span><?php echo$object[2]; ?></span></div>

              </div>
              <form method="POST" action="apisurveillante.php">
                <input type="hidden" name="formulaire" value="executersorti">
                <input type="hidden" name="matricule" value="<?php echo$object[0]; ?>">
                <button type="submit">Executer</button>
              </form>
             
            
              
            </div>
              <?php 
            }
             }catch(Exception $ex){
            ?>
            <i>Aucun resultat</i>
            <?php 
          }

          ?>

      
          
     </div>
    
  </div>
</div>





<div id="sortiexecuter" class="tabcontent">
  <h3>Sortie(s) Executer</h3>
  <p>Liste des Sorties Executer</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($sortimagasinExecuter as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒Sortie</h5>
          <div class="row">
                <div class="columnfit"><span>Libelé: </span><span><?php echo$object[1]; ?></span></div>
              </div>
              <div class="row">
                  <div class="columnfit"><span>Magasin: </span><span><?php echo$object[5]; ?></span></div>

              </div>
              <div class="row">
                <div class="columnfit"><span>Module: </span><span><?php echo$object[4]; ?></span></div>
              </div>
             
              <div  class="row">
                
               <div class="columnfit"><span>Date: </span><span><?php echo$object[3]; ?></span></div>
              </div>
              <div class="row">
                          <div class="columnfit"><span>Statut: </span><span><?php echo$object[2]; ?></span></div>

              </div>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>

</div>
<div id="sortidetailnonvalid" class="tabcontent">
  <h3>Sortie Detail Magasin Non Validé</h3>
      <!--   <p>Rappeler la comptabe pour la validation de ces commandes</p>
       -->   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($retraitdetailnonvalid as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Sortie Detail Non Validé</h5>
          <div  class="row">
            
           <div class="columnfit"><span>Libelé: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
            <div class="columnfit"><span>Article: </span><span><?php echo$object[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Quantité: </span><span><?php echo$object[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Qté par unité: </span><span><?php echo$object[3]; ?></span></div>
          </div>
         
          
          <div class="row">
                      <div class="columnfit"><span>format: </span><span><?php echo$object[8]; ?></span></div>

          </div>
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[7]; ?></span></div>

          </div>
          
           <form method="POST" action="apisurveillante.php">
            <input type="hidden" name="formulaire" value="validerSortidetail">
            <input type="hidden" name="matricule" value="<?php echo$object[0]; ?>">
            <button type="submit">Valider</button>
          </form>
         
        
          
        </div>
          <?php 
        }
         }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>
        <?php 
      }

      ?>

      
          
     </div>
    
  </div>

</div>

<div id="sortidetailvalid" class="tabcontent">
  <h3>Sortie Detail Magasin Validé </h3>
  <p>Sortie Detail Magasin Validé(s) par la surveillante</p>
   <div class="wrapper">
     <div class="row">
      <?php
      try{
        foreach($retraitdetailvalid as $object){
          ?>
          
          <div class="carddisplay columnfit">
          <h5>   🗒 Sortie Detail Validé</h5>
          <div  class="row">
            
           <div class="columnfit"><span>Libelé: </span><span><?php echo$object[6]; ?></span></div>
          </div>
          <div class="row">
            <div class="columnfit"><span>Article: </span><span><?php echo$object[1]; ?></span></div>
          </div>
          <div class="row">
              <div class="columnfit"><span>Quantité: </span><span><?php echo$object[2]; ?></span></div>

          </div>
          <div class="row">
            <div class="columnfit"><span>Qté par unité: </span><span><?php echo$object[3]; ?></span></div>
          </div>
         
          
          <div class="row">
                      <div class="columnfit"><span>format: </span><span><?php echo$object[8]; ?></span></div>

          </div>
          <div class="row">
                      <div class="columnfit"><span>Date: </span><span><?php echo$object[7]; ?></span></div>

          </div>
         
        
          
        </div>
          <?php 
        }
      }catch(Exception $ex){
        ?>
        <i>Aucun resultat</i>

        <?php 
        echo"n result";
      }

      ?>

      
          
     </div>
    
  </div>

</div>
        

      </div>
<!--    <div class="card shadowexempl">
     
              <h2>Inventaire stocks Magasin</h2>
              <h5>Surveillante Fonction</h5>
              <form  method="POST" action="apisurveillante.php">
                <div>
                    <label for="codearticl"><b>Code Article</b></label>
                  <input type="text" name="codearticl"> <label for="artcl"><b>Article</b></label>
                  <input type="text" name="artcl"> 
                  </div>
               

                  <label for="quantite"><b>Quantité réelle</b></label>
                  <input type="number" name="quantite"> 

                   <label for="poids"><b>Poids Réel</b></label>
                  <input type="number" name="poids">
                  <br>
                   
                   <label for="situation"><b>Situation</b></label>
                  <input type="text" name="situation"><label for="period"><b>Période</b></label>
                  <input type="text" name="period">
                  <br>
                  <br>

                 
              <label for="date"><b>Date</b></label>
              <input type="date"  name="date" required>
              <label for="time"><b>Time</b></label>
              <input type="time"  name="time" required>
              <br> <br> 
                        <label for="validation"><b>validation de sortie par le Boss</b></label>


              <input name="validation" type="checkbox" >
                    <button type="submit" name="button1">Envoyé</button>
              </form>

              <p>Autres fonctions...</p>
              <p>Le ou la comptable est chargé de vérifier et valider les entrées et sorties d'articles, produire l'inventaire et génerer les statistics sur la consommation interne, faire des prévisions de consommation.</p>
    </div> -->


    <div class="card shadowexempl">
        <h2>Demande De Commande</h2>
        <h5>Besion Clinic</h5>
 
          <div><form  method="POST" action="apisurveillante.php">
            <div>
                          <label for="magasin"><b>Magasin </b></label>

               <select name="magasin">

           <?php
   
              // $query=mysqli_query($conn,"select * from `users`");
              $sql = "SELECT DISTINCT nom , code FROM magasintable";
                
                // Set parameters
                // $param_username = trim($_POST["email"]);
            
            if($stmt = $pdo->prepare($sql)){

                
                if($stmt->execute()){
                                            
                    if($stmt->rowCount()>0){
                                          $arrayelement= $stmt->fetchAll();
                                          foreach($arrayelement as $roleelement){
                                            ?> 
                                              <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                            <?php
                                          }  }}}?>
                                            </select><br><br><br>
                                                     <label for="situation"><b>Situation </b></label>

               <select name="situation">

           <?php
   
              // $query=mysqli_query($conn,"select * from `users`");
              $sql = "SELECT DISTINCT nom , code FROM situation";
                
                // Set parameters
                // $param_username = trim($_POST["email"]);
            
            if($stmt = $pdo->prepare($sql)){

                
                if($stmt->execute()){
                                            
                    if($stmt->rowCount()>0){
                                          $arrayelement= $stmt->fetchAll();
                                          foreach($arrayelement as $roleelement){
                                            ?> 
                                              <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                            <?php
                                          }  }}}?>
                                            </select><br><br><br>
                 

              

              <label for="libeller"><b>Libellé </b></label>
              <input type="text" name="libeller"> 

              <label for="description"><b>Description </b></label>
              <input type="text" name="description"> 

              <label for="tarif"><b>Tarif</b></label>
              <input type="text" name="tarif"> 
              </div>



                        <input type="hidden" name="formulaire" value="bondecommande"> 

         
             
             

            

          <br> <br> 
           
          <button type="submit" name="button2">Envoyé</button>
              
            </form></div>
            <p>Autres fonctions..</p>

          <p>Le ou la surveillante est chargé de faire l'inventaire, evaluer les besoins de la clinics. Vérifier et valider les entrées et sorties d'articles, produire l'inventaire et génerer les statistics sur la consommation interne, faire des prévisions de consommation.</p>
    </div>
    <div class="card shadowexempl">
            <div id="retraitarticle">
                  <h2>Retrait d'Article magasin</h2>
                  <h5>Gestionaire de Stock Fonction</h5>

                    <div><form method="POST" action="apisurveillante.php">
                      <div>
                         <label for="magasin"><b>Magasin </b></label>

                         <select name="magasin">

                     <?php
             
                        include('../config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT nom , matricule FROM magasintable";
                        
                        // Set parameters
                        // $param_username = trim($_POST["email"]);
                    
                    if($stmt = $pdo->prepare($sql)){

                        
                        if($stmt->execute()){
                                                    
                            if($stmt->rowCount()>0){
                                                  $arrayrole= $stmt->fetchAll();
                                                  foreach($arrayrole as $roleelement){
                                                    ?> 
                                                      <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                                    <?php
                                                  }  }}}?>
                                                    </select><br><br><br>
                       

                      <label for="libeller"><b>Libellé </b></label>
                      <input type="text" name="libeller" required> <label for="modulecode"><b>Module</b></label>
                      <select name="modulecode">

                     <?php
             
                      include('../config.php');
                      // $query=mysqli_query($conn,"select * from `users`");
                      $sql = "SELECT DISTINCT nom , matricule FROM module";
                        
                        // Set parameters
                        // $param_username = trim($_POST["email"]);
                    
                    if($stmt = $pdo->prepare($sql)){

                        
                        if($stmt->execute()){
                                                    
                            if($stmt->rowCount()>0){
                                                  $arrayrole= $stmt->fetchAll();
                                                  foreach($arrayrole as $roleelement){
                                                    ?> 
                                                      <option value="<?php echo $roleelement[1];?>"><?php echo $roleelement[0];?></option>
                                                    <?php
                                                  }  }}}?>
                                                    </select>




                      </div>
                        
                       
                       <!-- <label for="fourni"><b>Fournisseur </b></label>
                  <input type="text" placeholder="Entrer le fournisseur" name="fourni" required> -->

                    

                      <!-- <label for="comandnum"><b>Numéro Commande</b></label>
                  <input type="text" placeholder="Entrer le numéro de la commande" name="comandnum" required>
                  <label for="facturnum"><b>Numéro Facture</b></label>
                  <input type="text" placeholder="Entrer le numéro de la facture" name="facturnum" required> -->
                 <!--  <label for="datesorti"><b>Date</b></label>
                  <input type="date"  name="datesorti" required>
                  <br> <br>  -->
                           
                  <br> <br> 
                  <input type="hidden" name="formulaire" value="sortimagasin">
                   
                  <button type="submit" name="button2">Envoyé</button>
                      
                    </form></div>
                    <p>Autres fonctions..</p>
                  <p>Le Gestionaire de stock est aussi chargé d'ajouter dans la base de donnée des nouveaux fournisseurs, catégories et articles.</p>
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
    <?php 
    if($_SESSION['role']=="SuperAdmin"){

      ?>
      <div class="card">
      <h3>Type Role</h3>
      <div class="rolebtn"><a href="../coursier/welcomecoursier.php"><button >Coursier</button></div>
      <div class="rolebtn"><a href="../gestionnairestock/welcomestocker.php"><button >Gestionnaire de Stock</button></div>
      <div class="rolebtn"><a href="../cmu/welcomecmu.php"><button >Gestion CMU</button></div>
      <div class="rolebtn"><a href="../comptable/welcomecomptable.php"><button >Comptable</button></div>
      <div class="rolebtn"><a href="../caisse/welcomecaisse.php"><button >Caisse</button></div>
      <div class="rolebtn"><a href="#"><button >Surveillante</button></div>
      <div class="rolebtn"><a href="a.p"><button >Admin</button></div>
      <div class="rolebtn"><a href="../welcomesuperAdmin.php"><button >Super Admin</button></div>
      
      <a href="logout.php"><button class="fakeimg" >Log Out</button></a>
    </div>

      <?php
    }

    ?>
     <div class="card">
       <h3>Laisser un Commentaire</h3>
      
      <form>
        <label>A qui?</label>
         <select name="aqui">

         <?php
 
   // include('../config.php');
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
                                      }  }}}
                                          // unset($pdo);
?>
                                        </select><br><br>

        <label>Object:</label>
        <input type="text" name="" placeholder="L'object du sujet">
        
   
        <textarea placeholder="Entrer votre message ici"> Entrer votre message ici</textarea>
              <button type="submit">Envoyé</button>

      </form>
    </div>

    <div class="card">
       <h3>Lire les Messages</h3>
      
      <button >Lire</button>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>
<script>
function openCity(evt, object) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(object).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</body>
</html>

<?php
ob_end_flush();
                    // include('../config.php');
// error_reporting(0);

//         if(array_key_exists('buttonyy1', $_POST)) {
//             button1();
//         }
//         else if(array_key_exists('buttonyy2', $_POST)) {
//             button2();
//         }
//         function button1() {
//             echo "This is Button1 that is selected";
//         }
//         function button2() {


//         $magasin=$_POST['magasin'];
//         $description=$_POST['description'];

//         $libeller=$_POST['libeller'];
//         $tarif=$_POST['tarif'];
//         $t=time();
//         $datereel=date("Y-m-d",$t);
//         $idtimetable_err='' ;
//         $comandnum=trim($_POST["comandnum"]);
//         $redacteurcode=$_SESSION["email"];
//        if(empty($comandnum)){
//               $idtimetable_err = "Please enter command num.";
//               echo $idtimetable_err;
//           } else{
//               $comandnum = trim($_POST["comandnum"]);
//           }

//         if(empty($idtimetable_err) ){


//                     //start
//                     $sql = "SELECT * FROM bondecommandedb WHERE code = :comandnum";
//                        include('../config.php');


//                     if($stmt = $pdo->prepare($sql)){
//                     // Bind variables to the prepared statement as parameters
//                     $stmt->bindParam(":comandnum", $comandnum, PDO::PARAM_STR);
              
//                     // Set parameters
//                     $comandnum = trim($_POST["comandnum"]);
                    
//                     // Attempt to execute the prepared statement
//                           if($stmt->execute()){


//                                 if($stmt->rowCount() ==0){
//                                      //let go
//                                      try{



//                                               $sql="insert into  bondecommandedb (code,libeller,tarif,magazincode,description,lastmodification,redacteurcode) values (:comandnum, :libeller, :tarif,:magasin,:description,:lastmodification,:redacteurcode)";

//                                               if($stmt = $pdo->prepare($sql)){

//                                                     $stmt->bindParam(":comandnum", $comandnum, PDO::PARAM_STR);

//                                                     $stmt->bindParam(":description", $description, PDO::PARAM_STR);
//                                                     $stmt->bindParam(":libeller", $libeller, PDO::PARAM_STR);
//                                                     $stmt->bindParam(":tarif", $tarif, PDO::PARAM_STR);
//                                                     $stmt->bindParam(":magasin", $magasin, PDO::PARAM_STR);
//                                                     $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
//                                                     $stmt->bindParam(":redacteurcode", $redacteurcode, PDO::PARAM_STR);

                                  
          
           
            
//                                                           // Attempt to execute the prepared statement
//                                                           if($stmt->execute()){

//                                                                       $sql = "SELECT * FROM bondecommandedb WHERE code = :comandnum";
                                                      
//                                                                   if($stmt = $pdo->prepare($sql)){
//                                                                       // Bind variables to the prepared statement as parameters
//                                                                       $stmt->bindParam(":comandnum", $comandnum, PDO::PARAM_STR);
            
//                                                                               // Set parameters
//                                                                               //$idSession = trim($_POST["idSession"]);
                                                                              
//                                                                               // Attempt to execute the prepared statement
//                                                                               if($stmt->execute()){
//                                                                                   // Check if username exists, if yes then verify password
//                                                                                   if($stmt->rowCount() >0){
//                                                                                       $arraystable= $stmt->fetchAll();
                                                                                         
//                                                                                           $options['expires']=time()+30;
//                                                                                           $message="Le besoin de , a bien ete signale";
//           setcookie("messagedisplay",$message,$options);
//               // header("location: viewregisclub.php");
//                                                                                                     unset($pdo);


                                                                                                      
//                                                                                                             // http_response_code(205);


//                                                                                               // show products data in json format
//                                                                                                                           //echo"hello";

                                                                                                                      
//                                                                                   }
//                                                                                   else{
//                                                                                       echo  "Course add fails ";
//                                                                                           http_response_code(201);
//                                                                                           $message="This comandnum has not been added";
//                                                                                            $options['expires']=time()+30;
//                                                                                           $message="Le besoin de ibeller, n'a pas ete enregistrer. Veuillez retenter";
//           setcookie("messagedisplay",$message,$options);

//                                                                                           echo json_encode($message);
//                                                                                   }
//                                                                               }
//                                                                               else{
//                                                                                     echo  "Course Add fails ";
//                                                                                             http_response_code(201);
//                                                                                             $message="This comandnum has not been added";

//                                                                                             echo json_encode($message);
//                                                                               }
//                                                                   }
//                                                                   else{
//                                                                     echo "canot execute select";
//                                                                   }


//                                                               //echo "good good";
//                                                           }
//                                                           else{
//                                                               echo "canot execute insert";
//                                                           }



//                                                           }
//                                                           else{
//                                                               echo " canot insert comandnum";
//                                                           }

// }

                                                                  
//                                         catch(exception $e){
//                                            $message="This comandnum has not been added";
//                                                                                            $options['expires']=time()+30;
//                                                                                           $message="Le besoin de libeller, n'a pas ete enregistrer. Veuillez retenter. Voici l'erreur: ".$e;
//           setcookie("messagedisplay",$message,$options);
//                                                   // echo"try again".$e;
                                                  

//                                         }

//                 }else{
//                     echo  "comandnum Add fails, course code exists ";
//                         http_response_code(201);
//                         $message="This comandnum has not been added because comandnum code exists already";

//  $options['expires']=time()+30;                                                                          
// $message="Le besoin de libeller, n'a pas ete enregistrer. Veuillez retenter.";
// setcookie("messagedisplay",$message,$options);
//               header("location: welcomsurveillante.php");
//               }


//             }else{
//                 echo "something went wrong in execute()";
//             }
//         }else{
//                 echo "canot do the stmt = pdo->prepare(sql)something went wrong";
//             }
//              unset($stmt);
// }else{
//     echo  "comand Add fails,  code is required ";
//                         http_response_code(201);
//                         $message="This comand has not been added because  code is required field";

//                         echo json_encode($message);
// }

        
//       }
//           unset($pdo);


    ?>

<?php
    ob_end_flush(); // Flush the output from the buffer
?>