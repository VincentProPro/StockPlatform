<?php
    // ob_start(); // Initiate the output buffer
    error_reporting(0);

// Initialize the session
session_start();
// require("../config.php");
require("viewsurveillante.php");

                    include('../db/config.php');

 
// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: ../logout.php");
//     exit;
// }
include("../component/headpart.php"); 
?>
 

<body>



<?php include("../component/headersection.php"); ?>
<?php include("../menu/menusurveillante.php"); ?>


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
    <h2>Magasin Stock Liste</h2>
        <h3>Voulez vous rechercher un article?</h3>
        <input type="text" id="mysearchInput" onkeyup="myFunction()" placeholder="Rechercher ici.." title="Type in a name">
        <div class="retraitarticleperunit">
          <div class="wrapper">


                <table id="myTable">
                  <tr class="header">
                    <th style="width:40%;">Article</th>
                    <th style="width:15%;">Groupe Code</th>
                    <th style="width:15%;">Quantité</th>
                    <th style="width:15%;">Format</th>
                    <th style="width:15%;">Quantité Unité</th>

                  </tr>
                  
                  <?php 
                  foreach($stockmagasin as $element){

                    ?>
                    <tr>     
                      <td contentEditable ><?php echo $element["designation"]; ?></td>              
                      <td><?php echo $element["groupcode_article"]; ?></td>                                              
                      <td><?php echo $element["quantity"]; ?></td>                                              
                      <td><?php echo $element["formatnom"]; ?></td> 
                      <td><?php echo $element["quantityperunit"]; ?></td>                                              
                    </tr>

                    <?php

                  }

                  ?>
                  
                </table>   
          </div>

        </div>
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
  <?php include("../component/profile.php");?>
    <?php include("../component/role.php"); ?>

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

<?php include("../component/pieddepage.php"); ?>

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
function myFunction() {
  var input, filter, table, tr, td, i,j, txtValue;
  input = document.getElementById("mysearchInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    
    td = tr[i].getElementsByTagName("td")[0];
    td2 = tr[i].getElementsByTagName("td")[1];
    td3 = tr[i].getElementsByTagName("td")[2];
    td4 = tr[i].getElementsByTagName("td")[3];
    td5 = tr[i].getElementsByTagName("td")[4];
    td6 = tr[i].getElementsByTagName("td")[5];
      
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
     
  }
}
</script>
</body>
</html>

<?php
ob_end_flush();
    ?>

<?php
    ob_end_flush(); // Flush the output from the buffer
?>