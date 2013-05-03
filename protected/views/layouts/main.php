<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
  	<script type="text/javascript" src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>

  	
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<!--<script type="text/javascript" src=<?php /*echo "\"".Yii::app()->baseUrl.'/js/Miscelaneaus.js'."\""*/;?>></script>-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php /*echo CHtml::encode(Yii::app()->name);*/ ?>
			<?php echo CHtml::image('images/logocomfenalco.jpg');
                    echo '<span class="titulo_logo">';
                    echo "Bienvenido a WebApp <span id='nom_webapp'>".CHtml::encode(Yii::app()->name).'</span>';
                    echo '</span>';
         	?>
		</div>
	</div><!-- header -->

        <!--
	<div id="mainmenu">
		<?php /*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		));*/ ?>
	</div><!-- mainmenu -->
        
        <div id="div_menu_principal">
            <?php $this->widget('bootstrap.widgets.TbMenu', array(
                'type'=>'list',
                'items'=>$this->items_menu_principal,
            )); ?>
        </div>        
        
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>	

	<?php echo $content; ?>
	
	<div class="clear"></div>

	<div id="footer">
		&copy; <?php /*echo date('Y');*/ ?> Comfenalco Quindio.<br/>
		Todos los derechos reservados.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
