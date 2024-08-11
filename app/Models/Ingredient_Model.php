<?php namespace App\Models;
use CodeIgniter\Model;
class Ingredient_Model extends Model{
    protected $table=' ingredients ';
    protected $primaryKey='id';
    protected $allowedFields=[
     'name',
     'ingredient',
     'quantity',
    'unit',
    'Aquantity',
    'status',
     'anganvadi_num',
     'meal_time'
    ];
}