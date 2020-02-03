<?php

namespace VidLab\LaraSeo\Contracts;

interface TwitterCardContract
{
	public function generate();

	public function setTitle($title);

	public function setDescription($description);

	public function setCard($card);

	public function setSite($site);

	public function setCreator($creator);

	public function setImage($image);

	public function getTitle();

	public function getDescription();

	public function getCard();

	public function getSite();

	public function getCreator();

	public function getImage();
}