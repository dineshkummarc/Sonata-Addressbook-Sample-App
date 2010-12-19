$(document).ready(function() {
	
	$(".delete").click(function() {
		if (!confirm("Are you sure you want to remove this record?")) return;
		var id = $(this).attr("rel");
		
		$("#row-"+id+" td").fadeOut("slow");
		$.get('/ajax/', {method: 'removeRecord', id: id});
	});
	
	setTimeout(function() {
		$("td.success").fadeOut("slow");
	}, 3000);
});