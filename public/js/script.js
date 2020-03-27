$("#home .carousel img").dblclick(function(){
    let url = $(this).attr("src");
    $("#bigimg img").attr("src",url);
    $("#bigimg").css("display","block");
});

$("#bigimg img").dblclick(function(){
    $("#bigimg").css("display","none");
    $("#bigimg img").attr("src","");
});

$("#articlecreatearticle table").on("click","button.deletearticle",function(){
    let articleid = $(this).attr("data-id");
    let tr = $(this).parent().parent().parent();
    $.get(
        "/deleteonearticle/"+articleid,
        function (response) {
            let result = JSON.parse(response);
            if(result.response == 1)tr.remove();
        }
    );
});

$("#categorycreatecategory table").on("click","button.deletecategory",function(){
    let categoryid = $(this).attr("data-id");
    let tr = $(this).parent().parent().parent();
    $.get(
        "/deleteonecategory/"+categoryid,
        function (response) {
            let result = JSON.parse(response);
            if(result.response == 1)tr.remove();
        }
    );
});

$("#articlecreatearticle .pagination select option").click(function(){
    let index = $(this).val();
    $(".page").addClass("hidden");
    $("tr[data-page='"+index+"']").removeClass("hidden");
    $('html, body').animate({scrollTop:$(document).height()}, 'fast');
});