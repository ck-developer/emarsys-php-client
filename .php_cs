<?php

$header = <<<EOF
A php library for using the Emarsys API.

@link      https://github.com/ck-developer/emarsys-php-client
@package   authy
@license   MIT
@copyright Copyright (c) 2017 Claude Khedhiri <claude@khedhiri.com>
EOF;

/**
 * @var array
 */
$fixers = array(
    '-short_array_syntax',                   /// Arrays should use the long syntax.
    '-php4_constructor',                     /// Convert PHP4-style constructors to __construct. Warning! This could change code behavior.
    '-phpdoc_var_to_type',                   /// @var should always be written as @type.
    '-align_double_arrow',                   /// Align double arrow symbols in consecutive lines.
    '-unalign_double_arrow',                 /// Unalign double arrow symbols in consecutive lines.
    '-align_equals',                         /// Align equals symbols in consecutive lines.
    '-unalign_equals',                       /// Unalign equals symbols in consecutive lines.
    '-blankline_after_open_tag',             /// Ensure there is no code on the same line as the PHP open tag and it is followed by a blankline.
    '-phpdoc_no_empty_return',               /// @return void and @return null annotations should be omitted from phpdocs.
    '-empty_return',                         /// A return statement wishing to return nothing should be simply "return".
    '-return',                               /// An empty line feed should precede a return statement.
    'header_comment',                        /// Add, replace or remove header comment.
    'concat_with_spaces',                    /// Concatenation should be used with at least one whitespace around.
    'ereg_to_preg',                          /// Replace deprecated ereg regular expression functions with preg. Warning! This could change code behavior.
    'multiline_spaces_before_semicolon',     /// Multi-line whitespace before closing semicolon are prohibited.
    'newline_after_open_tag',                /// Ensure there is no code on the same line as the PHP open tag.
    'single_blank_line_before_namespace',    /// There should be no blank lines before a namespace declaration.
    'ordered_use',                           /// Ordering use statements.
    'phpdoc_order',                          /// Annotations in phpdocs should be ordered so that @param come first, then @throws, then @return.
    'pre_increment',                         /// Pre incrementation/decrementation should be used if possible.
    'long_array_syntax',                    /// PHP arrays should use the PHP 5.4 short-syntax.
    'strict',                                /// Comparison should be strict. Warning! This could change code behavior.
    'strict_param',                          /// Functions should be used with $strict param. Warning! This could change code behavior.
);

return PhpCsFixer\Config::create()
        ->setCacheFile(__DIR__.'/build/.php_cs.cache')
        ->setRiskyAllowed(true)
        ->setRules(array(
            '@Symfony' => true,
            '@Symfony:risky' => true,
            'array_syntax' => array('syntax' => 'long'),
            'combine_consecutive_unsets' => true,
            // one should use PHPUnit methods to set up expected exception instead of annotations
            'general_phpdoc_annotation_remove' => array('expectedException', 'expectedExceptionMessage', 'expectedExceptionMessageRegExp'),
            'header_comment' => array('header' => $header),
            'heredoc_to_nowdoc' => true,
            'no_extra_consecutive_blank_lines' => array('break', 'continue', 'extra', 'return', 'throw', 'use', 'parenthesis_brace_block', 'square_brace_block', 'curly_brace_block'),
            'no_unreachable_default_argument_value' => true,
            'no_useless_else' => true,
            'no_useless_return' => true,
            'ordered_class_elements' => true,
            'ordered_imports' => true,
            'php_unit_strict' => true,
            'phpdoc_add_missing_param_annotation' => true,
            'phpdoc_order' => true,
            'psr4' => true,
            'strict_comparison' => true,
            'strict_param' => true,
        ))
        ->setFinder(
            PhpCsFixer\Finder::create()
                ->exclude(array('vendor/'))
                ->in(__DIR__)
        )
    ;
