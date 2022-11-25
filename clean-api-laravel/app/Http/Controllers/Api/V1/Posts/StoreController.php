<?php
declare(strict_types=1);

namespace App\Http\Controllers\Api\V1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Posts\StoreRequest;
use Domain\Blogging\Jobs\CreatePost;
use Domain\Blogging\Factories\PostFactory;
use JustSteveKing\StatusCode\Http;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        //authorize

        //create resource
        \Domain\Blogging\Jobs\CreatePost::dispatch(PostFactory::create(
            attributes: $request->validated()));

        // return
        return response(null, Http::ACCEPTED());
    }
}
