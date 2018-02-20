<div class="cont_principal">
  <div class="cont_centrar">
  <div class="cont_login">
    <form method="post" action="<?php echo base_url(); ?>login">
    <div class="cont_tabs_login">
      <ul class='ul_tabs'>
        <li class="active"><a href="#" onclick="sign_in()">SIGN IN</a>
        <span class="linea_bajo_nom"></span>
        </li>
        <li>
        </li>
      </ul>
      </div>
  <div class="cont_text_inputs">
     
    
    <input type="email" class="input_form_sign d_block active_inp" placeholder="EMAIL" name="emauil_us" value="<?php echo $userdata['email']; ?>" required />

    <input type="password" class="input_form_sign d_block  active_inp" placeholder="PASSWORD" name="pass_us" value="<?php echo $userdata['password']; ?>" required /> 
    
        
    
	<?php
               if($this->session->flashdata('msg')!='')
				{ 
				?>
                  <div class="alert alert-dismissable" id="mydiv" style="margin-top:0px;margin-bottom:0px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="color: red;"><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('msg') ?></h4>
                   
                  </div>
	  <?php } ?>
    </div>
	  
		<div class="cont_btn">
			 <div class="terms_and_cons d_block">
			<p><input type="checkbox" name="remember_me" value="1" /> <label for="terms_and_cons">Remember me.</label></p>
		  
			</div>
			 <button name="user_login" type="submit" class="btn_sign">SIGN IN</button>
			  <a href="<?php echo base_url(); ?>account/forgot" class="link_forgot_pass d_block" >Forgot Password ?</a>
			  <!--<a href="<?php echo base_url(); ?>index.php/registration" class="link_forgot_pass d_block" >SIGN UP</a>-->
		</div>
      
    </form>
    </div>
    
  </div>
</div>
  
   
