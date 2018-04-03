<?php

namespace App\GraphQL\Mutation;

use Folklore\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQL;
use App\Carro;

class CreateCarroMutation extends Mutation
{
    protected $attributes = [
        'name' => 'CreateCarroMutation',
        'description' => 'A mutation'
    ];

    public function type()
    {
        return GraphQL::type('Carro');
    }

    public function args()
    {
        return [
            'modelo' => [
                'type' => Type::nonNull(Type::string())
            ] 
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $carro = new Carro();

        /* $carro->fill($args); */
        $carro->modelo = $args['modelo'];
        $carro->save();

        return $carro;
    }
}
