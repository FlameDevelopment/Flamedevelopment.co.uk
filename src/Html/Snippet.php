<?php

namespace FlameDevelopment\Html\Snippets;

use \FlameDevelopment\Html\SnippetAttribute;

class Snippet
{
	protected $element;
	protected $attributes;
	protected $children;
	protected $content;
	
	public function __construct($element, $attributes = array(), $children = array(), $content = null)
	{
		$this->element = $element;
		$this->attributes = $attributes;
		$this->children = $children;
		$this->content = $content;
	}
	
	public function getElement()
	{
		return $this->element;
	}
	
	public function getAttributes()
	{
		$return = array();
		foreach($this->attributes as $attribute)
		{
			$return[$attribute->getName()] = $attribute->getValue();
		}
		return $return;
	}
	
	public function extractAttributes()
	{
		$attributeString = "";
		foreach($this->attributes as $attributes)
		{
			$attributeString.= $attribute->getName().'='.$attribute->getValue();
			$attributeString.= " ";
		}
		
		$attributeString = rtrim($attributeString, " ");
		
		return $attributeString;
	}
	
	public function countChildren()
	{
		return count($this->children);
	}
	
	public function getChildren()
	{
		return $this->children;
	}
	
	public function getContent()
	{
		return $this->content;
	}
}
