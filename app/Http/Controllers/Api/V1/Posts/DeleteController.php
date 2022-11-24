<?php

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use Domain\Blogging\Jobs\DeletePost;
use Domain\Blogging\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JustSteveKing\StatusCode\Http;

class DeleteController extends Controller
{
    public function __invoke(Request $request, Post $post): Response
    {
        //delete
        DeletePost::dispatch($post->id);
        return response(
            content: '', status: Http::ACCEPTED(),
        );
    }
}
