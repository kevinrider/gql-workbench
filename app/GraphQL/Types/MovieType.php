<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Movie;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MovieType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Movie',
        'description' => 'A movie',
        'model' => Movie::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'movie id'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'movie title',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created at time',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated at time',
            ],
        ];
    }
}
