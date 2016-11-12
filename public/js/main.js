$(document).ready(function(){
    var route = window.location.pathname.replace("/","");

    if(route) {
        $("#" + route + "-nav-item").addClass("active");
    }
});