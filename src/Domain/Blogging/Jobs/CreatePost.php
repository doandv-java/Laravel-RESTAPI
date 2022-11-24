<?php

namespace Domain\Blogging\Jobs;

use Domain\Blogging\Actions\CreatePost as CreatePostAction;
use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreatePost implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;


    public function __construct(
        public PostValueObject $object,
    )
    {
    }


    public function handle()
    {
        CreatePostAction::handle($this->object,);
    }
}
