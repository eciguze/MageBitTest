<?php
	require_once 'core/init.php';
	if (Input::exists()) {
		
		if (Token::check(Input::get('token'))) {
			
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'email'	=> array(
					'fieldName'	=> 'email',
					'required' 	=> true
				),
				'password'	=> array(
					'fieldName'	=> 'password',
					'required' 	=> true
				)
			));

			if ($validation->passed()) {
				$user 		= new User();
				$login 		= $user->login(Input::get('email'),Input::get('password'));

				if ($login) {
					Redirect::to('index.php');
				} else {
					echo "Sorry we could not log you in";
				}
			} else {
				foreach ($validation->errors() as $error) {
					echo $error, '<br>';
				}
			}
		}
	}
?>
