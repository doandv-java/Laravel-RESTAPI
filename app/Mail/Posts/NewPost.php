<?php
declare(strict_types=1);

namespace App\Mail\Posts;

use Domain\Blogging\ValueObjects\PostValueObject;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPost extends Mailable
{
    use Queueable, SerializesModels;


    public function __construct(
        public PostValueObject $object
    )
    {
        //
    }


    public function envelope()
    {
        return new Envelope(
            subject: '\ New Post',
        );
    }


    public function content()
    {
        return new Content(
            markdown: 'emails.posts.new-post',
        );
    }


    public function attachments()
    {
        return [];
    }
}
