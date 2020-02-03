<?php

namespace VidLab\LaraSeo;

use VidLab\LaraSeo\Contracts\TwitterCardContract;

class LaraTwitterCard implements TwitterCardContract
{
    protected $title;
    protected $description;
    protected $card;
    protected $site;
    protected $creator;
    protected $image;

    public function generate()
    {
    	$title = $this->getTitle();
    	$description = $this->getDescription();
    	$card = $this->getCard();
    	$site = $this->getSite();
    	$creator = $this->getCreator();
    	$image = $this->getImage();

    	$html = [];

		if ($card) {
			$html[] = "<meta name=\"twitter:card\" content=\"{$card}\">";
		}

		if ($site) {
			$html[] = "<meta name=\"twitter:site\" content=\"{$site}\">";
		}

		if ($creator) {
			$html[] = "<meta name=\"twitter:creator\" content=\"{$creator}\">";
		}

		if ($title) {
			$html[] = "<meta name=\"twitter:title\" content=\"{$title}\">";
		}

		if ($description) {
			$html[] = "<meta name=\"twitter:description\" content=\"{$description}\">";
		}

		if ($image) {
			$html[] = "<meta name=\"twitter:image\" content=\"{$image}\">";
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

	public function setCard($card)
	{
		$this->card = $card;

		return $this;
	}

	public function setSite($site)
	{
		$this->site = $site;

		return $this;
	}

	public function setCreator($creator)
	{
		$this->creator = $creator;

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

	public function getCard()
	{
		return $this->card;
	}

	public function getSite()
	{
		return $this->site;
	}

	public function getCreator()
	{
		return $this->creator;
	}

	public function getImage()
	{
		return $this->image;
	}
}