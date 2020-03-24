$("#home .carousel img").dblclick(function(){
    let url = $(this).attr("src");
    $("#bigimg img").attr("src",url);
    $("#bigimg").css("display","block");
});

$("#bigimg img").dblclick(function(){
    $("#bigimg").css("display","none");
    $("#bigimg img").attr("src","");
});