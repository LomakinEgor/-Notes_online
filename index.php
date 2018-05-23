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
	<title>Наш сайт</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css"  href="css/style.css"  />
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
						<h1>Заголовок первый</h1>
						<p>Текст о том что в этом заголовке.</p>
						<a href="">Переход 1</a>
					</li>
					<li>
						<h1>Заголовок второй</h1>
						<p>Второй текст о том, что в этом заголовке</p>
						<a href="">Переход 2</a>
					</li>
					<li>
						<h1>Заголовок три</h1>
						<p>Третий текст о всем том, о чем третий</p>			
						<a href="">Переход 3</a>
					</li>
					<li>
						<h1>Инфо 1</h1>
						<p>А тут переход на новую строку</p>
						<a href="">Переход 4</a>
					</li>
					<li>
						<h1>Инфо 2</h1>
						<p>Это про второй, а это нет</p>
						<a href="">Переход 5</a>
					</li>
					<li>
						<h1>Инфо 3</h1>
						<p>Тетий алалала </p>			
						<a href="">Переход 6</a>
					</li>
				</ul>
			</div>
		</div>
	</content>
	<!-- end content -->


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