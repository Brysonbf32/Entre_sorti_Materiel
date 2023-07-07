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
                                  <input type="text" class="form-control" placeholder="Search"><button class="search_icon" type="submit"></button>
                                </div><br>
                                 <div class="widget-body">
                                    <table class="table">
                                         <thead>
                                            <tr>
                                            <th>Ref.Entre</th>
                                            <th>Nom</th>
                                            <th>Date Entre</th>
                                            <th>Prix</th>
                                            <th>Quanti</th>
                                            <th>Montant Total</th>
                                            <th>Fournisseur</th>
                                            <th class="">Action</th>
                                            </tr>
                                        </thead>
                                            <!---------------- MODAL VIEW USERS ----------------------->
                                            <?php 
                                            $sql="SELECT 
                                            id_entrepro,
                                            nom_prod,
                                            ref_prodw,
                                            ref_prod,
                                            ref_entre,
                                            date_entre,
                                            entre_quanti_pro,
                                            quanti_pro,
                                            prix_pro,
                                            nom_fourni
                                            FROM
                                            tbl_entre_produits AS entpro INNER JOIN tbl_produits AS prod ON(entpro.id_pro=prod.id_pro) INNER JOIN tbl_fournisseurs AS four ON(entpro.id_fourni=four.id_fourni)";
                                            $recupdata=$my_bd->prepare($sql);
                                            $recupdata->execute();
                                            $entrepro=$recupdata->fetchAll(PDO::FETCH_ASSOC);                                            
                                            ?>
                                            </div>
                                        <tbody>
                                            <?php
                                            foreach($entrepro as $entre){
                                            ?>
                                            <tr>
                                            <td><?=$entre['ref_entre']?></td>
                                            <td><?=$entre['nom_prod']?></td>
                                            <td><?=$entre['date_entre']?></td>
                                            <td><?=$entre['prix_pro']?></td>
                                            <td><?=$entre['entre_quanti_pro']?></td>
                                            <td class="total_montant"><?=$entre['prix_pro'] * $entre['entre_quanti_pro'] ?> Fbu</td>
                                            <td><?=$entre['nom_fourni']?></td>

                                            <td >
                                                <button class="entre_po" type="button" data-toggle="modal" data-target="#<?=$entre['id_entrepro']?>">Entre</button>
                                            </td>
                                            </tr>
                                        </tbody>
                                            <!-- Modal AAD -->
                                            <div class="modal fade" id="<?=$entre['id_entrepro']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="widget-shadow ">
                                                        <div class="modal-header footline">
                                                            <h5 class="form_title" id="exampleModalLabel">Entre Materiel</h5>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Reference Materiel</label>
                                                                        <input type="hidden" name="id_entre" value="<?=$entre['id_entrepro']?>" class="form-control">
                                                                        <p><?=$entre['ref_prod']?></p>
                                                                        <input type="hidden" name="ref_produit" value="<?=$entre['ref_prod']?>" class="form-control" >
                                                                    </div>
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Nom Materiel</label>
                                                                        <input type="text" name="nom_prod" value="<?=$entre['nom_prod']?>" class="form-control" disabled>
                                                                    </div>  
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Prix Materiel</label>
                                                                        <input type="text" name="prix_prod" value="<?=$entre['prix_pro']?>" class="form-control" disabled>
                                                                    </div> 
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Fournisseur Materiel</label>
                                                                        <input type="text" name="prix_prod" value="<?=$entre['nom_fourni']?>" class="form-control" disabled>
                                                                    </div>
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Quantite Entree</label>
                                                                        <input type="text" name="quanti_prod" class="form-control">
                                                                    </div> 
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Date Entree</label>
                                                                        <input type="date" name="date_prod"  class="form-control">
                                                                    </div>       
                                                                </div>
                                                                <div class="modal-footer footline">
                                                                    <button class="btn btn-primary btn_submit btn-sm" type="submit" name="entre"><i class="fa fa-plus"></i>&nbsp;Entre</button>
                                                                    <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                                        <!-- Modal Depot -->
                                            <div class="modal fade" id="depo<?=$entre['id_entrepro']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="widget-shadow ">
                                                        <div class="modal-header footline">
                                                            <h5 class="form_title" id="exampleModalLabel">Ajouter Materiel Au Depot</h5>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Quantite Stock en Cours</label>
                                                                        <p><?=$entre['quanti_pro']?></p>
                                                                        <input type="hidden" name="quanti_prod"  class="form-control">
                                                                    </div> 
                                                                    <div class="col-12 col-lg-6 py-2">
                                                                        <label class="label_text">Quantite entre </label>
                                                                        <p><?=$entre['entre_quanti_pro']?></p>
                                                                        <input type="hidden" name="quanti_entreprod"  class="form-control">
                                                                    </div>       
                                                                </div>
                                                                <div class="modal-footer footline">
                                                                    <button class="btn btn-primary btn_submit btn-sm" type="submit" name="entre"><i class="fa fa-plus"></i>&nbsp;Entre</button>
                                                                    <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
                                        </div>
</div>

        <!-- Modal AAD -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="widget-shadow ">
                <div class="modal-header footline">
                    <h5 class="form_title" id="exampleModalLabel">Entre Produit</h5>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-lg-6 py-2">
                                <label class="label_text">Nom Materiel</label>
                                <select name="id_prod" class="form-control">
                                <option>Choisie Materiel</option>
                                <?php
                                    $recudata=$my_bd->query("SELECT * FROM tbl_produits ORDER BY id_pro DESC");
                                    if($recudata->rowCount()>0){
                                        while($checkdata=$recudata->fetch()){
                                        $id_prod=$checkdata['id_pro'];
                                        $nom_prod=$checkdata['nom_prod'];
                                    ?>
                                    <option value="<?=$id_prod?>"><?=$nom_prod?></option>
                                    <?php
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 py-2">
                                <label class="label_text">Nom Fournisseur</label>
                                <select name="id_fourni" class="form-control">
                                <option>Choisie Fournisseur</option>
                                <?php
                                    $recudata=$my_bd->query("SELECT * FROM tbl_fournisseurs ORDER BY id_fourni DESC");
                                    if($recudata->rowCount()>0){
                                        while($checkdata=$recudata->fetch()){
                                        $id_prod=$checkdata['id_fourni'];
                                        $nom_prod=$checkdata['nom_fourni'];
                                    ?>
                                    <option value="<?=$id_prod?>"><?=$nom_prod?></option>
                                    <?php
                                        }
                                    }
                                ?>
                                </select>
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