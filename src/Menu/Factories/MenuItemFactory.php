<?php

namespace FlameDevelopment\Menu;

use \FlameDevelopment\Menu\MenuItem;

class MenuItemFactory
{	
	public function make($url = null, $label = null, $icon = null, $active = false, $items = false)
	{
		return new MenuItem($url, $label, $icon, $active, $items);
	}
}
