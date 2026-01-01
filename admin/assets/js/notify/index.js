'use strict';
var notify = $.notify('Success <br> Page Do not close this page...', {
    type: 'success',
    allow_dismiss: true,
    delay: 2000,
    showProgressbar: false,
    timer: 300
});
setTimeout(function() {
    // notify.update('message', '<i class="fa fa-bell-o"></i><strong>Loading</strong> Inner Data.');
}, 1000);
