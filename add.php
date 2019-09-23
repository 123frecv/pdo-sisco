<?php
if (isset($_POST['submit'])) {
	require_once('db.php');
$matricule= $_POST['matricule'];
$nom= $_POST['nom'];
$prenom= $_POST['prenom'];
$tdate= $_POST['tdate'];
$sal= $_POST['sal'];
$tel= $_POST['tel'];
$email= $_POST['email'];
if(preg_match('#^([0-9]{2}/){2}[0-9]{4}$#',$tdate))
            {
                 if(preg_match('#^7[0,6,7,8]([0-9]){7}$#',$tel))
                {

                    if ($sal >= 25000 && $sal <= 2000000)
                    {
                        
                        if(preg_match('#^[\w.-]+@[\w.-]+\.[a-z]{2,6}$#',$email))
                        {

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO em (matricule, nom, prenom, tdate, sal ,tel , email)
VALUES ('$matricule', '$nom', '$prenom','$tdate', '$sal', '$tel', '$email')";

$conn->exec($sql);
echo "<script>alert('Ajout a été effectuer bien!'); window.location='index.php'</script>";
}
}
}
}
}
?>