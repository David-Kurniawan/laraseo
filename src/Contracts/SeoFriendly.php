<?php

namespace VidLab\LaraSeo\Contracts;

interface SeoFriendly
{
	public function generate();

	public function setTitle($title);

	public function setDescription($description);

	public function setLanguage($language);

	public function setAuthor($author);

	public function setGenerator($url);

	public function setRegion($region);

	public function setCanonical($url);

	public function setHrefLang($url);

	public function getTitle();

	public function getDescription();

	public function getLanguage();

	public function getAuthor();

	public function getGenerator();

	public function getRegion();

	public function getCanonical();

	public function getHrefLang();
}