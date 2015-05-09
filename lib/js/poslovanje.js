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
	var url=baseUrl+'controler/system.php';
	
	$.ajax({
                type: "post",
				data: "action=3",
				url: url,
				success: function(text) {
					window.location.href = 'http://klikinformacijsketehnologije.hr/hackaton/index.php';
					
					   }
            });	
}

function loadScreen(form,dodatno){
	
	var url=baseUrl+'view/'+form+'/index.php';
		$.ajax({
                type: "post",
				url: url,
				success: function(text) {
					
					$('#content').html('').html(text);
					   }
            });	
}

function profile(id,dodatno){
	var url=baseUrl+'controler/profile.php';
		if(id==1){	
			var data=$("form#osnovniPodatciForm").serialize();
			
			$.ajax({
	                type: "post",
					data: data+"&action="+id,
					url: url,
					success: function(text) {
						
						alert(text);
						if(text=="Podatci uspješno spremljeni"){
							loadScreen('profile',0);	
						}			
						
						   }
	            });
		}else if(id==2){
			$.ajax({
                type: "post",
				data: "dodatno="+dodatno+"&action="+id,
				url: url,
				success: function(text) {
					
					alert(text);
					if(text=="Prijedlog uspješno deaktiviran"){
						loadScreen('profile',0);	
					}			
					
					   }
            });		
		}else if(id==3){
			$.ajax({
                type: "post",
				data: "dodatno="+dodatno+"&action="+id,
				url: url,
				success: function(text) {
					
					alert(text);
					if(text=="Problem uspješno deaktiviran"){
						loadScreen('profile',0);	
					}			
					
					   }
            });		
		}else if(id==4){
			var data=$("form#noviPrijedlogForm").serialize();
			
			$.ajax({
	                type: "post",
					data: data+"&action="+id,
					url: url,
					success: function(text) {
						
						alert(text);
						if(text=="Novi prijedlog uspješno spremljen"){
							loadScreen('profile',0);	
						}			
						
						   }
	            });

		}

}

function prijedlozi(id,dodatno){
	var url=baseUrl+'controler/prijedlozi.php';
		if(id==1){	
			$.ajax({
	                type: "post",
					data: "dodatno="+dodatno+"&action="+id,
					url: url,
					success: function(text) {
						
								
						
						   }
	            });
		}else if(id==2){
			$.ajax({
	                type: "post",
					data: "dodatno="+dodatno+"&action="+id,
					url: url,
					success: function(text) {
						
								
						
						   }
	            });		

		}

}

