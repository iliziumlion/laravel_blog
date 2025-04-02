<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\ArticleStoreRequest;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Inertia\Response
    {
        $articles = $this->articleService->getPaginatedArticles();
        return Inertia::render('Articles/Index', [
            'articles' => $articles->toArray(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Inertia\Response
    {
        return Inertia::render('Articles/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(ArticleStoreRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $data['brief']   = $data['content'];
        $data['content'] = $data['content'];

        $this->articleService->storeArticle($data);

        return redirect()->route('articles.index')
            ->with('success', 'Статья успешно создана');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): \Inertia\Response
    {

        $article = $this->articleService->getArticle($article->id);
        return Inertia::render('Articles/Show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Article $articleId
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article): RedirectResponse
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
