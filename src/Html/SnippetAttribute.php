<?php

namespace FlameDevelopment\Html\Snippets;

class SnippetAttribute
{
	protected $name;
	protected $value;
	
	public function __construct($name, $value)
	{
		$this->name = $name;
		$this->value = $value;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function getValue()
	{
		return $this->value;
	}
	
	public function __toString()
	{
		return $this->name.'="'.$this->value.'"';
	}
}
