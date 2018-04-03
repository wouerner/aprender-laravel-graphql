<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;

use App\Carro;

class CarrosQuery extends Query
{
    protected $attributes = [
        'name' => 'CarrosQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Carro'));
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::int()
            ],
            'modelo' => [
                'type' => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return Carro::all();
    }
}
