<?php

namespace App\Repository\Repositories;

use App\Models\Tag;
use App\Repository\Interfaces\ITag;
use Illuminate\Support\Collection;

class TagRepository extends BaseRepository implements ITag {
    
    public function __construct(Tag $model)
    {
        parent::__construct($model);
    }
    public function deleteTagByName($name)
    {
        $this->model->where(['name' => $name])->delete();
    }

    public function findTags($tagId)
    {
        return $this->model->find($tagId);
    }
    
}

?>