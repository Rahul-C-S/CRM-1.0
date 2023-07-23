<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'issue',
        'updated_by',
        'remarks',
        'status',

    ];

    protected $hidden = ['id', 'client_id'];

    public function client(){
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function getStatusTextAttribute(){
        if($this->status == 1){
            return "Pending";
        }
        if($this->status == 2){
            return "In Progress";
        }
        if($this->status == 3){
            return "Resolved";
        }
    }
}
