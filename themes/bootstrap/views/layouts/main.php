<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php //Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php

	if(!Yii::app()->user->isGuest){

		$username	=	Yii::app()->user->name;
   		$user 		=	User::model()->find('LOWER(username)=?',array($username));
   		$picture 	=   '<a href="#" class="picProfile thumbnail"><img src="'.$user->picture.'" width="40" /></a>';

	}else{
		$picture = '';
	}

	$model=new LoginForm;
	
?>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
	'collapse' => true,
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Contact', 'url'=>array('/site/contact')),
                array('label'=>'Timeline', 'url'=>array('/site/timeline')),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest , 'itemOptions' => array('data-toggle' =>'modal' , 'data-target'=>'#loginModal')),
                array('label'=>Yii::app()->user->name, 'visible'=>!Yii::app()->user->isGuest , 'items' => array(
                    array('label'=>'Profile', 'url'=>array('/'.Yii::app()->user->name)),
                    array('label'=>'Edit Profile', 'url'=>array('/site/editProfile')),
                    array('label'=>'Crear Fecha', 'url'=>array('/timeline/createDate')),
                    array('label'=>'Logout', 'url'=>array('/site/logout'))
                ))
            ),
        ),
        $picture,
    ),
)); ?>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'loginModal')); ?>

  <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'login-form',
        'type'=>'horizontal',
        'action' =>Yii::app()->baseUrl.'/site/login',
        'enableAjaxValidation' => true,
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
    )); ?>
 
        <div class="modal-header">
            <a class="close" data-dismiss="modal">&times;</a>
            <h4>Modal header</h4>
        </div>
         
        <div class="modal-body">
            <?php $this->widget('application.widgets.facebook.Facebook',array('appId'=>'210521229054903')); ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <?php echo $form->textFieldRow($model,'username'); ?>

            <?php echo $form->passwordFieldRow($model,'password'); ?>

            <?php echo $form->checkBoxRow($model,'rememberMe'); ?>

        </div>
         
        <div class="modal-footer">

                <?php $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'type'=>'primary',
                    'label'=>'Login',
                )); ?>

            <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Close',
                'url'=>'#',
                'htmlOptions'=>array('data-dismiss'=>'modal'),
            )); ?>

        </div>

    <?php $this->endWidget(); ?>
 
<?php $this->endWidget(); ?>


<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>



	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

<script src="/timeline/assets/lib/masonry.pkgd.min.js"></script>
<script type="text/javascript">

    var container = document.querySelector('.row');

    if(container){
        var msnry = new Masonry( container, {
                      // options
                      //columnWidth: 200,
                      itemSelector: '.span3'
                    });
    }
    

</script>

</body>
</html>
