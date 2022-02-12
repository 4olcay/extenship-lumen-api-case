<?php

namespace App\Providers;

use App\Models\Article;
use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider {
    public function create($user_id, $subject, $content)
    {
        $result = Article::create($user_id, $subject, $content);

        return $result;
    }

    public function get($article_id)
    {
        $result = Article::get($article_id);

        if(!$result)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Article not found'
            ], 404);
        }

        return $result;
    }

    public function updateSubject($user_id, $article_id, $subject)
    {
        $result = Article::updateSubject($user_id, $article_id, $subject);

        if(!$result)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Article not found'
            ], 404);
        }

        return $result;
    }

    public function updateContent($user_id, $article_id, $content)
    {
        $result = Article::updateContent($user_id, $article_id, $content);

        if(!$result)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Article not found'
            ], 404);
        }

        return $result;
    }

    public function updateNotificationSent($article_id)
    {
        $result = Article::updateNotificationSent($article_id);

        if(!$result)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Article not found'
            ], 404);
        }

        return $result;
    }

    public function remove($user_id, $article_id)
    {
        $result = Article::remove($user_id, $article_id);

        if(!$result)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Article not found'
            ], 404);
        }

        return true;
    }

    public function notificationPendingList()
    {
        $result = Article::notificationPendingList();

        if(!$result)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Pending notification article not found'
            ], 404);
        }

        return $result;
    }

    public function isValidArticle($article_id)
    {
        $result = Article::isValidArticle($article_id);

        return $result;
    }
}