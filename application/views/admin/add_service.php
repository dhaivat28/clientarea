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
				<li id="new-li" class="active">Add Service</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-3">
								Add Service
							</div>
							<div class="col-lg-9">
								<div class="button-box">
									<?=anchor("services/manage_services",'&larr; Go Back ',['class'=>'btn btn-default']); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<?php echo form_open('services/store_service'); ?>
							<?php echo form_hidden('admin_id',$this->session->userdata('admin_id')) ?>


								<div class="form-group">
									<div class="row">
										<div class="col-lg-10">
											<label>Select Client : </label>
											<select name="client_id" >
    											<?php
												foreach($dropdown_list as $dlist)
												{
												?>
												<option value="<?=$dlist['client_id']?>"><?=$dlist['cname']?></option>
												<?php
												}
												?>
											</select>
										</div>

										<div class="col-lg-2">
											<div class="form-error-custom">
												<?php echo form_error('client_id'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Service Name</label>
												<?php echo form_input(['name'=>'service_name','id'=>'inputEmail','class'=>'form-control','placeholder'=>'Domain / Service name','value'=>set_value('service_name')]); ?>
										</div>

										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('service_name'); ?>
											</div>
										</div>
									</div>

								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Registration Date</label>
												<?php echo form_input(['name'=>'p_date','type'=>'date','id'=>'inputEmail','class'=>'form-control','placeholder'=>'Purchase Date','value'=>set_value('p_date')]); ?>
										</div>

										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('p_date'); ?>
											</div>
										</div>
									</div>

								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-10">
											<label>Select Service : </label>
											<select name="product_id" >
												<?php
												foreach($p_dropdown as $dlist)
												{
												?>
												<option value="<?=$dlist['product_id']?>"><?=$dlist['product_name']?></option>
												<?php
												}
												?>
											</select>
										</div>

										<div class="col-lg-2">
											<div class="form-error-custom">
												<?php echo form_error('client_id'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Years : </label>
											<select name="years">
											<option value="+1 years">1</option>
											<option value="+2 years">2</option>
											<option value="+3 years">3</option>
											<option value="+4 years">4</option>
											<option value="+5 years">5</option>

											</select>
										</div>

										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('years'); ?>
											</div>
										</div>
									</div>
								</div>


	<br />
								<div class="row">
									<div class="col-lg-3">
										<?php echo form_submit(['name'=>'submit','value'=>'Add Service','class'=>'btn btn-primary']); ?>
									</div>
									<div class="col-lg-3">
										<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-success btn-md']); ?>

									</div>
								</div>

								<br />

							</div>

							<?php echo form_close(); ?>
						</form>

					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

	</div><!--/.main-->

<?php include('admin_footer.php') ?>
