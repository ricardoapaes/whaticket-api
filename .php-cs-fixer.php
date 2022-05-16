<?php

$rules = [
	'@PSR2' => true,
	'array_syntax' => ['syntax' => 'short'],
	'multiline_whitespace_before_semicolons' => false,
	'echo_tag_syntax' => false,
	'no_unused_imports' => true,
	'not_operator_with_successor_space' => true,
	'no_useless_else' => true,
	'ordered_imports' => ['sort_algorithm' => 'none', 'imports_order' => ['const', 'class', 'function']],
	'phpdoc_add_missing_param_annotation' => true,
	'phpdoc_indent' => true,
	'phpdoc_no_package' => true,
	'phpdoc_order' => true,
	'phpdoc_separation' => true,
	'phpdoc_single_line_var_spacing' => true,
	'phpdoc_trim' => true,
	'phpdoc_var_without_name' => true,
	'phpdoc_to_comment' => true,
	'single_quote' => true,
	'ternary_operator_spaces' => true,
	'trailing_comma_in_multiline' => true,
	'trim_array_spaces' => true,
	'braces' => [
		'allow_single_line_closure' => true,
		'position_after_functions_and_oop_constructs' => 'same',
	],
];

$excludes = [
	'vendor',
	'.vscode',
	'.github',
	'.devcontainer'
];

$finder = PhpCsFixer\Finder::create()
	->in(__DIR__)
	->exclude($excludes)
	->notName('README.md')
	->notName('*.xml')
	->notName('*.yml')
	->notName('_ide_helper.php')
;

return (new PhpCsFixer\Config())
	->setRules($rules)
	->setFinder($finder)
	->setIndent("\t")
;
