/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var displayMessage = function(data){
    $(".jwl-alert-container").append("<div class='alert jwl-alert alert-"+data.messageType+" alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"+data.messageText+"</div>");
};

var test = function(){
    $.getJSON("/php/index.php",displayMessage);
};

test();
test();