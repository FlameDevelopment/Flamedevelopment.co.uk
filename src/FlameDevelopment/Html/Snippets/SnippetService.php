<?php

namespace FlameDevelopment\Html\Snippets;

use FlameDevelopment\Html\Snippets\SnippetFactory;

class SnippetService
{
    /**
     * Builds the snippet obkect
     * @param string $element
     * @param array $attributes
     * @param array $children
     * @param string $content
     * @return object Snippet
     */
	public function getSnippet($element, $attributes = array(), $children = array(), $content = null, $fromArray = true)
	{
    if($fromArray)
    {
        return SnippetFactory::make($element, $attributes, $children, $content);
    }
    else
    {
        return SnippetFactory::makeFromObject($element, $attributes, $children, $content);        
    }
	}
}
