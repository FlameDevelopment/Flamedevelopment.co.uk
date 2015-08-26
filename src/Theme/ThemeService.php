<?php

namespace FlameDevelopment\Theme;

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
}

