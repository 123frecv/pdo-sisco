<?php
$post = array(); // Contiendra les données du formulaire nettoyées
$errors = array(); // contiendra nos éventuelles erreurs

$showErrors = false;
$success = false; 
$formShow = false;

$band = '';
$dateC = '';
$heureC = '';
$place = '';
$adress = '';
$city = '';
$tarif = '';


if (!empty($_POST)) {
    
    foreach ($_POST as $key => $value) { // Nettoyage des données
        $post[$key] = trim(strip_tags($value)); // récupération du _POST dans un tableau
    }
    
    if(!preg_match("#^[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,25}#", $post['band'])){    
        $errors[] = 'Le groupe doit comporter entre 3 et 25 caractères';
    }
    if(!preg_match("#^[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,25}#", $post['dateC'])){    
        $errors[] = 'La date doit comporter entre 3 et 25 caractères';
    }
    if(!preg_match("#^[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,10}#", $post['heureC'])){    
        $errors[] = 'L\'heure du concert doit comporter entre 3 et 10 caractères';
    }
    if(!preg_match("#^[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,25}#", $post['place'])){    
        $errors[] = 'Le lieu du concert doit comporter entre 3 et 25 caractères';
    }
    if(!preg_match("#^[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,65}#", $post['adress'])){    
        $errors[] = 'L\'adresse du concert doit comporter entre 3 et 65 caractères';
    }
    if(!preg_match("#^[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{3,30}#", $post['city'])){    
        $errors[] = 'La ville du concert doit comporter entre 3 et 30 caractères';
    }
    if(!preg_match("#^[a-zA-Z0-9À-ú\.:\!\?\&',\s-]{1,5}#", $post['tarif'])){    
        $errors[] = 'Le tarif doit comporter entre 1 et 5 caractères';
    }
    if(count($errors) > 0){  // On compte les erreurs, s'il y en a (supérieur a 0), on passera la variable $showErrors à true.
        $showErrors = true; // valeur booleen // permettra d'afficher nos erreurs s'il y en a.

        $band = $post['band'];
        $dateC = $post['dateC'];
        $heureC = $post['heureC'];
        $place = $post['place'];
        $adress = $post['adress'];
        $city = $post['city'];
        $tarif = $post['tarif'];
    }
    else { 
        // Insertion dans la pdo
        $pdo = new PDO('mysql:host=localhost;dbname=mydb','root',''); 
        $res = $pdo->prepare('INSERT INTO `date_concert` (`band`, `dateC`, `heureC`, `place`, `adress`, `city`, `tarif`) VALUES (:band, :dateC, :heureC, : place, :adress, :city, :tarif)');

        $res->bindValue(':band',        $post['band'],    PDO::PARAM_STR);
        $res->bindValue(':dateC',       $post['dateC'],   PDO::PARAM_STR);
        $res->bindValue(':heureC',      $post['heureC'],  PDO::PARAM_STR);
        $res->bindValue(':place',       $post['place'],   PDO::PARAM_STR);
        $res->bindValue(':adress',      $post['adress'],  PDO::PARAM_STR);
        $res->bindValue(':city',        $post['city'],    PDO::PARAM_STR);
        $res->bindValue(':tarif',       $post['tarif'],   PDO::PARAM_INT);

        
    
        if($res->execute()){
            $success = true; // Pour afficher le message de réussite si tout est bon
            header('Location: view_accueil.php');
        }
        else {
            die;
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

</body>
</html>
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

        <div class="alert alert-info text-center" role="alert">Merci de remplir tous les champs correctement</div>  

            <form method="post" class="pure-form pure-form-aligned">

                <div class="form-group input-group">
                  <span class="input-group-addon" id="basic-addon1">Groupe</span>
                  <input type="text" class="form-control" name="band" placeholder="Nom du groupe" aria-describedby="basic-addon1" value="<?php if(isset($band)) {echo $band;} ?>">
                </div><br>
                <div class="form-group input-group">
                  <span class="input-group-addon" id="basic-addon1">Date</span>
                  <input type="text" class="form-control" name="dateC" placeholder="Date du concert" value="<?=$dateC;?>" aria-describedby="basic-addon1">
                </div><br>
                <div class="form-group input-group">
                  <span class="input-group-addon" id="basic-addon1">Heure</span>
                  <input type="text" class="form-control" name="heureC" placeholder="Heure du début du concert" value="<?= $heureC; ?>" aria-describedby="basic-addon1">
                </div><br>
                <div class="form-group input-group">
                  <span class="input-group-addon" id="basic-addon1">Lieu</span>
                  <input type="text" class="form-control" name="place" placeholder="Nom de la salle de concert" value="<?= $place; ?>" aria-describedby="basic-addon1">
                </div><br>
                <div class="form-group input-group">
                  <span class="input-group-addon" id="basic-addon1">Adresse</span>
                  <input type="text" class="form-control" name="adress" placeholder="Adresse du concert" value="<?= $adress; ?>" aria-describedby="basic-addon1">
                </div><br>
                <div class="form-group input-group">
                  <span class="input-group-addon" id="basic-addon1">Ville</span>
                  <input type="text" class="form-control" name="city" placeholder="Ville du concert" value="<?= $city; ?>" aria-describedby="basic-addon1">
                </div><br>
                <div class="form-group input-group">
                  <span class="input-group-addon" id="basic-addon1">Tarif</span>
                  <input type="text" class="form-control" name="tarif" placeholder="Veuillez indiquez le tarif en chiffre uniquement" value="<?= $tarif; ?>" aria-describedby="basic-addon1">
                </div><br>
                    <input type="submit" class="btn btn-success" value="Ajouter la date">
            </form> 
<?php var_dump($post); 
foreach ($post as $key => $value) {
    echo $key. "=>".$value."<br>";
}
?>


    </div>
</div>