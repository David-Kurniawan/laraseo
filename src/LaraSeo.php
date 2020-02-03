<?php

namespace VidLab\LaraSeo;

use VidLab\LaraSeo\Contracts\SeoFriendly;

class LaraSeo implements SeoFriendly
{
    protected $title;
    protected $description;
    protected $language;
    protected $author;
    protected $generator;
    protected $region;
    protected $canonical;
    protected $hreflang;

    public function generate()
    {
    	$title = $this->getTitle();
    	$description = $this->getDescription();
    	$language = $this->getLanguage();
    	$author = $this->getAuthor();
    	$generator = $this->getGenerator();
    	$region = $this->getRegion();
    	$canonical = $this->getCanonical();
    	$hreflang = $this->getHrefLang();

    	$html = [];

		if ($title) {
			$html[] = "<title>$title</title>";
		}

		if ($description) {
			$html[] = "<meta name=\"description\" content=\"{$description}\">";
		}

		if ($language) {
			$html[] = "<meta name=\"language\" content=\"{$language}\">";
		}

		if ($author) {
			$html[] = "<meta name=\"author\" content=\"{$author}\">";
		}

		if ($generator) {
			$html[] = "<meta name=\"generator\" content=\"{$generator}\">";
		}

		if ($region) {
			$html[] = "<meta name=\"geo.region\" content=\"{$region}\">";
		}

		if ($canonical) {
			$html[] = "<link rel=\"canonical\" href=\"{$canonical}\"/>";
		}

		if ($hreflang) {
			$html[] = "<link rel=\"alternate\" hreflang=\"x-default\" href=\"{$canonical}\"/>";
		}

		return implode('', $html);
    }

	public function setTitle($title)
	{
		$this->title = strip_tags($title);

		return $this;
	}

	public function setDescription($description)
	{
		$this->description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8', false);

		return $this;
	}

	public function setLanguage($language)
	{
		$this->language = $language;

		return $this;
	}

	public function setAuthor($author)
	{
		$this->author = $author;

		return $this;
	}

	public function setGenerator($url)
	{
		$this->generator = $url;

		return $this;
	}

	public function setRegion($region)
	{
		$this->region = $region;

		return $this;
	}

	public function setCanonical($url)
	{
		$this->canonical = $url;

		return $this;
	}

	public function setHrefLang($url)
	{
		$this->hreflang = $url;

		return $this;
	}

	public function getTitle()
	{
		return $this->title ?: $this->getDefaultTitle();
	}

	public function getDefaultTitle()
	{
		try {
			return config('laraseo.default_title');
		} catch (\Exception $e) {
			return null;
		}
	}

	public function getDescription()
	{
		return $this->description ?: $this->getDefaultDescription();
	}

	public function getDefaultDescription()
	{
		try {
			return config('laraseo.default_description');
		} catch (\Exception $e) {
			return null;
		}
	}

	public function getLanguage()
	{
		return $this->language;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function getGenerator()
	{
		return $this->generator;
	}

	public function getRegion()
	{
		return $this->region;
	}

	public function getCanonical()
	{
		return $this->canonical;
	}

	public function getHrefLang()
	{
		return $this->hreflang;
	}
}