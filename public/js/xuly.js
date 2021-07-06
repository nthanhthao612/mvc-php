$(document).ready(function () {
    
    $("#left-menu-area").hide(0);
    $("#btn-menu-display").click(function () {
        $("#left-menu-area").show(1000);
    });
    $("#btn-menu-display").hover(function () {
        $("#left-menu-area").show(1000);
    });
    $(document).click(function (e) {
        var container = $("#left-menu-area");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide(1000);
        }
    });
})