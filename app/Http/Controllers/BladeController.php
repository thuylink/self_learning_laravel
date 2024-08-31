<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeController extends Controller
{
    public $data = [];
    public function index()
    {
        $this->data['welcome'] = 'Thuy Linh is coding <p> tag <p>';
        $this->data['content'] = '<h3> chapter 1 </h3>';
        $this->data['index'] = 2;
        $this->data['array'] = [
            'item 1',
            'item 2',
            'item 3',
        ];
        $this->data['number'] = 10;
        $this->data['message'] = 'OK';
        // dd($this->data);

        /**
         * {{variable}} hiển thị dạng thực thể
         * tức là thêm kí tự html 'Thuy Linh is coding <p> tag <p>'
         * thì hiển thị y nguyên -> hạn chế lỗi về bảo mật
         */

        /**
         * cách dùng <?php echo ... ?> sẽ là thẻ html -> ảnh hưởng bảo mật
         */

        return view('home-blade', $this->data);
    }
}
