<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

abstract class Controller
{
    //trong các controller khác, phần code return
    /**
     * bị lặp đi lặp lại
     */
    public function sentSuccessResponse($data = '', $message = 'success', $status = 200) {
        return response()->json([
            'data' => $data,
            'message' => $message
        ], $status);
    }
}
