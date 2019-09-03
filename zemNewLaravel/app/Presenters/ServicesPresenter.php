<?php

namespace App\Presenters;

use App\Transformers\ServicesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServicesPresenter.
 *
 * @package namespace App\Presenters;
 */
class ServicesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServicesTransformer();
    }
}
