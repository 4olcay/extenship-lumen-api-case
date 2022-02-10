<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    public function create($user_id, $article_id, $content)
    {
        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->article_id = $article_id;
        $comment->content = $content;
        $comment->save();

        return $comment;
    }

    public function detail($comment_id)
    {
        $result = Comment::find($comment_id);

        if(!$result)
            return false;

        return $result;
    }

    public function updateContent($comment_id, $content)
    {
        $result = Comment::where('id', $comment_id)
                         ->update(['content' => $content]);

        if(!$result)
            return false;

        return $result;
    }

    public function remove($comment_id)
    {
        $comment = Comment::find($comment_id);

        if(!$comment)
            return false;

        $comment->delete();

        return true;
    }
}