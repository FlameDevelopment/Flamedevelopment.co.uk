<?php

namespace FlameDevelopment\Menu;

class MenuService
{	
	public function getMenu(array $items)
	{
		$menuItems = [];
		/**
		* Check each menu item to make sure it's valid
		*	It must contain at least a url / label / icon
		*/
		foreach($items as $item)
		{
			if(!isset($item['url']) && !isset($item['label']) && !isset($item['icon']))
			{
				throw new \Exception ('Invalid menu item passed');
			}
			//Build a new array to create default values if some are missing
			$newItem = [
				'url'=>isset($item['url'])? $item['url']:'',
				'label'=>isset($item['label'])? $item['label']:'',
				'icon'=>isset($item['icon'])? $item['icon']:''
			];
			
			//create a new menu item instance for each item
			$menuItems[] = MenuItemFactory::make($newItem['url'], $newItem['label'], $newItem['icon']);
		}
		//build the menu instance using the given items
		return MenuFactory::make($menuItems);
	}
}
