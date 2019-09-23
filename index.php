<?php include('header.php'); ?>
<body>


    <div class="row-fluid">
        <div class="span12">


         

            <div class="container">


<?php include('modal_add.php'); ?>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example" style="background-color: white">
                            <div class="alert alert-info">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong><i class="icon-user icon-large"></i>&nbsp;LISTER DES EMPLOIS</strong>
                            </div>
                            <thead>
                                <tr>
                                	<th style="text-align:center;">Matricule</th>
                                    <th style="text-align:center;">Nom</th>
                                    <th style="text-align:center;">Prenom</th>
                                    <th style="text-align:center;">Date</th>
                                    <th style="text-align:center;">Salaire</th>
                                    <th style="text-align:center;">Telephone</th>
									<th style="text-align:center;">Email</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php
								require_once('db.php');
								$result = $conn->prepare("SELECT * FROM em ORDER BY id ASC");
								$result->execute();
								for($i=0; $row = $result->fetch(); $i++){
								$id=$row['id'];
							?>
								<tr>
									<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['matricule']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['nom']; ?></td>
								<td style="text-align:center; word-break:break-all; width:200px;"> <?php echo $row ['prenom']; ?></td>
								<td style="text-align:center; word-break:break-all; width:300px;"> <?php echo $row ['tdate']; ?></td>
								<td style="text-align:center; word-break:break-all; width:150px;"> <?php echo $row ['sal']; ?></td>
								<td style="text-align:center; word-break:break-all; width:150px;"> <?php echo $row ['tel']; ?></td>
								<td style="text-align:center; word-break:break-all; width:700px;"> <?php echo $row ['email']; ?></td>
								<td style="text-align:center; width:500px;">
									<a href="edit.php<?php echo '?id='.$id; ?>" class="btn btn-info">Edite</a>
									 <a href="#delete<?php echo $id;?>"  data-toggle="modal"  class="btn btn-danger" >Supprime </a>
								</td>
									
										<!-- Modal -->
								<div id="delete<?php  echo $id;?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-header">
								<h3 id="myModalLabel">Supprime</h3>
								</div>
								<div class="modal-body">
								<p><div style="font-size:larger;" class="alert alert-danger">voulez vous vraiment Supprime <b style="color:red;"><?php echo $row['matricule']." ".$row['nom']." ".$row['prenom']." ".$row['tdate']." ".$row['sal']." ".$row['tel']." ".$row['email'] ; ?></b> les données?</p>
								</div>
								<hr>
								<div class="modal-footer">
								<button class="btn btn-inverse" data-dismiss="modal" aria-hidden="true">NON</button>
								<a href="delete.php<?php echo '?id='.$id; ?>" class="btn btn-danger">OUI</a>
								</div>
								
								</tr>
								<?php } ?>
                            </tbody>
                        </table>


          
        </div>
        </div>
        </div>
    </div>


</body>
</html>


