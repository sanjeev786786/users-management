<div class="cont_principal">
  <div class="cont_centrar">
       <div class="cont_tabs_login">
		  <ul class='ul_tabs'>
			<li class="active"><a href="#" onclick="sign_in()">SIGN UP</a>
			<span class="linea_bajo_nom"></span>
			</li>
		  </ul>
      </div>
 <div class="stepwizard col-md-offset-3">
 <input type="hidden" name="show_fd" id="show_fd" value="<?php echo $user_setting; ?>">
 <input type="hidden" name="psd_len" id="psd_len" value="<?php echo $password_length; ?>"/>
  <input type="hidden" name="mini_birth" id="mini_birth" value="<?php echo $mini_birth; ?>"/>
    <?php if($user_setting){ ?>
    <div class="stepwizard-row setup-panel">	   
          <div class="stepwizard-step">
			<a href="#step-1" class="btn btn-primary btn-circle">1</a>
			<p>Step 1</p>
           </div>
          <div class="stepwizard-step">
			<a href="javascript:void(0);" id="btndisb" class="btn btn-default btn-circle" disabled>2</a>
			<p>Step 2</p>
          </div>		 
    </div>
	 <?php } ?>
  </div>
   <form role="form" action="<?php echo base_url(); ?>registration/user" method="post">
    <div class="row setup-content" id="step-1">
      <div class="col-xs-12">
        <div class="col-md-12 col-xs-12">
            <input type="email" id="txtemail" class="input_form_sign d_block active_inp" placeholder="EMAIL" name="email" value=""  />
             <label class="error"></label>
		     <input type="password" id="txtpass" class="input_form_sign d_block  active_inp" placeholder="PASSWORD" name="pass"   />
             <label class="error"></label>
            <input type="date" name="datepicker" class="input_form_sign d_block active_inp" placeholder="DOB" id="datepicker" />	
			<label class="error"></label>
			<input type="hidden" name="user_type" value="user" class="input_form_sign d_block active_inp" readonly />	
           
		   <?php
               if($this->session->flashdata('msg')!='')
				{ 
				?>
                  <div class="alert alert-dismissable" id="mydiv" style="margin-top:0px;margin-bottom:0px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="color: red;"><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('msg') ?></h4>
                   
                  </div>
	  <?php } ?>
		       <?php if($user_setting==0){?>
				<input type="submit" value="Submit" class="stp1_submit btn_sign nextBtn">
				<?php 
				} else{ ?>
				<button class="btn_sign nextBtn" type="button" >Next</button>
				<?php } ?>		
              <a href="<?php echo base_url(); ?>index.php/account" class="link_forgot_pass d_block lef user_login" >Login</a>
             
        </div>
      </div>
        </div>
    <div class="row setup-content" id="step-2" style="display:none">
        <div class="col-xs-12">
          <div class="col-md-12 col-xs-12">
            <input type="text" class="input_form_sign active_inp" placeholder="First Name" name="first_nameshipment" id="fname_ship"/>
			<label class="error"></label>		    
			<input type="text" class="input_form_sign active_inp" placeholder="Last Name" name="last_nameshipment" id="lname_ship" />
            <label class="error"></label>
			<input type="text" class="input_form_sign active_inp" placeholder="Company Name" name="company_nameshipment" id="comp_ship" />
           
		    <input type="text" class="input_form_sign active_inp" placeholder="Street" name="streetshipment" id="stret_ship"/>
			<label class="error"></label>
			<input type="text" class="input_form_sign active_inp" placeholder="Number" name="numbershipment" id="numbr_ship" />
            <label class="error"></label>
		    <input type="text" class="input_form_sign active_inp" placeholder="Postcode" name="postcodeshipment" id="pstcode_ship" />
            <label class="error"></label>
			<select class="input_form_sign active_inp tyle_add" onchange="showUser(this.value)" name="countryshipment" id="country_ship">
			   <option value="">Country</option>
											<?php foreach($country as $values) { ?>											
                                                <option value="<?php echo $values->id; ?>"><?php echo $values->name;   ?>
			   </option>
												<?php } ?>
            </select> 
			<label class="error"></label>
			<div id="txtHint" style="display:none;"></div>
			<div id="txt_hints" style="display:block;" >
				<select class="input_form_sign active_inp tyle_add" name="cityshipment" id="cityshipment">
					<option value=''>City</option>

				</select>
				<label class="error"></label>
			</div>
			<input type="text" class="input_form_sign active_inp" placeholder="Phone Number" name="phone_numbershipment" id="ph_ship"  />
			<label class="error"></label>
			<input type="checkbox" onclick="myFunction()" class="checkbox_check" name="Shipment">For different Shipping & Billing Address
		    <div id="myDIV" style="display:none;">	 
				<input type="text" class="input_form_sign active_inp" placeholder="First Name" name="first_namebilling" id="fname_bill"  />
				<label class="error"></label>	
				<input type="text" class="input_form_sign active_inp" placeholder="Last Name" name="last_namebilling" id="lname_bill" />
				<label class="error"></label>	
				<input type="text" class="input_form_sign active_inp" placeholder="Company Name" name="company_namebilling" id="comp_bill" />
					
				<input type="text" class="input_form_sign active_inp" placeholder="Street" name="streetbilling"  id="stret_bill" />
				<label class="error"></label>	
				<input type="text" class="input_form_sign active_inp" placeholder="Number" name="numberbilling" id="numbr_bill" />
				<label class="error"></label>	
				<input type="text" class="input_form_sign  active_inp" placeholder="Postcode" name="postcodebilling" id="postcode_bill"/>
				<label class="error"></label>	
				<select class="input_form_sign active_inp tyle_add" onchange="show(this.value)"  name="countrybilling" id="country_bill">
				   <option value="">Country</option>
												<?php foreach($country as $values) { ?>
												
													<option value="<?php echo $values->id; ?>"><?php echo $values->name;   ?>
				   </option>
													<?php } ?>
				</select> 
				<label class="error"></label>	
				<div id="txtHint" style="display:none;"></div>
				<div id="txt_hints" style="display:block;" >
					<select class="input_form_sign active_inp tyle_add" name="citybilling" id="state-list">
						<option value=''>City</option>

						</select>
					<label class="error"></label>	
				</div>
				<input type="text" class="input_form_sign active_inp" placeholder="Phone Number" name="phone_numberbilling"  id="ph_bill" />
				<label class="error"></label>	
			</div>
			<button name="usersign" type="submit" class="btn_sign signup">SIGN UP</button>
		  </div>
      </div>
    </div>
	
  </form>
    </div>
</div>

<script type="text/javascript">


function show(city){
	$.ajax({
	type: "POST",
	url: "<?php echo base_url(); ?>registration/pop_district_data",
	data:'country_id='+city,
	success: function(data){
		$("#state-list").html(data);
	}
	});
}
function showUser(str)
{
	//alert(str);
	$.ajax({
	type: "POST",
	url: "<?php echo base_url(); ?>registration/ajax_call_pop_district_data",
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
</script>
<script>
   $(document).ready(function(){
	   
	    /*****************Step-1*****************/
		
	   $(".nextBtn").click(function(e){
		  var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		  var sEmail = $('#txtemail').val();
		  
           if (($.trim(sEmail).length == 0) || (!filter.test(sEmail))) {
            $('#txtemail').focus();
			$('#txtemail' ).next( ".error" ).html("Invalid Email");
			$('#txtemail' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
			
            e.preventDefault();
			return false;
            }else{
				
				$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>registration/check_email",
			data:'email='+sEmail,
			success: function(data){
				//console.log($.trim(data.replace(/\s+/g, ' ')));
				
				if($.trim(data.replace(/\s+/g, ' ')) !="not error"){
				    $('#txtemail').focus();	
					$('#txtemail' ).next( ".error" ).html("Email Already Exist");
					$('#txtemail' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
				     return false;
				}
			 }
			 }); 
			}
			
		   if($('#txtpass').val().length==0) {
			 $('#txtpass').focus();
			 $('#txtpass' ).next( ".error" ).html("Enter Your Password");
			 $('#txtpass' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }else{
			/*   $.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>index.php/registration/get_pass_length",
			success: function(data){
				var vl=$.trim(data.replace(/\s+/g, ' '));
				if(($('#txtpass').val().length)<vl){
					var msg="your password must contail atleast "+vl+" Digit";
				    $('#txtpass').focus();
					$('#txtpass' ).next( ".error" ).html(msg);
					$('#txtpass' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
                   return false;
				}
			  }
			 }); */
			  var psdlen = parseInt($('#psd_len').val());
			 if(($('#txtpass').val().length)< psdlen ){
				 var msg="your password must contail atleast "+psdlen+" Digit";
				  $('#txtpass').focus();
					$('#txtpass' ).next( ".error" ).html(msg);
					$('#txtpass' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
                   return false;
			 }
		   }
		   if($('#datepicker').val().length==0) {
			 $('#datepicker').focus();
			 $('#datepicker' ).next( ".error" ).html("Please Select Your Date of Birth");
			 $('#datepicker' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }else{
			   /* $.ajax({
			type: "GET",
			url: "<?php echo base_url(); ?>index.php/registration/get_dob",
			success: function(data){
				var dob=$.trim(data.replace(/\s+/g, ' '));
				     //alert(dob);
					 var dob_val = new Date($('#datepicker').val());
					 var today = new Date();
					 var age = Math.floor((today-dob_val) / (1000*60*60*24));
					 
					 if(dob > age){
						
						 var msg="Your data of birth greater than "+dob;
						 $('#datepicker').focus();
						 $('#datepicker' ).next( ".error" ).html(msg);
			             $('#datepicker' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
					 return false;
					 }
			  }
			 });  */
			  var dob = parseInt($('#mini_birth').val());
			  var dob_val = new Date($('#datepicker').val());
			  var today = new Date();
			  var age = Math.floor((today-dob_val) / (1000*60*60*24));
			 if(dob > age){
						
						 var msg="Your data of birth greater than "+dob+" days";
						 $('#datepicker').focus();
						 $('#datepicker' ).next( ".error" ).html(msg);
			             $('#datepicker' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
					 return false;
					 }
			
		   }
		   /*if($('#user_type').val()=="") {
			 $('#user_type').focus();
			 $('#user_type' ).next( ".error" ).html("Please Select User Type");
			 $('#user_type' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }else{
			 $.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/registration/check_user",
			data:'user_type='+$('#user_type').val(),
			success: function(data){
				var set_val=$.trim(data.replace(/\s+/g, ' '));
				if(set_val==0){
				  $(".nextBtn").hide();
                  $(".stp1_submit").show();				  
				}else{
					$(".nextBtn").show();
                    $(".stp1_submit").hide();	
				}
			 }
			 });   
		   }*/
		   /*************Step Wizard****************/
		   if($('#show_fd').val()=='1'){
		   $("#step-1").hide();	
           $("#step-2").show();	
		   $("#btndisb").attr("href", "#step-2");
           $('a[href="#step-2"]').removeAttr("disabled");	
           $('a[href="#step-2"]').removeClass("btn-default");	
           $('a[href="#step-2"]').addClass("btn-primary");	
           $('a[href="#step-1"]').removeClass("btn-primary");	
           $('a[href="#step-1"]').addClass("btn-default");	
		   }		   
	   });	
	  
    /**********************Step-2**********************/  
	$(".signup").click(function(e){
		var fship=$('#fname_ship').val();
		var lship=$('#lname_ship').val();
		var phship=$('#ph_ship').val();
		var pstship=$('#pstcode_ship').val();
		var name_regex = /^[a-zA-Z]+$/;
		var pst_regex = /^[0-9]+$/;
		var phone=/^[0-9-+]+$/;
		var lname_regex = /^[a-zA-Z ]*/;
		if(($('#fname_ship').val()=="") || !fship.match(name_regex)) {
			 $('#fname_ship').focus();
			 $('#fname_ship' ).next( ".error" ).html("First Name Required");
			 $('#fname_ship' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#lname_ship').val()=="") || !lship.match(lname_regex)) {
			 $('#lname_ship').focus();
			 $('#lname_ship' ).next( ".error" ).html("Last Name Required");
			 $('#lname_ship' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   
		   if(($('#stret_ship').val())=="") {
			 $('#stret_ship').focus();
			 $('#stret_ship' ).next( ".error" ).html("Street Address Required");
			 $('#stret_ship' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#numbr_ship').val())=="") {
			 $('#numbr_ship').focus();
			 $('#numbr_ship' ).next( ".error" ).html("Shipment Number Required");
			 $('#numbr_ship' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#pstcode_ship').val()=="")|| (!pstship.match(pst_regex)) || (pstship>9999 || pstship<1000)) {
			 $('#pstcode_ship').focus();
			 $('#pstcode_ship' ).next( ".error" ).html("Postcode Required Between 1000 to 9999");
			 $('#pstcode_ship' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		    if(($('#country_ship').val())=="") {
			 $('#country_ship').focus();
			 $('#country_ship' ).next( ".error" ).html("Country Required");
			 $('#country_ship' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#cityshipment').val())=="") {
			 $('#cityshipment').focus();
			 $('#cityshipment' ).next( ".error" ).html("City Required");
			 $('#cityshipment' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   if(($('#ph_ship').val()=="") || !phship.match(phone)) {
			 $('#ph_ship').focus();
			 $('#ph_ship' ).next( ".error" ).html("Phone Number Required");
			 $('#ph_ship' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
             e.preventDefault();
			 return false;
		   }
		   /*******************Billing address*****************/
		   if ($('input.checkbox_check').is(':checked')) {
			    var fbill=$('#fname_bill').val();
				var lbill=$('#lname_bill').val();
				var phbill=$('#ph_bill').val();
				var pstbill=$('#postcode_bill').val();
				var name_regex = /^[a-zA-Z]+$/;
				var pst_regex = /^[0-9]+$/;
				var phone=/^[0-9-+]+$/;
				var lname_regex = /^[a-zA-Z ]*/;
			if(($('#fname_bill').val()=="") || !fbill.match(name_regex)) {
				 $('#fname_bill').focus();
				 $('#fname_bill' ).next( ".error" ).html("First Name Required");
				 $('#fname_bill' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#lname_bill').val()=="") || !lbill.match(lname_regex)) {
				 $('#lname_bill').focus();
				 $('#lname_bill' ).next( ".error" ).html("Last Name Required");
				 $('#lname_bill' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   
			   if(($('#stret_bill').val())=="") {
				 $('#stret_bill').focus();
				 $('#stret_bill' ).next( ".error" ).html("Street Address Required");
				 $('#stret_bill' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#numbr_bill').val())=="") {
				 $('#numbr_bill').focus();
				 $('#numbr_bill' ).next( ".error" ).html("Shipment Number Required");
				 $('#numbr_bill' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#postcode_bill').val()=="")|| (!pstbill.match(pst_regex)) || (pstbill>9999 || pstbill<1000)) {
				 $('#postcode_bill').focus();
				 $('#postcode_bill' ).next( ".error" ).html("Postcode Required Between 1000 to 9999");
				 $('#postcode_bill' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
				if(($('#country_bill').val())=="") {
				 $('#country_bill').focus();
				 $('#country_bill' ).next( ".error" ).html("Country Required");
				 $('#country_bill' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#state-list').val())=="") {
				 $('#state-list').focus();
				 $('#state-list' ).next( ".error" ).html("City Required");
				 $('#state-list' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
			   if(($('#ph_bill').val()=="") || !phbill.match(phone)) {
				 $('#ph_bill').focus();
				 $('#ph_bill' ).next( ".error" ).html("Phone Number Required");
				 $('#ph_bill' ).next( ".error" ).css( {"display":"block","color":"red","margin":"5%"} ).fadeOut( 3000 );
				 e.preventDefault();
				 return false;
			   }
		   }
		   
	});
  
   });
   $('a[href="#step-1"]').click(function(){
	       $("#step-1").show();	
           $("#step-2").hide();	         
           $('a[href="#step-1"]').removeClass("btn-default");	
           $('a[href="#step-1"]').addClass("btn-primary");	
           $('a[href="#step-2"]').removeClass("btn-primary");	
           $('a[href="#step-2"]').addClass("btn-default");	
	   
   });
  
    $('a[href="#step-2"]').click(function(){
		alert("h");
	       $("#step-2").show();	
           $("#step-1").hide();	         
           $('a[href="#step-2"]').removeClass("btn-default");	
           $('a[href="#step-2"]').addClass("btn-primary");	
           $('a[href="#step-1"]').removeClass("btn-primary");	
           $('a[href="#step-1"]').addClass("btn-default");	
		   
	    
    });
  
   /*$('#user_type').change(function() {
     $.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/registration/check_user",
			data:'user_type='+$('#user_type').val(),
			success: function(data){
				var set_val=$.trim(data.replace(/\s+/g, ' '));
				if(set_val==0){
				  $(".nextBtn").hide();
                  $(".stp1_submit").show();				  
				}else{
				  $(".nextBtn").show();
                  $(".stp1_submit").hide();	
				}
			 }
			 });   
    });*/

</script>