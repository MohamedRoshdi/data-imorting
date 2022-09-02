<?php

namespace App\Services;

use App\Imports\ArticlesImport;
use App\Models\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ArticlesServices
{

    public function uploadArticles($file = null){
        DB::beginTransaction();
        try {
            Article::truncate();
            Excel::import(new ArticlesImport, $file);

            DB::commit();
            $msg = 'Date uploaded successfully';

            // Removes all cached data to be updated with the new ones
            Cache::forget('articles');
        }catch (\Exception $e){
            DB::rollback();
            $msg = 'Something went wrong';
        }

        return [
            'message' => $msg
        ];
    }

    public function getAllArticles(){
        if (Cache::has('articles')) {
            $articles = Cache::get('articles');
        }else{
            $articles = Article::all();

            Cache::add('articles', $articles);
        }

        return [
            'articles' => $articles
        ];
    }

}
