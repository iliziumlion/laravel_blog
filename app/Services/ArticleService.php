<?php

namespace App\Services;

use App\Repositories\ArticleRepository;

class ArticleService
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function getPaginatedArticles()
    {
        return $this->articleRepository->paginateArticles();
    }

    public function getArticle(int $id)
    {
        return $this->articleRepository->findById($id);
    }

    public function storeArticle(array $data)
    {
        return $this->articleRepository->create($data);
    }
}
