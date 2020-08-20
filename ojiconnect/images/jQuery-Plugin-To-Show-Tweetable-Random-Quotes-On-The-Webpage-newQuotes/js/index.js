$(document).ready(function(){
  // housekeeping: setup vars, 1st quote
  var quote = "";
  var author = "";
  changeBackground();
  createQuote();
 
 // buttons
  $("#btn1").on("click",function()
                {
   var twitterURL = "https://twitter.com/intent/tweet?text=" + quote + " " + author;
    window.open(twitterURL, 'twitter');
    return false;
  });
  
   $("#btn2").on("click",function(){
    changeBackground();
    createQuote();
  });

 // generate numbers for changing background colors
  function generateRandomNum(min,max){
    return Math.floor(Math.random()*(max-min+1)+min);
  }

  function changeBackground(){
    var colorR = generateRandomNum(0,255);
    var colorG = generateRandomNum(0,255);
    var colorB = generateRandomNum(0,255);
    var colorA = generateRandomNum(0,4);

    $("#quoteArea").css("background-color","rgba("+ colorR + "," + colorG + "," + colorB + "," + colorA + ")");

  }

  
//generate quote thru ajax call
function createQuote(){
  
var output = $.ajax({
    url: 'https://andruxnet-random-famous-quotes.p.mashape.com/cat=famous', // The URL to the API. You can get this in the API page of the API you intend to consume
    type: 'GET', // The HTTP Method, can be GET POST PUT DELETE etc
    data: {}, // Additional parameters here
    dataType: 'json',
    success: function(data) {
      quote = data.quote;
      author = data.author;
      $("#quoteItself").html("<span class='fa fa-quote-left'></span><br>" + quote + "<br><span class='fa fa-quote-right'></span>");
      $("#quoteAuthor").html("<span class='fa fa-forumbee'></span>" + "  " + author);
      
      console.dir((data.source)); },
  
    error: function(err) { console.log(err); },
    beforeSend: function(xhr) {
    xhr.setRequestHeader("X-Mashape-Authorization", "8vdyiCzX3MmshyDl3zGkJz72KPySp1NguEbjsn8C4C1XHEwyec"); // Enter here your Mashape key
     }
    });
  };
});