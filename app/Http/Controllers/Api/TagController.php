<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreTagRequest;
use App\Http\Controllers\Controller;
use App\Services\TagService;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $tags = $this->tagService->getAllTags();
        return response()->json([
            'success' => true,
            'data' => $tags
        ]);
    }

    public function show($id)
    {
        $tag = $this->tagService->getTag($id);
        
        if (!$tag) {
            return response()->json([
                'success' => false,
                'message' => 'Tag not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $tag
        ]);
    }

    public function store(StoreTagRequest $request)
    {
        $tag = $this->tagService->createTag($request->validated());
        return response()->json([
            'success' => true,
            'message' => 'Tag created successfully',
            'data' => $tag
        ], 201);
    }

    public function update(StoreTagRequest $request, $id)
    {
        $tag = $this->tagService->updateTag($id, $request->validated());
        
        if (!$tag) {
            return response()->json([
                'success' => false,
                'message' => 'Tag not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Tag updated successfully',
            'data' => $tag
        ]);
    }

    public function destroy($id)
    {
        $deleted = $this->tagService->deleteTag($id);
        
        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Tag not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Tag deleted successfully'
        ]);
    }
}
