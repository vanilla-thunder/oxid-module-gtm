<?php
	
	$finder = PhpCsFixer\Finder::create()
		->in(__DIR__)
	;
	
	$config = new PhpCsFixer\Config();
	return $config->setRules([
		'@PHP81Migration' => true,
		'@PSR12' => true,
		'php_unit_test_class_requires_covers' => true,
		'doctrine_annotation_indentation' => true,
	])
		->setFinder($finder)
		;