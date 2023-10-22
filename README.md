# shortener-for-twig

ShortenerTwigExtension provides shorten_text and shorten_html twig filters, which shorten (cut) 
plain text or html to the $length, preventing braking words and tags.

Read [sashabo/shortener](https://packagist.org/packages/sashabo/shortener)
readme for retails.

If you use TWIG with Symfony, try 
[sashabo/shortener-bundle](https://packagist.org/packages/sashabo/shortener-bundle):
it installs ShortenerTwigExtension as a service with "twig.extension" tag.

### Usage

`{{ 'Lorem ipsum dolor sit amet'|shorten_text(25, '...') }}`

`{{ '<u>Lorem <i>ipsum</i> dolor sit amet</u>'|shorten_html(25, '...') }}`

results:

Lorem ipsum dolor sit...

&lt;u&gt;Lorem &lt;i&gt;ipsum&lt;/i&gt; dolor sit...&lt;/u&gt;


