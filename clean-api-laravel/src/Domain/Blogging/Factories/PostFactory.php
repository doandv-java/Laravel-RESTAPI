<?php
declare(strict_types=1);

namespace Domain\Blogging\Factories;


use Domain\Blogging\ValueObjects\PostValueObject;

class PostFactory
{
    public static function create(array $attributes): PostValueObject
    {
        return new PostValueObject(
            $attributes['title'],
            $attributes['body'],
            $attributes['description'],
        );

    }
}
