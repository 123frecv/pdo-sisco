<?php
$matrerror = $nomerror = $prenerror = $daterror = $salerror = $telerror = $emerror = "error";
require_once('db.php');
$post = array(); // Contiendra les données du formulaire nettoyées
$errors = array(); // contiendra nos éventuelles erreurs

$showErrors = false;
$success = false; 
$formShow = false;
if(isset($_POST['submit']))
        {
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
                        else
                        {
                            $errors[] = 'L\'heure1 du concert doit comporter entre 3 et 10 caractères';
                        }

                    }
                    else
                    {
                        $errors[] = 'L\'heure2 du concert doit comporter entre 3 et 10 caractères';
                    }
                

                 }
                 else
                 {
                   $errors[] = 'L\'heure3 du concert doit comporter entre 3 et 10 caractères';
                 }
                
            }
            else
            {
                $errors[] = 'L\'heure4 du concert doit comporter entre 3 et 10 caractères';
            }
        }
  

?>

<div class="wrapper">
    <h1 class="text-center">Ajouter une date</h1>
    <br>
    <div class="container">

    <?php 
    if($success){ // On affiche la réussite si tout fonctionne
        echo '<div class="alert alert-success" role="alert"> Le concert a bien été créé ! </div>';
    }

    if($showErrors == true): ?>
        <div class="alert alert-danger" role="alert">
            <p style="color:red">Veuillez corriger les erreurs suivantes :</p>
                <ul style="color:red">
                <?php foreach($errors as $err): ?>
                    <li><?=$err;?></li>
                <?php endforeach;?>
                </ul>
        </div>
    <?php endif; ?>
    </div>
</div>
