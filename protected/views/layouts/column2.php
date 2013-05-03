<?php /* @var $this Controller 
 * Se ha agregado la terminacion '_old' con el objetivo de modificar la manera de mostrar los elementos
 */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="span-19">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

<!--<div class="span-5 last">
	<div id="sidebar">
	<?/*php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Usuarios',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();*/?>
	</div>
</div>-->
	
<?php $this->endContent(); ?>