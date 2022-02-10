<?php

namespace App\Http\Controllers;

use App\Providers\ArticleServiceProvider;
use \Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create(Request $request)
    {
        // TODO: JWT TOKEN AUTHENTICATION
        $this->validate($request, [
            'subject' => 'required|max:255',
            'content' => 'required'
        ]);

        $bodyContent = json_decode($request->getContent(), true);

        $subject = $bodyContent['subject'];
        $content = $bodyContent['content'];

        $result = ArticleServiceProvider::create(1, $subject, $content);

        return $result;
    }

    public function get($article_id)
    {
        $result = ArticleServiceProvider::get($article_id);

        return $result;
    }

    public function updateSubject($article_id, Request $request)
    {
        // TODO: JWT TOKEN AUTHENTICATION
        $this->validate($request, [
            'subject' => 'required|max:255'
        ]);

        $bodyContent = json_decode($request->getContent(), true);

        $subject = $bodyContent['subject'];

        $result = ArticleServiceProvider::updateSubject($article_id, $subject);

        return $result;
    }

    public function updateContent($article_id, Request $request)
    {
        // TODO: JWT TOKEN AUTHENTICATION
        $this->validate($request, [
            'content' => 'required'
        ]);

        $bodyContent = json_decode($request->getContent(), true);

        $content = $bodyContent['content'];

        $result = ArticleServiceProvider::updateContent($article_id, $content);

        return $result;
    }

    public function notificationPendingList()
    {
        $result = ArticleServiceProvider::notificationPendingList();

        return $result;
    }

    public function notificationSent($article_id)
    {
        // TODO: JWT TOKEN AUTHENTICATION
        $result = ArticleServiceProvider::updateNotificationSent($article_id);

        return $result;
    }

    public function remove($article_id, Request $request)
    {
        // TODO: JWT TOKEN AUTHENTICATION
        // TODO: Delete all comments associated with this article
        $result = ArticleServiceProvider::remove($article_id);
        
        return $result;
    }
}
