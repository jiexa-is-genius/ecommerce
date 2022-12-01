function Note() {
    $note = this;
    $note.delay = 5000;

    /**
     * Alerts
     */
    $note.alert = function(message, type, ah) {
        if(typeof type == 'undefined') { type = 'success'; }
        if(typeof ah == 'undefined') { ah = true; }
        textColor = (type != 'warning') ? 'text-white' : 'text-black';
        msg = document.createElement('div');
        msg.className = 'toast align-items-center ' + textColor + ' bg-' + type + ' border-0';
        msgContent = document.createElement('div');
        msgContent.className = 'd-flex';
        msgBody = document.createElement('div');
        msgBody.className = 'toast-body';
        msgBody.innerText = message;
        msgButton = document.createElement('button');
        msgButton.type = 'button';
        msgButton.className = 'btn-close btn-close-white me-2 m-auto';
        msgContent.appendChild(msgBody);
        msgContent.appendChild(msgButton);
        msg.appendChild(msgContent);
        box = document.getElementById('toast-container-alerts');
        box.appendChild(msg);
        var alert = bootstrap.Toast.getOrCreateInstance(msg, { autohide: ah, delay: $note.delay });
        alert.show();
    }

    /**
     * Notifications
     */
    $note.show = function(title, body) {
        
    }

    $note.init = function(alerts) {
        alerts.forEach(function(alert) { 
            ah = true;
            if(typeof alert.autohide != 'undefined') {
                ah = alert.autohide;
            }
            $note.alert(alert.message, alert.type, ah); 
        });
    }

} $note = new Note(); 

$(document).ready(function() {
    $('#toast-container-alerts .toast .btn-close').on('click', function() {
        var alert = bootstrap.Toast.getOrCreateInstance($(this).parents('.toast').get(0));
        alert.hide();
    });
});