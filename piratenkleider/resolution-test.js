function adjustStyle(width) {
    width = parseInt(width);
    if (width < 600) {
        $("#size-stylesheet").attr("href", "http://smg.jay.lu/wp-content/themes/twentyten/narrow.css");
    } else {
       $("#size-stylesheet").attr("href", "http://smg.jay.lu/wp-content/themes/twentyten/wide.css"); 
    }
}

$(function() {
    adjustStyle($(this).width());
    $(window).resize(function() {
        adjustStyle($(this).width());
    });
});
