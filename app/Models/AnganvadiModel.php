<?php namespace App\Models;
use CodeIgniter\Model;
class AnganvadiModel extends Model{
     protected $table=' tbl_row_items ';
     protected $primaryKey='rid';
     protected $allowedFields=[
      'item',
      'quantity',
      'unit',
      'locale_title',
      'agn_num'
     ];
    }
?>