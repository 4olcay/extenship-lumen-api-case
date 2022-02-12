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

        $article_id = $request->input('article_id');
        $content = $request->input('content');

        // TODO: First param the user_id fully random for now, need to change with token authentication feature
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

        $content = $request->input('content');

        // TODO: First param the user_id fully random for now, need to change with token authentication feature
        $result = CommentServiceProvider::updateContent(1, $comment_id, $content);

        return $result;
    }

    public function remove($comment_id, Request $request)
    {
        // TODO: JWT TOKEN AUTHENTICATION

        // TODO: First param the user_id fully random for now, need to change with token authentication feature
        $result = CommentServiceProvider::remove(1, $comment_id);

        return $result;
    }
}
