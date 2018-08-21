			$(document).ready(function(){
    		$("button").click(function(){
        	$("#test").hide();
    		});
			});

			function hideText() {
    		var x = document.getElementById('teksts');
    		if (x.style.visibility === 'hidden') {
        	x.style.visibility = 'visible';
			    } else {
			        x.style.visibility = 'hidden';
			    }
			}