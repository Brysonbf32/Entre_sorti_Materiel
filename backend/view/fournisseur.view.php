<?php
 include('includes/header.php');
?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="elements">
					<!--photoday-section-->	
                    	<div class="col-sm-9 wthree-crd widgettable">
                            <div class="card">
                                <div class="card-body">
							 <div class="agileinfo-cdr">             
                                <div class="card-header">
                                    <p>
                                        <button class="btn btn-primary btn_addinfos" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Ajouter</button>
                                    </p>
                                </div><br>
                                <div class="widget-body">
                                    <table class="table">
                                        <?php
                                        $numbedr= rand(100, 200);
                                        ?>
                                         <thead>
                                            <tr>
                                            <th>Nom</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Age</th>
                                            <th class="">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $sql="SELECT 
                                            id_fourni,
                                            nom_fourni,
                                            address_fourni,
                                            phone_fourni,
                                            age_fourni 
                                            FROM
                                            tbl_fournisseurs";
                                            $recupdata=$my_bd->prepare($sql);
                                            $recupdata->execute();
                                            $fournisseur=$recupdata->fetchAll(PDO::FETCH_ASSOC);                                            
                                        ?>
                                            </div>
                                        <tbody>
                                            <?php
                                                foreach($fournisseur as $fourni){
                                            ?>
                                            <tr>
                                            <td><?=$fourni['nom_fourni']?></td>
                                            <td><?=$fourni['address_fourni']?></td>
                                            <td><?=$fourni['phone_fourni']?></td>
                                            <td><?=$fourni['age_fourni']?> Ans</td>
                                            <td >
                                                <span class="btn_materiel"><i class="fa fa-pencil-square-o btn_editmat" data-toggle="modal"  data-target="#<?=$fourni['id_fourni']?>"></i></span>
                                                <span class="btn_materieldele"><i class="fa fa-trash btn_editmat" data-toggle="modal" data-target="#dlt<?=$fourni['id_fourni']?>"></i></span>
                                            </td>
                                            </tr>
                                                <!---------------- MODAL EDIT PAGE----------------------->
                                            <div class="modal fade" id="<?=$fourni['id_fourni']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="widget-shadow ">
                                                    <div class="modal-header footline">
                                                        <h5 class="form_title" id="exampleModalLabel">Etageur</h5>
                                                    </div>
                                                    <form method="POST">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-6 py-2">
                                                                <label class="label_text">Nom</label>
                                                                <input type="hidden" name="id_fourni" value="<?=$fourni['id_fourni']?>">
                                                                <input type="text" name="nom_fourni" value="<?=$fourni['nom_fourni']?>" class="form-control" required>
                                                            </div>
                                                            <div class="col-12 col-lg-6 py-2">
                                                                <label class="label_text">Address</label>
                                                                <input type="text" name="address_fourni" value="<?=$fourni['address_fourni']?>" class="form-control" required>
                                                            </div>
                                                            <div class="col-12 col-lg-6 py-2">
                                                                <label class="label_text">Phone</label>
                                                                <input type="text" name="phone_fourni" value="<?=$fourni['phone_fourni']?>" class="form-control" required>
                                                            </div>
                                                            <div class="col-12 col-lg-6 py-2">
                                                                <label class="label_text">Age</label>
                                                                <input type="text" name="age_fourni" value="<?=$fourni['age_fourni']?>" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                        
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer footline">
                                                        <button class="btn btn-primary btn_submit btn-sm" type="submit" name="modifier"><i class="fa fa-plus"></i>&nbsp;Modifier</button>
                                                        <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                    </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!---------------------------------- DELETE MODAL ---------------------------------------->
                                            <div class="modal fade" id="dlt<?=$fourni['id_fourni']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="widget-shadow ">
                                                    <form method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="delete_text">Veux-tu supprimer ce Fournisseur <span class="delete_name"><?=$fourni['nom_fourni']?></span>?</label>
                                                            <input type="hidden" name="id_fourni" value="<?=$fourni['id_fourni']?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer footline">
                                                        <button class="btn btn-primary btn_delet_popup btn-sm" type="submit"  name="supprimer"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                        <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                    </div>
                                                </div>
                                                    </form>
                                            </div>
                                        </tbody>
                                        <?php
                                            }
                                        
                                        ?>
                                    </table> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				</div>
			</div>
		</div>
 </div>
    <!-- Modal AAD -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="widget-shadow ">
        <div class="modal-header footline">
            <h5 class="form_title" id="exampleModalLabel">Fournisseur</h5>
        </div>
        <form method="POST"  enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Nom</label>
                    <input type="text" name="nom_fourni"  class="form-control" required>
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Address</label>
                    <input type="text" name="address_fourni"  class="form-control" required>
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Phone</label>
                    <input type="text" name="phone_fourni"  class="form-control" required>
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Age</label>
                    <input type="text" name="age_fourni"  class="form-control" required>
                </div>
            </div>
            <div class="form-group">
               
            </div>
        </div>
        <div class="modal-footer footline">
            <button class="btn btn-primary btn_submit btn-sm" type="submit" name="ajouter"><i class="fa fa-plus"></i>&nbsp;Ajouter</button>
            <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
        </div>
        </div>
        </form>
    </div>
</div>
<br><br>
<?php
 include('includes/footer.php');
?>