<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclesModel extends Model
{
    protected $table = 'vehicles' ;
    protected $fillable = [
       
        'vehmod', 'vehmark', 'vehyear', 'vehengine', 'vehtrans', 'vehimage', 'vehgalimages'
        
    ] ;
    
public function scopeSearch($vehsearchquery, $vehsearch)
{
    $vehsearch = preg_replace('/\s+/', '%', $vehsearch) ;
    $vehsearch = "%{$vehsearch}%" ;

    $vehsearchquery->where(function ($vehsearchquery) use ($vehsearch) {
        $vehsearchquery->orWhere('vehmod', 'like', $vehsearch);
        $vehsearchquery->orWhere('vehmark', 'like', $vehsearch);
        $vehsearchquery->orWhere('vehengine', 'like', $vehsearch);
        $vehsearchquery->orWhereRaw("CONCAT(vehmod,' ',vehmark,' ',vehengine) LIKE ?", [$vehsearch]);
    }) ;

    return $vehsearchquery ;
}
    
    
} // End of the class
