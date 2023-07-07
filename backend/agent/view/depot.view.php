<?php
 include('includes/header.php');
?>
<style>
    .td_font{
        font-size: 14px!important;
    }
</style>
<div id="page-wrapper">
    <div class="main-page">
        <div class="elements">
            <div class="row">
                <div class="col-12 col-lg-5 wthree-crd widgettable">
                    <div class="card">
                        <div class="card-body">
                            <div class="agileinfo-cdr">             
                                <div class="card-header">
                                </div>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Etagiaire</th>
                                                <th scope="col">Categorie</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $sql="SELECT 
                                            id_categ,
                                            nom_categ,
                                            nom_etage
                                            FROM
                                            tbl_categorie AS cate INNER JOIN tbl_etagiaire AS eta ON(cate.id_etage=eta.id_etage)";
                                            $recupdata=$my_bd->prepare($sql);
                                            $recupdata->execute();
                                            $depot=$recupdata->fetchAll(PDO::FETCH_ASSOC);
                                        ?>
                                        <tbody>
                                        <?php
                                            foreach($depot as $dep){
                                            ?>
                                            <tr>
                                                <td><?=$dep['nom_etage']?></td>
                                                <td><?=$dep['nom_categ']?></td>
                                                <td class="text-center"><i class="fa fa-eye"></i></td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>                           
                </div>
                <div class="col-12 col-lg-7 wthree-crd widgettable">
                    <div class="card">
                        <div class="card-body">
                            <div class="agileinfo-cdr">             
                                <div class="card-header">
                                </div>
                                <div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Produit</th>
                                                <th scope="col">D.entre</th>
                                                <th scope="col">Quantite</th>
                                                <th scope="col">P.Unit</th>
                                                <th scope="col">P.Estim</th>
                                                <th scope="col">Total</th>

                                            </tr>
                                        </thead>
                                        <?php 
                                            $sql="SELECT 
                                            id_entre,
                                            num_entre,
                                            nom_prod,
                                            date_entre,
                                            quantite_entre,
                                            priuni_entre,
                                            prix_estimatio
                                            FROM
                                            tbl_entreprod AS entpro INNER JOIN tbl_produit AS prod ON(entpro.id_prod=prod.id_prod)";
                                            $recupdata=$my_bd->prepare($sql);
                                            $recupdata->execute();
                                            $entdepot=$recupdata->fetchAll(PDO::FETCH_ASSOC);                                            
                                            ?>
                                            </div>
                                        <tbody>
                                            <?php
                                            foreach($entdepot as $entdepo){
                                            ?>
                                            <tr>
                                                <td class="td_font"><?=$entdepo['nom_prod']?></td>
                                                <td class="td_font"><?=$entdepo['date_entre']?></td>
                                                <td class="td_font"><?=$entdepo['quantite_entre']?></td>
                                                <td class="td_font"><?=$entdepo['priuni_entre']?> Fbu</td>
                                                <td class="td_font"><?=$entdepo['prix_estimatio']?> Fbu</td>
                                                <td class="colo_tot"><?=$entdepo['quantite_entre'] * $entdepo['priuni_entre']?> Fbu</td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
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
    <div class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="widget-shadow ">
        <div class="modal-header footline">
            <h5 class="form_title" id="exampleModalLabel">Categorie Produit</h5>
        </div>
        <form method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">

                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Numero Materiel</label>
                    <input type="text" name="num_entre" class="form-control" required>
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Date Entree</label>
                    <input type="date" name="date_entre"  class="form-control" required>
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Prix Achat</label>
                    <input type="number" name="prix_unient"  class="form-control">
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Quantite Achat</label>
                    <input type="number" name="quant_entre"  class="form-control">
                </div>
                <div class="col-12 col-lg-6 py-2">
                    <label class="label_text">Prix Estimatoire</label>
                    <input type="number" name="prix_estim"  class="form-control">
                </div>
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