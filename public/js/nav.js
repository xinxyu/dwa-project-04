$(document).ready(function(){
    var route = window.location.pathname;
    switch(route) {
        case "/boards":
            $("#my-boards-nav-item").addClass("active");
            break;
        case "/boards/create":
            $("#board-nav-item").addClass("active");
            break;
        case "/login":
            $("#login-nav-item").addClass("active");
            break;
        case "/register":
            $("#register-nav-item").addClass("active");
            break;
        default:
            break;
    }

});