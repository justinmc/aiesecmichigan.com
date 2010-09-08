function expandMenu(id)
{
	var menu = document.getElementById(id);
	if (menu.style.visibility == "visible")
		menu.style.visibility = "hidden";
	else
		menu.style.visibility = "visible";
}