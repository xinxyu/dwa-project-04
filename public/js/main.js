$(document).ready(function(){
    var route = window.location.pathname.replace("/","");

    if(route =="boards") {
        $("board-nav-item").addClass("active");
    }
});