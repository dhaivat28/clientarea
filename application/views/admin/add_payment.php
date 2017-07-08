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
				<li class="active">Add Client</li>
			</ol>
		</div><!--/.row-->
<br />
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-lg-3">
								Add Payment
							</div>
							<div class="col-lg-9">
								<div class="button-box">
									<?=anchor("payments/manage_payments",'&larr; Back To Payments',['class'=>'btn btn-default']); ?>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<?php echo form_open("payments/update_payment/{$tr_details->service_id}"); ?>
							<?php echo form_hidden('admin_id',$this->session->userdata('admin_id')) ?>

							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>Last Update: </label>
												<?= $tr_details->added_on ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>Service Charges: </label>
												<?= $tr_details->service_charges ?>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>Amount Left: </label>
												<?= $tr_details->amount_left ?>
												<?php echo form_hidden('amount_left',$tr_details->amount_left)?>
									</div>

								</div>
							</div>

							<hr />
								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Amount</label>
												<?php echo form_input(['name'=>'amount_pay','id'=>'inputEmail','class'=>'form-control','placeholder'=>'amount','value'=>set_value('amount_pay')]); ?>
										</div>

										<div class="col-lg-6">
										</div>
										<div class="form-error-custom">
											<?php echo form_error('amount_pay'); ?>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="row">
										<div class="col-lg-6">
											<label>Payment Method : </label>
												<select name="p_method">
   											  <option value="">please select</option>
												  <option value="cash">cash</option>
												  <option value="cheque">cheque</option>
												  <option value="other">other</option>

												</select>

										</div>
										<div class="col-lg-6">
											<div class="form-error-custom">
												<?php echo form_error('p_method'); ?>
											</div>
										</div>
									</div>
								</div>



								<div class="row">
									<div class="col-lg-4">
										<?php echo form_submit(['name'=>'submit','value'=>'Add Payment','class'=>'btn btn-primary']); ?>
									</div>

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
