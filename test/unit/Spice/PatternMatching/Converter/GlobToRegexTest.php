<?php
namespace Spice\PatternMatching\Converter;

class GlobToRegexTest extends \PHPUnit_Framework_TestCase {
    private $converter;

    public function setUp() {
        $this->converter = new GlobToRegex();
    }

    /**
     * @test
     */
    public function testExpressionWithNoSpecialChar() {
        $this->assertEquals('foo', $this->converter->convert('foo'));
    }

    /**
     * @test
     */
    public function testExpressionWithOneTypeSpecialChar() {
        $this->assertEquals('foo.*', $this->converter->convert('foo*'));
        $this->assertEquals('foo\..*', $this->converter->convert('foo.*'));
        $this->assertEquals('foo.', $this->converter->convert('foo?'));
        $this->assertEquals('[^fb]oo', $this->converter->convert('[!fb]oo'));
    }

    /**
     * @test
     */
    public function testExpressionWithVariousTypesSpecialChar() {
        $this->assertEquals('fo.o.*', $this->converter->convert('fo?o*'));
        $this->assertEquals('f[aeiou]o.', $this->converter->convert('f[aeiou]o?'));
        $this->assertEquals('[^fb]o.*o', $this->converter->convert('[!fb]o*o'));
    }

    /**
     * @test
     */
    public function testExpressionWithRanges() {
        $this->assertEquals('[a-z].*', $this->converter->convert('[a-z]*'));
        $this->assertEquals('[a-z].*[0-9]', $this->converter->convert('[a-z]*[0-9]'));
    }

    /**
     * @test
     */
    public function testExpressionWithEscapedSpecialChars() {
        $this->assertEquals('\*', $this->converter->convert('\*'));
        $this->assertEquals('.*\*\?', $this->converter->convert('*\*\?'));
        $this->assertEquals('\*.*\*\?', $this->converter->convert('\**\*\?'));
        $this->assertEquals('\!', $this->converter->convert('\!'));
        $this->assertEquals('\[\]', $this->converter->convert('\[\]'));
    }
}
