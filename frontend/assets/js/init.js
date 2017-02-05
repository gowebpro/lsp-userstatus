/**
 *  Plugin name:    User Status
 *  Author:         Chiffa
 *  Web:            http://goweb.pro
 */


jQuery(document).ready(function($){

    $('.js-user-status').livequery(function() {
        $(this).lsUserStatus({
            urls: {
                save: aRouter['ajax'] + 'user/status/'
            }
        });
    });

});
