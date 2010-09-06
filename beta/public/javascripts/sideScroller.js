i = 0;
var speed = 10;
function pageScroll()
{
   i = i + speed;
   var div = document.getElementById("scrollMe");
   div.scrollLeft = i;
   t1 = setTimeout("pageScroll()",10);
   if (!(i % 900))
      clearTimeout(t1);
   if (i >= (div.scrollWidth - 800))
   {
    rewind();
   }
   clearInterval(t2);
   autoScroll();
}

function pageScrollBack()
{
   i = i - speed;
   var div = document.getElementById("scrollMe");
   div.scrollLeft = i;
   t1 = setTimeout("pageScrollBack()",10);
   if (!(i % 900))
      clearTimeout(t1);
   if (i < 0)
   {
      fastforward();
   }
   clearInterval(t2);
   autoScroll();
}

function rewind()
{
   i = i - (speed * 3);
   var div = document.getElementById("scrollMe");
   div.scrollLeft = i;
   t1 = setTimeout("rewind()",10);
   if (i <= 0) 
   {
    clearTimeout(t1);
	i = 0;
   }
}

function fastforward()
{
	i = i + (speed * 3);
   var div = document.getElementById("scrollMe");
   div.scrollLeft = i;
   t1 = setTimeout("fastforward()",10);
   if (i >= (div.scrollWidth - 800))
   {
    clearTimeout(t1);
	i = (div.scrollWidth - 800);
   }
}

function autoScroll()
{
	t2 = setInterval("pageScroll()",10000);
}