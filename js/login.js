$(document).ready(function(){
	$('#inputLogin').keyup(function(){
		var count = $(this).val().length;
		var str = $(this).val();
		var reg = /^[a-z0-9_-]{3,30}$/i;

		if(str.search(reg) == 0)
		
			{
				$('#aboutLogin').text("OK");
				$('#aboutLogin').css('color', 'green');
				
			}
		else
			{
				$('#aboutLogin').text("X");
				$('#aboutLogin').css('color', 'red');	
			}		
	});	

	$('#inputPass').keyup(function(){
		var count = $(this).val().length;
		var str = $(this).val();		
		if(str.length >= 3 && str.length < 50)		
			{
				$('#aboutPass').text("OK");
				$('#aboutPass').css('color', 'green');
			}
		else
			{
				$('#aboutPass').text("X");
				$('#aboutPass').css('color', 'red');
			}		
	});


	
});

/*
$(document).on('submit','form',function(){
		var UserName=$('input[name=login]').val();
		var UserPass=$('input[name=password]').val();
		var reg = new RegExp("^[a-zA-Z0-9]+$");
		//Валидация	
		//Проверка Логина
		if(UserName.length>2 && UserName.length < 10)
		{
			alert('Все окей')
		}
		else if (UserName.length > 10)
		{
			alert('Слишком длинный логин');
		}
		else
		{
			alert('Слишком короткий логин');
		}
	})

	*/
