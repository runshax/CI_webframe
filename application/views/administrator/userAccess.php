<!doctype html>

<div id="content">
    <div class="outer">
        <div class="inner bg-light lter" style="min-height: 700px;">
            <!--Begin Datatables-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <header>
                            <div class="icons"><i class="fa fa-table"></i></div>
                            <h5>User Access</h5>
                        </header>
                        <div id="collapse4" class="body">
<!--                            <div class="col-lg-2">
                                <button type="button" class="btn btn-block btn-sm btn-primary" onClick="modalUserAccess();">
                                    <span class="fa fa-plus"></span>&nbsp;&nbsp;Add New
                                </button>  
                                 <br>
                            </div>-->
                            
                           

                            <table id="tblUserAccess" class="table table-bordered table-striped">
                                <thead>
                                    <tr>                               
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Group</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!--End Datatables-->




        </div>
        <!-- /.inner -->
    </div>
    <!-- /.outer -->
</div>
<!-- /#content -->

<!-- Modal BEST MOT -->
<div id="modalUserAccess" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="idModalHeaderUserAccess" class="modal-title"></h4>
            </div>
            <div class="modal-body">

                <!-- CONTENT MODAL BEST MOT -->
                <?php $attributes = array("id" => "formUserAccess", "autocomplete" => "off"); 
                echo form_open(base_url() . "userAccess/processUserAccess", $attributes); ?>
                
                <div class="modal-header"><h4 class="modal-title" id="titleModal"></h4></div>
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-3">User ID</div>
                        <div class="col-md-5">
                            <?php $user_id = array(
                                                "name"          => "user_id", 
                                                "id"            => "id-user_id",
                                                "value"         => "",
                                                "required"      => "required", 
                                                "class"         => "form-control readonly"
                                                );
                            echo form_input($user_id); ?>
                        </div>
                        <div id="idBtnEmployee" class="col-xs-1">
                            <button class="btn btn-default" type="button" onclick="modalEmployee();"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Employee ID</div>
                        <div class="col-md-5">
                            <?php $employee_id = array(
                                                "name"          => "employee_id", 
                                                "id"            => "id-employee_id",
                                                "value"		  	=> "",
                                                "required"      => "required", 
                                                "class"         => "form-control readonly"
                                                );
                            echo form_input($employee_id); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Full Name</div>
                        <div class="col-md-5">
                            <?php $tsr_name = array(
                                                "name"          => "tsr_name", 
                                                "id"            => "id-tsr_name",
                                                "value"		=> "",
                                                "required"      => "required", 
                                                "class"         => "form-control"
                                                );
                            echo form_input($tsr_name); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Sales ID</div>
                        <div class="col-md-5">
                            <?php $tsr_name = array(
                                                "name"          => "sales_id", 
                                                "id"            => "id-sales",
                                                "value"		=> "",
                                                "required"      => "required", 
                                                "class"         => "form-control"
                                                );
                            echo form_input($tsr_name); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Password</div>                       
                        <div class="col-md-5">
                            <?php $password = array(
                                                "name"          => "password", 
                                                "id"            => "id-password",
                                                "value"		=> "",
                                                "required"      => "required", 
                                                "class"         => "form-control"
                                                );
                            echo form_input($password); ?> 
                            
                            <?php $password2 = array(
                                                "name"          => "password2", 
                                                "id"            => "id-password2",
                                                "value"		=> "",
                                                "type"		=> "hidden",
                                                "class"         => "form-control"
                                                );
                            echo form_input($password2); ?> 
                            
                            
                            <span id="koko">leave blank to keep old password</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">User Level ID</div>
                        <div class="col-md-5">
                            <?php
                            $arrWeek = array(1 => 1, 2 => 2, 3 => 3, 4 => 4); 
                            echo form_dropdown('user_level_id', $userLevels, "", " class='form-control' id='id-user_level_id' "); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Valid From</div>
                        <div class="col-md-5">
                            <div class="input-group">
                                <?php $valid_from = array(
                                                    "name"          => "valid_from", 
                                                    "id"            => "id-valid_from",
                                                    "value"		  	=> "",
                                                    "required"      => "required", 
                                                    "class"         => "form-control readonly"
                                                    );
                                echo form_input($valid_from); ?>
                                <span class="input-group-btn">
                                    <button type="button" id="dateValidFrom" class="btn btn-default" style=""><span class="glyphicon glyphicon-calendar"></span></button>
                                </span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row form-group">
                        <div class="col-md-3">Valid To</div>
                        <div class="col-md-5">
                            <div class="input-group">
                                <?php $valid_to = array(
                                                    "name"          => "valid_to", 
                                                    "id"            => "id-valid_to",
                                                    "value"		  	=> "",
                                                    "required"      => "required", 
                                                    "class"         => "form-control readonly"
                                                    );
                                echo form_input($valid_to); ?>
                                <span class="input-group-btn">
                                    <button type="button" id="dateValidTo" class="btn btn-default" style=""><span class="glyphicon glyphicon-calendar"></span></button>
                                </span>
                            </div>
                        </div>
                        
                    </div>
		    <div class="row form-group">
                        <div class="col-md-3">Menu</div>
                        <div class="col-md-5">
                            <div class="input-group" id='selcek'>
                                <?php echo $menuSelector;?>
                               
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;&nbsp;Save
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove-circle"></span>&nbsp;&nbsp;Cancel
                    </button>                
                </div>
                </form>
                <!-- END OF: CONTENT MODAL BEST MOT -->
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>
<!-- END OF: Modal BEST MOT -->

<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/plug-ins/1.10.7/api/fnReloadAjax.js"></script>

<script language=javascript>


    $(document).ready(function () {


        $('#Administrator').addClass("active");
        getJsonUserAccess();
       


    });
    
    function modalUserAccess() {
        $("#idBtnEmployee").show();
        
        $("#id-user_id").val("");
        $('#formUserAccess').trigger("reset");
        $("#modalUserAccess").modal("show");      
        
        $('#koko').hide();
        
    }
    
     function getJsonUserAccess() {
         
        $('#tblUserAccess').dataTable({
            "sDom":'T<".table-filter"><"top"fl>rt<"bottom"ip>',
            "bProcessing": true,
            "bDestroy": true,
            "bServerSide": true,
            "sServerMethod": "POST",
            "sAjaxSource": "<?php echo base_url();?>Admin/getJsonUserAccess",		
            "iDisplayLength": 10,
            "aLengthMenu": [[10, 25, 50, 100, 500, 1000, 2000, 5000], [10, 25, 50, 100, 500, 1000, 2000, 5000]],
            "oTableTools": {
                "aButtons": [  ],
                },
            "aoColumns": [
                { "bVisible": true, "bSearchable": true,  "bSortable": true },
                { "bVisible": true, "bSearchable": true,  "bSortable": false },
                { "bVisible": true, "bSearchable": true,  "bSortable": true },
                { "bVisible": true, "bSearchable": false,  "bSortable": false }
            ],
            "aoColumnDefs": [
                { "sClass": "text-center", "aTargets": [ 0, 1, 2, 3] },
            ],
            "aaSorting": [[0,'desc']]
            });
    }


    // });


</script>

