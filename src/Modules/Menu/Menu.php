<?php

namespace FlameDevelopment;

use \FlameDevelopment\Menu\MenuItem;

class Menu
{
	public $items;
	
	public function __construct($items)
	{
		foreach($items as $item)
		{
			if(!$item instanceof MenuItem)
			{
				throw new \Exception ('Menu item must be instance of MenuItem class');
			}
		}
		$this->items = $items;
	}
}
