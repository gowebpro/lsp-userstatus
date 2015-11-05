/*---------------------------------------------------------------------------
* @Module Name: UserStatus
* @Description: UserStatus for LiveStreet
* @Version: 1.0
* @Author: Chiffa
* @LiveStreet version: 1.X
* @File Name: userstatus.js
* @License: CC BY-NC, http://creativecommons.org/licenses/by-nc/3.0/
*----------------------------------------------------------------------------
*/


var ls=ls || {}

jQuery(document).ready(function($){
	$(document).click($.proxy(ls.userstatus.statusCancel, ls.userstatus));
	$('body').on("click", "#status_editor, #status_view", function(e) {
		e.stopPropagation();
	});
});

ls.userstatus = (function ($) {

	this.statusEdit = function() {
		var textContainer=$('#status_view span');
		if (textContainer.hasClass('my-status')) {
			this.textStatus=textContainer.text();
		} else {
			this.textStatus='';
		}

		$('#editor_submit').removeAttr('disabled').click($.proxy(ls.userstatus.statusCheckSave, this));
		$('#editor_cancel').removeAttr('disabled').click($.proxy(ls.userstatus.statusCancel, this));
		$('#status_editor').fadeIn('fast');

		$('#editor_text').val(this.textStatus).focus();
	};

	this.statusCancel = function() {
		$('#editor_submit').attr('disabled','disabled').off();
		$('#editor_cancel').attr('disabled','disabled').off();
		$('#status_editor').fadeOut('fast');
	};

	this.statusCheckSave = function(e) {
		e=e || window.event;
		if (e && e.type=='keydown' && e.keyCode!=10 && e.keyCode!=13) {
			return;
		}
		this.statusSave($('#editor_text').val());
	};

	this.statusSave = function(sText) {
		if (sText == this.textStatus) return this.statusCancel();

		ls.ajax(aRouter.ajax + 'user/status', { user_status:sText }, function(result) { 
			if (result.bStateError) {
				ls.msg.error(null,result.sMsg);
			} else {
				ls.msg.notice(null,result.sMsg);
				$('#profile_status').html(result.sText);
			}
		});
	};

	return this;
}).call(ls.userstatus || {},jQuery);