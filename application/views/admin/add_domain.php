<?php include('admin_header.php') ?>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

		<img src="<?php echo base_url('assets/images/logo.png'); ?>" class="main-logo" width="200"  alt=""/>

		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li><?= anchor("dashboard",'Dashboard'); ?></li>
			<li><?= anchor("dashboard/manageclient",'Manage Client'); ?></li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Add Domain & Hosting</li>
			</ol>
		</div><!--/.row-->
<br />
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-3">
								Add Domain & Hosting
							</div>
							<div class="col-lg-9">
								<div class="button-box">
									<?=anchor("dashboard/manageclient",'&larr; Go Back ',['class'=>'btn btn-default']); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<?php echo form_open('domainandhosting/store_domain'); ?>
							<?php echo form_hidden('admin_id',$this->session->userdata('admin_id')) ?>
							<?php echo form_hidden('created_at',date('d-m-y H:i:s')) ?>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Client</label>
												<?php echo form_input(['name'=>'cname','id'=>'inputEmail','class'=>'form-control','placeholder'=>'Client name','value'=>set_value('cname')]); ?>
										</div>

										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('cname'); ?>
											</div>
										</div>
									</div>

								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Domain Name:</label>
											<?php echo form_input(['name'=>'domain ','id'=>'inputEmail','class'=>'form-control','placeholder'=>'Domain','value'=>set_value('domain')]); ?>
										</div>
										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('domain'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
												<label>Select Service:</label><br />
												<?php echo form_radio('gender', '1', TRUE);?>
												<?php echo form_label('Domain Only', 'service');?><br />

												<?php echo form_radio('gender', '2', FALSE); ?>
												<?php echo form_label('Hosting Only', 'service');?><br />

												<?php echo form_radio('gender', '3', FALSE); ?>
												<?php echo form_label('Domain + Hosting ', 'service');?>
										</div>
										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('mobile'); ?>
											</div>
										</div>
									</div>
								</div>


								<div class="row">
									<div class="col-lg-3">
										<?php echo form_submit(['name'=>'submit','value'=>'Add Domain','class'=>'btn btn-primary']); ?>
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
