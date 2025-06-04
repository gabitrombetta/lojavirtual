<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'name', 'cpf_cnpj', 'phone'];

    public function suppliers() {
        return $this->hasMany(Supplier::class);
    }
}
