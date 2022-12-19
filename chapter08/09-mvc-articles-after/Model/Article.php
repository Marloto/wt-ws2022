<?php
namespace Model;

use JsonSerializable;

class Article implements JsonSerializable {
    private $title;
    private $content;

    public function __construct($title = "", $content = "") {
        $this->title = $title;
        $this->content = $content;
    }

    public function jsonSerialize() {
        return get_object_vars($this);
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function setTitle($value) {
        $this->title = $value;
    }

    public function setContent($value) {
        $this->content = $value;
    }

    public static function fromJson($data) {
        $article = new Article();
        foreach($data as $key => $value) {
            $article->{$key} = $value;
        }
        return $article;
    }
}
?>