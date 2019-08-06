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
	$.getJSON("disconnectedtable.php", function(data) {
		$("ul").empty();
		$.each(data.result, function() {
			$("ul").append("<li>"+this['grup']+"</li><li>"+this['sid']+"</li><li>"+this['customer']+"</li><br />");
		});
	});
}