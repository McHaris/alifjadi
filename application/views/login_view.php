
	
		
		<div class="container">
			<div style="height:40px"></div>
			
			<div class="row">

				<div class="col-sm-6 col-sm-offset-3">
					
					<?php 
						if($this->session->flashdata("act") != "")
						{
							if($this->session->flashdata("act") == "true")
							{
								$alertmode = "alert-success";
								$alertmsg  = "Berhasil";
							}
							else
							{
								$alertmode = "alert-danger";
								$alertmsg  = "Gagal";
							}
					?>
						<div class="alert <?php echo $alertmode; ?>" id="alertmsg">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
						  <strong><?php echo $alertmsg; ?>!</strong> <?php echo $this->session->flashdata("msg") ?>
						</div>

						<div style="height:10px"></div>


					<?php
							
						}
					?>
				</div>

				<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">


					<form method="post" action="">
						<h4 class="text-center bold" style="color:#d3312a;">
							Masuk dengan akun Anda
						</h4>

						<div style="height:15px"></div>

						<div class="form-group">
							<input type="text" class="form-control padding-input-txt" name="email" placeholder="Email.." value="<?php echo $email ?>">
							<span style="color:red"><?php echo form_error('email'); ?></span>
						</div>

						<div class="form-group">
							<input type="password" class="form-control padding-input-txt" name="password" placeholder="Password..">
							<span style="color:red"><?php echo form_error('password'); ?></span>
						</div>

						<div class="form-group">
							<div style="height:5px"></div>

							<input type="hidden" name="<?=$this->session->userdata('csrf_name');?>" value="<?=$this->session->userdata('csrf_value');?>" style="display: none">

							<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">

							<button name="submit" type="submit" class="btn btn-red bold text-center">
								Login
							</button>
						</div>

						<div class="form-group">
								<br />
								Belum memiliki akun, <a href="<?php echo base_url() ?>register" class="bold txt-red">Daftar di sini</a> 
							
						</div>
					</form>
				</div>

				
			</div>		
			
			<div style="height:40px"></div>
		</div>
