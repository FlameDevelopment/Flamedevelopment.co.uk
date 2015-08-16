<?php

namespace FlameDevelopment\Menu;

use \FlameDevelopment\Menu;
use \FlameDevelopment\Menu\MenuItem;

class MenuFactory
{	
	public function make(array $items)
	{
		$menuItems = [];
		foreach($items as $item)
		{
			$menuItems[] = $item;
		}
		return new Menu($menuItems);
	}
	
	
}
