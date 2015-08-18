<?php

namespace FlameDevelopment\Html\Snippets;

use FlameDevelopment\Html\Snippets\SnippetFactory;

class SnippetService
{
	public function getSnippet($element, $attributes = array(), $children = array(), $content = null)
	{
		return SnippetFactory::make($element, $attributes, $children, $content);
	}
}
