<?php namespace App\Models;
use CodeIgniter\Model;
class AttendenceModel extends Model{
    protected $table=' tbl_attendence ';
    //protected $primaryKey='id';
    protected $allowedFields=[
     'Student',
     'Adult',
     'date',
      'day',
      'agn_num'
    ];
}