<?php
include 'db.php';

$get_id=$_REQUEST['id'];

$matricule= $_POST['matricule'];
$nom= $_POST['nom'];
$prenom= $_POST['prenom'];
$tdate= $_POST['tdate'];
$sal= $_POST['sal'];
$tel= $_POST['tel'];
$email= $_POST['email'];

$sql = "UPDATE student SET matricule ='$matricule', nom ='$nom', prenom ='$prenom', tdate = '$tdate', 
sal ='$sal', tel = '$tel', email ='$email' WHERE id = '$get_id' ";

$conn->exec($sql);
echo "<script>alert('Successfully Edit The Account!'); window.location='index.php'</script>";


?>

