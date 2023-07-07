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
            <div class="col-sm-1"></div>
                <div class="col-12 col-lg-10 wthree-crd widgettable">
                    <div class="card">
                        <div class="card-body">
                            <div class="agileinfo-cdr">             
                            <div class="card-header">
                                  <input type="text" class="form-control" placeholder="Search"><button class="search_icon" type="submit"></button>
                                </div><br>
                                <div id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Produit</th>
                                                <th scope="col">D.Sorti</th>
                                                <th scope="col">Quantite Sorti</th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Total</th>

                                            </tr>
                                        </thead>
                                        <?php 
                                            $sql="SELECT 
                                            id_sorti,
                                            nom_prod,
                                            date_sorti,
                                            prix_sorti,
                                            prix_total,
                                            quantite_sorti
                                            FROM
                                            tbl_historic_sorti AS hist  INNER JOIN tbl_produits AS pro ON(hist.id_pro=pro.id_pro) WHERE id_util='$idutil'";
                                            $recupdata=$my_bd->prepare($sql);
                                            $recupdata->execute();
                                            $historic=$recupdata->fetchAll(PDO::FETCH_ASSOC);                                            
                                            ?>
                                            </div>
                                        <tbody>
                                            <?php
                                            foreach($historic as $histo){
                                            ?>
                                            <tr>
                                                <td class="td_font"><?=$histo['nom_prod']?></td>
                                                <td class="td_font"><?=$histo['date_sorti']?></td>
                                                <td class="td_font"><?=$histo['quantite_sorti']?></td>
                                                <td class="td_font"><?=$histo['prix_sorti']?> fbu</td>
                                                <td class="td_font"><?=$histo['prix_total']?> fbu</td>

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
</div>
<br><br>
<?php
 include('includes/footer.php');
?>