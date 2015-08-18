<?php

namespace FlameDevelopment\Menu;

use \FlameDevelopment\Menu;

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
