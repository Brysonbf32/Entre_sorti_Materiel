<?php
 include('includes/header.php');
?>
		<div id="page-wrapper">
			<div class="main-page">
				<div class="elements">
                    <div class="row">
                    	<div class="col-sm-6 col-lg-6 wthree-crd widgettable">
                            <div class="row"></div>
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
                                    <thead>
                                        <tr>
                                        <th scope="col">Etagere</th>
                                        <th scope="col">Code Etagere</th>
                                        <th scope="col">Categorie</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                            <!---------------- MODAL VIEW USERS ----------------------->
                                            <?php
                                            $sql="SELECT 
                                            id_categ,
                                            ref_categ,
                                            code_etage,
                                            nom_categ,
                                            nom_etage 
                                            FROM
                                            tbl_categorie AS cat INNER JOIN tbl_etagiaire AS eta ON(cat.id_etage=eta.id_etage)";
                                            $recupdata=$my_bd->prepare($sql);
                                            $recupdata->execute();
                                            $categorie=$recupdata->fetchAll(PDO::FETCH_ASSOC);                                            
                                            ?>
                                            </div>
                                        <tbody>
                                            <?php
                                            foreach($categorie as $categ){
                                            ?>
                                            <tr>
                                            <td class="table_row"><?=$categ['nom_etage']?></td>
                                            <td class="table_row"><?=$categ['code_etage']?></td>
                                            <td class="table_row"><?=$categ['nom_categ']?></td>
                                            <td>
                                                <span>
                                                    <i class="fa fa-pencil-square-o" data-toggle="modal" data-target="#<?=$categ['id_categ']?>"></i>
                                                </span>&nbsp;
                                                <span>
                                                    <i class="fa fa-trash" data-toggle="modal" data-target="#dlt<?=$categ['id_categ']?>"></i>
                                                </span>&nbsp;
                                            </td>
                                            </tr>
                                            <!---------------- MODAL EDIT PAGE----------------------->
                                            <div class="modal fade" id="<?=$categ['id_categ']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="widget-shadow ">
                                                    <div class="modal-header footline">
                                                        <h5 class="form_title" id="exampleModalLabel">Etagere</h5>
                                                    </div>
                                                    <form method="POST">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-12">
                                                            <label class="label_text">Etagere</label>
                                                            <select name="id_etag" class="form-control">
                                                            <option>Choisie Etagere</option>
                                                            <?php
                                                                $recudata=$my_bd->query("SELECT * FROM tbl_etagiaire ORDER BY id_etage DESC");
                                                                if($recudata->rowCount()>0){
                                                                    while($checkdata=$recudata->fetch()){
                                                                    $id_etag=$checkdata['id_etage'];
                                                                    $nom_etag=$checkdata['nom_etage'];
                                                                ?>
                                                                <option value="<?=$id_etag?>"><?=$nom_etag?></option>
                                                                <?php
                                                                    }
                                                                    }
                                                            ?>
                                                            </select>
                                                            </div>
                                                            <div class="col-12 col-lg-6 py-2">
                                                                <input type="hidden" name="id_categ" value="<?=$categ['id_categ']?>" class="form-control">
                                                                <label class="label_text">Code Categorie</label>
                                                                <input type="text" name="code_categ" value="<?=$categ['ref_categ']?>" class="form-control">
                                                            </div>
                                                            <div class="col-12 col-lg-6 py-2">
                                                                <label class="label_text">Nom Categorie</label>
                                                                <input type="text" name="nom_categ" value="<?=$categ['nom_categ']?>" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">              
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer footline">
                                                        <button class="btn btn-primary btn_submit btn-sm" type="submit" name="modifier"><i class="fa fa-plus"></i>&nbsp;Modifier</button>
                                                        <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Fermer</button>
                                                    </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <!---------------------------------- DELETE MODAL ---------------------------------------->
                                            <div class="modal fade" id="dlt<?=$categ['id_categ']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="widget-shadow ">
                                                    <form method="POST">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="delete_text">Veux-tu supprimer cette categorie <span class="delete_name"><?=$categ['nom_categ']?></span>?</label>
                                                            <input type="hidden" name="id_categ" value="<?=$categ['id_categ']?>" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer footline">
                                                        <button class="btn btn-primary btn_delet_popup btn-sm" type="submit"  name="supprimer"><i class="fa fa-trash"></i>&nbsp;Supprimer</button>
                                                        <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Fermer</button>
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
            <h5 class="form_title" id="exampleModalLabel">Categorie Materiel</h5>
        </div>
        <form method="POST"  enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-12 col-lg-6">
                <label class="label_text">Etagere</label>
                <select name="id_etag" class="form-control">
                <option>Choisie Etagere</option>
                <?php
                    $recudata=$my_bd->query("SELECT * FROM tbl_etagiaire ORDER BY id_etage DESC");
                    if($recudata->rowCount()>0){
                        while($checkdata=$recudata->fetch()){
                        $id_etag=$checkdata['id_etage'];
                        $nom_etag=$checkdata['nom_etage'];
                    ?>
                    <option value="<?=$id_etag?>"><?=$nom_etag?></option>
                    <?php
                        }
                        }
                ?>
                </select>
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Nom Categorie</label>
                    <input type="text" name="nom_categ"  class="form-control" required>
                </div>
            </div>
            <div class="form-group">
               
            </div>
        </div>
        <div class="modal-footer footline">
            <button class="btn btn-primary btn_submit btn-sm" type="submit" name="ajouter"><i class="fa fa-plus"></i>&nbsp;Ajouter</button>
            <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Fermer</button>
        </div>
        </div>
        </form>
    </div>
</div>
<br><br>
<?php
 include('includes/footer.php');
?>