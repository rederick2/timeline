<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); ?>

<p>Congratulations! You have successfully created your Yii application.</p>

<?php $this->endWidget(); ?>

<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$gridDataProvider,
    'template'=>"{items}",
    'columns'=>array(
        array('name'=>'id', 'header'=>'#'),
        array('name'=>'firstName', 'header'=>'First name'),
        array('name'=>'lastName', 'header'=>'Last name'),
        array('name'=>'language', 'header'=>'Language'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width:0$data[id]px'),
            'viewButtonUrl'=>'"post?id=".$data["id"]',
            'updateButtonUrl'=>null,
            'deleteButtonUrl'=>null,
           
        ),
    )

));

?>


<!--<iframe src="http://localhost/miapp/site/timeline/" name="contentFrame" id="contentFrame" width="100%" frameborder="0" height="600px"/>-->


<?php echo Yii::app()->facebook->getAccessToken(); ?>

<?php echo '<br>'.Yii::app()->facebook->getUser(); ?>


<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>










