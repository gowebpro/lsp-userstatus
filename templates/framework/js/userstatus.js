/*-------------------------------------------------------
*
*	Plugin name:	Userstatus
*	Author:			Chiffa
*	Web:			http://goweb.pro
*
---------------------------------------------------------
*/


var ls = ls || {};

ls.userstatus = (function ($) {

    this.statusEdit = function() {
		var _this = this;
		$('#status_editor').fadeIn('fast', function() {
			$(this).find('input[type=text]').removeProp('disabled').focus();
			$(this).find('button').removeProp('disabled');
			$(this).on('submit', 'form', _this.statusSave);
		});
    };

    this.statusCancel = function() {
		var _this = this;
		$('#status_editor').fadeOut('fast', function() {
			$(this).off('submit', 'form', _this.statusSave);
			$(this).find('input, button').prop('disabled', true);
		});
    };

	this.statusSave = function(event) {
		var form = $(this);
		var input = $('input[type=text]', form);

		if (input.length && input.val() == input.data('value')) {
			ls.userstatus.statusCancel();
		} else {
			ls.ajaxSubmit(aRouter.ajax + 'user/status', form, function(result) { 
				if (result.bStateError) {
					ls.msg.error(null, result.sMsg);
				} else {
					ls.msg.notice(null, result.sMsg);
					$('#profile_status').html(result.sText);
				}
			});
			$('input, button', form).prop('disabled', true);
		}
		event.preventDefault();
    };

    return this;
}).call(ls.userstatus || {},jQuery);


jQuery(document).ready(function($) {
    $(document).click( ls.userstatus.statusCancel.bind(ls.userstatus) );
    $('body').on('click', '#status_editor, #status_view', function(event) {
        event.stopPropagation();
    });
});
