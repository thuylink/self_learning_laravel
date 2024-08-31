<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        // dd('this', $this);
        return [
            'data' => $this->collection,
            'meta' => [
                'total' => $this->total(),
            ]
        ];
    }
}
