<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchArticleRequest;
use App\Http\Requests\UploadArticleRequest;
use App\Models\Article;
use App\Services\ArticlesServices;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    private $articleService;

    public function __construct(ArticlesServices $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * This API is to upload articles file.
     *
     * @param Request $request
     * @return void
     */
    public function uploadArticles(UploadArticleRequest $request)
    {
        $result = $this->articleService->uploadArticles($request->file);

        return response()->json($result);
    }

    /**
     * This API is to get all articles
     *
     * @return void
     */
    public function articles()
    {
        $result = $this->articleService->getAllArticles();

        return response()->json($result);
    }

    /**
     * This API is to get an article based on criteria
     *
     * @return void
     */
    public function searchArticles(SearchArticleRequest $request)
    {
        $result = $this->articleService->searchArticles($request->search_key, $request->search_value);

        return response()->json($result);
    }
}
