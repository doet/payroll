/* Load Page */



function load(page,div){    
//    var image_load = "<div class='ajax_loading'><img src='"+loading_image_large+"' /></div>";
    $.ajax({
        url: site+"/"+page,
        dataType:"html",
        beforeSend: function(){
//            $(div).html(image_load);
            $(div).html('proses...');
        },
        success: function(response){
            $(div).html(response);
        },
        error:function (xhr, ajaxOptions, thrownError){
            var msg = "Maaf Page <b>"+ page +"</b> sedang mengalami error: "+ xhr.status ;	
//            var pesan = msg + xhr.status + " /" + xhr.statusText + "  " + xhr.responseText        	
            $(div).html(msg);

        }
    });
    return false;
}
/*
function active_menu(obj)
{		
	$(".acemn").attr("class", "acemn");	
	var c = obj.split('>');
	var n = 0;
	c.forEach(function(entry) {   		
			if (n>0){
				$(c[n]).attr("class", "acemn active open");
				$(c[0]).attr("class", "acemn active");				
			}else{
				$(c[n]).attr("class", "acemn active");
			}
		n++;
	});
		
}*/

function formatNumber(input)
{
    var num = input.value.replace(/\,/g,'');
    if(!isNaN(num)){
        if(num.indexOf('.') > -1){
            num = num.split('.');
            num[0] = num[0].toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'');
            if(num[1].length > 2){
                alert('You may only enter two decimals!');
                num[1] = num[1].substring(0,num[1].length-1);
            } input.value = num[0]+'.'+num[1];
        } else{ input.value = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1,').split('').reverse().join('').replace(/^[\,]/,'') };
    } else{ 
        alert('Anda hanya diperbolehkan memasukkan angka!');
        input.value = input.value.substring(0,input.value.length-1);
    }
}