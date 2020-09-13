<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ConverterTest extends TestCase
{
    public function testWithHashThreeCharacterHex(): void
    {
        $inputHex = "#FFF";
        $inputAlpha = "0.3";

        $expected = "rgba(255, 255, 255, .3)";

        $this->assertEquals(
            $expected,
            Converter::hexToRGB($inputHex, $inputAlpha),
        );
    }
    public function testWithHashSixCharacterHex(): void
    {
        $inputHex = "#FFFFFF";
        $inputAlpha = 1;

        $expected = "rgba(255, 255, 255, 1)";

        $this->assertEquals(
            $expected,
            Converter::hexToRGB($inputHex, $inputAlpha)
        );
    }
    public function testWithoutHashAndThreeCharacterHex(): void
    {
        $inputHex = "FFF";
        $inputAlpha = ".5";

        $expected = "rgba(255, 255, 255, .5)";

        $this->assertEquals(
            $expected,
            Converter::hexToRGB($inputHex, $inputAlpha)
        );
    }
    public function testWithoutHashAndSixCharacterHex(): void
    {
        $inputHex = "FFFFFF";
        $inputAlpha = 1;

        $expected = "rgba(255, 255, 255, 1)";

        $this->assertEquals(
            $expected,
            Converter::hexToRGB($inputHex, $inputAlpha)
        );
    }
    public function testNegativeWithoutHashAndWrongHex(): void
    {
        $inputHex = "FFFFF";
        $inputAlpha = 1;

        $this->expectException(Exception::class);
        Converter::hexToRGB($inputHex, $inputAlpha);
    }
    public function testNegativeWithHashAndWrongAlpha(): void
    {
        $inputHex = "#FFFFFF";
        $inputAlpha = 5;

        $this->expectException(Exception::class);
        Converter::hexToRGB($inputHex, $inputAlpha);
    }
}
