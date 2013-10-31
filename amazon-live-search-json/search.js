function populateContent(data) {
  $("#target").html("");
  $("#pagination").html("");
  for (var i = 0; i < data.length; i++) {
    $("#target").append("<div class=\"product\">" + "<h1><a href=\"" + data[i].url +"\" target=\"_blank\">"+ data[i].title + "</a></h1>" + "<div class=\"image\"><img src=\""+ data[i].image +"\"></div>" + "<span class=\"price\">" + data[i].price + "</div>");
  };
  $("#target").append("<br style=\"clear:both;\">");
  $("#pagination").append('<a href="#" class="page" data-id="1">1</a> <a href="#" class="page" data-id="2">2</a> <a href="#" class="page" data-id="3">3</a> <a href="#" class="page" data-id="4">4</a> <a href="#" class="page" data-id="5">5</a>');
}

function getContent(keyword, page){
  $.post(
    "search.php",
    {
      keyword: keyword,
      page: page
    },
    function(data, status){
      populateContent(data);
    }
  );
}

$(document).ready(function() {
  $("#search").click(function(){
    var keyword = $("#keyword").val();
    var page   = 1;
    $("html,body").animate({ scrollTop: 0 }, "fast");
    $("#target").html('<p align="center"><img src="img/loader4.gif"></p>');
    getContent(keyword, page);
  });

  $('#pagination').on('click', '.page', function() {
    var self = this;
    var keyword = $("#keyword").val();
    var page = $(self).data("id");
    $('html,body').animate({ scrollTop: 0 }, 'fast');
    $("#target").html('<p align="center"><img src="img/loader4.gif"></p>');
    getContent(keyword, page);
    return false;
  });
});
