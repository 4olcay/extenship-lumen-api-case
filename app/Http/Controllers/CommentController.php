<?php

namespace App\Http\Controllers;

use App\Providers\CommentServiceProvider;
use \Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        // TODO: JWT TOKEN AUTHENTICATION
        $this->validate($request, [
            'article_id' => 'required|integer',
            'content' => 'required'
        ]);

        $bodyContent = json_decode($request->getContent(), true);

        $article_id = $bodyContent['article_id'];
        $content = $bodyContent['content'];

        $result = CommentServiceProvider::create(1, $article_id, $content);

        return $result;
    }

    public function detail($comment_id, Request $request)
    {
        $result = CommentServiceProvider::detail($comment_id);

        return $result;
    }

    public function updateContent($comment_id, Request $request)
    {
        // TODO: JWT TOKEN AUTHENTICATION
        $this->validate($request, [
            'content' => 'required'
        ]);

        $bodyContent = json_decode($request->getContent(), true);

        $content = $bodyContent['content'];

        $result = CommentServiceProvider::updateContent($comment_id, $content);

        return $result;
    }

    public function remove($comment_id, Request $request)
    {
        // TODO: JWT TOKEN AUTHENTICATION

        $result = CommentServiceProvider::remove($comment_id);

        return $result;
    }
}
