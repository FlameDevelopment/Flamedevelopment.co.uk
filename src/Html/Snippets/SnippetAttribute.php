<?php

namespace FlameDevelopment\Html\Snippets;

class SnippetAttribute
{
	protected $name;
	protected $value;
	
    /**
     * Builds the snippet attribute object
     * @param string $name
     * @param string $value
     */
	public function __construct($name, $value)
	{
		$this->name = $name;
		$this->value = $value;
	}
	
    /**
     * Gets the attribute name
     * @return string
     */
	public function getName()
	{
		return $this->name;
	}
	
    /**
     * Gets the attribute values
     * @return string
     */
	public function getValue()
	{
		return $this->value;
	}
	
    /**
     * Gets the attribute as a html entity
     * @return string
     */
	public function __toString()
	{
		return $this->name.'="'.$this->value.'"';
	}
}
