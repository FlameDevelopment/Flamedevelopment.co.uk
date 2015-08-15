<?php

namespace FlameDevelopment\Menu;

class MenuItem
{
	public $url;
	
	public $label;
	
	public $icon;
	
	public function __construct($url, $label, $icon)
	{
		$this->url = $url;
		$this->label = $label;
		$this->icon = $icon;
	}
}
