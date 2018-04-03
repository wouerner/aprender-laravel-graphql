<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Carro;

class CarroQuery extends Query
{
    protected $attributes = [
        'name' => 'CarroQuery',
        'description' => 'A query'
    ];

    public function type()
    {
        /* return Type::listOf(Type::string()); */
         return GraphQL::type('Carro');
    }

    public function args()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        return Carro::find($args['id']);
    }
}
