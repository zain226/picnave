<?php

namespace App\Traits\Admin;


use Illuminate\Support\Facades\Auth;

trait SearchModelTrait
{
    public static function SearchModel($model, $columns, $table_filter_search = '',$type = null)
    {
        if ($model == 'Category') {
            $modelC = '\\Modules\\Admin\\Entities\\' . $model;
        }

        else {
            $modelC = '\\App\\Models\\' . $model;
        }
        $builder = $modelC::query();
        if ($model == 'User') {
            $builder = $builder->where('role',$type);
        }
        if ($model == 'Images' && $type) {
            if($type == 'approve')
            {
                $builder = $builder->where('status','!=',null);
            }
            if($type == 'un_approve')
            {
                $builder = $builder->where('status',null);
            }

        }
        $builder = $builder->where(function ($q) use ($columns, $table_filter_search) {
            foreach ($columns as $value) {
                $q->orWhere($value, 'LIKE', "%" . $table_filter_search . "%");
            }
        });

        return $builder;
    }
}
