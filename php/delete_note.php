<?php 
	require "db.php";	
	header('Location:http://notes/note.php');
	$data = $_GET;
	$user = R::findOne('user', 'id = ?', array($data['user_id']));
	if($user['id'] == $data['user_id'])
	{	
		if(($user['id']==$_SESSION['logged_user']->id))
		{
			$deleted_object = R::load('notes', $data['self_id']);
			R::trash($deleted_object);	
		}
		else
		{
			echo "Это не вы!";
		}
	}
  	exit;
?>