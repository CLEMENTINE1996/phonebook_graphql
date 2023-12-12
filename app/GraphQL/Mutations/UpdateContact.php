<?php 

namespace App\GraphQL\Mutations;

use App\Models\Phonebook;
use GraphQL\Error\UserError;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class UpdateContact
{
    public function __invoke($rootValue, array $args, GraphQLContext $context)
    {
        $id = $args['id'];
        $item = Phonebook::find($id);

        if (!$item) {
            return [
                'message' => 'The contact wit an id of "'.$id.'" cannot be found!',
                'status_code' => 404,
            ];
        }

        // Update the item with the given arguments
        $item->update($args);

        return [
            'message' => 'Contact updated successfully',
            'status_code' => 200,
            'item' => $item,
        ];
    }
}