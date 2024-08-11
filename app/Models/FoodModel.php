<?php namespace App\Models;
use CodeIgniter\Model;
class FoodModel extends Model{
    protected $table=' tbl_food_items ';
    protected $primaryKey='fid';
    protected $allowedFields=[
     'name',
     'malayalam',
     'day',
     'agn_num',
     'meal_time'
    ];
}