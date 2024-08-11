<?php namespace App\Models;
use CodeIgniter\Model;
class one extends Model{
    protected $table=' shifana ';
    protected $primaryKey='id';
    protected $allowedFields=[
     'name',
     'age'
      
    ];
}