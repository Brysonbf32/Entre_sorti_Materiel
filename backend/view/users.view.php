<?php
 include('includes/header.php');
?>
<style>
	.checkboide{
		font-size:13px;
	}
	.profile_named{
		font-size: 14px!important;
	}
</style>
    	<div id="page-wrapper">
			<div class="main-page">
				<div class="grids widget-shadow container">
						<div class="row">
							<div class="container">
							<div class="col-12 col-lg-2">
								<button class="bbtn btn-primary btn_ajout" type="button" data-toggle="modal" data-target="#exampleModal">&nbsp;Ajouter&nbsp;</button>
							</div>
							</div>
						</div>
							<div class="container">
								<div class="row">
										<?php
											$recupdate=$my_bd->query("SELECT * FROM tbl_utilisateurs");
											if($recupdate->rowCount()>0){
												while($checks= $recupdate->fetch()){
													$user_id= $checks['id_util'];
													$user_name= $checks['nom_util'];
													$user_mail= $checks['emai_util'];
													$user_pass= $checks['passwo_util'];
													$user_image= $checks['img_util'];
													$user_role= $checks['role_util'];
										?>
									<div class="col-12 col-lg-3">										
																				<!-- Modal EDIT & UPDATE USERS -->
										<div class="modal fade" id="<?=$user_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="widget-shadow ">
												<div class="modal-header footline">
													<h5 class="form_title" id="exampleModalLabel">Modifier Utilisateur</h5>
												</div>
												<form method="POST" enctype="multipart/form-data">
													<div class="modal-body">
														<div class="form_item">
															<label class="label_text">Photo Profile</label>
															<input class="inputeall" name="photo_us" type="file"> 
														</div>
													<div class="form_wrap fullname">
													<div class="form_item">
														<label class="label_text">Nom Utilisateur</label>
														<input class="inputeall" name="name_us" value="<?=$user_name?>" type="text"> 
														<input class="inputeall" name="id_us" value="<?=$user_id?>" type="hidden" > 
													</div>
													<div class="form_item">
														<label class="label_text">Role</label>
														<input class="inputeall" name="role_us" value="<?=$user_role?>" type="text"> 
														</div>
														</div>
														<div class="form_wrap fullname">
														<div class="form_item">
														<label class="label_text">E-mail</label>
														<input class="inputeall" name="mail_us" value="<?=$user_mail?>" type="mail">
														</div>
														<div class="form_item">
														<label class="label_text">Mot de Passe</label>
														<input class="inputeall" name="passw_us" value="<?=$user_pass?>"  type="text">
														</div>
													</div>
												</div>
												<div class="modal-footer footline">
													<button class="btn btn-primary btn_submit btn-sm" type="submit" name="modifier"><i class="fa fa-plus"></i>&nbsp;Update</button>
													<button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
												</div>
												</div>
												</form>
											</div>
										</div>
									       <!---------------------------------- DELETE MODAL ---------------------------------------->
										<div class="modal fade" id="dlt<?=$user_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-sm " role="document">
                                                <div class="widget-shadow btn_formcard">
                                                    <form method="POST">
														<div class="modal-body">
															<div class="form-group pt-5 text-center">
																<i class="fa fa-exclamation-triangle btn_deleteclr"></i>
																<label class="delete_text">Veux-tu supprimer <span class="delete_name"><?=$user_name?></span>?</label>
																<br><br>
																<input type="hidden" name="id_us" value="<?=$user_id?>">
															</div>
															<div class="text-center">
																<button class="btn btn-primary btn_delet_popup btn-sm" type="submit"  name="delete"><i class="fa fa-trash"></i>&nbsp;Suprimmer</button>
																<button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Fermer</button>
															</div>
														</div>
                                                    </form>
                                                </div>
											</div>
										</div>
													<div class="card" >
														<img src="images/<?=$user_image?>" class="card-img-top img-fluid py-3" height="140px">
														<br><br>
														<div class="card-body">
														<span class="profile_name py-4"><?=$user_name?></span>
															<table>
																<tr>
																	<th class="userth_title" width="90">E-mail </th>
																	<th width="20">:</th>
																	<td class="usertd_para"><?=$user_mail?></td>
																</tr>
																<tr>
																	<th class="userth_title" width="90">Mot de Pass </th>
																	<th width="20">:</th>
																	<td class="usertd_para"><?=$user_pass?></td>
																</tr>
																<tr>
																	<th class="userth_title" width="90">Role </th>
																	<th width="20">:</th>
																	<td class="usertd_para"><?=$user_role?></td>
																</tr>
															</table>
															<p class="btn_user">
																<button class="btn btn-primary btn_edit btn-sm" type="button" data-toggle="modal" data-target="#<?=$user_id?>"><i class="fa fa-pencil-square-o"></i>&nbsp;Editer</button>&nbsp;
																<button data-toggle="modal" data-target="#dlt<?=$user_id?>" class="btn btn-primary btn_delet btn-sm"><i class="fa fa-trash"></i>&nbsp;Supprimer</button>
															</p>
														</div>
													</div>																					
									</div>
														<?php
														}
													}
												?>	
								
								</div>
							</div>
				
				</div>
			</div>
		</div>
	
<!-- Modal ADD USERS-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="widget-shadow ">
      <div class="modal-header footline">
        <h5 class="form_title" id="exampleModalLabel">Ajouter Utilisateur</h5>
      </div>
    <form method="POST" enctype="multipart/form-data">
      <div class="modal-body">
	  	<div class="form_item">
			<label class="label_text">Photo  de Profile</label>
			<input class="inputeall" name="photo_us" type="file"> 
		</div>
          <div class="form_wrap fullname">
            <div class="form_item">
            <label class="label_text">Nom Utiliateur</label>
            <input class="inputeall" autocomplete="off" name="name_us" type="text" required> 
            </div>
            <div class="form_item">
            <label class="label_text">E-mail</label>
            <input class="inputeall" name="mail_us" type="mail" required>
            </div>
        	</div>
        	<div class="form_wrap fullname">
            <div class="form_item">
            <label class="label_text">Mot de Passe</label>
            <input class="inputeall" name="passw_us" type="password" required>
            </div>
			<div class="form_item">
            <label class="label_text">Role</label>
            <select  class="inputeall" name="role_us" >
            <option  class="checkboide">Choisir Role</option>
            <option value="administrateur" class="checkboide">Admin</option>
			<option value="agent"  class="checkboide">Agent</option>

            </select>
            </div>
        	</div>
      </div>
      <div class="modal-footer footline">
	  	<button class="btn btn-primary btn_submit btn-sm" type="submit" name="save"><i class="fa fa-plus"></i>&nbsp;Ajouter</button>
        <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Fermer</button>
      </div>
     </div>
    </form>
  </div>
</div>


<?php
include('includes/footer.php');
?>