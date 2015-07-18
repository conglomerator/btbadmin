var displayAlert = function (alert) {
    if (!alert.type || (alert.type != "success" && alert.type != "info" && alert.type != "danger" && alert.type != "warning")) alert.type = "info";
    if (!alert.text||alert.text=="") switch (alert.type) {
            case "success":
                alert.text = "Success!";
                break;
            case "info":
                alert.text = "Please take note.";
                break;
            case "warning":
                alert.text = "Warning!";
                break;
            case "danger":
                alert.text = "Danger!";
                break;
    };
    $(".jwl-alert-container").append("<div class='alert jwl-alert alert-"+alert.type+" alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+alert.text+"</div>");
};