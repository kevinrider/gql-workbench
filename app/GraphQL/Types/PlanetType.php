<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Planet;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PlanetType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Planet',
        'description' => 'A planet',
        'model' => Planet::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'planet id'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'planet name',
            ],
            'climate' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'planet climate',
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'created at time',
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'updated at time',
            ]
        ];
    }
}
