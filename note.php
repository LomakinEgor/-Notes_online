<?php 
	require "libs/rb.php";
	R::setup( 'mysql:host=localhost;dbname=webSite',
        'root', '' );
	session_start();
	$user = $_SESSION['logged_user'];
	$notes = R::getAll('SELECT * FROM notes WHERE user_id = ?  ORDER BY id DESC', array($_SESSION['logged_user']->id));
	$count_notes = count($notes); 
	$pages = ceil($count_notes / 3);
	$page = $_GET['page'];
	$delete = $_GET['deleted'];
	
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<title>Заметки</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/icon.png">
	<link rel="stylesheet" type="text/css"  href="css/style.css"/>
	<link rel="stylesheet" type="text/css"  href="css/note.css"/>
	<script src="../js/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../js/note.js"></script>
</head>


<body>
	<!-- start header -->
	<?php 
		include "includes/header.php";

	?>
	<!-- end header -->




	<!-- start content -->
	<content>
		<div class="main" >
			<div class="wrapper clearfix notes"  >
				<?php if( isset($_SESSION['logged_user']) ):?>	
				<?php 	
					/*foreach ($notes as $value) {
						$i++;
						#print_r($value) ;
						if($i >=3){
							break;
						}

					}	*/
				
					?>
				<h1>Привет, <?php echo $_SESSION['logged_user']->login; ?></h1>
				<?php 	
					if(!is_numeric($page))
					{
						$page = 1;
					}
					if($page <= 1)
					{
						$i=0;
					}	
					else if($page >= $pages)
					{
						$i= $pages*3-3;
					}
					else
					{
						$i = ($page*3-3);
					}					
					//i - счетчки записок
					//j - счетчик записей на странице
					for ($j = 0;$i < $count_notes; $i++)
					{		
						?>					
						<div class="window_notes">
							<h2>
								<?php echo $notes[$i]['label'];	?>									
							</h2>								
							<p>
								<div class="note">
									<?php echo $notes[$i]['note']; ?>									
								</div>
							</p>
							<p class="right ">
								<input type="checkbox" <?php if($notes[$i]['state'] == 1){ echo "checked";} ?>>
								Завершеноs
							</p>
							<p >Дата начала: <?php echo $notes[$i]['date_start']; ?></p>
							
							<form id="form" action="note.php" method="get">
								<a href="?self_id=<?php echo $notes[$i]['id'];?>#zatemnenie_change" id="change" class="form_ref create right">Редактировать</a>
								<input type="text" style="display: none;" name="self_id" value="<?php echo $notes[$i]['id'];?>">
								<input type="text" style="display: none;" name="user_id" value="<?php echo $notes[$i]['user_id'];?>">
							</form >

							<form action="php/delete_note.php" method="get" >
								<input type="text" style="display: none;" name="self_id" value="<?php echo $notes[$i]['id'];?>">
								<input type="text" style="display: none;" name="user_id" value="<?php echo $notes[$i]['user_id'];?>">
								<button type="submit" name="do_delete" class="form_ref create right ">Удалить</button>
							</form>
							
							<p >Дата завершения: <?php echo $notes[$i]['date_end']; ?> </p>
						</div>
					<?php 
						$j++;	
						if($j >= 3)
							break;
					}		
				?>
					<a href="#zatemnenie_create" id="create" class="form_ref create">Создать записку</a>
					<div class="listing_main">
						<?php							
							if($pages > 1)
							{	//Выводим столько то страниц + обработка переходов
								
								?>
									<a href="
									<?php //Если не на 1 странице
									if($page <= 1){
										echo $_SERVER['SCRIPT_NAME']. "?page=1";
									}
									else if ($page >= ($pages))
									{
										echo $_SERVER['SCRIPT_NAME']. "?page=".($pages-1);
										
									}
									else
									{
										echo $_SERVER['SCRIPT_NAME']. "?page=".($page = $page - 1);
										$page=$page+1;
									}
									?>" class="form_ref listing">
									 Пред.
									</a>


									<a href="
									<?php //Если не на последней странице
									if($page <= 1){
										echo $_SERVER['SCRIPT_NAME']. "?page=2";
									}
									else if ($page >= ($pages))
									{
										echo $_SERVER['SCRIPT_NAME']. "?page=".$pages;
										
									}
									else
									{
										echo $_SERVER['SCRIPT_NAME']. "?page=".($page = $page + 1);
										$page = $page-1;
									}
									?>" class="form_ref listing">									
									След.
									</a>

								<?php
							}
							else 
							{	//Без переходов
								?>
									<a href="/note.php" class="form_ref listing">Пред.</a>
									<a href="/note.php" class="form_ref listing">След.</a>
								<?php 
							}
							
						 ?>

						<!--<a href="#" class="form_ref listing">Пред.</a>
						<a href="#" class="form_ref listing">1</a>
						<a href="#" class="form_ref listing">2</a>
						<a href="#" class="form_ref listing">3</a>
						<a href="#" class="form_ref listing">След.</a>-->
					</div>

			</div>
			
			<!-- Создание -->
			<div id="zatemnenie_create">
				<div id="window_modal" >
					<form action="php/add_note.php" method="post" >						
						<h2>Создание записи</h2>
						<input name="label_input" class="to_create" type="text" placeholder="Название записи">
						<TEXTAREA name="text_note" class="to_create" maxlength="5000" cols="50" rows="15" placeholder="Текст записки" ></TEXTAREA>
						<p>Дата начала: <input name="date_start_input" class="date_create" type="date"></p>
						<p class="right "><input name="state_input" type="checkbox">Завершено</p>
						<p>Дата завершения: <input name="date_end_input" class="date_create" type="date"></p>
						<a href="#" class="form_ref create right">Закрыть окно</a>
						<button name="do_add" type="submit"  class="form_ref create right">Создать</button>
					</form>
				</div>
			</div>

			<!-- Редактирование -->
			<div id="zatemnenie_change">
				<div id="window_modal">
					<form action="php/change_note.php" method="post" >
						<?php 
							$note = R::getAll('SELECT * FROM notes WHERE id = ?', array($_GET['self_id']));
						 ?>
						 <input type="text" name="id_change" style="display: none;" value="<?php echo $_GET['self_id']?>">
						<h2>Изменение записи</h2>
						<input name="label_change" class="to_create" type="text" placeholder="Название записи" value="<?php echo $note[0]['label']?>">
						<TEXTAREA name="text_change" class="to_create" maxlength="5000" cols="50" rows="15" placeholder="Текст записки" >
							<?php echo $note[0]['note']?>
						</TEXTAREA>
						<p>Дата начала: <input name="date_start_change" class="date_create" type="date" value="<?php echo $note[0]['date_start']?>"></p>					
						<p class="right "><input name="state_change" type="checkbox" <?php if($note[0]['state'] == 1){ echo "checked";} ?>>Завершено</p>
						<p>Дата завершения: <input name="date_end_change" class="date_create" type="date" value="<?php echo $note[0]['date_end']?>"></p>
						<a href="#" class="form_ref create right">Закрыть окно</a>
						<button name="do_change" type="submit"  class="form_ref create right">Подтвердить</button>
					</form>
				</div>
			</div>
			
		</div>
		<?php else : ?>
				<div style="text-align: center; "> 
					<h1 >Вы не вошли!</p></h1>
					<a class="form_ref create" href="php/login.php">Войти</a>
				</div>
			</div> 
		</div>
		<?php  endif; ?>	
	</content>
	<!-- end content -->

	


	<!-- start contacts -->
		<?php
		//include "includes/contacts.php"; 
	?>
	<!-- end contacts -->




	<!-- start footer -->
	<?php
		include "includes/footer.php"; 
	?>
	<!-- end footer -->


</body>


</html>
