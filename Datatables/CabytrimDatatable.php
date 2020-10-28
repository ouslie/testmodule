<?php

namespace Modules\Cabytrim\Datatables;

use Utils;
use URL;
use Auth;
use App\Ninja\Datatables\EntityDatatable;

class cabytrimDatatable extends EntityDatatable
{
    public $entityType = 'cabytrim';
    public $sortCol = 1;

    public function columns()
    {
        return [
            
            [
                'created_at',
                function ($model) {
                    return Utils::fromSqlDateTime($model->created_at);
                }
            ],
        ];
    }

    public function actions()
    {
        return [
            [
                mtrans('cabytrim', 'edit_cabytrim'),
                function ($model) {
                    return URL::to("cabytrim/{$model->public_id}/edit");
                },
                function ($model) {
                    return Auth::user()->can('editByOwner', ['cabytrim', $model->user_id]);
                }
            ],
        ];
    }

}
