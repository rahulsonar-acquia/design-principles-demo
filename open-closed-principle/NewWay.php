<?php

class Articles
{
    private $id;

    private $filters = [];

    private $title;
    private $description;

    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setFilter(ArticleFilter $filter) {
        $key = get_class($filter);
        $this->filters[$key] = $filter;
    }

    public function showArticle() {

        $content = "<h2>{$this->getTitle()}</h2>{$this->getDescription()}";

        foreach($this->filters as $filter) {
            $content = $filter->apply($content);
        }

        echo $content;
    }
}

interface ArticleFilter
{
    public function apply($content);
}

class SocialMediaFilter implements ArticleFilter {
    public function apply($content)
    {
        return "FACEBOOK_BUTTON_HERE".$content."INSTAGRAM_BUTTOM_HERE";
    }
}

class H3HeaderFilter implements ArticleFilter
{
    public function apply($content)
    {
        return str_replace('h2','h3',$content);
    }
}

$article = new Articles(1);

$article->setTitle('My test article');
$article->setDescription('This is dummy description');

$article->setFilter(new SocialMediaFilter());
$article->setFilter(new H3HeaderFilter());

$article->showArticle();