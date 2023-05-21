
<?php

   

              $codeis=$_POST['codeisca'];
              echo$codeis;
              
                 
           


         include('../../db/config.php');
          $sql = "SELECT code FROM fournisseurdb WHERE code = :code ";
                                         if($stmt = $pdo->prepare($sql)){
                                           $stmt->bindParam(":code", $codeis, PDO::PARAM_STR);

                                             if($stmt->execute()){

                                                    if($stmt->rowCount() >0){

                                                      $sql= "DELETE FROM fournisseurdb WHERE code = :codeis";

              if($stmt = $pdo->prepare($sql)){
                    
                      $stmt->bindParam(":codeis", $codeis, PDO::PARAM_STR);
                      
                        if($stmt->execute()){
                          $sql = "SELECT code FROM fournisseurdb WHERE code = :code ";
                                         if($stmt = $pdo->prepare($sql)){
                                           $stmt->bindParam(":code", $codeis, PDO::PARAM_STR);

                                             if($stmt->execute()){

                                                    if($stmt->rowCount() ==0){
                                                                                     echo "<script>alert('Success!');</script>";
                                                                                                                      header("location: fournisseurmanage.php");



                                                    }}}




                        }
                        else{
                                      // echo "This is a problem ";
                                                                     echo "<script>alert('Invalid!');</script>";


                        }
                      }
                      else{
                                                                     echo "<script>alert('Invalid!');</script>";

                        }


                                                    }}}



           
        

?>


 