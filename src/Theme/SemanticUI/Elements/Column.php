<?php

namespace FlameDevelopment\Theme\SemanticUI\Elements;

use \FlameDevelopment\Errors\ThemeException;
use \FlameDevelopment\Validation\Number;

class Column
{
    protected $attributes = [];
    protected $children = [];
    protected $content = null;
    
    protected $classShortName = "Column";
    
    protected $elementName = "div";
    
    protected $validChildren = [
      'Grid',
      'Row'
    ];
    
    protected $validAttributes = [
      'id',
      'class',
      'size'
    ];
    
    protected $defaultAttributes = [
      'class'=> [
            'wide',
            'column'
        ]
    ];
    
    public function __construct($attributes = [], $children = [], $content = null)
    {
        $this->buildAttributes($attributes);
        $this->buildChildren($children);
        $this->buildContent($content);
    }
    
    private function buildAttributes($attributes)
    {
        $this->attributes = $this->defaultAttributes;
        if(isset($attributes['size']))
        {
            $size = new Number($attributes['size']);
            array_unshift($this->attributes['class'], $size->toWord());
            unset($attributes['size']);
        }
        
        foreach($attributes as $key=>$value)
        {
            if($this->checkValidAttribute($key))
            {
                $value = $this->checkAttributeValue($value);
                $this->attributes[$key] = $value;
            }
        }
    }
    
    private function checkAttributeValue($value)
    {
        if(is_array($value))
        {
            if(isset($this->defaultAttributes[$key]) && is_array($this->defaultAttributes[$key]))
            {
                $value = array_unique(array_merge($this->defaultAttributes[$key], $value));
            }
            $value = implode(' ', $value);
        }
        
        return $value;
    }
    
    private function buildChildren($children)
    {
        foreach($children as $child)
        {
            if($this->checkValidChild($child))
            {
                $this->children[] = $child;
            }
        }
    }
    
    private function buildContent($content)
    {
        $this->content = $content;
    }
    
    public function getValidChildren()
    {
        return $this->validChildren;
    }
    
    public function getValidAttributes()
    {
        return $this->validAttributes;
    }
    
    public function checkValidChild($child)
    {
        if(in_array($child, $this->validChildren))
        {
            return true;
        }
        else
        {
            throw new ThemeException('Element "'.$child.'" is not a valid child of '.__CLASS__);
        }
    }
    
    public function checkValidAttribute($attribute)
    {
        if(in_array($attribute, $this->validAttributes))
        {
            return true;
        }
        else
        {
            throw new ThemeException('Attribute "'.$attribute.'" is not a valid attribute of '.__CLASS__);
        }
    }
    
    public function getElementName()
    {
        return $this->elementName;
    }
    
    public function getAttributes()
    {
        return $this->attributes;
    }
    
    public function getChildren()
    {
        return $this->children;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function __toString()
    {
        return $this->classShortName;
    }
}
