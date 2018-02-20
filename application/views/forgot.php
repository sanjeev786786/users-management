<div class="cont_principal">

  <div class="cont_centrar">
  <div class="cont_login">
    <form method="post" action="<?php echo base_url(); ?>account/forgot_email">
    <div class="cont_tabs_login">
      <ul class='ul_tabs'>
        <li class="active"><a href="#" onclick="sign_in()">Forgot Your Password?</a>
        <span class="linea_bajo_nom"></span>
        </li>
        <li>
        </li>
      </ul>
      </div>
  <div class="cont_text_inputs">
     
    
    <input type="email" class="input_form_sign d_block active_inp" placeholder="EMAIL" name="emauil_us" value="" required />

    
   
    
        

    </div>
	  <?php
               if($this->session->flashdata('msg')!='')
				{ 
				?>
                  <div class="alert alert-dismissable" id="mydiv" style="margin-top:0px;margin-bottom:0px;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="color: red;"><i class="icon fa fa-check"></i><?php echo $this->session->flashdata('msg') ?></h4>
                   
                  </div>
	  <?php } ?>
<div class="cont_btn">
    
     <button name="user_forgot" type="submit" class="btn_sign">Submit</button>
     <a href="<?php echo base_url(); ?>account" class="link_forgot_pass d_block lef" >Login</a>
      </div>
      
    </form>
    </div>
    
  </div>
  

</div>