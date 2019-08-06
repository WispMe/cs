$(document).ready(function() {
    selesai();

});

function selesai() {
	setTimeout(function() {
		update();
		selesai();
	}, 200);
}


function update() {

	$.getJSON("tampil.php", function(data) {
		$("tbody").empty();
		$.each(data.result, function() {
			$("tbody").append("<tr><td>"+this['grup']+"</td><td>"+this['sid']+
				"</td><td>"+this['customer']+"</td><td>"+this['layanan']+
				"</td><td>"+this['witel']+"</td><td>"+this['lokasi']+
				"</td><td>"+this['koordinat']+"</td><td>"+this['ip']+
				"</td><td>"+this['status']+"</td></tr>");
		});
	});
}

