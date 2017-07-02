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

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Client : </label>
											<select name="cd_name" >
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

										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('cd_name'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Domain</label>
												<?php echo form_input(['name'=>'domain_field','id'=>'inputEmail','class'=>'form-control','placeholder'=>'Domain Name','value'=>set_value('domain_field')]); ?>
										</div>

										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('domain_field'); ?>
											</div>
										</div>
									</div>

								</div>


								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Purchase Date</label>
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
										<div class="col-lg-6">
												<label>Select Service:</label><br />
												<?php echo form_radio('service_type', '1', TRUE);?>
												<?php echo form_label('Domain Only', 'service');?><br />

												<?php echo form_radio('service_type', '2', FALSE); ?>
												<?php echo form_label('Hosting Only', 'service');?><br />

												<?php echo form_radio('service_type', '3', FALSE); ?>
												<?php echo form_label('Domain + Hosting ', 'service');?>
										</div>
										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('service_type'); ?>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Years</label>
												<?php echo form_input(['name'=>'years','id'=>'inputEmail','class'=>'form-control','placeholder'=>'No of Years','value'=>set_value('years')]); ?>
										</div>

										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('years'); ?>
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
