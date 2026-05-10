<?php

namespace App\Services;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Models\Tag;

class TagService
{
    protected $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getAllTags()
    {
        return Tag::all();
    }

    public function getTag($id)
    {
        return Tag::find($id);
    }

    public function createTag(array $data)
    {
        return $this->tagRepository->create($data);
    }

    public function updateTag($id, array $data)
    {
        return $this->tagRepository->update($data, $id);
    }

    public function deleteTag($id)
    {
        return $this->tagRepository->delete($id);
    }
}
