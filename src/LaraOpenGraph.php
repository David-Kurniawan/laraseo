<?php

namespace VidLab\LaraSeo;

use VidLab\LaraSeo\Contracts\OpenGraphContract;

class LaraOpenGraph implements OpenGraphContract
{
    protected $title;
    protected $description;
    protected $url;
    protected $siteName;
    protected $type;
    protected $image;

    public function generate()
    {
    	$title = $this->getTitle();
    	$description = $this->getDescription();
    	$url = $this->getUrl();
    	$siteName = $this->getSiteName();
    	$type = $this->getType();
    	$image = $this->getImage();

    	$html = [];

		if ($title) {
			$html[] = "<meta name=\"og:title\" content=\"{$title}\">";
		}

		if ($description) {
			$html[] = "<meta name=\"og:description\" content=\"{$description}\">";
		}

		if ($url) {
			$html[] = "<meta name=\"og:url\" content=\"{$url}\">";
		}

		if ($siteName) {
			$html[] = "<meta name=\"og:site_name\" content=\"{$siteName}\">";
		}

		if ($type) {
			$html[] = "<meta name=\"og:type\" content=\"{$type}\">";
		}

		if ($image) {
			$html[] = "<meta name=\"og:image\" content=\"{$image}\">";
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

	public function setUrl($url)
	{
		$this->url = $url;

		return $this;
	}

	public function setSiteName($siteName)
	{
		$this->siteName = $siteName;

		return $this;
	}

	public function setType($type)
	{
		$this->type = $type;

		return $this;
	}

	public function setImage($image)
	{
		$this->image = $image;

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

	public function getUrl()
	{
		return $this->url;
	}

	public function getSiteName()
	{
		return $this->siteName;
	}

	public function getType()
	{
		return $this->type;
	}

	public function getImage()
	{
		return $this->image;
	}
}