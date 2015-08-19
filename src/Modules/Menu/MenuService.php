<?php

namespace FlameDevelopment\Menu;

class MenuService
{
        /**
         * Builds the menu object
         * @param array $items
         * @return Menu
         */
	public function getMenu(array $items)
	{
		$menuItems = [];
		/**
		* Check each menu item to make sure it's valid
		*	It must contain at least a url / label / icon
		* OR must contain an array of items using the same
		* checks above
		*/
		foreach($items as $item)
		{
			if(isset($item['items']))
			{
				$subMenuItems = [];
				foreach($item['items'] as $sub)
				{
					$newItem = self::validateItem($sub);
					$subMenuItems[] = MenuItemFactory::make($newItem['url'], $newItem['label'], $newItem['icon'], $newItem['active']);
				}
				$newItem = self::validateItem($item);
				$menuItems[] = MenuItemFactory::make($newItem['url'], $newItem['label'], $newItem['icon'], $newItem['active'], $subMenuItems);
			}
			else
			{
				$newItem = self::validateItem($item);
			
				//create a new menu item instance for each item
				$menuItems[] = MenuItemFactory::make($newItem['url'], $newItem['label'], $newItem['icon'], $newItem['active']);
			}
		}
		//build the menu instance using the given items
		return MenuFactory::make($menuItems);
	}
	
        /**
         * Validates a menu item is sufficient
         * @param array $item
         * @return array
         * @throws \Exception
         */
	private function validateItem($item)
	{
		if(!isset($item['url']) && !isset($item['label']) && !isset($item['icon']))
		{
			throw new \Exception ('Invalid menu item passed');
		}
		//Build a new array to create default values if some are missing
		$newItem = [
			'url'=>isset($item['url'])? $item['url']:'',
			'label'=>isset($item['label'])? $item['label']:'',
			'icon'=>isset($item['icon'])? $item['icon']:'',
			'active'=>isset($item['active'])? $item['active']:false,
		];
		
		return $newItem;
	}
}
