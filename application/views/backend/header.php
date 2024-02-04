<div class="row hidden-print" style="margin-left:0px; margin-right:0px;">

	<div class="col-md-12 col-sm-12 clearfix " style="background-color:#ffffff; box-shadow: 0px 10px 30px 0px rgba(82,63,105,0.08); border-radius: 5px;">
		<ul class="list-inline links-list pull-left" style="margin-top:9px;">
			<li>
				<a href="<?php echo site_url('home');?>" target="_blank">
					<i class="entypo-paper-plane"></i> <?php echo get_phrase('website'); ?>
				</a>
			</li>
		</ul>


		<!-- Profile Info -->
		<ul class="user-info pull-right pull-none-xsm" style="margin-top: 6px;">
			<li class="profile-info dropdown pull-right">
			<a href="/message/">
			<svg style="width: 30px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M18 9V7.2C18 6.0799 18 5.51984 17.782 5.09202C17.5903 4.71569 17.2843 4.40973 16.908 4.21799C16.4802 4 15.9201 4 14.8 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40973 4.40973 4.71569 4.21799 5.09202C4 5.51984 4 6.0799 4 7.2V18L8 16M20 20L17.8062 18.5374C17.5065 18.3377 17.3567 18.2378 17.1946 18.167C17.0507 18.1042 16.9 18.0586 16.7454 18.031C16.5713 18 16.3912 18 16.0311 18H11.2C10.0799 18 9.51984 18 9.09202 17.782C8.71569 17.5903 8.40973 17.2843 8.21799 16.908C8 16.4802 8 15.9201 8 14.8V12.2C8 11.0799 8 10.5198 8.21799 10.092C8.40973 9.71569 8.71569 9.40973 9.09202 9.21799C9.51984 9 10.0799 9 11.2 9H16.8C17.9201 9 18.4802 9 18.908 9.21799C19.2843 9.40973 19.5903 9.71569 19.782 10.092C20 10.5198 20 11.0799 20 12.2V20Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
					Messages
				</a>
			</li>
			<li class="profile-info dropdown pull-right"><!-- add class "pull-right" if you want to place this from right -->

				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo $this->user_model->get_user_thumbnail($this->session->userdata('user_id')); ?>" alt="" class="img-circle" width="44">
					<?php
						$logged_in_user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
						echo $logged_in_user_details['name'];
					?>

					<div style="margin-top: -15px;
							    font-size: 10px;
							    text-align: left;
							    padding-left: 53px;
							    color: #707696;">
						<p style="margin-top: 0px"><?php echo $this->session->userdata('role');?></p>
					</div>
				</a>

				<ul class="dropdown-menu">

					<!-- Reverse Caret -->
					<li class="caret"></li>

					<!-- Settings sub-links -->
					<?php if (strtolower($this->session->userdata('role')) == 'admin'): ?>
						<li>
								<a href="<?php echo site_url('admin/system_settings'); ?>" class="dropdown-item notify-item">
	                  <i class="flaticon-rotate"></i>
	                  <span><?php echo get_phrase('settings'); ?></span>
	              </a>
						</li>
          <?php endif; ?>

					<!-- Profile sub-links -->
					<li>
							<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile');?>">
								<i class="flaticon-rotate"></i>
								<?php echo get_phrase('edit_profile');?>
							</a>
					</li>

					<li>
						<a href="<?php echo site_url(strtolower($this->session->userdata('role')).'/manage_profile');?>">
							<i class="flaticon-lock"></i>
							<?php echo get_phrase('change_password');?>
						</a>
					</li>

					<li>
						<a href="<?php echo site_url('login/logout');?>">
							<i class="flaticon-paper-plane-1"></i>
							<?php echo get_phrase('log_out');?>
						</a>
					</li>

				</ul>
			</li>

		</ul>
	</div>

</div>

<hr style="margin-top:0px;" />
