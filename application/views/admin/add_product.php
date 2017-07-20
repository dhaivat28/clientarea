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

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-3">
								Add Product
							</div>
							<div class="col-lg-9">
								<div class="button-box">
									<?=anchor("products",'&larr; Go Back',['class'=>'btn btn-default']); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<?php echo form_open('products/store_product'); ?>
							<?php echo form_hidden('admin_id',$this->session->userdata('admin_id')) ?>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Product Name</label>
												<?php echo form_input(['name'=>'product_name','id'=>'inputEmail','class'=>'form-control','placeholder'=>'product name','value'=>set_value('product_name')]); ?>
										</div>

										<div class="col-lg-6">
										</div>
										<div class="form-error-custom">
											<?php echo form_error('product_name'); ?>
										</div>
									</div>

								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Product Mrp</label>
											<?php echo form_input(['name'=>'product_mrp','id'=>'inputEmail','class'=>'form-control','placeholder'=>'product mrp','value'=>set_value('product_mrp')]); ?>
										</div>
										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('product_mrp'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
												<label>Profit</label>
												<?php echo form_input(['name'=>'profit','id'=>'inputEmail','class'=>'form-control','placeholder'=>'profit','value'=>set_value('profit')]); ?>
										</div>
										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('profit'); ?>
											</div>
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-lg-4">
										<?php echo form_submit(['name'=>'submit','value'=>'Add product','class'=>'btn btn-primary']); ?>
									</div>
									<div class="col-lg-3">
										<?php echo form_reset(['name'=>'reset','value'=>'Reset','class'=>'btn btn-success btn-md']); ?>

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
