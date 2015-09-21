<?php

namespace FlameDevelopment\Theme\SemanticUI;

use \FlameDevelopment\Theme\SemanticUI\Factory\ElementFactory;
use \FlameDevelopment\Errors\ThemeException;
use \FlameDevelopment\Html\Snippets\SnippetService as Snippet;

class SemanticUIService
{
    protected $topLevelElements;
    protected $availableElements;
    
    public function __construct()
    {
        $this->topLevelElements = [
          'Grid',
          'Row',
          'Column'
        ];
        $this->availableElements = [
          'Grid',
          'Row',
          'Column'
        ];
    }
    
    public function getTopLevelElements()
    {
        $elements = [];
        foreach($this->topLevelElements as $element)
        {
            $elements[$element] = $element;
        }
        
        return $elements;   
    }
    
    public function buildElement($element)
    {
        return ElementFactory::make($element);
    }
}
