<?php
namespace Model;
class ArticleDAO {
    private $content;
    public function __construct($path = 'articles.json') {
        $this->path = $path;
        $this->loadArticles();
    }

    private function loadArticles() {
        $jsonString = file_get_contents($this->path);
        $data = json_decode($jsonString);
        $this->content = array();
        foreach($data as $key => $value) {
            $this->content[$key] = Article::fromJson($value);
        }
    }

    private function saveArticles() {
        $jsonString = json_encode($this->content, JSON_PRETTY_PRINT);
        $fp = fopen($this->path, 'w');
        fwrite($fp, $jsonString);
        fclose($fp);
    }

    public function getArticles() {
        return $this->content;
    }

    public function getArticle($id) {
        if(isset($this->content[$id])) {
            return $this->content[$id];
        }
        return new Article("New Content", "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, perspiciatis?");
    }

    public function addArticle($title, $text) {
        $this->updateArticle(-1, $title, $text);
    }

    public function updateArticle($id, $title, $text) {
        $article = null;
        if (isset($this->content[$id])) {
            $article = $this->content[$id];
        } else {
            $article = new Article();
            array_unshift($this->content, $article);
        }
        $article->setTitle($title);
        $article->setContent($text);
        $this->saveArticles();
    }
}