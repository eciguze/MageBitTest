<?php
require_once 'core/init.php';
if(Session::exists('home')){
	echo '<p>'. Session::flash('home').'</p>';
}
?>
<!DOCTYPE html>
<html lang="eng">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style1.css" rel="stylesheet">
        <title>Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"> </script>
    </head>
    <body>
        <div class="container1">
            <table width="100%">
                <tr>
                    <td>
            <div class="sign-up1">  
                <h1>Don't have an account?</h1>
                <hr align="left" color="cornflowerblue" width="40px">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p> 
                <a href=# class="a1" id="sign1">Sign Up</a><br>
            </div>
                    </td>
                    <td>
            <div class="login1">
                <h1>Have an account?</h1>
                <hr align="right" color="cornflowerblue" width="40px">
                <p>Lorem ipsum dolor sit amet
                consectetur adipis
                </p> 
                <br>
                <a href=# class="a1" id="log1">Login</a><br>
            </div>
                    </td>
                </tr>
            </table>
        </div>
		  <div class="container2">
			<div class="sign-up2">  
                <h2 class="not-enter">Sign up</h2>
				<img src="img/logo.jpg" class="logo">
                <hr align="left" color="cornflowerblue" width="40px">
				<form method="post" name="signup" action="signup.php">
					<div class="field">
						<label for="inp4">Name <span style="color:red;">*</span></label>
						<input type="text" name="name" id="inp1" value="<?php echo escape(Input::get('name'));?>">
					</div>
					<div class="field">
						<label for="inp5">Email <span style="color:red;">*</span></label>
						<input type="text" name="email" id="inp2"value="<?php echo escape(Input::get('email'));?>" >
					</div>
					<div class="field">
						<label for="inp5">Password <span style="color:red;">*</span></label>
						<input type="text" name="password" id="inp3" >
					</div>
                    <div class="field">
                <br><input type="submit" class="a2" value="SignUp" name="signup">
						<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
					</div>
				</form>
            </div>
			  <div class="login2">
              <h2 class="not-enter">Login</h2>
              <img src="img/logo.jpg" class="logo">
              <hr align="left" color="cornflowerblue" width="40px">		
				<form method="post" name="login" action="login.php">
					<div class="field">
						<label for="inp4">Email <span style="color:red;">*</span></label>
						<input type="text" name="email" id="inp4" autocomplete="off">
					</div>
					<div class="field">
						<label for="inp5">Password <span style="color:red;">*</span></label>
						<input type="password" name="password" id="inp5" autocomplete="off"> 
				    <div class="field">
                <br><input type="submit" class="a2" value="Login" name="login">
						<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/>
                         <a href=forgot class="forgot">Forgot Password?</a> 
                    </div> 
					</div>
				</form> 
            </div>
		</div>
		<script>
			$('#log1').click(function() {
				$('.container2').animate({left:660});
				$('.sign-up2').fadeOut(250, function() {
					$('.login2').fadeIn(400);
				});
			});
			$('#sign1').click(function() {
				$('.container2').animate({left:320});
				$('.login2').fadeOut(250, function() {
					$('.sign-up2').fadeIn(400);
				});
			});
			$("form input").on("blur input focus", function() {
				var $field = $(this).closest(".field");
				if (this.value) {
					$field.addClass("filled");
				} else {
					$field.removeClass("filled");
				}
			});
			$("form input").on("focus", function() {
				var $field = $(this).closest(".field");
				if (this) {
					$field.addClass("filled");
				} else {
					$field.removeClass("filled");
				}
			});
		</script>
    </body>
</html>