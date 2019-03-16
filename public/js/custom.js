
$(function() {

	$(".top-menu a").click(function() {
		$(".top-menu a").removeClass("active");
		$(this).addClass("active");
		console.log($(this).attr("id"));

		$(".card").fadeOut(500);
		$("#card-" + $(this).attr("id")).fadeIn(500);
	});

	var page = document.URL.split("#");
	if (page[1] == undefined) {
		page = "about";
		console.log("ds");
	} else {
		page = page[1];
	}
	$(".top-menu").find("#" + page).addClass("active");
});