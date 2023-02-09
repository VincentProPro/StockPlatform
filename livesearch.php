<?php
require_once "config.php";

$xmlDoc=new DOMDocument();
// $xmlDoc->load("links.xml");
                    $timetablearray=array();

$x=$xmlDoc->getElementsByTagName('link');
$sql = "SELECT * FROM categoritable  ";

                    if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            // $stmt->bindParam(":email", $email, PDO::PARAM_STR);

            
            // Set parameters
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){


                if($stmt->rowCount() >0){

                  $arraystable= $stmt->fetchAll();
                   foreach ($arraystable as $row) {
                    $idtimetable=$row['nom'];
$coursecode=$row['code'];
$lectureremail=$row['description'];



 $timetablearrayone=array(
            "code" => $coursecode,
            "nom" => $idtimetable,
            "description" => $lectureremail,
            
        );
 array_push($timetablearray, $timetablearrayone);

    
}
                }}}

$x=$timetablearray;
$x=array("Volvo", "BMW", "Toyota");
$x = array (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
);


//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  for($i=0; $i<sizeof($x); $i++) {
    $y=$x[$i][0];
    $z=$x[$i][1];
    if ($y(0)->nodeType==1) {
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        } else {
          $hint=$hint . "<br /><a href='" . 
          $z->item(0)->childNodes->item(0)->nodeValue . 
          "' target='_blank'>" . 
          $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>