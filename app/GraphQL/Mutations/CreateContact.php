<?php 

namespace App\GraphQL\Mutations;

use App\Models\Phonebook;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class CreateContact
{
    public function __invoke($rootValue, array $args, GraphQLContext $context)
    {
        $name = $args['name']??'';
        if(Phonebook::where("name", "=", $name)->count() > 0){
            return [
                    'message' => 'A contact with name "'.$name.'" already exsist!',
                    'status_code' => 409,
                ];
        }
        else{
            $created_items = Phonebook::create($args);

            if($created_items){
                return [
                    'message' => 'Contact successfully created!',
                    'status_code' => 200,
                    'item' => $created_items,
                ];
            }
            else{
                return [
                    'message' => 'Failed to create contact',
                    'status_code' => 500,
                ];
            }
        }
    }
}