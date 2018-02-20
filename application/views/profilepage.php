<?php  //print_r($shipment);  ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Company Name</th>
        <th>Street</th>
        <th>Postcode</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
	
      <tr>
        <td><?php echo $billing['first_name']; ?></td>
        <td><?php echo $billing['last_name']; ?></td>
        <td><?php echo $billing['company_name']; ?></td>
        <td><?php echo $billing['street']; ?></td>
        <td><?php echo $billing['number']; ?></td>
		<?php  
		 if($billing['type'] !== Null && $shipment['type'] ==''){ ?>
	             <td> Billing</td>
		 <?php }elseif($billing['type'] !==Null && $shipment['type'] !==Null){ ?>
		       <td> Billing and Shipment</td>
		 <?php } ?>
		<td><button type="button" class="btn btn-outline-primary">Edit</button></td>
      </tr>
	 
    </tbody>
  </table>
        </div>
        <!-- /#page-wrapper -->


