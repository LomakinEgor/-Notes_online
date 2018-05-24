<?php 
	require "db.php";
	$data = $_POST;
	$allOkay = '';
	if( isset($data['do_login']))
	{
		$errors = array();
		$user = R::findOne('user', 'login = ?', array($data['login']));
		if ($user)
		{
			//Login есть
			if(password_verify($data['password'], $user->password ))
			{
				//Логин пользователя
				$_SESSION['logged_user'] = $user; //Разобрать сесии
				header('Location: /');
			}
			else
			{
				$errors[] = 'Неверно введен пороль';
			}
		}
		else
		{
			$errors[] = 'Пользователь с таким логином не существует';
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
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<script src="../js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../js/login.js"></script>
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
				 <form class="login" method="post" action="login.php">
				<?php 
					if(!empty($errors))
					{
						echo '<div style="color: red;">'.array_shift($errors).'</div><br>';
					}					
				?>
				 	<p>
				 		<label for="login" style="float:left;" >Логин</label></p>	 			
		            	<p id="aboutLogin" class="subInfo"></p>
				 	</p>

		            <p>
		            	<input  id="inputLogin" type="text"  name="login" value="<?php echo @$data['login']; ?>" />
		        	</p>	

		            <p>
		            	<label for="password" style="float:left;">Ваш пароль</label>
		            	<p id="aboutPass" class="subInfo"></p>
		            </p>

		            <p>
		            	<input id="inputPass"  type="password"  name="password"  />
		            </p> 

		            <p>
		            	<input type="submit" name="do_login" value="Войти" />
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

