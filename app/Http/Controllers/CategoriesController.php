<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct(Request $request)
    {
        /**
         * nếu là trang danh sách danh mục -> hiển thị dòng chữ 'danh sách danh mục đây'
         *
         */
        // echo 'welcome'.'<br/>';
        // if($request->is('category/all')) {
        //     echo 'danh sách danh mục đây';
        // }
    }
    public function index(Request $request)
    {
        // $allRequest = $request->all();
        // echo $allRequest['name'];
        // echo $request->all()['name'];
        // dd($request->all());
        // if (isset($_GET['id'])) {
        //     echo $_GET['id'];
        // }
        // dd($request->path());

        // dd($request->url());

        // dd($request->fullUrl());

        // dd($request->method());

        // dd($request->ip());

        // dd($request->server()['DOCUMENT_ROOT']);

        // dd($_SERVER);

        // dd($request->header()['accept']);

        $input = $request->input();
        // dd($request->input('id'));
        dd($input);
        return view('clients/categories/list');
    }

    public function show($id)
    {
        return view('clients/categories/edit');

    }

    public function create(Request $request)
    {
        dd($request->path());
        return view('clients/categories/create');

    }

    public function postCreate(Request $request)
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // return redirect(route('category.add'));
        dd($request->all());

    }

    public function update($id)
    {
        return 'update category controller';

    }

    public function delete($id)
    {
        return 'delete category controller';

    }
}
