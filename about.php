<?php 
	require "libs/rb.php";
	R::setup( 'mysql:host=localhost;dbname=webSite',
        'root', '' );
	
	session_start();	
?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<title>Описание</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css"  href="css/style.css"  />
	<link rel="stylesheet" type="text/css"  href="css/about.css"  />
</head>


<body>
	<!-- start header -->
	<?php 
		include "includes/header.php";
	?>
	<!-- end header -->




	<!-- start content -->
	<content>
		<div class="main">
			<div class="wrapper clearfix">
				<ul>					
					<li>
						<h1>Зачем вам этот сервис</h1>
						<p>Текст о функционале сервиса</p>
						<a href="">Заметки</a>
					</li>
					<li>
						<h1>Присоединись к нам</h1>
						<p>Почему вам нужно зарегаться</p>
						<a href="php/registration.php">Регистрация</a>
					</li>
					<li>
						<h1>Прогрессия</h1>
						<p>Туту некая инфа по статистике</p>			
						<a href="">Календарь</a>
					</li>					
				</ul>
			</div>
		</div>
	</content>
	<!-- end content -->




	<!-- start about -->
	<div class="about">

	</div>
	<!-- end about -->




	<!-- start contacts -->
	<?php
		include "includes/contacts.php"; 
	?>
	<!-- end contacts -->




	<!-- start footer -->
	<?php 
		include "includes/footer.php";
	?>
	<!-- end footer -->

</body>


</html>