<?php

namespace FlameDevelopment\Html\Snippets;

use \FlameDevelopment\Html\Snippets\SnippetAttribute;

class SnippetAttributeFactory
{	
	public function make($name, $value)
	{
		return new SnippetAttribute($name, $value);
	}
}
