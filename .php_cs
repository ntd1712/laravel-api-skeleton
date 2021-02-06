<?php
/*
 * This document has been generated with
 * https://mlocati.github.io/php-cs-fixer-configurator/#version:2.16.3|configurator
 * you can change this configuration by importing this file.
 */
return PhpCsFixer\Config::create()
    ->setUsingCache(false)
    ->setRules([
        '@PSR1' => true,
        '@PSR2' => true,
        '@Symfony' => true,
        '@DoctrineAnnotation' => true,
        '@PhpCsFixer' => true,
        '@PHP56Migration' => true,
        // '@PHP70Migration' => true,
        // '@PHP71Migration' => true,
        // '@PHP73Migration' => true,
        // 'array_syntax' => ['syntax' => 'long'],
        'blank_line_before_statement' => [
            'statements' => ['declare','return','throw','try']
        ],
        'class_definition' => ['multi_line_extends_each_single_line' => true],
        'concat_space' => ['spacing' => 'one'],
        'increment_style' => false,
        'multiline_whitespace_before_semicolons' => false,
        'no_empty_comment' => false,
        'no_extra_blank_lines' => [
            'tokens' => ['curly_brace_block','extra','parenthesis_brace_block','square_brace_block','throw']
        ],
        'no_superfluous_phpdoc_tags' => false,
        // 'no_unused_imports' => false,
        'ordered_imports' => false,
        'ordered_class_elements' => [
            'order' => [
                'use_trait','destruct','phpunit',
                'constant_public','constant_protected','constant_private'
            ]
        ],
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_annotation_without_dot' => false,
        // 'phpdoc_annotation_without_dot' => false,
        'phpdoc_inline_tag' => false,
        'phpdoc_no_alias_tag' => false,
        'phpdoc_no_empty_return' => false,
        'phpdoc_types_order' => false,
        'single_line_comment_style' => false,
        'single_line_throw' => false,
        'single_trait_insert_per_statement' => false,
        'trailing_comma_in_multiline_array' => false
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->exclude(['storage', 'tests'])
            ->in(__DIR__)
    )
;
