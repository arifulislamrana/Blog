<?php
namespace App\Repository\Interfaces;

use Illuminate\Support\Collection;

interface ITag extends IBaseRepository {
    public function deleteTagByName($name);
    public function findTags($tagId);
}

?>