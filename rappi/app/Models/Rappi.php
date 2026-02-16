<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rappi extends Model
{
    protected $table = 'rappi';
    protected $fillable = ['name', 'producto', 'precio', 'cantidad', 'descripcion'];
}                                                                                                                                                                              