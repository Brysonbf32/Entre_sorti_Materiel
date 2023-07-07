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
                                    <p>
                                        <button class="btn btn-primary btn_addinfos" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Entrer</button>
                                    </p>
                                </div><br>
                                 <div class="widget-body">
                                    <table class="table">
                                        <?php
                                        $numbedr= rand(100, 200);
                                        ?>
                                         <thead>
                                            <tr>
                                            <th>Reference</th>
                                            <th>Image</th>
                                            <th>Nom</th>
                                            <th>Categorie</th>
                                            <th>Prix</th>
                                            <th class="">Action</th>
                                            </tr>
                                        </thead>
                                            <?php
                                            $sql="SELECT 
                                            id_pro,
                                            ref_prod,
                                            nom_prod,
                                            photo_pro,
                                            nom_categ,
                                            prix_pro
                                            FROM
                                            tbl_produits AS pr INNER JOIN tbl_categorie AS cate ON(pr.id_categ=cate.id_categ)";
                                            $recupdata=$my_bd->prepare($sql);
                                            $recupdata->execute();
                                            $materiel=$recupdata->fetchAll(PDO::FETCH_ASSOC);                                            
                                            ?>
                                            </div>
                                        <tbody>
                                            <?php
                                            foreach($materiel as $mate){
                                            ?>
                                            <tr>
                                            <td><?=$mate['ref_prod']?></td>
                                            <td><img class="image_table" src="photo_prod/<?=$mate['photo_pro']?>" alt=""></td>
                                            <td><?=$mate['nom_prod']?></td>
                                            <td><?=$mate['nom_categ']?></td>
                                            <td><?=$mate['prix_pro']?></td>
                                            <td >
                                                <span class="btn_materiel"><i class="fa fa-pencil-square-o btn_editmat" data-toggle="modal"  data-target="#<?=$mate['id_pro']?>"></i></span>
                                                <span class="btn_materieldele"><i class="fa fa-trash btn_editmat" data-toggle="modal" data-target="#dlt<?=$mate['id_pro']?>"></i></span>
                                            </td>
                                            </tr>
                                                    <!---------------- MODAL EDIT PAGE----------------------->
                                            <div class="modal fade" id="<?=$mate['id_pro']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                    <input type="hidden" name="idprod" value="<?=$mate['id_pro']?>" class="form-control">
                                                                    <input type="text" name="nom_prod" value="<?=$mate['nom_prod']?>" class="form-control" required>
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
                                                                    <input type="text" name="prix_prod" value="<?=$mate['prix_pro']?>" class="form-control" required>
                                                                </div>         
                                                            </div>
                                                            </div>
                                                            <div class="modal-footer footline">
                                                                <button class="btn btn-primary btn_submit btn-sm" type="submit" name="modifier"><i class="fa fa-plus"></i>&nbsp;Modifier</button>
                                                                <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                            <!---------------------------------- DELETE MODAL ---------------------------------------->
                                            <div class="modal fade" id="dlt<?=$mate['id_pro']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="widget-shadow ">
                                                    <form method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="delete_text">Veux-tu supprimer ce Produit <span class="delete_name"><?=$mate['nom_prod']?></span>?</label>
                                                            <input type="hidden" name="iid_mate" value="<?=$mate['id_pro']?>" class="form-control">
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