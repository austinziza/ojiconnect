
var current = 1;
var max = $( "li" ).length +1;

$(".slidercontent").hide();
$(".slidercontent:nth-child(1)").fadeIn("slow");

//function to change to next quote
function changeUp() {
  $(".slidercontent1").hide();
  current += 1;
  if (current === max) {
    current = 1;
  }
$(".slidercontent:nth-child(" + current + ")").fadeIn("slow");
}

function changeDown() {
  $(".slidercontent").hide();
  current -= 1;

  if (current === 0) {
    current = max - 1;
  }

  $(".slidercontent:nth-child(" + current + ")").fadeIn("slow");
}

startChange();

$(".sliderspot").click(function() { 
  stopChange();
  changeUp();
  startChange();
});

$(".sliderspot").click(function() {
  stopChange();
  changeDown();
  startChange();
});

//FUNCTIONS TO CONTROL TIMING CHANGES
function startChange() {
changeIt = setInterval(function(){ 
changeUp();
}, 10000);
};

function stopChange() {
    clearInterval(changeIt);
}




