<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAllProducts() {
        return 'All products';
    }

    public function getArr() {
        $contentArr = [
            'name' => 'Thuy Linh',
            'age' => 18,
            'email' => 'khong co email',
        ];
        return $contentArr;
    }
}
