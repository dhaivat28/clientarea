<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Log in</title>

<?= link_tag('assets/css/bootstrap.min.css'); ?>
<?= link_tag('assets/css/datepicker3.css'); ?>
<?= link_tag('assets/css/styles.css'); ?>
</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Admin Log in</div>
				<div class="panel-body">
					<form role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<div class="row">
								<div class="col-lg-2">
									<a href="index.html" class="btn btn-primary">Login</a>
								</div>
								<div class="col-lg-2">
									<a href="index.html" class="btn btn-success btn-md">Reset</a>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->

	<script src="<?= base_url('assets/js/jquery-1.11.1.min.js');?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
	<script src="<?= base_url('assets/js/chart.min.js');?>"></script>
	<script src="<?= base_url('assets/js/chart-data.js');?>"></script>
	<script src="<?= base_url('assets/js/easypiechart.js');?>"></script>
	<script src="<?= base_url('assets/js/easypiechart-data.js');?>"></script>
	<script src="<?= base_url('assets/js/bootstrap-datepicker.js');?>"></script>

	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>
