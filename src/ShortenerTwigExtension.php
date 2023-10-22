<?php

namespace SashaBo\Shortener\Twig;

use SashaBo\Shortener\HtmlShortener;
use SashaBo\Shortener\TextShortener;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ShortenerTwigExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('shorten_text', [$this, 'shortenText']),
            new TwigFilter('shorten_html', [$this, 'shortenHtml'], ['is_safe' => ['html']]),
        ];
    }

    public function shortenText(mixed $source, mixed $length = 50, mixed $add = '...', mixed $multiSpace = false): mixed
    {
        if (is_scalar($source) || $source instanceof \Stringable) {
            $source = (string) $source;
            if (is_scalar($length)) {
                $length = (int) $length;
                if (is_scalar($add)) {
                    $add = (string) $add;
                } else {
                    $add = '';
                }
                $multiSpace = (bool) $multiSpace;

                return (new TextShortener($source))->shorten($length, $add, $multiSpace);
            }
        }

        return $source;
    }

    public function shortenHtml(mixed $source, mixed $length = 50, mixed $add = '...'): mixed
    {
        if (is_scalar($source) || $source instanceof \Stringable) {
            $source = (string) $source;
            if (is_scalar($length)) {
                $length = (int) $length;
                if (is_scalar($add)) {
                    $add = (string) $add;
                } else {
                    $add = '';
                }

                return (new HtmlShortener($source))->shorten($length, $add);
            }
        }

        return $source;
    }
}
