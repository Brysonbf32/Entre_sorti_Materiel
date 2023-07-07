<?php
 include('includes/header.php');
?>
<style>
    .entre_po{
        color:white!important;
        background-color:#216681!important;
        border:1px solid #216681!important;
        border-radius: 2px!important;
        font-size: 15px!important;
    }
    .total_montant{
        color:#FF6C5F!important;
    }
</style>
        <div id="page-wrapper">
			<div class="main-page">
				<div class="elements">
					<div class="col-sm-1"></div>
                    	<div class="col-sm-10 wthree-crd widgettable">
                            <div class="card">
                                <div class="card-body">
							 <div class="agileinfo-cdr">             
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6 col-lg-10">
                                            <input type="text" class="form-control" placeholder="Faire Recherche"><button class="search_icon" type="submit"></button>
                                        </div>
                                    </div>
                                </div>
                                 <div class="widget-body">
                                    <table class="table">
                                         <thead>
                                            <tr>
                                            <th>Nom</th>
                                            <th>Prix</th>
                                            <th>Quanti</th>
                                            <th>Vente</th>
                                            </tr>
                                        </thead>
                                            <!---------------- MODAL VIEW USERS ----------------------->
                                            <?php 
                                                $recupedata=$my_bd->query("SELECT * FROM tbl_entre_produits");    
                                                    if($recupedata->rowCount() >0){
                                                        while($checkdata=$recupedata->fetch()){
                                                            $identre=$checkdata['id_entrepro'];
                                                            $refentrer=$checkdata['ref_entre'];
                                                            $idpro=$checkdata['id_pro'];
                                                            $id_fou=$checkdata['id_fourni'];
                                                            $pri_pro=$checkdata['entre_prix_pro'];
                                                            $quant_pro=$checkdata['entre_quanti_pro'];
                                                            if(isset($idpro)){
                                                                $fetchpro=$my_bd->query("SELECT * FROM tbl_produits WHERE id_pro='$idpro'");
                                                                $fetchpro->rowCount();
                                                                $checkpro=$fetchpro->fetch();
                                                                if($checkpro >0){
                                                                    $prod_id=$checkpro['id_pro'];
                                                                    $ref_prod=$checkpro['ref_prod'];
                                                                    $prod_nom=$checkpro['nom_prod'];

                                                                }
                                                            }
                                            ?>
                                            </div>
                                        <tbody>                                     
                                            <tr>
                                                <td><?=$prod_nom?></td>
                                                <td><?=$pri_pro?></td>
                                                <td><?=$quant_pro?></td>
                                            <td >
                                                <button class="entre_po" type="button" data-toggle="modal" data-target="#<?=$identre?>">Vente</button>
                                            </td>
                                            </tr>
                                        </tbody>
                                            <div class="modal fade" id="<?=$identre?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="widget-shadow">
                                                        <div class="modal-header footline">
                                                            <h5 class="form_title" id="exampleModalLabel">Vente Materiel</h5>
                                                        </div>
                                                        <form method="POST"> 
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Produit</label>
                                                                        <p><?=$prod_nom?></p>
                                                                        <input type="hidden" name="prod_id" value="<?=$prod_id?>">
                                                                        <input type="hidden" name="quantidepo" value="<?=$quant_pro?>">
                                                                    </div> 
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <!-- <label class="label_text">Reference Materiel</label> -->
                                                                        <input type="hidden" name="ref_pro" value="<?=$ref_prod?>">
                                                                    </div> 
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Prix Entrer Materiel</label>
                                                                        <p><?=$pri_pro?></p>
                                                                    </div>
                                                                    <div class="col-12 col-lg-12 py-2">
                                                                        <!-- <label class="label_text">Prix Vente</label> -->
                                                                        <input type="hidden" name="prix_vente" value="<?=$pri_pro?>"  class="form-control">
                                                                    </div> 
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Date Vente</label>
                                                                        <input type="date" name="date_vente"  class="form-control">
                                                                    </div>
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Quantite Vente</label>
                                                                        <input type="text" name="quanti_vente" class="form-control">
                                                                    </div>        
                                                                </div>
                                                                <div class="modal-footer footline">
                                                                    <button class="btn btn-primary btn_submit btn-sm" type="submit" name="ventepro"><i class="fa fa-plus"></i>&nbsp;Vente</button>
                                                                    <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
<br><br>
<?php
 include('includes/footer.php');
?>