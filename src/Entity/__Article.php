<?php

namespace App\Entity;

use DateTime;

class __Article
{
	private $title; //string
	private $subtitle; //string
	private $createdAt; //DateTime
	private $author; //string
	private $body; //string
	private $image; //string

	public function __construct() {
		$title = "noTitle";
		$subtitle = "";
		$createdAt = new DateTime();
		$author = "Anonymous";
		$body = "";
		$image = "";
	}

	public function setTitle(string $title) {
		$this->title = $title;
	}

	public function getTitle() : string {
		return $this->title;
	}

	public function setSubtitle(string $subtitle) {
		$this->subtitle = $subtitle;
	}

	public function getSubtitle() : string {
		return $this->subtitle;
	}

	public function setCreatedAt(DateTime $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function getCreatedAt() : string {
		return $this->createdAt->format('Y-m-d H:i:s');
	}

	public function setAuthor(string $author) {
		$this->author = $author;
	}

	public function getAuthor() : string {
		return $this->author;
	}

	public function setBody(string $body) {
		$this->body = $body;
	}

	public function getBody() : string {
		return $this->body;
	}

	public function setImage(string $image) {
		$this->image = $image;
	}

	public function getImage() : string {
		return $this->image;
	}
}
