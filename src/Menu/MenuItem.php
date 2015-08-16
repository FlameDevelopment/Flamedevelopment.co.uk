<?php

namespace FlameDevelopment\Menu;

class MenuItem
{
	public $url;
	
	public $label;
	
	public $icon;
	
	public $active;
	
	public $items;
	
	public function __construct($url, $label, $icon, $active, $items)
	{
		$this->url = $url;
		$this->label = $label;
		$this->icon = $icon;
		$this->active = $active;
		$this->items = $items;
	}
}
