<?php
declare(strict_types=1);

namespace Domain\Blogging\Reactors;


use App\Mail\Posts\NewPost;
use Domain\Blogging\Events\PostWasCreated;
use Domain\Shared\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use Spatie\EventSourcing\EventHandlers\Reactors\Reactor;

class PostReactor extends Reactor implements ShouldQueue
{
    public function onPostWasCreated(PostWasCreated $event): void
    {
        //send mail
        $author = User::find($event->userID);
        Mail::to($author->email)->send(mailable: new NewPost($event->object));
    }

}
