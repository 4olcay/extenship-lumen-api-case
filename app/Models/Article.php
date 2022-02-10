<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {
    public function create($user_id, $subject, $content)
    {
        $article = new Article();
        $article->user_id = $user_id;
        $article->subject = $subject;
        $article->content = $content;
        $article->save();

        return $article;
    }

    public function get($article_id)
    {
        $article = Article::find($article_id);

        return $article;
    }

    public function updateSubject($article_id, $subject)
    {
        $article = Article::find($article_id);

        if(!$article)
            return false;

        $article->subject = $subject;
        $article->save();

        return $article;
    }

    public function updateContent($article_id, $content)
    {
        $article = Article::find($article_id);

        if(!$article)
            return false;

        $article->content = $content;
        $article->save();

        return $article;
    }

    public function updateNotificationSent($article_id)
    {
        $article = Article::find($article_id);

        if(!$article)
            return false;

        $article->notification_sent = true;
        $article->save();

        return $article;
    }

    public function remove($article_id)
    {
        $article = Article::find($article_id);

        if(!$article)
            return false;

        $article->delete();

        return true;
    }

    public function notificationPendingList()
    {
        $article = Article::where('notification_sent', false)->get();

        if(!$article)
            return false;

        return $article;
    }

    public function isValidArticle($article_id)
    {
        $article = Article::find($article_id);

        if(!$article)
            return false;

        return true;
    }
}