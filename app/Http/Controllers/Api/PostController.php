<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class PostController extends Controller
{
    protected $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     */

    /**
     * khi trả về dữ liệu, nêu strar về nhiều bản ghi thì PostCollection
     * nếu trả về 1 bản ghi thì là PostResource
     */
    public function index()
    {
        //
        $posts = $this->post->paginate(5); //phân trang, 5 bản ghi/trang
        $postsCollection = new PostCollection($posts);
        // $postsResource =PostResource::collection($posts);
        // return response()->json([
        //     'data' => $postsCollection
        // ], Response::HTTP_OK);
        return $this->sentSuccessResponse($postsCollection, 'success', Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        $dataCreate = $request->all();
        $post = $this->post->create($dataCreate);
        $postResource = new PostResource($post);
        // return response()->json([
        //     'data' => $postResource
        // ], Response::HTTP_CREATED);
        return $this->sentSuccessResponse($postResource, 'success', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = $this->post->findOrFail($id);
        $postResource = new PostResource($post);
        // return response([
        //     'data' => $postResource
        // ], Response::HTTP_OK);
        return $this->sentSuccessResponse($postResource, 'show success', Response::HTTP_OK);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        //
        $post = $this->post->findOrFail($id);
        $dataUpdate = $request->all();
        $post->update($dataUpdate);
        $postResource = new PostResource($post);
        // return response()->json([
        //     'data' => $postResource
        // ], Response::HTTP_OK);
        return $this->sentSuccessResponse($postResource, 'update success', Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $post = $this->post->findOrFail($id);
        $post->delete();
        $postResource = new PostResource($post);
        // return response()->json([
        //     'data' => $postResource,
        //     'message' => 'deleted succesfull'
        // ], Response::HTTP_OK);
        return $this->sentSuccessResponse($postResource, 'delete success', Response::HTTP_OK);

    }
}
