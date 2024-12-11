$(document).ready(function(){
//enable malibu scrollbar, when hover to the sidebar, the scrollbar automaticly shows and can be scrolled if possible
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });
    $("#sidebarCollapse").on("click",function(){
        $("#sidebar").toggleClass('active');
        $("#content").toggleClass('active');
    });
    $("#sidebarCollapse-mobile").on("click",function(){
        $("#sidebar").toggleClass('active');
        $("#content").toggleClass('active');
    });

})


//wrong writing see above
// (function($){
//     $("#sidebar").mCustomScrollbar({
//         theme: "minimal"
//     });
//     $("#sidebarCollapse").on("click",function(){
//         $("#sidebar").toggleClass('active');
//         $("#content").toggleClass('active');
//     });
// })(jQuery);


$(document).ready(function(){

    //resize search input width
    if($(window).width()<862){
        $("#header_search_query").css("width","88px");
    }

    //for small screens that nav bar is hidden
    if($(window).width()<768){
        $("#header_search_query").css("border-radius","100px");
        $(".header_search_form").css({"border":"1px solid black","border-radius":"100px"});
        
    }

});


$( window ).resize(function() {

    //resize search input width
    if($(window).width()<862){
        $("#header_search_query").css("width","88px");
    }else{
        $("#header_search_query").css("width","auto");
    }

    if($(window).width()<768){
        $(".header_search_form").css({"border":"1px solid black","border-radius":"100px"});
    }else{
        $(".header_search_form").css({"border":"none","border-radius":"auto"});
    }

});