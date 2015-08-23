<?php 
use yii\helpers\Html;

function buildSnippet($snippet)
{
	$content = "";
	if($snippet->countChildren()>0)
	{
		$content = "";
		foreach($snippet->getChildren() as $child)
		{
			$content.= buildSnippet($child);
		}
	}
	else
	{
		$content = $snippet->getContent();
	}
	$tag = Html::tag(
		$snippet->getElement(), 
		$content,
		$snippet->getAttributes()
	);
	
	return $tag;
}
foreach($snippets as $snippet)
{
	echo buildSnippet($snippet);
}

?>




	<?= $this->render(
				Yii::$app->params['theme']['viewDirectory'].'/'.
				Yii::$app->params['theme']['snippetDirectory'].
				'/_jumbotron', 
				array(
		
				));?>


        <?= $this->render(
				Yii::$app->params['theme']['viewDirectory'].'/'.
				Yii::$app->params['theme']['snippetDirectory'].
				'/_slider', 
				array(
		
				));?>

