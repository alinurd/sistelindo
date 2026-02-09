<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Happycustomer extends Model
{
        protected $table = 'master_happycustomer';
        protected $guarded = [];
        // public $timestamps = false;
    
    use HasFactory;

     public function pageDetail()
    {
        return $this->belongsTo(PageDetail::class, 'page_datail_id', 'id');
    }
}
