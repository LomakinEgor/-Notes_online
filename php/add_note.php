<?php 	
	require "db.php";	
	header('Location:http://notes/note.php');
	$data = $_POST;
	$errors = array();
	if( isset($data['do_add']))
	{
		$errors = array();

		if($data['label_input'] == '')
		{
			$errors[] = 'Введите название';
		}
		if($data['text_note'] == '')
		{
			$errors[] = 'Введите текст записки';
		}
		if($data['date_start_input'] == '')
		{
			$errors[] = 'Введите дату начала';
		}
		if($data['date_end_input'] == '')
		{
			$errors[] = 'Введите дату конца';
		}

		if (empty($errors) && !empty($data))
		{
			$notes = R::dispense('notes');
			$notes->user_id = $_SESSION['logged_user']->id;
			$notes->label = $data['label_input'];
			$notes->note = $data['text_note'];
			$notes->date_start = $data['date_start_input'];
			$notes->date_end = $data['date_end_input'];
			$notes->state = 0;
			R::store($notes);	
		}
	}	
?>