<?php include('admin_header.php') ?>


	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="row">
			<div class="col-lg-12">
				<img src="<?php echo base_url('assets/images/logo.png'); ?>" class="main-logo" width="160"  alt=""/>
			</div>

			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-4">
						<img src="<?php echo base_url('assets/images/admin.jpg'); ?>" class="profile-pic" width="160"  alt=""/>
					</div>

					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-12">
								<div class="profile-name">
									<h9>John Doe</h9>
								</div>
							</div>
							<div class="col-lg-12">
								<h10>Admin</h10>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>

		<ul class="nav menu">
			<!-- <li role="presentation" class="divider"></li> -->
			<li><?= anchor("dashboard",'Dashboard',['id'=>'active']); ?></li>
			<li><?= anchor("products",'Manage Products'); ?></li>
			<li><?= anchor("client/manageclient",'Manage Clients'); ?></li>
			<li><?= anchor("services/manage_services",'Manage Services'); ?></li>
			<li><?= anchor("payments/manage_payments",'Manage Payments'); ?></li>


		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">

				<li id="new-li" class="active">Add Client</li>
			</ol>
		</div><!--/.row-->
<br />
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-3">
								Custom Mailer
							</div>
							<div class="col-lg-9">

							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<?php echo form_open('mailtoclient/mail_exec'); ?>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Client Address:  </label>
											<?php echo form_input(['name'=>'email','id'=>'inputEmail','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email')]); ?>
										</div>
										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('email'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Subject:  </label>
											<?php echo form_input(['name'=>'subject','id'=>'inputEmail','class'=>'form-control','placeholder'=>'subject','value'=>set_value('subject')]); ?>
										</div>
										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('email'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Message:</label>
											<?php $options = array('name' => 'message','rows' => '10','cols' => '100','value'=>set_value('message'));
												echo form_textarea($options);?>
										</div>
										
										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('message'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-4">
										<?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-primary']); ?>
									</div>

								</div>

								<br />

							</div>


						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

	</div><!--/.main-->

<?php include('admin_footer.php') ?>
