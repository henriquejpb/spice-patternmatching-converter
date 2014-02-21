<?php
/**
 * Defines a common interface for pattern matching convertors
 * 
 * @author Henrique Barcelos <rick.hjpbarcelos@gmail.com>
 *
 */
namespace Spice\PatternMatching\Converter;

/**
 * Common interface for pattern matching convertors
 */
interface ConverterInterface {
    /**
     * Returns a converted pattern.
     * 
     * @param string $pattern The pattern to be converted
     * 
     * @return string
     */
    public function convert($pattern);
}