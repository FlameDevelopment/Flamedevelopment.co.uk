<?php

namespace FlameDevelopment\Theme\SemanticUI\Factory;

use \FlameDevelopment\Errors\ThemeException;
use \FlameDevelopment\Html\Snippets\SnippetService as Snippet;

class ElementFactory
{
    public function make($elementProperties)
    {
       $elements = self::buildSnippet($elementProperties);
       return self::buildElement($elementProperties['id'], $elementProperties, $elements->getChildren());
    }
    
    public function makeSnippet($elementProperties)
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
        $return = self::buildElement($element['id'], $element, $children);
        return $return;
    }
    
    private function buildElement($id, $elementProperties, $children, $returnAsSnippet = false)
    {
        $className = "\\FlameDevelopment\Theme\SemanticUI\Elements\\".$elementProperties['element'];
        if(class_exists($className))
        {
            $elementClass = new $className(
                $id,
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
