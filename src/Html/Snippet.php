<?php

namespace FlameDevelopment\Html\Snippets;

use \FlameDevelopment\Html\SnippetAttribute;

/**
* Provides a Snippet of HTML
*	Can be used to build entire pages
*/
class Snippet
{
	protected $element;
	protected $attributes;
	protected $children;
	protected $content;
	
	/**
         * Builds the snippet object
         * @param string $element - element tag name
         * @param array $attributes - array of html attributes
         * @param array $children - array of child tags and content
         * @param string $content - html content
         */
	public function __construct($element, $attributes = array(), $children = array(), $content = null)
	{
		$this->element = $element;
		$this->attributes = $attributes;
		$this->children = $children;
		$this->content = $content;
	}
	
        /**
         * Gets the element tag name
         * @return string
         */
	public function getElement()
	{
		return $this->element;
	}
	
        /**
         * Gets the html attributes
         * @return array
         */
	public function getAttributes()
	{
		$return = array();
		foreach($this->attributes as $attribute)
		{
			$return[$attribute->getName()] = $attribute->getValue();
		}
		return $return;
	}
	
        /**
         * Gets the html attributes as a string
         * @return string
         */
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
	
        /**
         * Counts the child elements
         * @return int
         */
	public function countChildren()
	{
		return count($this->children);
	}
	
        /**
         * Gets the child elements
         * @return array
         */
	public function getChildren()
	{
		return $this->children;
	}
	
        /**
         * Gets the html content
         * @return string
         */
	public function getContent()
	{
		return $this->content;
	}
}
