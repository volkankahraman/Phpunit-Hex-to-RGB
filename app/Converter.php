<?php

declare(strict_types=1);
final class Converter
{
    public static function hexToRGB($hex, $opacity = false)
    {

        // Checking if opacity is empty and changing commas with dots for doubleval function
        $opacity = (empty($opacity)) ? 1 : doubleval(str_replace(',', '.', $opacity));
        // Removing hash character if hex has hash
        if ($hex[0] == '#') $hex = substr($hex, 1);
        // Checking for valid hex
        if (strlen($hex) != 3 && strlen($hex) != 6) throw new Exception('invalid hex');
        // Checking for valid opacity
        if ($opacity < 0 || $opacity > 1) throw new Exception('invalid opacity');
        // Formatting hex to 6 characters format
        if (strlen($hex) == 3) $hex = str_repeat($hex, 2);
        // Creating array of colors
        $colors = str_split($hex, 2);
        // Applying hexdec function for each color
        $rgb =  array_map('hexdec', $colors);
        // Fixing 0 prefix for opacity
        $opacity = ltrim(strval($opacity), "0");

        return "rgba($rgb[0], $rgb[1], $rgb[2], $opacity)";
    }
}
