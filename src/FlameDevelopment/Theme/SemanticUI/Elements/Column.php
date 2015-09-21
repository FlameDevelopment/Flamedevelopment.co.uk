<?php

namespace FlameDevelopment\Theme\SemanticUI\Elements;

use \FlameDevelopment\Errors\ThemeException;
use \FlameDevelopment\Validation\Number;

class Column implements \JsonSerializable
{
    protected $id;
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
        ],
      'data-type'=>'column'
    ];
    
    protected $customAttributes = [];
    
    public function __construct($id,$attributes = [], $children = [], $content = null)
    {
        $this->id = $id;
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
        $this->defaultAttributes = $this->attributes;
        
        foreach($attributes as $key=>$value)
        {
            if($this->checkValidAttribute($key))
            {
                $value = $this->checkAttributeValue($value);
                
                if($key=="class")
                {
                    if(is_array($value))
                    {
                        if(is_array($this->attributes[$key]))
                        {
                            $this->attributes[$key] = array_merge($this->attributes[$key], $value);
                        }
                        else
                        {
                            $this->attributes[$key][] = $value;
                        }
                        $this->customAttributes[$key] = $value;
                    }
                    else
                    {
                        $this->attributes[$key][] = $value;
                        $this->customAttributes[$key][] = $value;   
                    }
                    
                }
                else
                {
                    $this->attributes[$key] = $value;
                    $this->customAttributes[$key] = $value;
                }
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
            //$value = implode(" ", $value);
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
    
    public function getAttribute($attributeName)
    {
        if(isset($this->attributes[$attributeName]))
        {
            return $this->attributes[$attributeName];
        }
    }
    
    public function countChildren()
    {
        return count($this->children);
    }
    
    public function getChildren()
    {
        return $this->children;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function getSize()
    {
        return $this->attributes['size'];
    }
    
    public function getChildrenAsSelect()
    {
        $list = array();
        foreach($this->validChildren as $child)
        {
            $list[$child] = $child;
        }
        
        return $list;
    }
    
    public function __toString()
    {
        return $this->classShortName;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function jsonSerialize()
    {
        return [
                'identifier'=>$this->id,
                'type'=>$this->classShortName,
                'tag'=>$this->elementName,
                'attr'=>$this->attributes,
                'customAttr'=>$this->customAttributes,
                'protectedAttr'=>$this->defaultAttributes,
                'child'=>$this->children,
                'text'=>$this->content,
                'validChildren'=>$this->getChildrenAsSelect()
          ];
    }
}
