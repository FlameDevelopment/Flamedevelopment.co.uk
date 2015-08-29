<?php

namespace FlameDevelopment\Theme;

use \FlameDevelopment\Errors\ThemeException;

class ThemeService
{
    protected $themeEngine;
    protected $availableElements = [];
    
    public function __construct($theme)
    {
        $themeClass = "\FlameDevelopment\Theme\\".$theme."\\".$theme."Service";
        $this->themeEngine = new $themeClass;
        $this->getTopLevelElements();
    }
    
    private function getTopLevelElements()
    {
        $this->availableElements = $this->themeEngine->getTopLevelElements();
    }
    
    public function getAvailableElements($parentElement = null)
    {
        if(isset($parentElement))
        {
            //@TODO - deal with parent element setting here
        }
        else
        {
            return $this->availableElements;
        }
    }
    
    public function buildElement($elementName, $elementAttributes)
    {
      if(in_array($elementName, $this->availableElements))
      {
          $themeElement = $this->themeEngine->buildElement($elementAttributes);
      }
      else
      {
          throw new ThemeException("Element: \"".$elementName."\" is not currently available at this level");
      }
      
      return $themeElement;
    }
}

