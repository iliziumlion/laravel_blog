<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    public function paginateArticles(int $perPage = 5)
    {
        return Article::orderBy('created_at', 'desc')->paginate($perPage);
    }

    public function findById(int $id)
    {
        return Article::findOrFail($id);
    }

    public function create(array $data)
    {
        $article = Article::create($data);
        return $article->created_at->format('d.m.Y H:i');
    }
}
