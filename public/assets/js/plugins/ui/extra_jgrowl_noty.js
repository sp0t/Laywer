/* ------------------------------------------------------------------------------
 *
 *  # Noty and jGrowl notifications
 *
 *  Demo JS code for extra_jgrowl_noty.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------
Noty.overrideDefaults({
    theme: 'limitless',
    layout: 'topRight',
    type: 'alert',
    timeout: 10000
});

function noty_error($header, $message){
    
    new Noty({
        text: $message,
        type: 'error'
    }).show()
}

function noty_success($header, $message){    
    new Noty({
        text: $message,
        type: 'success'
    }).show()
}

function noty_warning($header, $message){    
    new Noty({
        text: $message,
        type: 'warning'
    }).show()
}

function noty_info($header, $message){    
    new Noty({
        text: $message,
        type: 'info'
    }).show()
}


function noty_alert($header, $message){    
    new Noty({
        text: $message,
        type: 'alert'
    }).show()
}

function noty_success($header, $message){    
    new Noty({
        text: $message,
        type: 'success'
    }).show()
}


// document.addEventListener('DOMContentLoaded', function() {
//     NotyJgrowl.init();
// });
