<?php
	require_once 'core/init.php';
	if (Input::exists()) {
					
		if (Token::check(Input::get('token'))) {
			
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'email'	=> array(
					'fieldName'	=> 'email',
					'required' 	=> true,
					'min'		=> 8,
					'max'		=> 50,
					'unique'	=> 'users'
				),
				'password'	=> array(
					'fieldName'	=> 'password',
					'required' 	=> true,
					'min'		=> 6
				),
				 'name'	=>  array(
					'fieldName'	=> 'name',
					'required' 	=> true,
					'min'		=> 4,
					'max'		=> 20
				)
		));
			if ($validation->passed()) {
				$user = new User();
				$salt = Hash::salt(32);
				try {
					$user->create(array(
						'email' 	=> Input::get('email'),
						'password' 	=> Hash::make(Input::get('password'),$salt),
						'salt' 		=> $salt,
						'name' 		=> Input::get('name'),
						'joined' 	=> date('Y-m-d H:i:s')
					));
				} catch (Exception $e) {
					die($e->getMessage());
				}
			} else {
				foreach ($validation->errors() as $error) {
					echo $error, '<br>';
				}
			}
		}
	}
?>