<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;

$this->widget('ext.timeago.JTimeAgo', array('selector' => ' .timeago',));

?>

<iframe src="<?php echo Yii::app()->baseurl; ?>/site/timeline/" name="contentFrame" id="contentFrame" width="100%" frameborder="0" height="600px" ></iframe>


<?php

	echo '<div class="row">';

?>

<?php foreach ($dates as $value) { ?>
	<div class="span3 well">
		<h3><?php echo $value->headline;  ?></h3>
		<small><a href="/timeline/<?php echo $value->user->username; ?>"><?php echo $value->user->username; ?></a></small>
		<section><?php echo $value->text;  ?></section>
		<abbr class="timeago" title="<?php echo $value->create_date; ?>"><?php echo $value->create_date; ?></abbr><br/>
	</div>

<?php }; ?>


<?php

	echo '</div>';

?>











