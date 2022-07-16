<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Movie;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class MoviesQuery extends Query
{
    protected $attributes = [
        'name' => 'movies',
        'description' => 'A query to retrieve movie data'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('Movie');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'description' => 'filter id'
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::string(),
                'description' => 'filter by title'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return (new Movie())
            ->newQuery()
            ->select($select)
            ->with($with)
            ->paginate($args['limit'] ?? 10, ['*'], 'page', $args['page'] ?? 1);
    }
}
