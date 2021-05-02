<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
   use HasFactory;

   static $rules = [
      'title' => 'required|min:5|max:30',
      'descripcion' => 'required',
      'start' => 'required',
      'end' => 'required',

   ];
   /* protected $fillable = ['title', 'descripcion', 'start', 'end']; */
   protected $guarded = [];
}
