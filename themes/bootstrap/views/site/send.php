<?php 
	echo CHtml::form('#','post',array('id'=>'notification-form'));
?>
	<div class="row">
		<?php echo CHtml::dropDownList('to', null, array('broadcast' => 'Broadcast','rederick2013'=>'Rederick2013','demo'=>'Demo'));?>
	</div>
	<div class="row">
		<?php echo CHtml::textArea('message');?>
	</div>
	<div class="row">
		<?php echo CHtml::submitButton('send');?>
	</div>
<?php
	echo CHtml::endForm();
?>

<div class="left iframe">
	<p>Iframe: Logged in as Admin user (/site/index?user=admin)</p>
	<iframe height="300" width="80%" src="/timeline/rederick2013"></iframe>
</div>
<div class="right iframe">
	<p>Iframe: Logged in as Demo user (/site/index?user=demo)</p>
	<iframe src="/demo"></iframe>
</div>

<script type="text/javascript">
	$(function() {
		$('#notification-form').submit(function(event) {
			event.preventDefault();
			console.log($(this).serialize());
			$.ajax({
				url : '/timeline/site/send',
				type : 'post',
				data : $(this).serialize()
			}).done(function(data){
				console.log(data);
			});
		});
	});	
</script>