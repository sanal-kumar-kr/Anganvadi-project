<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\RawSql;
class Report extends Model{
    protected $table=' report ';
    protected $primaryKey='id';
    protected $allowedFields=[
     'date',
     'day',
     'Student',
     'Adult',
     'item',
     'qty',
     'balance',
      'month',
      'agn_num',
      'item',
      'unit'
    ];
    }