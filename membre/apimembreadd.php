<?php
include("membre.php");


$fullname=$_POST['fullname'];
$tel=$_POST['tel'];
$position=$_POST['position'];
$email=$_POST['email'];
$role=$_POST['role'];
$status=$_POST['status'];

$objectMembre=new Membre();
$objectMembre->setparam($fullname,$email,$tel,$position,$role,$status);
echo"call add func";
$objectMembre->ajouter();

echo"good last";

?>
