$(document).ready(function(){
    $("#hamburger-icon").click(function () {
        let width = $("#hamburger-icon").width();
        $("#navbar").toggleClass('close');
        $("#workplace").toggleClass('close');
        $(".dropdown").removeClass('open');
    });
    $(".dropdown").each(function(){
        $(this).click(function () {
            $(this).toggleClass('open');
        });  
    });
});