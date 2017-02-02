jQuery(document).ready(function($){

	$('.js-user-status').livequery(function() {
		$(this).lsUserStatus({
			urls: {
				save: aRouter['ajax'] + 'user/status/'
			}
		});
	});

});
