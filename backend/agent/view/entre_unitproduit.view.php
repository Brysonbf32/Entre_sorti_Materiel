<?php
 include('includes/header.php');
?>
<style>
    .colorerroe{
        color: red!important;
    }

</style>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="elements">
					<!--photoday-section-->	
                    <div class="col-sm-2"></div>
                    	<div class="col-sm-8 wthree-crd widgettable">
                            <div class="card">
                                <div class="card-body">
							 <div class="agileinfo-cdr">             
                                <div class="card-header">
                                  </p>
                                </div><br>
                                    <div class="widget-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <p>Code Produit <?=$id_pro?> </p>
                                                <p><?=$refpro?></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <p>Produit </p>
                                                <?=$nom_pro?>
                                            </div>
                                            <div class="col-lg-6">
                                                <p>Fournisseur</p>
                                                <p><?=$nom_fourni?></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <p>Prix</p>
                                                <p><?=$prix_pro?></p>
                                            </div>
                                            <div class="row">
                                                <form method="POST">
                                                    <div class="col-lg-6">
                                                        <p>Date </p>
                                                            <input type="hidden" name="id_entre" value="<?=$id_ent?>">
                                                            <input type="hidden" name="prix_pro" value="<?=$prix_pro?>">
                                                        <p>
                                                            <input type="date" name="date_entre" class="form-control date_input">
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p>Quantite </p>
                                                        <p>
                                                            <input type="hidden" name="inpu_pro" value="<?=$id_pro?>">
                                                            <input type="hidden" name="inpu_fou" value="<?=$id_fourni?>">
                                                            <input type="number" name="quant_entre" class="form-control">
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-12 py-3">
                                                        <br>
                                                        <button class="form-control " type="submit" name="entre">Ajouter</button>
                                                    </div>
                                                    <br>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
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
                    <h5 class="form_title" id="exampleModalLabel">Produit</h5>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6 py-2">
                                <label class="label_text">Nom Materiel</label>
                                <input type="text" name="nom_prod"  class="form-control" required>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="label_text">Categorie</label>
                                <select name="categ_prod" class="form-control">
                                <option>Choisie Categorie</option>
                                <?php
                                    $recudata=$my_bd->query("SELECT * FROM tbl_categorie ORDER BY id_categ DESC");
                                    if($recudata->rowCount()>0){
                                        while($checkdata=$recudata->fetch()){
                                        $id_mate=$checkdata['id_categ'];
                                        $nom_mate=$checkdata['nom_categ'];
                                    ?>
                                    <option value="<?=$id_mate?>"><?=$nom_mate?></option>
                                    <?php
                                        }
                                    }
                                ?>
                                </select>
                            </div> 
                            <div class="col-12 col-lg-6 py-2">
                                <label class="label_text">Photo Pro</label>
                                <input type="file" name="photo_prod"  class="form-control" required>
                            </div>  
                            <div class="col-12 col-lg-6 py-2">
                                <label class="label_text">Prix Produit</label>
                                <input type="text" name="prix_prod"  class="form-control" required>
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
    </div>
<br><br>
<?php
 include('includes/footer.php');
?>