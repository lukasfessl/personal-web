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
	} else {
		page = page[1];
	}
	$(".top-menu").find("#" + page).addClass("active");

	$(".card-right").find(".card").hide();
	$(".card-right").find("#card-" + page).show();


	$('.slim-div').slimScroll({
        height: '550px'
    });
});