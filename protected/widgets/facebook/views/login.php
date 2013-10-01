<?php if(Yii::app()->user->isGuest): ?>
    <div id="<?php echo $this->fbLoginButtonId; ?>"><a href="#" class="btn btn-primary"><?php echo $this->facebookButtonTitle; ?></a></div>
<?php endif; ?>