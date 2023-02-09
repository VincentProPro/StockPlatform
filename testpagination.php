
  <html>   
      <head>   
        <title>Pagination</title>   
        <link rel="stylesheet"  
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
        <style>   
        table {  
            border-collapse: collapse;  
        }  
            .inline{   
                display: inline-block;   
                float: right;   
                margin: 20px 0px;   
            }   
             
            input, button{   
                height: 34px;   
            }   
      
        .pagination {   
            display: inline-block;   
        }   
        .pagination a {   
            font-weight:bold;   
            font-size:18px;   
            color: black;   
            float: left;   
            padding: 8px 16px;   
            text-decoration: none;   
            border:1px solid black;   
        }   
        .pagination a.active {   
                background-color: pink;   
        }   
        .pagination a:hover:not(.active) {   
            background-color: skyblue;   
        }  
        .invisi {
    display: none;
        visibility: hidden;

} 
            </style>   
      </head>   
      <body>   
      <center>  
        <?php  
          
        // Import the file where we defined the connection to Database.     
            require_once "conn.php";   
        
            $per_page_record = 4;  // Number of entries to show in a page.   
            // Look for a GET variable page if not found default is 1.        
            if (isset($_GET["page"])) {    
                $page  = $_GET["page"];    
            }    
            else {    
              $page=1;    
            }    
        
            $start_from = ($page-1) * $per_page_record;     
        
            $query = "SELECT * FROM achatcoursier WHERE validationstocker=false LIMIT $start_from, $per_page_record";     
            $rs_result = mysqli_query ($con, $query);    
        ?>    
      
        <div class="container">   
          <br>   
          <div>   
            <h1>Pagination Simple Example</h1>   
            <p>This page demonstrates the basic    
               Pagination using PHP and MySQL.   
            </p>   
            <table class="table table-striped table-condensed    
                                              table-bordered">   
              <thead>   
                <tr>   
                  <th width="10%">codearticle</th>   
                  <th width="10%">article</th>   
                  <th>prixachat</th>   
                  <th>quantity</th>   
                  <th>quantityperunit</th>   
                  <th></th>   
                </tr>   
              </thead>   
              <tbody>   
        <?php     
                while ($row = mysqli_fetch_array($rs_result)) {    
                      // Display each field of the records.    
                ?>     
                <tr>     
                 <td><?php echo $row["codearticle"]; ?></td>     
                 <td>

                    <?php 
                    $article="";
$sql = "SELECT designation FROM article WHERE code = :code";
// error_reporting(0);

     include('config.php');

                                         if($stmt = $pdo->prepare($sql)){
                                           $stmt->bindParam(":code", $row["codearticle"], PDO::PARAM_STR);

                                             if($stmt->execute()){

                                                    if($stmt->rowCount() >0){
                                                    $arrtable= $stmt->fetchAll();
                                                    $article=$arrtable[0][0];}}}
                    echo $article; ?></td>     
                <td><?php echo $row["prixachat"]; ?></td>   
                <td><?php echo $row["quantity"]; ?></td>   
                <td><?php echo $row["quantityperunit"]; ?></td>                                           
                <td><form method="POST"> 
                    <div class="invisi">
                                        <input type="hidden"  name="idcode" value="<?php echo $row["code"]; ?>">
</div>
                    <input type="submit" name="valid" id="<?php echo $row["code"]; ?>" value="Valider"></form>
                </td>                                           
                </tr>     
                <?php     
                    };    
                ?>     
              </tbody>   
            </table>   
      
         <div class="pagination">    
          <?php  
            $query = "SELECT COUNT(*) FROM achatcoursier";     
            $rs_result = mysqli_query($con, $query);     
            $row = mysqli_fetch_row($rs_result);     
            $total_records = $row[0];     
              
        echo "</br>";     
            // Number of pages required.   
            $total_pages = ceil($total_records / $per_page_record);     
            $pagLink = "";       
          
            if($page>=2){   
                echo "<a href='testpagination.php?page=".($page-1)."'>  Prev </a>";   
            }       
                       
            for ($i=1; $i<=$total_pages; $i++) {   
              if ($i == $page) {   
                  $pagLink .= "<a class = 'active' href='testpagination.php?page="  
                                                    .$i."'>".$i." </a>";   
              }               
              else  {   
                  $pagLink .= "<a href='testpagination.php?page=".$i."'>   
                                                    ".$i." </a>";     
              }   
            };     
            echo $pagLink;   
      
            if($page<$total_pages){   
                echo "<a href='testpagination.php?page=".($page+1)."'>  Next </a>";   
            }   
      
          ?>    
          </div>  
      
      
          <div class="inline">   
          <input id="page" type="number" min="1" max="<?php echo $total_pages?>"   
          placeholder="<?php echo $page."/".$total_pages; ?>" required>   
          <button onClick="go2Page();">Go</button>   
         </div>    
        </div>   
      </div>  
    </center>   
      
      <?php
       if(array_key_exists('valid', $_POST)) {
            updateadd();
        }
function updateadd(){
    $validationstockerdefaut=false;
                $codeis=$_POST['idcode'];
                 $codearticle="";
            $poids="";
            $quantity=0;
            $t=time();
            $datereel=date("Y-m-d H:i:s",$t);
                    $redacteurcode="gastron@gmail.com";


    $validationstocker=true;
         include('config.php');



    $sql = "SELECT code FROM achatcoursier WHERE code = :code AND validationstocker=:validationstocker";
                                         if($stmt = $pdo->prepare($sql)){
                                           $stmt->bindParam(":code", $codeis, PDO::PARAM_STR);
                                           $stmt->bindParam(":validationstocker", $validationstockerdefaut, PDO::PARAM_STR);

                                             if($stmt->execute()){

                                                    if($stmt->rowCount() >0){
                                                        $sql="Update  achatcoursier Set validationstocker=:validationstocker WHERE code = :code";

              if($stmt = $pdo->prepare($sql)){
                      $stmt->bindParam(":validationstocker", $validationstocker, PDO::PARAM_STR);
                      $stmt->bindParam(":code", $codeis, PDO::PARAM_STR);
                        if($stmt->execute()){
                            $sql = "SELECT codearticle, poids,quantity FROM achatcoursier WHERE code = :code";
                                         if($stmt = $pdo->prepare($sql)){
                                           $stmt->bindParam(":code", $codeis, PDO::PARAM_STR);

                                             if($stmt->execute()){

                                                    if($stmt->rowCount() >0){
                                                    $arraystable= $stmt->fetchAll();
                                                    $codearticle=$arraystable[0][0];
                                                    $poids=$arraystable[0][1];
                                                    $quantity=$arraystable[0][2];
                                                }}}
                            $sql = "SELECT * FROM stocktable WHERE codearticle = :codearticle";
                                         if($stmt = $pdo->prepare($sql)){
                                           $stmt->bindParam(":codearticle", $codearticle, PDO::PARAM_STR);

                                             if($stmt->execute()){

                                                    if($stmt->rowCount() >0){
                                                    $arraystable= $stmt->fetchAll();
                                                    $previousqtity=$arraystable[0][1];
                                                    $reelqty=$previousqtity+$quantity;
                                                    $sql="Update  stocktable Set quantity=:quantity WHERE codearticle = :codearticle";

                                                        if($stmt = $pdo->prepare($sql)){
                                                           $stmt->bindParam(":quantity", $reelqty, PDO::PARAM_STR);
                                                               $stmt->bindParam(":codearticle", $codearticle, PDO::PARAM_STR);

                                                                if($stmt->execute()){
                                                                  echo "<script>alert('Success Update  stocktable!');
                                                                         location.reload();

                                                                  </script>";
                                                                  header("Refresh:0");
                                                                                                                                              }}
                                                                                                                                                 }
                                                                else{

                                                                    $sql="insert into  stocktable (codearticle,quantity,lastmodification,matriculredacteur) values (:codearticle,:quantity,:lastmodification,:matriculredacteur)";
                                                                                                                                                     if($stmt = $pdo->prepare($sql)){

                                                                                                                                                $stmt->bindParam(":codearticle", $codearticle, PDO::PARAM_STR);
                                                                                                                                                
                                                                                                                                                $total=$quantity;

                                                                                                                                                $stmt->bindParam(":quantity", $total, PDO::PARAM_STR);
                                                                                                        
                                                                                                        $stmt->bindParam(":lastmodification", $datereel, PDO::PARAM_STR);
                                                                                                        $stmt->bindParam(":matriculredacteur", $redacteurcode, PDO::PARAM_STR);

                                                                                                                                                if($stmt->execute()){

                                                                                                                                                    $sql = "SELECT * FROM stocktable WHERE codearticle = :codearticle";
                                                                                                          
                                                                                                                      if($stmt = $pdo->prepare($sql)){
                                                                                                                          // Bind variables to the prepared statement as parameters
                                                                                                                          $stmt->bindParam(":codearticle", $codearticle, PDO::PARAM_STR);
                                                                
                                                                                                                                  // Set parameters
                                                                                                                                  //$idSession = trim($_POST["idSession"]);
                                                                                                                                  
                                                                                                                                  // Attempt to execute the prepared statement
                                                                                                                                  if($stmt->execute()){
                                                                                                                                      // Check if username exists, if yes then verify password
                                                                                                                                      if($stmt->rowCount() >0){
                                                                                                                                          $arraystable= $stmt->fetchAll();
                                                                                                                                              echo "<script>alert('Successinsert into  stocktable !');

                                                                                                                                              
                                                                                                                                              </script>";
                                                                                                                                              // header("Refresh:0");
                                                                                                                                            }}}
                                                                                                                                                }}

                                                                                                                                                 }



                                                                                                                                             }}
                                                        // $message="operation a reussie";
                                                        // echo "<script>alert('Loperation a reussie !');</script>";



                        }
                        else{
                            $message="operation a echouer";

                        }}

                                                    }else{
                                                        echo "<script>alert('Deja valider !');
                                                                         location.reload();

                                                                  </script>";


                                                    }}}
           
     
                        

  
}
?>
<script>
    function go2Page()   
        {   
            var page = document.getElementById("page").value;   
            page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));   
            window.location.href = 'testpagination.php?page='+page;   
        }  

</script>
      </body>   
    </html>  