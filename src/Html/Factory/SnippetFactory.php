<?php

namespace FlameDevelopment\Html\Snippets;

use \FlameDevelopment\Html\Snippets\Snippet;
use \FlameDevelopment\Html\Snippets\SnippetAttributeFactory;

class SnippetFactory
{
        /**
         * Gets the Snippet object
         * @param string $element
         * @param array $attributes
         * @param array $children
         * @param string $content
         * @return Snippet
         * @throws \Exception
         */
	public function make($element, $attributes = array(), $children = array(), $content = null)
	{
		$childObjects = array();
		foreach($children as $child)
		{
			$childObjects[] = self::make($child['element'], $child['attributes'], $child['children'], $child['content']);
		}
		
		$newAttributes = array();
		foreach($attributes as $name=>$value)
		{
			$newAttribute = SnippetAttributeFactory::make($name, $value);
			if(!$newAttribute instanceof SnippetAttribute)
			{
				throw new \Exception('Attribute must be an instance of SnippetAttribute');
			}
			$newAttributes[] = $newAttribute;
		}
		return new Snippet($element, $newAttributes, $childObjects, $content);
	}
}
