<?php

namespace VidLab\LaraSeo\Contracts;

interface OpenGraphContract
{
	public function generate();

	public function setTitle($title);

	public function setDescription($description);

	public function setUrl($url);

	public function setSiteName($siteName);

	public function setType($type);

	public function setImage($image);

	public function getTitle();

	public function getDescription();

	public function getUrl();

	public function getSiteName();

	public function getType();

	public function getImage();
}