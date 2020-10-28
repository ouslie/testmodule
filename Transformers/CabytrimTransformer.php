<?php

namespace Modules\Cabytrim\Transformers;

use Modules\Cabytrim\Models\Cabytrim;
use App\Ninja\Transformers\EntityTransformer;

/**
 * @SWG\Definition(definition="Cabytrim", @SWG\Xml(name="Cabytrim"))
 */

class CabytrimTransformer extends EntityTransformer
{
    /**
    * @SWG\Property(property="id", type="integer", example=1, readOnly=true)
    * @SWG\Property(property="user_id", type="integer", example=1)
    * @SWG\Property(property="account_key", type="string", example="123456")
    * @SWG\Property(property="updated_at", type="integer", example=1451160233, readOnly=true)
    * @SWG\Property(property="archived_at", type="integer", example=1451160233, readOnly=true)
    */

    /**
     * @param Cabytrim $cabytrim
     * @return array
     */
    public function transform(Cabytrim $cabytrim)
    {
        return array_merge($this->getDefaults($cabytrim), [
            
            'id' => (int) $cabytrim->public_id,
            'updated_at' => $this->getTimestamp($cabytrim->updated_at),
            'archived_at' => $this->getTimestamp($cabytrim->deleted_at),
        ]);
    }
}
