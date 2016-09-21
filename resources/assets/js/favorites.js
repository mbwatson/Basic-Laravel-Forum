$('a.favorite').click(function(evt) {
	evt.preventDefault();
	if ($(this).hasClass('text-muted')) {
		$(this).attr('title', 'Remove from Favorites').tooltip('fixTitle').tooltip('show');
	} else {
		$(this).attr('title', 'Add to Favorites').tooltip('fixTitle').tooltip('show');
	}
	$(this).toggleClass("text-muted text-danger");
	// $(this).children('i').toggleClass("mdi-heart mdi-heart-outline");
	$.ajax({
		method: 'get',
		url: $(this).attr('href'),
	})
	.done(function(msg) {
		console.log(msg['message']);
	});
})