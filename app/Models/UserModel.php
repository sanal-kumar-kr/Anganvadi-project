<?php namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model{
    protected $table='approval';
    //protected $primaryKey='uid';
    protected $allowedFields=[
        'password',
        'email',
        'contact',
     'anganvadi_number',
     'teacher_name',
     'usertype',
     'status'  
      
    ];
    
}