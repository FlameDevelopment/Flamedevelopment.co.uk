<?php

namespace FlameDevelopment\Theme\SemanticUI;

use \FlameDevelopment\Errors\ThemeException;
use \FlameDevelopment\Html\Snippets\SnippetService as Snippet;

class ElementFactory
{
    public function make($elementProperties)
    {
       $elements = self::buildSnippet($elementProperties);
       return self::buildElement($elementProperties, $elements->getChildren(), true);
    }
    
    private function buildSnippet($element)
    {
        $children = [];
        if(count($element['children'])>0)
        {
            foreach($element['children'] as $child)
            {
                $children[] = self::buildSnippet($child);
            }
        }
        $return = self::buildElement($element, $children);
        return $return;
    }
    
    private function buildElement($elementProperties, $children, $returnAsSnippet = false)
    {
        $className = "\\FlameDevelopment\Theme\SemanticUI\Elements\\".$elementProperties['element'];
        if(class_exists($className))
        {
            $elementClass = new $className(
                $elementProperties['attributes'],
                $children,
                $elementProperties['content']
            );
            if($returnAsSnippet)
            {
                return Snippet::getSnippet(
                    $elementClass->getElementName(), 
                    $elementClass->getAttributes(),
                    $elementClass->getChildren(),
                    $elementClass->getContent(),
                    false
                );
            }
            else
            {
                return $elementClass;
            }
        }
        else
        {
            throw new ThemeException("Element: \"".$elementName."\" does not exist");
        }
    }
}
