$(document).ready(function(){
	$('#inputLogin').keyup(function(){
		var count = $(this).val().length;
		var str = $(this).val();
		var reg = /^[a-z0-9_-]{3,30}$/i;

		if(str.search(reg) == 0)
		
			{
				$('#aboutLogin').text("OK");
				$('#aboutLogin').css('color', 'green');
				//$('#submitBut').prop("disabled", false); 
			}
		else
			{
				$('#aboutLogin').text("X");
				$('#aboutLogin').css('color', 'red');	
				//$('#submitBut').prop("disabled", true);
			}		
	});

	$('#inputEmail').keyup(function(){
		var count = $(this).val().length;
		var str = $(this).val();
		var reg = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;		
		if(str.search(reg) == 0)
		
			{
				$('#aboutEmail').text("OK");
				$('#aboutEmail').css('color', 'green');
				$('#submitBut').prop("disabled", false); 
			}
		else
			{
				$('#aboutEmail').text("X");
				$('#aboutEmail').css('color', 'red');
				$('#submitBut').prop("disabled", true);
			}		
	});

	$('#inputPass').keyup(function(){
		var count = $(this).val().length;
		var str = $(this).val();		
		if(str.length >= 3 && str.length < 50)		
			{
				$('#aboutPass').text("OK");
				$('#aboutPass').css('color', 'green');
				$('#submitBut').prop("disabled", false); 
			}
		else
			{
				$('#aboutPass').text("X");
				$('#aboutPass').css('color', 'red');
				$('#submitBut').prop("disabled", true);
			}		
	});

	$('#inputPass_2').keyup(function(){
		var count = $(this).val().length;
		var str = $(this).val();	
		var pass = $("#inputPass").val();	
		if(str == pass)		
			{
				$('#aboutPass_2').text("OK");
				$('#aboutPass_2').css('color', 'green');
				$('#submitBut').prop("disabled", false); 
			}
		else
			{
				$('#aboutPass_2').text("X");
				$('#aboutPass_2').css('color', 'red');
				$('#submitBut').prop("disabled", true);
			}		
	});
});

