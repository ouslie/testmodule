<?php

namespace Modules\Cabytrim\Repositories;

use DB;
use Modules\Cabytrim\Models\Cabytrim;
use App\Ninja\Repositories\BaseRepository;
//use App\Events\CabytrimWasCreated;
//use App\Events\CabytrimWasUpdated;

class CabytrimRepository extends BaseRepository
{
    public function getClassName()
    {
        return 'Modules\Cabytrim\Models\Cabytrim';
    }

    public function all()
    {
        return Cabytrim::scope()
                ->orderBy('created_at', 'desc')
                ->withTrashed();
    }

    public function find($filter = null, $userId = false)
    {
        $query = DB::table('cabytrim')
                    ->where('cabytrim.account_id', '=', \Auth::user()->account_id)
                    ->select(
                        
                        'cabytrim.public_id',
                        'cabytrim.deleted_at',
                        'cabytrim.created_at',
                        'cabytrim.is_deleted',
                        'cabytrim.user_id'
                    );

        $this->applyFilters($query, 'cabytrim');

        if ($userId) {
            $query->where('clients.user_id', '=', $userId);
        }

        return $query;
    }

    public function save($data, $cabytrim = null)
    {
        $entity = $cabytrim ?: Cabytrim::createNew();

        $entity->fill($data);
        $entity->save();

        return $entity;
    }

}
