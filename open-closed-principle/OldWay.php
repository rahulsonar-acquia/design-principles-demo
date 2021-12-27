<?php

class Articles
{
    private $id;

    public function getTitle() {

    }

    public function getDescription() {

    }

    public function showArticle() {
        echo "<h2>{$this->getTitle()}</h2>{$this->getDescription()}";
    }
}