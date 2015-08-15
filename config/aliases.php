<?php

Yii::setAlias('@semantic', dirname(__DIR__) . '/semantic');
Yii::setAlias('@flamedevelopment', dirname(__DIR__) . '/src');


/*Yii::$classMap['FlameDevelopment\Menu'] = dirname(__DIR__) . '/src/Menu/Menu.php';
Yii::$classMap['FlameDevelopment\MenuItem'] = dirname(__DIR__) . '/src/Menu/MenuItem.php';
Yii::$classMap['FlameDevelopment\MenuService'] = dirname(__DIR__) . '/src/Menu/MenuService.php';
Yii::$classMap['FlameDevelopment\MenuFactory'] = dirname(__DIR__) . '/src/Menu/Factories/MenuFactory.php';
Yii::$classMap['FlameDevelopment\MenuItemFactory'] = dirname(__DIR__) . '/src/Menu/Factories/MenuItemFactory.php';*/

function rglob($pattern, $flags = 0) {
    $files = glob($pattern, $flags); 
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        $files = array_merge($files, rglob($dir.'/'.basename($pattern), $flags));
    }
    return $files;
}

foreach(rglob(dirname(__DIR__).'/src/*.php') as $file)
{
	require_once($file);
}
