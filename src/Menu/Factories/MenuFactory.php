<?php

namespace FlameDevelopment\Menu;

class MenuFactory
{	
	public function make(array $items)
	{
		$menuItems = [];
		foreach($items as $item)
		{
			if(!$item instanceof MenuItem)
			{
				throw new \Exception ('Menu item must be instance of MenuItem class');
			}
			$menuItems[] = $item;
		}
		return new \FlameDevelopment\Menu($menuItems);
	}
	
	
}
