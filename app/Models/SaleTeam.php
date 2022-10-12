<?php

namespace App\Models;

use App\Utils\Constant;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleTeam extends Model
{
    use HasFactory;
    protected $table = 'sale_teams';
    protected $fillable =[
        'name',
        'email',
        'telephone',
        'joined_date',
        'current_route',
        'comment',
    ];

    protected $appends = ['current_route_name'];

    public function getCurrentRouteNameAttribute()
    {
        return Constant::$currentRoutes[array_search($this->attributes['current_route'], array_column(Constant::$currentRoutes, 'key'))]['value'];
    }

    public function action()
    {
        return '<a class="btn btn-outline-primary" href="'.route('sales-team.edit',$this->attributes['id']).'">
                                                    <i class="mdi mdi-square-edit-outline mdi-18px"></i>
                                           </a> <a class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" href="#"
                                                    data-url="'.route('sales-team.destroy', $this->attributes['id']).'">
                                                    <i class="mdi mdi-delete mdi-18px"></i>
                                                </a> <a class="btn btn-outline-success mdi-18px" onclick="viewData('.$this->attributes['id'].')">
                    <i class="mdi mdi-eye-outline mdi-16px"></i>';
    }
}
