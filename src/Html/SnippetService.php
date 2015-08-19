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
	public function getSnippet($element, $attributes = array(), $children = array(), $content = null)
	{
		return SnippetFactory::make($element, $attributes, $children, $content);
	}
}
