<?php

namespace FlameDevelopment\Theme\SemanticUI\Elements;

class Grid
{
    protected $validChildren = [
      'Row',
      'Column'
    ];
    
    protected $validAttributes = [
      'id',
      'class'
    ];
    
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
        if(in_array($this->validChildren, $child))
        {
            return true;
        }
        else
        {
            throw new ThemeException('Element "'.$child.'" is not a valid child of Grid');
        }
    }
    
    public function checkValidAttribute($attribute)
    {
        if(in_array($this->validAttributes, $attribute))
        {
            return true;
        }
        else
        {
            throw new ThemeException('Attribute "'.$attribute.'" is not a valid child of Grid');
        }
    }
    
    public function __toString()
    {
        return 'Grid';
    }
}
