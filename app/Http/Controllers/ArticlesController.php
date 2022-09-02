<?php

namespace App\Http\Controllers;

use App\Imports\ArticlesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ArticlesController extends Controller
{

    /**
     * This API is to upload articles file.
     *
     * @param Request $request
     * @return void
     */
    public function uploadArticles(Request $request){
        Excel::import(new ArticlesImport, $request->file);

        return response()->json([
            'message' =>'Date uploaded successfully'
        ]);
    }


}
