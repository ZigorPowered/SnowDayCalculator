function hide(id, hidden)
{
  var element = document.getElementById(id);
  if (hidden === 1)
    element.style.visibility = 'hidden';
  else 
    element.style.visibility = 'visible';
}

function menuClick(new_div, invoke)
{
  var menu_items = document.getElementsByClassName('active');
  for(var i = 0; i < menu_items.length; i++)
  {
    menu_items[i].className = '';
  }
  invoke.className = 'active';
  
  var menu_divs = document.getElementsByClassName('main');
  var ndiv = document.getElementById(new_div);
  
  for(i = 0; i < menu_divs.length; i++)
  {
    menu_divs[i].style.display = 'none';
  }
  ndiv.className = 'main';
  ndiv.style.display = 'block';
}