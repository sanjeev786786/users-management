<div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                        <li>
                            <a href="<?php echo base_url(); ?>homeuser"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>changepassword"><i class="fa fa-edit fa-fw"></i>Change Password</a>
                        </li>
						<?php 
						if($userdata['user_type']== 'admin')
						{
					     $display_profile = get_settings('3');
							 
						}elseif($userdata['user_type']== 'customer'){
							 $display_profile = get_settings('1');
						}elseif($userdata['user_type']== 'user'){
							 $display_profile = get_settings('2');
						}	
						?>
						
						<li>
						   <?php if($display_profile == '0'){ ?>
							   
						  <?php  }else{  ?>
                            <a href="<?php echo base_url(); ?>profile"><i class="fa fa-edit fa-fw"></i>Profile</a>
						  <?php } ?>
                        </li>
                         <li <?php 
											if($userdata['user_type']== 'admin' && $userdata['user_id'] == '1'){
												echo 'style="display:block"';
											}
											if($userdata['user_type']== 'customer'){
												echo 'style="display:none"';
											}
											if($userdata['user_type']== 'user'){
												echo 'style="display:none"';
											}
											?>>
                            <a href="<?php echo base_url(); ?>settings"><i class="fa fa-cog" aria-hidden="true"></i>Settings</a>
                         </li>
						
                    </ul>
                </div>