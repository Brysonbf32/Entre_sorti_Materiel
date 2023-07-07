<?php
 include('includes/header.php');
?>
		<div id="page-wrapper">
			<div class="main-page">
				<h2 class="title1">All Services </h2>
				<div class="elements">
					<!--photoday-section-->	
                    	<div class="col-sm-8 wthree-crd widgettable">
                            <div class="card">
                                <div class="card-body">
							 <div class="agileinfo-cdr">             
                                <div class="card-header">
                                  <p><button class="btn btn-primary btn_addinfo btn-sm"  type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp;Add </button>
                                  <input type="text" class="searchservi_input" placeholder="Search"><button class="search_icon" type="submit"><i class="fa fa-search"></i></button>
                                  </p>
                                </div><br>
                                 <div class="widget-body">
                                    <table class="table">
                                         <thead>
                                            <tr>
                                            <th>S.Name</th>
                                            <th>S.Description</th>
                                            <th class="acttabl">Action</th>
                                            </tr>
                                        </thead>
                                          <!---------------- MODAL VIEW USERS ----------------------->
                                        <?php
                                            $class0=$my_bd->query("SELECT * FROM tbl_services ORDER BY s_id DESC");
                                            if($class0->rowCount()>0){
                                            while($check0=$class0->fetch()){
                                                $serv_id=$check0['s_id'];
                                                $serv_nameaaa=$check0['s_name'];
                                                $serv_descaaa=$check0['s_description'];
                                                $serv_image=$check0['image_serv'];
                                                ?>
                                                <!---------------- MODAL EDIT PAGE----------------------->
                                            <div class="modal fade" id="<?=$serv_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="widget-shadow ">
                                                <div class="modal-header footline">
                                                    <h5 class="form_title" id="exampleModalLabel">Service</h5>
                                                </div>
                                                <form method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="label_text">Service Name</label>
                                                        <input type="text" name="serv_name" value="<?=$serv_nameaaa?>"  class="inputeall" required>
                                                        <input type="hidden" name="id_auto" value="<?=$serv_id?>"  class="inputeall" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="label_text">Description</label>
                                                        <textarea name="serv_descr" class="inputeall" align="right" rows="5" required> <?=$serv_descaaa?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="label_text">Image Service</label>
                                                        <input type="file" name="image_name"  class="inputeall" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer footline">
                                                    <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                    <button class="btn btn-primary btn_submit btn-sm" type="submit" name="update"><i class="fa fa-plus"></i>&nbsp;Update</button>
                                                </div>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                            <!---------------------------------- DELETE MODAL ---------------------------------------->
                                            <div class="modal fade" id="dlt<?=$serv_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="widget-shadow ">
                                                <form method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="delete_text">Do you want to delete the service of <span class="delete_name"><?=$serv_nameaaa?></span>?</label>
                                                        <input type="hidden" name="id_auto" value="<?=$serv_id?>"  class="inputeall" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer footline">
                                                    <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
                                                    <button class="btn btn-primary btn_delet_popup btn-sm" type="submit"  name="delete"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                                </div>
                                                </div>
                                                </form>
                                            </div>
                                            </div>
                                        <tbody>
                                            <tr>
                                            <td><?=$serv_nameaaa?></td>
                                            <td><details><p class="detailpro"><?=$serv_descaaa?></p></details></td>
                                            <td width="170">
                                                <button  data-toggle="modal" data-target="#<?=$serv_id?>" class="btn btn-primary btn_edit btn-sm" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil-square-o"></i>&nbsp;Edit</button>&nbsp;
                                                <button data-toggle="modal" data-target="#dlt<?=$serv_id?>" class="btn btn-primary btn_delet btn-sm"><i class="fa fa-trash"></i>&nbsp;Delete</button>
                                            </td>
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
            <h5 class="form_title" id="exampleModalLabel">Service</h5>
        </div>
        <form method="POST"  enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label class="label_text">Service Name</label>
                <input type="text" name="serv_name"  class="inputeall" required>
            </div>
            <div class="form-group">
                <label class="label_text">Description</label>
                <textarea name="serv_descr" class="inputeall" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label class="label_text">Image Service</label>
                <input type="file" name="image_name"  class="inputeall" required>
            </div>
        </div>
        <div class="modal-footer footline">
            <button class="btn btn-primary btn_close btn-sm" data-dismiss="modal" type="submit"><i class="fa fa-close"></i>&nbsp;Close</button>
            <button class="btn btn-primary btn_submit btn-sm" type="submit"  name="save"><i class="fa fa-plus"></i>&nbsp;Save</button>
        </div>
        </div>
        </form>
    </div>
</div>
<br><br>
<?php
 include('includes/footer.php');
?>