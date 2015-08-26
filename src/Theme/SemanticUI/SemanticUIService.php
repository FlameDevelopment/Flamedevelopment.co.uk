<?php

namespace FlameDevelopment\Theme\SemanticUI;

use \FlameDevelopment\Theme\SemanticUI\Elements\Grid;
use \FlameDevelopment\Theme\SemanticUI\Elements\Row;

class SemanticUIService
{
    protected $topLevelElements;
    
    public function __construct()
    {
        $this->topLevelElements = [
          new Grid,
          new Row(),
        ];
    }
    
    public function getTopLevelElements()
    {
        $elements = [];
        foreach($this->topLevelElements as $element)
        {
            $elements[] = $element->__toString();
        }
        
        return $elements;   
    }
}
