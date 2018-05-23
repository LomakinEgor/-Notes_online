$(document).ready(function(){
	$('.inputLogin').keyup(function(){
		var count = $(this).val().length;
		var str = $(this).val();
		var reg = /^[a-z0-9_-]+@[a-z0-9-]+\.[a-z]{2,6}$/i;
		
		if(str.search(reg) == 0)		
			{
				$('#strLogin').text("Подходит под формат Строка - " + str);
				$('#lenLogin').text("Длинна вашего логина = " + count);
			}
		else
			{
				$('#strLogin').text("НЕ подходит под формат Строка - " + str);
				$('#lenLogin').text("Длинна вашего логина = " + count);
			}		
	});

	
});

