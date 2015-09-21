<?php

namespace FlameDevelopment\Modules\Menu\Factory;

use \FlameDevelopment\Modules\Menu\Menu;

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
