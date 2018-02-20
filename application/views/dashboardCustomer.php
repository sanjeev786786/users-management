<?php //print_r($billing); ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Address</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
            <div class="row">
			    <?php  if($billing['type'] !==Null && $shipment['type'] !==Null){ ?>
			     <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Billing
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                     First Name
                                    <span class="pull-right text-muted "><em><?php echo $billing['first_name'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                     Last Name
                                    <span class="pull-right text-muted "><em><?php echo $billing['last_name'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    Company Name
                                    <span class="pull-right text-muted "><em><?php echo $billing['company_name'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                   Street
                                    <span class="pull-right text-muted "><em><?php echo $billing['street'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    	Number
                                    <span class="pull-right text-muted "><em><?php echo $billing['number'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    Postcode
                                    <span class="pull-right text-muted "><em><?php echo $billing['postcode'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                     Phone Number
                                    <span class="pull-right text-muted "><em><?php echo $billing['phone_number'];?></em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="<?php echo base_url(); ?>profile" class="btn btn-default btn-block">Edit All</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                </div>
			
			
			
           
                <!-- /.col-lg-8 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Shipment
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                     First Name
                                    <span class="pull-right text-muted "><em><?php echo $shipment['first_name'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                     Last Name
                                    <span class="pull-right text-muted "><em><?php echo $shipment['last_name'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    Company Name
                                    <span class="pull-right text-muted "><em><?php echo $shipment['company_name'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                   Street
                                    <span class="pull-right text-muted "><em><?php echo $shipment['street'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    	Number
                                    <span class="pull-right text-muted "><em><?php echo $shipment['number'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    Postcode
                                    <span class="pull-right text-muted "><em><?php echo $shipment['postcode'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                     Phone Number
                                    <span class="pull-right text-muted "><em><?php echo $shipment['phone_number'];?></em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="<?php echo base_url(); ?>profile" class="btn btn-default btn-block">Edit All</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                </div>
				<?php }elseif($shipment['type'] !== Null && $billing['type'] ==''){ ?>
                 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Shipment
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                     First Name
                                    <span class="pull-right text-muted "><em><?php echo $shipment['first_name'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                     Last Name
                                    <span class="pull-right text-muted "><em><?php echo $shipment['last_name'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    Company Name
                                    <span class="pull-right text-muted "><em><?php echo $shipment['company_name'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                   Street
                                    <span class="pull-right text-muted "><em><?php echo $shipment['street'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    	Number
                                    <span class="pull-right text-muted "><em><?php echo $shipment['number'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    Postcode
                                    <span class="pull-right text-muted "><em><?php echo $shipment['postcode'];?></em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                     Phone Number
                                    <span class="pull-right text-muted "><em><?php echo $shipment['phone_number'];?></em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <a href="<?php echo base_url(); ?>profile" class="btn btn-default btn-block">Edit All</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                </div>
				 
				 
				<?php  }  ?>  
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


