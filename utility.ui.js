//........................utilities for UI.............................................................
if (!window.utilities) {
    window.utilities = {};
}
(function () {
    // Function to check for user friendly keys  

    function jsIsUserFriendlyChar(val, step) {
        // Backspace, Tab, Enter, Insert, and Delete  
        if (val == 8 || val == 9 || val == 13 || val == 45 || val == 46) {
            return true;
        }
        // Ctrl, Alt, CapsLock, Home, End, and Arrows  
        if ((val > 16 && val < 21) || (val > 34 && val < 41)) {
            return true;

        }
        if (step == "Decimals") {
            if (val == 190 || val == 110) {  //Check dot key code should be allowed
                return true;
            }
        }
        // The rest  
        return false;
    }
    //------------------------------------------

    utilities.checkNumber = function (e) {
        var evt = (e) ? e : window.event;
        var key = (evt.keyCode) ? evt.keyCode : evt.which;
        if (key != null) {
            key = parseInt(key, 10);
            if ((key < 48 || key > 57) && (key < 96 || key > 105)) {
                if (!jsIsUserFriendlyChar(key, "Decimals")) {
                    return false;
                }
            }
            else {
                //debugger
                if (evt.shiftKey) {
                    return false;
                }
            }
        }
        return true;
    };
    //Disable cut copy paste
    $('input[noccp]').bind('cut copy paste', function (e) {
        e.preventDefault();
    });
    //Disable mouse right click
    $('input[noContextmenu]').on("contextmenu", function (e) {
        return false;
    });
})(jQuery, window);
