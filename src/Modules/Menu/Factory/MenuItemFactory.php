<?php

namespace FlameDevelopment\Menu;

use \FlameDevelopment\Menu\MenuItem;

class MenuItemFactory
{
    /**
     * Gets the menu item object
     * @param string $url
     * @param string $label
     * @param string $icon
     * @param boolean $active
     * @param array $items
     * @return MenuItem
     */
	public function make($url = null, $label = null, $icon = null, $active = false, $items = array())
	{
		return new MenuItem($url, $label, $icon, $active, $items);
	}
}
