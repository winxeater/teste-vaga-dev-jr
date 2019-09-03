<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Services;

/**
 * Class ServicesTransformer.
 *
 * @package namespace App\Transformers;
 */
class ServicesTransformer extends TransformerAbstract
{
    /**
     * Transform the Services entity.
     *
     * @param \App\Entities\Services $model
     *
     * @return array
     */
    public function transform(Services $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
