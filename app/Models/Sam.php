<?php namespace App\Models;
use CodeIgniter\Model;
class Sam extends Model{
     protected $table='raw';
     //protected $primaryKey='id';
     protected $allowedFields=[
      'item',
      'quatity',
      'ingredients'
     ];
    }