<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Species;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SpeciesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Species',
        'description' => 'A character species',
        'model' => Species::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'species id'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'species name',
            ],
            'lifespan' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'species lifespan as integer',
            ],
            'originPlanetId' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'species origin planet id',
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
