var baseUrl='/hackaton/';


function register(){
	var url=baseUrl+'controler/system.php'
	var data=$("form#noviKorisnik").serialize();

	$.ajax({
                type: "post",
				data: data+"&action=1",
				url: url,
				success: function(text) {
					
					if(text==1){
						alert(text);
						//window.location.href = 'http://klikinformacijsketehnologije.hr/hackaton/index.php';
					}else{
						alert("Došlo je do greške");	
					}
					   }
            });	
}
function login(){
	var url=baseUrl+'controler/system.php';
	var data=$("form#login").serialize();

	$.ajax({
                type: "post",
				data: data+"&action=2",
				url: url,
				success: function(text) {
					
					if(text==1){
						
						window.location.href = 'http://klikinformacijsketehnologije.hr/hackaton/index.php';
					}else{
						alert("Došlo je do greške");	
						alert(text);
					}
					   }
            });	
}

function logout(){
	var url=baseUrl+'controler/login.php';
	
	$.ajax({
                type: "post",
				data: "action=3",
				url: url,
				success: function(text) {
					window.location.href = 'http://beecard.hr/poslovanje/index.php';
					
					   }
            });	
}

function loadScreen(form){
	
	var url=baseUrl+'view/'+form+'/index.php';
		$.ajax({
                type: "post",
				url: url,
				success: function(text) {
					
					$('#content').html('').html(text);
					   }
            });	
}