<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Pusyantek Humoris</title>

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url();?>assets/logo/Logo_BPPT.png">

	<!-- Bootstrap CSS -->
	<link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Font Awesome CSS -->
	<link href="<?= base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

	<!-- Custom CSS -->
	<link href="<?= base_url();?>assets/css/stylelogin.css" rel="stylesheet" type="text/css" />

	<!-- BEGIN CSS for this page -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
	<!-- END CSS for this page -->

</head>
	<div class="container h-100">
		
<div id="particle-container">
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
	<div class="particle"></div>
</div>
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="container">
						<img src="<?=base_url();?>assets/logo/logo2.png" class="img-fluid mx-auto d-block " alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center logo">
					<h6>Human Resouce Management System</h6>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form method="post">

<!-- 
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-user-circle"></i></span>
							</div>
							<input type="text" name="username" class="form-control input_user" value="" placeholder="username">
							<div class="row">
								<small id="passwordHelpBlock" class="form-text text-danger mb-0">
									<?= form_error('username'); ?>
								</small>
							</div>
						</div>   -->
                            <div class="form-group row mb-2" style="max-width: 240px;">
                                    <div class="input-group date">
                                        <div class="input-group-prepend input-group-md">
                                           <div class="input-group-text">
                                             <i class="fa fa-user" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                        <input  type="text" class="form-control datepicker form-control-md" placeholder="Username"name="username" value="<?= $this->input->post('username') ?>" >
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-danger m-0">
                                        <?= form_error('username'); ?>
                                    </small>
                            </div>
                            <div class="form-group row mb-1"style="max-width: 240px;">
                                    <div class="input-group date">
                                        <div class="input-group-prepend input-group-md">
                                           <div class="input-group-text">
                                             <i class="fa fa-lock" aria-hidden="true"></i>
                                           </div>
                                        </div>
                                        <input  type="password" class="form-control datepicker form-control-md" placeholder="Password"name="password" value="<?= $this->input->post('password') ?>" >
                                    </div>
                                    <small id="passwordHelpBlock"  class="form-text text-danger m-0">
                                        <?= form_error('password'); ?>
                                    </small>
									<small id="passwordHelpBlock"  class="form-text text-danger m-0">
                                        <?php if (isset($error))
											echo $error; ?>
                                    </small>
                            </div>
						
				<div class="d-flex justify-content-center mt-3 login_container">
					<button type="submit" name="submit" class="btn login_btn">Login</button>
				</div>
					</form>
				</div>
				
		
			</div>
			
		</div>
	</div>