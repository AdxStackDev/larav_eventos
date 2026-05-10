<?php

namespace App\Repositories;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Models\Tag;

class TagRepository implements TagRepositoryInterface
{
    public function all()
    {
        return Tag::all();
    }

    public function find($id)
    {
        return Tag::find($id);
    }

    public function create(array $data)
    {
        return Tag::create($data);
    }

    public function update(array $data, $id)
    {
        $tag = Tag::find($id);
        if ($tag) {
            $tag->update($data);
            return $tag;
        }
        return null;
    }

    public function delete($id)
    {
        $tag = Tag::find($id);
        if ($tag) {
            $tag->delete();
            return true;
        }
        return false;
    }
}
