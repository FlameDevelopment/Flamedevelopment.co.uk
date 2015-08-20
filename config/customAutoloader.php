<?php

function rglob($pattern, $flags = 0) {
    $files = glob($pattern, $flags); 
    foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
        $files = array_merge($files, rglob($dir.'/'.basename($pattern), $flags));
    }
    return $files;
}

foreach(rglob(dirname(__DIR__).'/src/*.php') as $file)
{
  if(stripos($file, 'interface')!==false)
  {
    $interfaces[] = $file;
  }
  else
  {
    $classes[] = $file;
  }
}
$fileList = array_merge($interfaces, $classes);
foreach ($fileList as $file)
{
    require_once($file);
}

