var baseUrl='/hackaton/poslovanje/';



function login(){
	var url=baseUrl+'controler/system.php';
	var data=$("form#login").serialize();

	$.ajax({
                type: "post",
				data: data+"&action=2",
				url: url,
				success: function(text) {
					
					if(text==1){
						
						window.location.href = 'http://klikinformacijsketehnologije.hr/hackaton/poslovanje/poslovanje.php';
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
					window.location.href = 'http://klikinformacijsketehnologije.hr/hackaton/poslovanje/index.php';
					
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

function refresh(){
	window.location.href = 'http://klikinformacijsketehnologije.hr/hackaton/poslovanje/poslovanje.php';
}
function problemi(id,dodatno){
var url=baseUrl+'controler/problemi.php';
		if(id==1){	
			$.ajax({
	                type: "post",
					data: "dodatno="+dodatno+"&action="+id,
					url: url,
					success: function(text) {
						
						if(text="Problem zaprimljen"){
							alert(text);
							refresh();

						}else{
							alert(text);
						}		
						
						   }
	            });
		}else if(id==2){	
			$.ajax({
	                type: "post",
					data: "dodatno="+dodatno+"&action="+id,
					url: url,
					success: function(text) {
						
						if(text="Problem rješen"){
							alert(text);
							refresh();

						}else{
							alert(text);
						}		
						
						   }
	            });
		}

}
