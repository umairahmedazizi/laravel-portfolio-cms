<?php

namespace App\Support;

class Fmt
{
    /** Escape text, then turn ==word== into a highlighted span. */
    public static function hl(?string $text): string
    {
        $text = e((string) $text);

        return preg_replace('/==(.+?)==/u', '<span class="hl">$1</span>', $text);
    }

    /** Escape text, then turn *word* into an emphasis span with the given class. */
    public static function emph(?string $text, string $class): string
    {
        $text = e((string) $text);

        return preg_replace('/\*(.+?)\*/u', '<span class="' . $class . '">$1</span>', $text);
    }

    /** Build the hero tagline as reveal-word spans; a *word* gets the accent class. */
    public static function heroWords(?string $tagline): string
    {
        $words = preg_split('/\s+/u', trim((string) $tagline)) ?: [];
        $out = [];

        foreach ($words as $word) {
            $accent = false;
            if (preg_match('/^\*(.+)\*$/u', $word, $m)) {
                $word = $m[1];
                $accent = true;
            }
            $inner = $accent
                ? '<span class="accent">' . e($word) . '</span>'
                : '<span>' . e($word) . '</span>';
            $out[] = '<span class="reveal-word">' . $inner . '</span>';
        }

        return implode(' ', $out);
    }
}
