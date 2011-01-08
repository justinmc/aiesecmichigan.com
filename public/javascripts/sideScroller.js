/***************************************************************************
This file controls the side scrolling image bar

Interested in how it works?  Check out the source on github:
github.com/justinmc/Scrolling-Image-Bar

***************************************************************************/

// Settings
var speedJQ = 1.5 * 1000; // how long each transition is, milliseconds
var frequencyJQ = 6 * 1000; // how often framesJQ change, milliseconds
var widthJQ = 900; // width of each frame to scroll, pixels
var framesJQ = 3; // how many total frames there are to scroll

// Initialize
var posJQ = 0;

$(document).ready(
function()
{
    $(".scrollerButtonL").bind('click',scrollLeft);
    $(".scrollerButtonR").bind('click',scrollRight);
}
);

timer = setInterval("scrollRight()",frequencyJQ);

function scrollLeft()
{
    if (posJQ > 0) // scroll left if you can
    {
        $(".scroller").animate({right:(posJQ-widthJQ)+"px"},speedJQ);
        posJQ = posJQ - widthJQ;
    }
    else // otherwise go to the last frame
    {
    	$(".scroller").animate({right:(widthJQ*(framesJQ-1))+"px"},speedJQ);
    	posJQ = widthJQ * (framesJQ - 1);
    }
    // reset the timer
    clearInterval(timer);
    timer = setInterval("scrollRight()",frequencyJQ);
}

function scrollRight()
{
    if (posJQ < widthJQ * (framesJQ - 1)) // scroll right if you can
    {
    	$(".scroller").animate({right:(posJQ+widthJQ)+"px"},speedJQ);
    	posJQ = posJQ + widthJQ;
    }
    else // otherwise go to the first frame
    {
    	$(".scroller").animate({right:"0px"},speedJQ);
    	posJQ = 0;
    }
    // reset the timer
    clearInterval(timer);
    timer = setInterval("scrollRight()",frequencyJQ);
}

function foo()
{
	$("#changeMe").hide();
	$(".scroller").animate({left:"100px"},"slow");
}