<?php

namespace FlameDevelopment\Menu;

class MenuItem
{
	public $url;
	
	public $label;
	
	public $icon;
	
	public $active;
	
	public $items;
	
    /**
     * Menu item object
     * @param string $url
     * @param string $label
     * @param string $icon
     * @param boolean $active
     * @param array $items
     */
	public function __construct($url, $label, $icon, $active, $items)
	{
		$this->url = $url;
		$this->label = $label;
		$this->icon = $icon;
		$this->active = $active;
		$this->items = $items;
	}
}
