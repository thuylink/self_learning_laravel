<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class HomeController extends Controller
{
    public function index()
    {
        // return 'home controller';
        $title = "Thùy linh codes";
        $content = "Học laravel";
        // $dataView = [
        //     'titleData' => $title,
        //     'contentData' => $content
        // ];
        return view('home', compact('title', 'content'));

        // return view('home')->with([
        //     'title'=> $title,
        //     'content' => $content
        // ]);

        // return View::make('home')->with([
        //     'title' => $title,
        //     'content' => $content
        // ]);

        // $contentView = view('home')->render();
        // $contentView = $contentView->render();
        // dd($contentView);
        // return $contentView;
    }

    public function getNews($id)
    {
        return 'danh sách tin tức' . $id;
    }

    public function getProductDetail($id)
    {
        return view('clients.products.detail', compact('id'));
    }
}
