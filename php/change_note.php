<?php 	
	require "db.php";	
	header('Location:http://notes/note.php');
	$data = $_POST;
	$errors = array();
	if( isset($data['do_change']))
	{
		$errors = array();

		if($data['label_change'] == '')
		{
			$errors[] = 'Введите название';
		}
		if($data['text_change'] == '')
		{
			$errors[] = 'Введите текст записки';
		}
		if($data['date_start_change'] == '')
		{
			$errors[] = 'Введите дату начала';
		}
		if($data['date_end_change'] == '')
		{
			$errors[] = 'Введите дату конца';
		}
		
		if (empty($errors) && !empty($data))
		{
			$notes = R::load('notes', $data['id_change']);			
			$notes->user_id = $_SESSION['logged_user']->id;
			$notes->label = $data['label_change'];
			$notes->note = $data['text_change'];
			$notes->date_start = $data['date_start_change'];
			$notes->date_end = $data['date_end_change'];			
			if(isset($data['state_change']))
			{
				$notes->state = 1;
			}
			else
			{
				$notes->state = 0;
			}
			R::store($notes);	
		}
	}		
?>