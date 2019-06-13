$(function() {
    var sideslider = $('[data-toggle=collapse-side]');
    var get_sidebar = sideslider.attr('data-target-sidebar');
    var get_content = sideslider.attr('data-target-content');
    sideslider.click(function(event) {
        $(get_sidebar).toggleClass('in');
        $(get_content).toggleClass('out');
    });
});
$(function() {
    $(".navbar-toggler").click(function(event) {
        $(".navbar-collapse").show();
        return false;
    });
    $(document).click(function(event) {
        var menu = $(".navbar-collapse");
        if (menu.is(":visible") && (!menu.is(event.target) && menu.has(event.target).length === 0)) {
            menu.slideToggle();
        }
    });
});