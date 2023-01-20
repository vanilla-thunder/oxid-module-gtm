<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
;

$config = new PhpCsFixer\Config();
return $config->setRules([
        '@PHP73Migration' => true,
        '@PSR12' => true
    ])
    ->setFinder($finder)
;