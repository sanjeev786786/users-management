<?php //print_r($billing);  ?>
<div id="page-wrapper">
            <div class="row">
			   <?php 
					if($this->session->flashdata('msg')!='')
					{ 
					?>
					  <div class="alert alert-success alert-dismissable" id="mydiv" style="margin-top:5px;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4>	<i class="icon fa fa-check"></i><?php echo $this->session->flashdata('msg') ?></h4>
					   
					  </div>
				<?php } ?>	
                <div class="col-lg-12">
                    <h1 class="page-header">Profile</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Profile Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" action="<?php echo base_url(); ?>profile/updateprofile">
									 <input type="hidden" class="form-control" name="shipmentid" value="<?php echo $shipment['id'];?>">
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input id="fname_ship" class="form-control" name="firstnameshipment" value="<?php echo $shipment['first_name'];   ?>">
                                            <span class="error"></span>
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input id="lname_ship"  class="form-control" name="lastnameshipment" value="<?php echo $shipment['last_name']; ?>" placeholder="Enter text">
											<span class="error"></span>
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control"  name="companynameshipment" value="<?php echo $shipment['company_name'];?>">
                                            <span class="error"></span>
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input id="stret_ship" class="form-control" name="streetshipment" placeholder="Enter text" value="<?php echo $shipment['street'];   ?>">
											<span class="error"></span>
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Number</label>
                                            <input id="numbr_ship" name="numbershipment" class="form-control"  value="<?php echo $shipment['number']; ?>">
                                            <span class="error"></span>
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Postcode</label>
                                            <input id="pstcode_ship" name="postcodeshipment" class="form-control" placeholder="Enter text" value="<?php echo $shipment['postcode'];   ?>">
											<span class="error"></span>
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control" id="country_ship" onchange="showUser(this.value)" name="countryshipment">
                                                <option value="">Country</option>
											    <?php foreach($country as $values) { ?>
											
                                                <option value="<?php echo $values->id; ?>" 
												<?php if ($values->id == $shipment['country_id'])  echo 'selected = "selected"'; ?>
												>
												  <?php  echo $values->name; ?>
			                                    </option>
												<?php } ?>
                                            </select>
                                            
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group" id="city">

											<div  style="display:none;" class="form-group">
											 <label>City</label>
											  
											</div>
										   <div style="display:block;" >
										   <label>City</label>
											<select class="form-control" name="cityshipment" id="cityshipment">
											     
										        <option value=''>City</option>

										    </select>
											</div>
											
											
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input id="ph_ship" class="form-control" name="phonenumbershipment" value="<?php echo $shipment['phone_number'];   ?>">
                                            
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
									   <input class="checkbox_check" type="checkbox" onclick="myFunction()" name="Shipment" <?php if ($billing['type'] == 'billing') { echo "checked='checked'"; } ?> >For different Shipping & Billing Address
									  </div>
									  <div class="col-md-6">
									  </div>
									  </div>
									  <?php if ($billing['type'] == 'billing') { ?>
									   <div id="myDIV">
									     <input type="hidden" class="form-control" name="billingid"  value="<?php echo $billing['id'];?>">
										<div class="col-md-12">
										  <div class="col-md-6">
											<div class="form-group">
												<label>First Name</label>
												<input class="form-control" name="firstnamebilling" id="fname_bill" value="<?php echo $billing['first_name'];?>">
												<span class="error"></span>
											</div>
										   </div>
										   <div class="col-md-6">
											<div class="form-group">
												<label>Last Name</label>
												<input class="form-control" placeholder="Enter text" name="lastnamebilling" id="lname_bill" value="<?php echo $billing['last_name'];?>">
												<span class="error"></span>
											</div>
										   </div>
										 </div>
									       <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" name="companynamebilling"  value="<?php echo $billing['company_name'];?>">
											<span class="error"></span>
                                            
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input name="streetnamebilling" class="form-control" placeholder="Enter text" value="<?php echo $billing['street'];?>" id="stret_bill">
											<span class="error"></span>
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Number</label>
                                            <input name="numbernamebilling" id="numbr_bill" class="form-control" value="<?php echo $billing['number'];?>">
                                            <span class="error"></span>
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Postcode</label>
                                            <input name="postcodebilling" class="form-control" placeholder="Enter text" id="postcode_bill" value="<?php echo $billing['postcode'];?>">
											<span class="error"></span>
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control" onchange="show(this.value)" name="countrybilling" id="country_bill">
                                                <option value="">Country</option>
											    <?php foreach($country as $values) { ?>
											
                                                <option value="<?php echo $values->id; ?>"<?php if ($values->id == $billing['country_id'])  echo 'selected = "selected"'; ?> ><?php  echo $values->name; ?>
			                                    </option>
												<?php } ?>
                                            </select>
                                            
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group" id="city">
                                            
                                            <!--<select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>-->
											<div  style="display:none;" class="form-group">
											 <label>City</label>
											
											</div>
										   <div style="display:block;" >
										   <label>City</label>
											<select class="form-control" name="citybilling" id="state-list">
											     
										        <option value=''>City</option>

										    </select>
											</div>
											
											
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" id="ph_bill" name="phonebilling" value="<?php echo $billing['phone_number'];?>">
                                            <span class="error"></span>
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        
                                       </div>
									 </div>
									   
									 </div>
									 <?php }else{ ?>
									   <div id="myDIV" style="display:none;">
									   
										<div class="col-md-12">
										  <div class="col-md-6">
											<div class="form-group">
												<label>First Name</label>
												<input class="form-control" name="firstnamebilling" id="fname_bill">
												<span class="error"></span>
											</div>
										   </div>
										   <div class="col-md-6">
											<div class="form-group">
												<label>Last Name</label>
												<input class="form-control" placeholder="Enter text" name="lastnamebilling" id="lname_bill"><span class="error"></span>
											</div>
										   </div>
										 </div>
									       <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company Name</label>
                                            <input class="form-control" name="companynamebilling" >
                                            <span class="error"></span>
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input class="form-control"  placeholder="Enter text" name="streetnamebilling" id="stret_bill"><span class="error"></span>
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Number</label>
                                            <input class="form-control" name="numbernamebilling" id="numbr_bill">
                                            <span class="error"></span>
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Postcode</label>
                                            <input class="form-control" name="postcodebilling" placeholder="Enter text" id="postcode_bill"><span class="error"></span>
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control" onchange="show(this.value)" name="countrybilling" id="country_bill">
                                                <option value="">Country</option>
											    <?php foreach($country as $values) { ?>
											
                                                <option value="<?php echo $values->id; ?>"><?php  echo $values->name;   ?>
			                                    </option>
												<?php } ?>
                                            </select>
                                            
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        <div class="form-group" id="city">
                                            
                                            <!--<select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>-->
											<div  style="display:none;" class="form-group">
											 <label>City</label>
											
											</div>
										   <div style="display:block;" >
										   <label>City</label>
											<select class="form-control" name="citybilling" id="state-list">
											     
										        <option value=''>City</option>

										    </select>
											</div>
											
											
                                        </div>
                                       </div>
									 </div>
									 <div class="col-md-12">
									  <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input class="form-control" name="phonebilling" id="ph_bill">
                                            <span class="error"></span>
                                        </div>
                                       </div>
									   <div class="col-md-6">
                                        
                                       </div>
									 </div>
									   
									 </div>
									   
									   
									   
									   
									   
									   
									   <?php } ?>
									 
									 
									 
									 <div class="col-md-12">
									  <div class="col-md-6">
									 
                                        <button type="submit" class="btn btn-default signup">Update</button>
                                        </div>
									  </div>	
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
<script>
jQuery(document).ready(function(){
	
	if(jQuery("select[name='countryshipment']").trigger("change")){ 
	
	setTimeout(function(){ jQuery("select[id='cityshipment'] option[value='<?php echo $shipment['city_id']; ?>']").attr("selected","selected");}, 1000);
	
	}

	
	if(jQuery("select[name='countrybilling']").trigger("change")){ 
	
	setTimeout(function(){ jQuery("select[id='state-list'] option[value='<?php echo $billing['city_id']; ?>']").attr("selected","selected");}, 1000);
	
	}	

	
});
function showUser(str)
{
	//alert(str); exit();
	$.ajax({
	type: "POST",
	url: "<?php echo base_url(); ?>profile/ajax_call",
	data:'q='+str,
	success: function(data){
		$("#cityshipment").html(data);
	}
	});
 
}
function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
function show(city){
	//alert(city); exit();
	$.ajax({
	type: "POST",
	url: "<?php echo base_url(); ?>profile/district_data",
	data:'country_id='+city,
	success: function(data){
		$("#state-list").html(data);
	}
	});
}
</script>
<script>
$(document).ready(function(){
	
		$(".signup").click(function(e){
		var fship=$('#fname_ship').val();
		var lship=$('#lname_ship').val();
		var phship=$('#ph_ship').val();
		var pstship=$('#pstcode_ship').val();
		var name_regex = /^[a-zA-Z]+$/;
		var lname_regex = /^[a-zA-Z ]*/;
		var pst_regex = /^[0-9]+$/;
		var phone=/^[0-9-+]+$/;
		if(($('#fname_ship').val()=="") || !fship.match(name_regex)) {
			 $('#fname_ship').focus();
			 $('#fname_ship' ).next( ".error" ).html("First Name Required");
			  $('#fname_ship' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#lname_ship').val()=="") || !lship.match(lname_regex)) {
			 $('#lname_ship').focus();
			 $('#lname_ship' ).next( ".error" ).html("Last Name Required");
			 $('#lname_ship' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#comp_ship').val())=="") {
			 $('#comp_ship').focus();
			 $('#comp_ship' ).next( ".error" ).html("Company Name Required");
			 $('#comp_ship' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#stret_ship').val())=="") {
			 $('#stret_ship').focus();
			 $('#stret_ship' ).next( ".error" ).html("Street Address Required");
			 $('#stret_ship' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#numbr_ship').val())=="") {
			 $('#numbr_ship').focus();
			 $('#numbr_ship' ).next( ".error" ).html("Shipment Number Required");
			 $('#numbr_ship' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#pstcode_ship').val()=="")|| (!pstship.match(pst_regex)) || (pstship>9999 || pstship<1000)) {
			 $('#pstcode_ship').focus();
			 $('#pstcode_ship' ).next( ".error" ).html("Postcode Required Between 1000 to 9999");
			 $('#pstcode_ship' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		    if(($('#country_ship').val())=="") {
			 $('#country_ship').focus();
			 $('#country_ship' ).next( ".error" ).html("Country Required");
			 $('#country_ship' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#cityshipment').val())=="") {
			 $('#cityshipment').focus();
			 $('#cityshipment' ).next( ".error" ).html("City Required");
			 $('#cityshipment' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#ph_ship').val()=="") || !phship.match(phone)) {
			 $('#ph_ship').focus();
			 $('#ph_ship' ).next( ".error" ).html("Phone Number Required");
			 $('#ph_ship' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   /*******************Billing address*****************/
		   if ($('input.checkbox_check').is(':checked')){
			var fbill=$('#fname_bill').val();
				var lbill=$('#lname_bill').val();
				var phbill=$('#ph_bill').val();
				var pstbill=$('#postcode_bill').val();
				var name_regex = /^[a-zA-Z]+$/;
				var lname_regex = /^[a-zA-Z ]*/;
				var pst_regex = /^[0-9]+$/;
				var phone=/^[0-9-+]+$/;
			if(($('#fname_bill').val()=="") || !fbill.match(name_regex)) {
				 $('#fname_bill').focus();
				 $('#fname_bill' ).next( ".error" ).html("First Name Required");
				 $('#fname_bill' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   } 
              if(($('#lname_bill').val()=="") || !lbill.match(lname_regex)) {
				 $('#lname_bill').focus();
				 $('#lname_bill' ).next( ".error" ).html("Last Name Required");
				 $('#lname_bill' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#comp_bill').val())=="") {
				 $('#comp_bill').focus();
				 $('#comp_bill' ).next( ".error" ).html("Company Name Required");
				 $('#comp_bill' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#stret_bill').val())=="") {
				 $('#stret_bill').focus();
				 $('#stret_bill' ).next( ".error" ).html("Street Address Required");
				 $('#stret_bill' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#numbr_bill').val())=="") {
				 $('#numbr_bill').focus();
				 $('#numbr_bill' ).next( ".error" ).html("Shipment Number Required");
				 $('#numbr_bill' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#postcode_bill').val()=="")|| (!pstbill.match(pst_regex)) || (pstbill>9999 || pstbill<1000)) {
				 $('#postcode_bill').focus();
				 $('#postcode_bill' ).next( ".error" ).html("Postcode Required Between 1000 to 9999");
				 $('#postcode_bill' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
				if(($('#country_bill').val())=="") {
				 $('#country_bill').focus();
				 $('#country_bill' ).next( ".error" ).html("Country Required");
				 $('#country_bill' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#state-list').val())==""){
				 $('#state-list').focus();
				 $('#state-list' ).next( ".error" ).html("City Required");
				 $('#state-list' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#ph_bill').val()=="") || !phbill.match(phone)){
				 $('#ph_bill').focus();
				 $('#ph_bill' ).next( ".error" ).html("Phone Number Required");
				 $('#ph_bill' ).next( ".error" ).css( {"display":"block","color":"red"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }			   
		   }
		});
});

</script>		