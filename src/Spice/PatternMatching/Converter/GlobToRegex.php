<?php
/**
 * Convert Glob patterns to regular expressions.
 * @author Henrique Barcelos <rick.hjpbarcelos@gmail.com>
 */
namespace Spice\PatternMatching\Converter;

use Spice\PatternMatching\Converter\ConverterInterface;

/**
 * Glob to regex converter.
 */
final class GlobToRegex implements ConverterInterface {
    
    /**
     * (non-PHPdoc) 
     * @see \Spice\PatternMatching\Converter\ConverterInterface::convert()
     * @fixme
     */
    public function convert($pattern) {
        $pattern = preg_quote($pattern);
        $pattern = preg_replace('/(?<![\\\\])\\\\\[/', '[', $pattern);
        $pattern = preg_replace('/(?<![\\\\])\\\\\]/', ']', $pattern);
        $pattern = preg_replace('/(?<![\\\\])\\\\\-/', '-', $pattern);
        $pattern = preg_replace('/(?<![\\\\])\\\\\*/', '.*', $pattern);
        $pattern = preg_replace("/(?<![\\\\])\\\\\?/", '.', $pattern);
        $pattern = preg_replace("/(?<=\[)\\\\\!/", '^', $pattern);
        $pattern = str_replace('\\\\\\', '\\', $pattern);
        return $pattern;
    }
}
