     	  
	  <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				    <?php 
					if($this->session->flashdata('msg')!='')
					{ 
					?>
					  <div class="alert alert-success alert-dismissable" id="mydiv" style="margin-top:5px;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4>	<i class="icon fa fa-check"></i><?php echo $this->session->flashdata('msg') ?></h4>
					   
					  </div>
				<?php } ?>	
                    <h1 class="page-header">Settings</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Settings Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form"  method="post" action="<?php echo base_url(); ?>settings/updatesettings">
                                          
                                        
                                        <div class="form-group">
                                            <label>USER_ADDRESS_REQUEST</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="USER_ADDRESS_REQUEST" id="optionsRadios1" value="1" <?php if ( get_settings('2') == '1') { echo "checked"; } ?> >It requires the profile
                                                    management associated with the
                                                    "USER" role.
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="USER_ADDRESS_REQUEST" id="optionsRadios2" value="0" <?php if ( get_settings('2') == '0') { echo "checked"; } ?> >No profile is requested for the
                                                    "USERS".
                                                </label>
                                            </div>
                                            
                                        </div>
										<div class="form-group">
                                            <label>ADMIN_ADDRESS_REQUEST</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="ADMIN_ADDRESS_REQUEST" id="optionsRadios1" value="1" <?php if ( get_settings('3') == '1') { echo "checked"; } ?> >It requires the management of
													the profile associated with the
													"ADMIN" roles.
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="ADMIN_ADDRESS_REQUEST" id="optionsRadios2" value="0"  <?php if ( get_settings('3') == '0') { echo "checked"; } ?> >No profile is requested for the
                                                    "ADMIN".
                                                </label>
                                            </div>
                                            
                                        </div>
										<div class="form-group">
                                            <label>CUSTOMER_ADDRESS_REQUEST</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="CUSTOMER_ADDRESS_REQUEST" id="optionsRadios1" value="1" <?php if ( get_settings('1') == '1') { echo "checked"; } ?> >It requires the management of
													the profile associated with the
													"CUSTOMER" roles.
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="CUSTOMER_ADDRESS_REQUEST" id="optionsRadios2" value="0" <?php if ( get_settings('1') == '0') { echo "checked"; } ?> >No profile is requested for the
                                                    "CUSTOMERS".
                                                </label>
                                            </div>
                                            
                                        </div>
										<div class="form-group">
                                            <label>MINIMAL_BIRTHDAY_DAY</label>
                                            <input class="form-control"  placeholder="MINIMAL_BIRTHDAY_DAY" name="MINIMAL_BIRTHDAY_DAY" value="<?php echo get_settings('4'); ?>">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>MINIMAL_PASSWORD_LENGTH</label>
                                            <input class="form-control" placeholder="MINIMAL_PASSWORD_LENGTH" name="MINIMAL_PASSWORD_LENGTH" value="<?php echo get_settings('5');?>">
                                        </div>
                                        <!--<div class="form-group">
                                            <label>Inline Radio Buttons</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label>Selects</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>-->
                                        
                                        <input type="submit" class="btn btn-success" name="update1" value="update" >
                                       
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->