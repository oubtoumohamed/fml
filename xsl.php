<?php require 'header.php'; ?>
	<div class="col-md-12 right-side">
		<?php echo buildXSLT('data/competitions/all.xml', 'competitions-list.xsl'); ?>
	</div>
<?php require 'footer.php'; ?>