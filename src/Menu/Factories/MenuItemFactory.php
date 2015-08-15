<?php

namespace FlameDevelopment\Menu;

use \FlameDevelopment\Menu\MenuItem;

class MenuItemFactory
{
	public $url;
	
	public $label;
	
	public $icon;
	
	public function make($url = null, $label = null, $icon = null)
	{
		return new MenuItem($url, $label, $icon);
	}
}
