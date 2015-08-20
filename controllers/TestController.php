<?php

namespace app\controllers;

use app\controllers\BaseController;

use FlameDevelopment\Html\Snippets\SnippetService as Snippet;
use FlameDevelopment\Modules\User\UserService as User;

class TestController extends BaseController
{
    public function actionSnippets()
    {
        $snippetBuilds = [
    		[
					'element'=>'div',
    			'attributes'=> [
    				'class'=>'ui grid'
    			],
    			'children'=>	[
    				
							[
								'element'=>'div',
								'attributes'=> [
									'class'=>'two column row'
								],
								'children'=>	[
    				
										[
											'element'=>'div',
											'attributes'=> [
												'class'=>'column'
											],
											'children'=>	[
    				
													[
														'element'=>'h2',
														'attributes'=> [
															'class'=>'ui medium header'
														],
														'children'=>	[],
														'content'=>	'Subheading'
													],
    				
													[
														'element'=>'p',
														'attributes'=> [],
														'children'=>	[],
														'content'=>	'Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.'
													]
								
											]
										],
    				
										[
											'element'=>'div',
											'attributes'=> [
												'class'=>'column'
											],
											'children'=>	[
    				
													[
														'element'=>'h2',
														'attributes'=> [
															'class'=>'ui medium header'
														],
														'children'=>	[],
														'content'=>	'Subheading'
													],
    				
													[
														'element'=>'p',
														'attributes'=> [],
														'children'=>	[],
														'content'=>	'Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.'
													]
								
											]
										],
								]
							]
							
    			]
    		]
    	];
    	
    	foreach($snippetBuilds as $params)
    	{
    		$snippets[] = Snippet::getSnippet($params['element'], $params['attributes'], $params['children'], $params['content']);
    	}
      
      echo '<pre>';
      print_r($snippets);
      echo '</pre>';
      die();
    }
    
    public function actionUser($id)
    {
        $user = User::getUser($id);
        
        echo '<pre>';
        print_r($user);
        echo '</pre>';
        die();
    }
}