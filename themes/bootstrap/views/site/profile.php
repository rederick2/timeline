<?php
/* @var $this SiteController */

	$this->pageTitle=Yii::app()->name;

	$this->widget('ext.timeago.JTimeAgo', array(
	    'selector' => ' .timeago',

	 
	));

?>

<h1>Hello <?php echo Yii::app()->user->name;?></h1>

<?php

	//echo '<pre>';

	//print_r($user['dates']);

	echo '<div class="row">';

?>

<?php foreach ($user['dates'] as $value) { ?>
	<div class="span3 well">
		<h3><?php echo $value->headline;  ?></h3>
		<section><?php echo $value->text;  ?></section>
		<abbr class="timeago" title="<?php echo $value->create_date; ?>"><?php echo $value->create_date; ?></abbr><br/>
	</div>

<?php }; ?>


<?php

	echo '</div>';

?>


	












