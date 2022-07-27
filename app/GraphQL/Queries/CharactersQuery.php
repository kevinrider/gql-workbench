<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Character;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class CharactersQuery extends Query
{
    protected $attributes = [
        'name' => 'characters',
        'description' => 'A query to retrieve character data'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('Character');
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
            'homeWorldId' => [
                'name' => 'homeWorldId',
                'type' => Type::int(),
                'description' => 'filter by homeWorldId'
            ],
            'speciesId' => [
                'name' => 'speciesId',
                'type' => Type::int(),
                'description' => 'filter by speciesId'
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        return (new Character())
            ->newQuery()
            ->select($select)
            ->with($with)
            ->paginate($args['limit'] ?? 10, ['*'], 'page', $args['page'] ?? 1);
    }
}
