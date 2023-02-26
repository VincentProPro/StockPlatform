<?php
require("../authentification.php");
require("../db/config.php");
class Archive{
    private $timestamp;
	private $lastmodification;
	private $description;
	private $title;
	private $lien;
    private $targetDirectory = "uploads/";


	function __construct(){}

     
  public function savetodb($name, $description,$lien){

    $this->title=$name;
    $this->description=$description;
    $this->lien=$lien;



		             try{
		    			$t=time();
		           		$datereel=date("Y-m-d H:i:s",$t);
		            	$redacteurcode=$_SESSION["email"];
		            	// $redacteurcode="_SESSION";
		            	            	         include('../db/config.php');



		    	    $sql="insert into archive (title,description,lien,dateadded,addedby) values (:title,:description,:lien,:dateadded,:addedby)";
		             	 if($stmt = $pdo->prepare($sql)){


                    $stmt->bindParam(":description", $this->description, PDO::PARAM_STR);
                    $stmt->bindParam(":lien", $this->lien, PDO::PARAM_STR);
                    $stmt->bindParam(":title", $this->title, PDO::PARAM_STR);
                    $stmt->bindParam(":dateadded", $datereel, PDO::PARAM_STR);
                    $stmt->bindParam(":addedby", $redacteurcode, PDO::PARAM_STR);

		                        if($stmt->execute()){
		                               	return "Le Document a ben été enregistré";




		                        }
		                        else{
		                        	return "Le Document n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                    }
		                     else{
		                        	return "Le Document n'a pas ete ajouté, Requete Invalid veuillez retenter ";
		                             


		                        }
		                }catch (Exception $e) {
		                	return "Une erreur sest produite, Requete Invalid veuillez retenter ".$e->getMessage()."";

				}



  }  
  public function uploadfile($name, $description){
      if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $targetDirectory = "uploads/";
        // $result = uploadFile($file, $targetDirectory);
        // echo $result;
    }else{
      return "Invakid Operation";
    }
        $fileName = basename($file['name']);
        $targetFilePath = $targetDirectory . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
     
        // Create target directory if it doesn't exist
        if (!file_exists($targetDirectory)) {
            mkdir($targetDirectory, 0755, true);
        }
     
        // Check if file already exists
        if (file_exists($targetFilePath)) {
            return "File already exists.";
        }
     
        // Check file size
        if ($file['size'] > 5000000) { // 5MB
            return "File size exceeds maximum allowed.";
        }
     
        // Allow certain file formats
        $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'pdf','ppt','pptx', 'doc', 'docx','xls', 'xlsx');
        if (!in_array($fileType, $allowedTypes)) {
            return "Only JPG, JPEG, PNG, GIF, and PDF DOCX, XLSX, XLS, PPTX files are allowed.";
        }
     
        // Check for PHP files
        if ($fileType == "php") {
            return "PHP files are not allowed.";
        }
     
        // Check for executable files
        $isExecutable = false;
        if (in_array($fileType, array('exe', 'bat', 'cmd'))) {
            $isExecutable = true;
        } elseif (function_exists('finfo_open')) {
            $fileInfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($fileInfo, $file['tmp_name']);
            finfo_close($fileInfo);
            if (in_array($mime, array('application/x-msdownload', 'application/x-executable'))) {
                $isExecutable = true;
            }
        }
        if ($isExecutable) {
            return "Executable files are not allowed.";
        }
     
        // Upload file
        if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
          $lien="http://localhost/StockPlatform/comptable/".$targetFilePath;
          

            return $this->savetodb($name, $description,$lien);
        } else {
            return "There was an error uploading your file.";
        }
    }

    public function selectAll(){
        try{
            $sql="SELECT * FROM archive";
                                                     include('../db/config.php');


            if($stmt = $pdo->prepare($sql)){
          
                if($stmt->execute()){
                     if($stmt->rowCount()>0){
                         $arraystable= $stmt->fetchAll();
                        return $arraystable;

                     }else{
                         return "none";
                     }
                  

                }else{
                 return "La selection a échoué, veuillez retenter. ";

            }
          
            }else{
                 return "La selection a échoué, veuillez retenter. ";

            }

          }
        catch(exception $e){
             return "La selection a échoué, veuillez retenter. Error: ".$e;
             

          }


    }
    



}


// function uploadFile($file, $targetDirectory) {
//     $fileName = basename($file['name']);
//     $targetFilePath = $targetDirectory . $fileName;
//     $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
 
//     // Check if file already exists
//     if (file_exists($targetFilePath)) {
//         return "File already exists.";
//     }
 
//     // Check file size
//     if ($file['size'] > 5000000) { // 5MB
//         return "File size exceeds maximum allowed.";
//     }
 
//     // Allow certain file formats
//     $allowedTypes = array('jpg', 'jpeg', 'png', 'pdf','pptx','docx');
//     if (!in_array($fileType, $allowedTypes)) {
//         return "Only JPG, JPEG, PNG, pptx, docx and PDF files are allowed.";
//     }
 
//     // Upload file
//     if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
//         return "File uploaded successfully.";
//     } else {
//         return "There was an error uploading your file.";
//     }
// }
// $objectCreated=new Archive();
// echo"result ".$objectCreated->savetodb("name", "description","lien");


?>