$(document).ready(function(){
    var route = window.location.pathname;
    if(route === "/boards/create") {
        $("#board-nav-item").addClass("active");
    }

});