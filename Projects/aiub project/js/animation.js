$(document).ready(function(){
    $("a[href='#section-1']").click(function() {
        $("html body").animate({scrollTop: $("#section-1").offset().top}, 50);
    });
    $("a[href='#section-2']").click(function() {
        $("html body").animate({scrollTop: $("#section-2").offset().top}, 50);
    });
});
