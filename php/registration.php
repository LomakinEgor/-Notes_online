<?php 
	require "db.php";	
	$data = $_POST;
	$errors = array();
	if( isset($_SESSION['logged_user']))
	{		
		header('Location: /');
	}

	if( isset($data['do_signup']))
	{
		$errors = array();

		if(trim($data['login']) == '')
		{
			$errors[] = 'Введите логин';
		}

		if(!(preg_match('/^[a-z0-9_-]{3,30}$/i' , $data['login'])))
		{
			$errors[] = 'Введите правильные значения логина';
		}

		if(trim($data['email']) == '')
		{
			$errors[] = 'Введите Email';
		}

		if(!(preg_match('/^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i' , $data['email'])))
		{
			$errors[] = 'Введите правильные значения Email';
		}

			
		if($data['password'] == '')
		{
			$errors[] = 'Введите пароль';
		}

		if(strlen($data['password']) < 3)
		{
			$errors[] = 'Пароль слишком маленький';
		}

		if(strlen($data['password']) > 50)
		{
			$errors[] = 'Пароль слишком большой';
		}

		if($data['password_2'] != $data['password'])
		{
			$errors[] = 'Повторный пароль не верный';
		}

		if( R::count('user', "login = ?", array($data['login'])) > 0)
		{
			$errors[] = "Пользователь с таким логином уже существует";
		}

		if( R::count('user', "email = ?", array($data['email'])) > 0 )
		{
			$errors[] = "Пользователь с таким Email уже существует";
		}

		if (empty($errors) && !empty($data))
		{
			$user = R::dispense('user');
			$user->login = $data['login'];
			$user->email = $data['email'];
			$user->password = password_hash($data['password'], PASSWORD_ARGON2I);
			R::store($user);
			header('Location:http://notes/');		
		}
	}

?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<title>Регистрация</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css"  href="../css/style.css"  />
	<link rel="stylesheet" type="text/css" href="../css/validation.css">
	<link rel="stylesheet" type="text/css" href="../css/registration.css">	
	<script src="../js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../js/registration.js"></script>
</head>




<body>
	<!-- start header -->
	<?php 
		include "../includes/header.php";
	?> 
	<!-- end header -->




	<!-- start content -->
	<content>
		<div class="main">
			<div class="wrapper clearfix">
				 <form class="login" method="post" action="registration.php">
				 	<?php 				 	
					if (!empty($errors) && !empty($data))
					{
						echo '<div style="color: red;">'.array_shift($errors).'</div><br>';
					}
				 	?>
		            <p>	<label for="login">Ваш логин</label><p class="info" id="aboutLogin"></p></p>
		            <p>		
		            	<input id="inputLogin" type="text"  name="login" value="<?php echo @$data['login']; ?>" />
		          	</p>		        


		            <p><label for="login">Ваш Email</label><p class="info" id="aboutEmail"></p></p>
		            <p>		
		            	<input id="inputEmail" type="email"  name="email" value="<?php echo @$data['email']; ?>"/>		
		            </p>


		            <p><label for="password">Ваш пароль</label><p class="info" id="aboutPass"></p></p>
		            <p>		
		            	<input id="inputPass" type="password"  name="password"  />	
		            </p>    


		            <p><label for="password">Подтвердите пароль</label><p class="info" id="aboutPass_2"></p></p>
		            <p>		
		            	<input id="inputPass_2" type="password"  name="password_2" />		
		            </p>


		            <p>
		            	<input id="submitBut" type="submit" name="do_signup" value="Зарегестрироваться" />
		            </p>


      			  </form>
      			
			</div>
		</div>
	</content>
	<!-- end content -->


	<!-- start contacts -->
	<?php
		include "../includes/contacts.php"; 
	?>
	<!-- end contacts -->




	<!-- start footer -->
	<?php
		include "../includes/footer.php";
	?>
	<!-- end footer -->

</body>


</html>

