<link rel="stylesheet" media="print" href="example.css" />

<style>
@media print
{
	.hide-from-print {display: none;}
	.show-when-printing {display: auto;}
}
</style>

<?php
	wp_enqueue_style('example', 'example.css', NULL, '1.0', 'print');
?>