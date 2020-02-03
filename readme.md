# LaraSeo

Just simple package for my daily activity.

## Installation

Via Composer

``` bash
$ composer require david-kurniawan/laraseo
```

## Usage

### In your Controller

```php
use LaraSeo;
use LaraOpenGraph;
use LaraTwitterCard;

// Meta
LaraSeo::setTitle('Foo');
LaraSeo::setDescription('Foo bar');
LaraSeo::setLanguage('en-US');
LaraSeo::setAuthor(env('APP_NAME'));
LaraSeo::setGenerator(url('/'));
LaraSeo::setRegion('EN');
LaraSeo::setCanonical(url()->current());
LaraSeo::setHrefLang(url()->current());

// Opengraph
LaraOpenGraph::setTitle('Foo');
LaraOpenGraph::setDescription('Foo bar');
LaraOpenGraph::setUrl(url()->current());
LaraOpenGraph::setSiteName(env('APP_NAME'));
LaraOpenGraph::setType('website');
LaraOpenGraph::setImage('https://d1s5saizp11buw.cloudfront.net/airy-web/images/seo-landing-banner.jpg');

// Twitter Card
LaraTwitterCard::setTitle('Foo');
LaraTwitterCard::setDescription('Foo bar');
LaraTwitterCard::setCard('summary');
LaraTwitterCard::setSite('@'.env('APP_NAME'));
LaraTwitterCard::setCreator('@'.env('APP_NAME'));
LaraTwitterCard::setImage('https://d1s5saizp11buw.cloudfront.net/airy-web/images/seo-landing-banner.jpg');
```

### In your View

```php
{!! LaraSeo::generate() !!}
{!! LaraOpenGraph::generate() !!}
{!! LaraTwitterCard::generate() !!}
```