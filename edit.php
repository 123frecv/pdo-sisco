<?php 
include ('header.php'); 
$ID=$_GET['id'];
?>
<body>


<div class="container">
<div class="hero-unit-header">
 <div class="container-con">
<!-- end banner & menunav -->

<div class="container">
<div class="row-fluid"  style="background-color:">
<div class="span12">
<div class="row-fluid">
<div class="span3"></div>
<div class="span6">


<div class="hero-unit-3">
<center>

<?php
include('db.php');
$result = $conn->prepare("SELECT * FROM em where id='$ID'");
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
$id=$row['id'];
?>
<form class="form-horizontal" method="post" action="edit_PDO.php<?php echo '?id='.$id; ?>"  enctype="multipart/form-data" style="float: right;">
                                <legend><h4 style="color: blue;font-size: 30px">MODIFICATION</h4></legend>
                                <h4>Information d'un emplois</h4>
                                <hr>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Matricule:</label>
                                    <div class="controls">
                                        <input type="text" name="matricule" required value=<?php echo $row['matricule']; ?>>
                                    </div>
                                </div>
								<div class="control-group">
                                    <label class="control-label" for="inputPassword">Nom:</label>
                                    <div class="controls">
                                        <input type="text" name="nom" required value=<?php echo $row['nom']; ?>>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputEmail">Prenom:</label>
                                    <div class="controls">
                                        <input type="text" name="prenom" required value=<?php echo $row['prenom']; ?>>
                                    </div>
                                </div>
                                    <div class="control-group">
                                    <label class="control-label" for="inputPassword">Date:</label>
                                    <div class="controls">
                                        <input type="date" name="tdate" required value=<?php echo $row['tdate']; ?>>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Salaire:</label>
                                    <div class="controls">
                                        <input type="text" name="sal" required value=<?php echo $row['sal']; ?>>
                                    </div>
                                </div>
                                    <div class="control-group">
                                    <label class="control-label" for="inputPassword">Telephone:</label>
                                    <div class="controls">
                                        <input type="text" name="tel" required value=<?php echo $row['tel']; ?>>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Email:</label>
                                    <div class="controls">
                                        <input type="email" name="email" required value=<?php echo $row['email']; ?>>
                                    </div>
                                </div>
								
								 <div class="control-group">
                                    <div class="controls">

                                        <button type="submit" name="update" class="btn btn-success" style="margin-right: 65px;">Valider</button>
										<a href="index.php" class="btn">Annuler</a>
                                    </div>
                                </div>
                            </form>
<?php } ?>
								</center>
								</center>

								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
								</div>
</body>
</html>
								