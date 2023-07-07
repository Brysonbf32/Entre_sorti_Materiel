<!DOCTYPE HTML>
<html>
<head>
<title>GMT</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />

<!-- font-awesome icons CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons CSS-->

<!-- side nav css file -->
<link href='css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css'/>
<!-- //side nav css file -->
 
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>

<!--webfonts-->
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts--> 

<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->

<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<style>
#chartdiv {
  width: 100%;
  height: 295px;
}
</style>
<!--pie-chart --><!-- index page sales reviews visitors pie chart -->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#2dde98',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#8e43e7',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ffc168',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });

    </script>
<!-- //pie-chart --><!-- index page sales reviews visitors pie chart -->

	<!-- requried-jsfiles-for owl -->
					<link href="css/owl.carousel.css" rel="stylesheet">
					<script src="js/owl.carousel.js"></script>
						<script>
							$(document).ready(function() {
								$("#owl-demo").owlCarousel({
									items : 3,
									lazyLoad : true,
									autoPlay : true,
									pagination : true,
									nav:true,
								});
							});
						</script>
					<!-- //requried-jsfiles-for owl -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
	<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
	<aside class="sidebar-left">
		<nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.php"><i class="fa fa-align-left" aria-hidden="true"></i> GMT<span class="dashboard_text">Gestion Materielle Tao</span></a></h1>
          </div>
          	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="sidebar-menu">
				<li class="header"></li>
				<li class="treeview">
					<li><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i>Accueil </a></li>
					<!-- <li><a href="etageur.php"><i class="fa fa-folder-open-o" aria-hidden="true"></i>Etagere</a></li>
					<li><a href="categories.php"><i class="fa fa-circle-o" aria-hidden="true"></i>Categories </a></li>
					<li><a href="materiel.php"><i class="fa fa-product-hunt" aria-hidden="true"></i>Materiels</a></li> -->
					<li><a href="entreprod.php"><i class="fa fa-clipboard"></i>Stock</a></li>
					<li><a href="sortieprod.php"><i class="fa fa-compress" aria-hidden="true"></i>Sorti</a></li>
					<li><a href="historic_entre.php"><i class="fa fa-briefcase"></i>Historique Entre</a></li>
					<li><a href="historic_sorti.php"><i class="fa fa-briefcase"></i>Historique Sorti</a></li>

				</li>
				</ul>
          	</div>
      	</nav>
    </aside>
	</div>
		<div class="sticky-header header-section ">
			<div class="header-left">
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<div class="clearfix"> </div>
			</div>
			<div class="header-right">
				<!--search-box-->
				<div class="profile_details">		
					<ul> 
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<!-- <span class="prfil-img"><img src="../images/<?=$imgage?>" width="50px" height="50px" alt=""> </span>  -->
									<div class="user-name">
										<p><?=$name?></p>
										<span><?=$role?></span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">

								<li> <a href="../../logout.php"><i class="fa fa-sign-out"></i> Deconnexion</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
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
                                        <div class="col-6 col-lg-2">
                                        <button class="btn btn-primary btn_addinfos" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Entrer</button>
                                        </div>
                                        <div class="col-6 col-lg-10">
                                            <input type="text" class="form-control" placeholder="Faire Recherche"><button class="search_icon" type="submit"></button>
                                        </div>
                                    </div>
                                </div>
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
                                            </tr>
                                        </thead>
                                            <!---------------- MODAL VIEW USERS ----------------------->
                                            <?php 
                                            $sql="SELECT 
                                            id_entrepro,
                                            nom_prod,
                                            ref_prod,
                                            ref_entre,
                                            date_entre,
                                            entre_quanti_pro,
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
                            <button class="btn btn-primary btn_submit btn-sm" type="submit" name="ajouter"><i class="fa fa-plus"></i>&nbsp;Entrer</button>
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