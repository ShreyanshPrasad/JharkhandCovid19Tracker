$(document).ready(function(){
    $("#HideUnhide").click(function(){
      $("#table").slideToggle(500);
    });

    $("#copyText").click(function(){
      var ele = $("#url-span");
      ele.select();
      document.execCommand("copy");
    });
});