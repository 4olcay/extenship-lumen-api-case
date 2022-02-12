<?php

namespace App\Providers;

use App\Models\Comment;
use App\Providers\ArticleServiceProvider;
use Illuminate\Support\ServiceProvider;

class CommentServiceProvider extends ServiceProvider {
    public function create($user_id, $article_id, $content)
    {
        // TODO: JWT TOKEN AUTHENTICATION
        
        $isValidArticle = ArticleServiceProvider::isValidArticle($article_id);

        if(!$isValidArticle)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Article not found'
            ], 404);
        }

        $result = Comment::create($user_id, $article_id, $content);

        return $result;
    }

    public function detail($comment_id)
    {
        $result = Comment::detail($comment_id);

        if(!$result) {
            return response()->json([
                'status' => 'error',
                'message' => 'Comment not found'
            ], 404);
        }

        return $result;
    }

    public function updateContent($user_id, $comment_id, $content)
    {
        // TODO: JWT TOKEN AUTHENTICATION
        $result = Comment::updateContent($user_id, $comment_id, $content);

        if(!$result) {
            return response()->json([
                'status' => 'error',
                'message' => 'Comment not found'
            ], 404);
        }

        return $result;
    }

    public function remove($user_id, $comment_id)
    {
        $result = Comment::remove($user_id, $comment_id);

        if(!$result) {
            return response()->json([
                'status' => 'error',
                'message' => 'Comment not found'
            ], 404);
        }

        return true;
    }
}