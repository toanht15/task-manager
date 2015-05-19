<!DOCTYPE html>
<html>
<head>
	
	<title><?php echo Yii::app()->name; ?></title>
		<?php $cs= Yii::app()->clientScript
										->registerMetaTag('text/html; charset= UTF-8	','Content-Type')
										->registerCssFile('//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css')
										->registerScriptFile('//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js')
										->registerScriptFile('https://code.jquery.com/jquery-1.11.3.min.js',
										CClientScript::POS_END); ?>
<body>
	<div class="row">
		<div class="container">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<a class="navbar-brand" href="/"><?php echo CHtml::encode(Yii::app()->name); ?>
					</a>
				</div>
			</nav>
		</div>
	</div>
	<div class="row" style="margin-top: 100px">
		<div class="container">
			<?php echo $content; ?>
		</div>
	</div>

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
</body>
</html>