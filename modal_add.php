	    <!-- Button to trigger modal -->
    <a class="btn btn-primary" href="#myModal" data-toggle="modal">AJOUTER  UN EMPLOIS</a>
	<br>
	<br>
	<br>
    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">

    <h3 id="myModalLabel">AJOUTER UN EMPLOIS</h3>
    </div>
    <div class="modal-body">
	
					<form method="post" action="add.php"  enctype="multipart/form-data">
					<table class="table1">
						<tr>

							<td><label style="color:#3a87ad; font-size:18px;">Matricule</label></td>
							<td width="30"></td>
							<td><input type="text" name="matricule" value="" required />
							<!-- <span class="error"><?php echo $matricule; ?></span> --></td>
						</tr>
						<tr>
							
							<td><label style="color:#3a87ad; font-size:18px;">Nom</label></td>
							<td width="30"></td>
							<td><input type="text" name="nom" placeholder="Nom" required />
							<!-- <span class="error"><?php echo $nomerror; ?></span> --></td>
						</tr>
						<tr>
							<td><label style="color:#3a87ad; font-size:18px;">Prenom</label></td>
							<td width="30"></td>
							<td><input type="text" name="prenom" placeholder="Prenom" required />
							<!-- <span class="error"><?php echo $prenerror; ?></span> --></td>
						</tr>
						<tr>
							
							<td><label style="color:#3a87ad; font-size:18px;">Date</label></td>
							<td width="30"></td>
							<td><input type="text" name="tdate"  required />
							<!-- <span class="error"><?php echo $daterror; ?></span> --></td>
						</tr>
						<tr>
							<td><label style="color:#3a87ad; font-size:18px;">Salaire</label></td>
							<td width="30"></td>
							<td><input type="text" name="sal" placeholder="100000 et 250000" required />
							<!-- <span class="error"><?php echo $salerror; ?></span> --></td>
						</tr>
						<tr>
							<td><label style="color:#3a87ad; font-size:18px;">Telephone</label></td>
							<td width="30"></td>
							<td><input type="text" name="tel" placeholder="770210125" required />
							<!-- <span class="error"><?php echo $telerror; ?></span> --></td>
						</tr>
						<tr>
							<td><label style="color:#3a87ad; font-size:18px;">Email</label></td>
							<td width="30"></td>
							<td><input type="email" name="email" placeholder="Email" required />
							<!-- <span class="error"><?php echo $emerror; ?></span> --></td>
						</tr>
						
					</table>
					
	
    </div>
    <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">ANNULER</button>
<button type="submit" name="Submit" class="btn btn-primary">AJOUTER</button>
    </div>
	

					</form>
    </div>			