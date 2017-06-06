<?php

$config = [

		'admin_login'	=> [
									[
										'field'=>'email',
										'label'=>'Email',
										'rules'=>'required|trim|valid_email'
									],

									[
										'field'=>'password',
										'label'=>'password',
										'rules'=>'required'
									]
								]
];

?>
