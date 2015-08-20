<?php

namespace FlameDevelopment\Html\Snippets;

use \FlameDevelopment\Html\Snippets\SnippetAttribute;

class SnippetAttributeFactory
{
    /**
     * Gets the snippet attribute object
     * @param string $name
     * @param string $value
     * @return SnippetAttribute
     */
	public function make($name, $value)
	{
		return new SnippetAttribute($name, $value);
	}
}
