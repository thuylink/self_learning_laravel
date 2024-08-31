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

        // $input = $request->input('id.*.name');
        // dd($request->input('id'));

        // dd($request->id['0']);

        // $id = $request->query('id');

        // dd($id);
        // dd(request('id'));

        $query = $request->query();
        dd($query);
        return view('clients/categories/list');
    }

    public function show($id)
    {
        return view('clients/categories/edit');

    }

    public function create(Request $request)
    {
        // dd($request->path());
        $old = $request->old('name_category');
        // $cateName = $old;
        // echo ($old);
        // return view('clients/categories/create', compact('cateName'));
        return view('clients/categories/create');

    }

    public function postCreate(Request $request)
    {
        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';
        // return redirect(route('category.add'));
        // dd($request->all());
        // dd($request->all()['name_category']);
        // dd($request->input('name_category'));
        if ($request->has('name_category')) {
            $cateName = $request->name_category;
            $request->flash();  //set session flash
            return redirect(route('category.add'));
            // dd($cateName);

        } else {
            // dd('k có');
        }
    }

    public function update($id)
    {
        return 'update category controller';

    }

    public function delete($id)
    {
        return 'delete category controller';

    }

    public function uploadFileForm()
    {
        return view('clients/categories/file');
    }

    public function handleFile(Request $request)
    {
        $file = $request->file;
        // dd($file);

        //check file is uploaded to server or not/
        if ($request->hasFile('file')) {
            echo 'exist file on server' . '<br/>';
        } else {
            echo 'not found' . '<br/>';
        }

        //check file is uploaded successfully
        if ($request->file('file') && $request->file('file')->isValid()) {
            echo 'upload file ok' . '<br/>';
            // $path = $request->file->path();
            $extension = $request->file->extension();
            // dd($path, $extension);
        } else {
            echo 'upload file fail' . '<br/>';
        }

        //storing upload file, file images tự động tạo khi chưa tồn tại
        // $path = $request->file->store('images'); //nếu không chuyển j thì mặc định local
        // $path = $request->file->store('images', 's3'); //di chuyển đám mây, bên thứ 3
        // dd($path);

        //tự động đổi thành tên khác từ images thành changefile.jpg
        // $path = $request->file->storeAs('images', 'changefile.jpg');
        // dd($path);

        //muốn lấy tên gốc của file đã chọn
        // $fileName = $file->getClientOriginalName();
        // dd($fileName);

        //rename
        // $fileName = ame);
    }
}
