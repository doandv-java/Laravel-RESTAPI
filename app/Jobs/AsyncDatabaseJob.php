<?php

namespace App\Jobs;

use App\Models\MySQL\Authors as SourceAuthor;
use App\Models\MySQL\Books as SourceBook;
use App\Models\SQLLite\Books as TargetBook;
use App\Models\SQLLite\Authors as TargetAuthor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class AsyncDatabaseJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        SourceAuthor::select(['id', 'name', 'email', 'bio'])->chunk(100, function ($authors) {
            foreach ($authors as $author) {
                $sourceBooks = SourceBook::where('author_id', $author->id)->get();
                $targetBooks = TargetBook::where('author_id', $author->id)->get();
                $mergeBooks = array_merge($sourceBooks->collect()->all(), $targetBooks->collect()->all());
                $diffBooks = array_diff($sourceBooks->collect()->all(), $targetBooks->collect()->all());
                $targetAuthor = TargetAuthor::where("email", $author->email)->first();
                if (empty($targetAuthor)) {
                    $targetAuthor = TargetAuthor::create([
                        "name" => $author->name,
                        "email" => $author->email,
                        "bio" => $author->bio,
                        "total_books" => count($mergeBooks)
                    ]);
                } else {
                    $targetAuthor->update([$author->all(), "total_books" => count($mergeBooks)]);
                    $targetAuthor->total_books = count($mergeBooks);

                }
                if ($targetAuthor == null) {
                    continue;
                }
                $targetAuthor->save();
                TargetBook::saved($mergeBooks);
                Log::info("Save success");
                Log::info(count($mergeBooks));
                Log::info(count($diffBooks));
            }

        });
    }

}
