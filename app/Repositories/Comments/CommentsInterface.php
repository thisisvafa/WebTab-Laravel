<?php

namespace App\Repositories\Comments;

interface CommentsInterface
{
    public function getComments();

    public function showComments($id);

    public function storeComments($data);

    public function findComments($id);

    public function updateComments($data, $id);

    public function destroyComments($id);
}
