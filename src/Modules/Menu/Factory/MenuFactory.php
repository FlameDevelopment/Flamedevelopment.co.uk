<?php

namespace FlameDevelopment\Menu;

use \FlameDevelopment\Menu;

class MenuFactory
{
    /**
     * Gets the menu object
     * @param array $items
     * @return Menu
     */
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
