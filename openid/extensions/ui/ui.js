/*
 * SimpleID
 *
 * Copyright (C) Kelvin Mo 2009
 *
 * This program is licensed under the GPL.
 * 
 * $Id: ui.js 405 2011-06-11 08:05:14Z kmo $
 */

$(document).ready(function() {
    $('input#edit-cancel').click(function() {
        window.close();
        return false;
    });
    $(document).keydown(function(e) {
        if (e.which == 27) { // Close the window if user presses Esc
            window.close();
            return false;
        }
    });
});
