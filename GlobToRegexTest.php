<?php

namespace Spice\PatternMatching\Converter;

class GlobToRegexTest extends \PHPUnit_Framework_TestCase {
    private $converter;
    public function setUp() {
        $this->converter = new GlobToRegex(); 
    }
    
    public function testConvertWithNoSpecialChar() {
        $this->assertEquals('foo', $this->converter->convert('foo'));
    }
    
    public function testConvertWithSpecialChar() {
        $this->assertEquals('foo.*', $this->converter->convert('foo*'));
        $this->assertEquals('foo.', $this->converter->convert('foo?'));
    }
    
    public function testConvertWithEscapedSpecialChar() {
        $this->assertEquals('foo\*', $this->converter->convert('foo\*'));
    }
    
    public function testConvertWithEscapedBackslashes() {
        $this->assertEquals('foo\\*', $this->converter->convert('foo\\.*'));
    }
}