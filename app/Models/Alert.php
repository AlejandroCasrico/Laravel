<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection as SupportCollection;
class Alert extends Model
 {

    protected $fillable = [
        'timestamp',
        'alert_type',
        'classification',
        'priority',
        'protocol',
        'src_address',
        'dest_address',
    ];


    public static function filter(SupportCollection $request)//: LengthAwarePaginator
    {

        $filter = $request->get('filter');
        $search = $request->get('search');
        if($filter){
            $query = self::where($filter, 'like', '%' . $search . '%');
            $paginate = $query->get();
        }else{
            $paginate = self::all();
        }


        //$paginate = $query->paginate();
        return $paginate;
    }

}
