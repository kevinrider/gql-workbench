<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Planet;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class PlanetsQuery extends Query
{
    protected $attributes = [
        'name' => 'planets',
        'description' => 'A query to retrieve planet data'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('Planet');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'description' => 'filter by id'
            ],
            'name' => [
                'name' => 'name',
                'type' => Type::string(),
                'description' => 'filter by name'
            ],
            'climate' => [
                'name' => 'climate',
                'type' => Type::string(),
                'description' => 'filter by climate'
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return (new Planet())
            ->newQuery()
            ->select($select)
            ->with($with)
            ->paginate($args['limit'] ?? 10, ['*'], 'page', $args['page'] ?? 1);
    }
}
