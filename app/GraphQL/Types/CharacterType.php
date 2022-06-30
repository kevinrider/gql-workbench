<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\Models\Character;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CharacterType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Character',
        'description' => 'A movie character',
        'model' => Character::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'character id'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'character name',
            ],
            'homeWorldId' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'home planet id',
            ],
            'speciesId' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'species id',
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
