


<?php
// include 'conn.php';

// $term = mysqli_real_escape_string($con,$_GET['term']);

// $sql = "SELECT * FROM article WHERE designation LIKE '$term%'";

// $query = mysqli_query($con, $sql);

// $result = [];

// while($data = mysqli_fetch_array($query))
// {
//     $result[] = $data['designation'];
// }
// echo json_encode($result);
?>

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              

<?php
// include 'conn.php';

// $term = mysqli_real_escape_string($con,$_GET['term']);
// // SELECT * FROM `wp_posts` WHERE `post_type` ='sp_team' AND `post_title`<>"Auto Draft"; 

// $sql = "SELECT * FROM wp_posts WHERE post_type ='sp_team' AND `post_title`<>'Auto Draft' And post_title  LIKE '$term%'";

// $query = mysqli_query($con, $sql);

// $result = [];

// while($data = mysqli_fetch_array($query))
// {
//     $result[] = $data['post_title'];
// }
// echo json_encode($result);
?>


<?php
include 'db/config.php';


$term=$_GET['term'];

$rs_result=array();


 $sql = "SELECT * FROM article WHERE designation LIKE CONCAT('%',:term, '%')";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
// $return->bindValue( 'term', $term, PDO::PARAM_STR );
            $stmt->bindParam(":term", $term, PDO::PARAM_STR);
            
            // Set parameters
            
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() >0){
                    $rs_result= $stmt->fetchAll();

                    }}}


$result = [];

foreach($rs_result as $data)
{
    $result[] = $data['designation'];
}
echo json_encode($result);
?>
