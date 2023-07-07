<?php
 include('includes/header.php');
?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="elements">
					<!--photoday-section-->	
                    	<div class="col-sm-7 wthree-crd widgettable">
                            <div class="card">
                                <div class="card-body">
							 <div class="agileinfo-cdr">             
                                <div class="card-header">
                                </div><br>
                                 <div class="widget-body">
                                    <table class="table">
                                         <thead>
                                            <tr>
                                            <th>Code Etagere</th>
                                            <th>Nom Etagere</th>
                                            </tr>
                                        </thead>
                                          <!---------------- MODAL VIEW USERS ----------------------->
                                        <?php
                                            $class0=$my_bd->query("SELECT * FROM tbl_etagiaire ORDER BY id_etage DESC");
                                            if($class0->rowCount()>0){
                                            while($check0=$class0->fetch()){
                                                $Etagere_id=$check0['id_etage'];
                                                $etag_code=$check0['code_etage'];
                                                $etag_nom=$check0['nom_etage'];
                                                ?>
                                                <!---------------- MODAL EDIT PAGE----------------------->
                                            <div class="modal fade" id="<?=$Etagere_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="widget-shadow ">
                                                <div class="modal-header footline">
                                                    <h5 class="form_title" id="exampleModalLabel">Etagere</h5>
                                                </div>
                                                <form method="POST">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-6">
                                                            <label class="label_text">Code Etagere</label>
                                                            <input type="text" name="code_etage" value="<?=$etag_code?>"  class="inputeall" required>
                                                            <input type="hidden" name="id_etage" value="<?=$Etagere_id?>"  class="inputeall" required>
                                                        </div>
                                                        <div class="col-12 col-lg-6">
                                                            <label class="label_text">Nom Etagere</label>
                                                            <input type="text" name="nom_etage" value="<?=$etag_nom?>" class="inputeall" required>

                                                        </div>
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
                                            <div class="modal fade" id="dlt<?=$Etagere_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="widget-shadow ">
                                                <form method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="delete_text">Veux-tu supprimer cet etagere <span class="delete_name"><?=$etag_nom?></span>?</label>
                                                        <input type="hidden" name="id_etage" value="<?=$Etagere_id?>"  class="inputeall" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer footline">
                                                    <button class="btn btn-primary btn_delet_popup btn-sm" type="submit"  name="supprimer"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                    <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                </div>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        <tbody>
                                            <tr>
                                            <td><?=$etag_code?></td>
                                            <td><?=$etag_nom?></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
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
            <h5 class="form_title" id="exampleModalLabel">Etagere</h5>
        </div>
        <form method="POST"  enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <label class="label_text">Code Etagere</label>
                    <input type="text" name="code_etage"  class="inputeall" required>
                </div>
                <div class="col-12 col-lg-6">
                    <label class="label_text">Nom Etagere</label>
                    <input type="text" name="nom_etage"  class="inputeall" required>
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