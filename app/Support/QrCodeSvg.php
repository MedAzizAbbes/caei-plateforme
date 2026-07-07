<?php

namespace App\Support;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;

class QrCodeSvg
{
    public static function render(string $text, int $scale = 7, int $border = 4): string
    {
        $size = max(180, 41 * $scale);
        $margin = max(8, $border * $scale);

        $result = (new Builder(
            writer: new SvgWriter(),
            writerOptions: [
                SvgWriter::WRITER_OPTION_EXCLUDE_XML_DECLARATION => true,
                SvgWriter::WRITER_OPTION_EXCLUDE_SVG_WIDTH_AND_HEIGHT => true,
            ],
            data: $text,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: $size,
            margin: $margin,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(6, 23, 67),
            backgroundColor: new Color(255, 255, 255),
        ))->build();

        return $result->getString();
    }

    public static function png(string $text, int $size = 320, int $margin = 24): string
    {
        $result = (new Builder(
            writer: new PngWriter(),
            data: $text,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: $size,
            margin: $margin,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
            foregroundColor: new Color(6, 23, 67),
            backgroundColor: new Color(255, 255, 255),
        ))->build();

        return $result->getString();
    }

    public static function pngDataUri(string $text, int $size = 320, int $margin = 24): string
    {
        return 'data:image/png;base64,' . base64_encode(self::png($text, $size, $margin));
    }
}
