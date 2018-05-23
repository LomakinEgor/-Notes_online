<header>
		<div class="wrapper clearfix">
			<div class="logo">
				<a href="/index.php">		
						<!-- <img class="logo" src="images/logo.png" alt="Главная страница">	-->
				</a>
			</div>
			<nav>
				<ul>
					<li><a href="/about.php">Описание</a></li>					
					<li><a href="/note.php">Заметки</a></li>
					<?php if( isset($_SESSION['logged_user']) ):?>			
						<li><a href="../php/logout.php">Выйти</a></li>
					<?php else : ?>
					<li><a href="../php/login.php">Войти</a></li>
					<li><a href="../php/registration.php">Регистрация</a></li>				
					<li><a href="../php/parse.php">Проверка парсера</a></li>
					<?php endif; ?>				
				</ul>
			</nav>			
		</div>		

</header>