<?php

namespace App\Controllers;
use App\Models\AnganvadiModel;
use App\Models\FoodModel;
use App\Models\AttendenceModel;
use App\Models\UserModel;
use App\Models\Ingredient_Model;
use App\Models\Report;
class AnganvadiController extends BaseController
{
   //Home functions
    public function index()
    {
        return view('templates/home');
    }
    public  function homeContact(){
      return  view('templates/homeContact');
   }
   public  function login(){
      return  view('templates/Login');
   }
   public  function register(){
      return  view('templates/Register');
   }
   public function RegisterUser(){
      $anganvadi = new UserModel();
     $pass=$this->request->getVar('confirmpassword');
     $hash=password_hash($pass,PASSWORD_BCRYPT);
     $data=[
            'password'=> $hash,
            'email'=>$this->request->getPost('email'),
            'contact'=>$this->request->getPost('contact'),
            'anganvadi_number'=>$this->request->getPost('Anumber'),
            'teacher_name'=>$this->request->getPost('Tname'),
            'usertype'=>2,
            'status'=>0
        ];
      $anganvadi->save($data);
      return redirect('templates/register');
   }
   //---------------------------
   //Teacher functions
    public  function Thome(){ 
      if (session()->get('isLoggedIn') && session()->get('usertype')==2){
         $aid=session()->get();
        
      return  view('templates/Teacher_home',$aid);
      }else{
         return redirect()->back();
      }
   }
   public function Teacher_Fooditems(){
      if (session()->get('isLoggedIn') && session()->get('usertype')==2){
        $anganvadi= new FoodModel();
        $aid=session()->get('anganvadi_number');
             $data['anganvadi']=$anganvadi->where('agn_num', $aid)->findAll();
             $dataD=['daily','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
             $array=['first'=>$data,'second'=>$dataD];
          return view('templates/Teacher_Fooditems', $array);
   }else{
      return redirect()->back();
   }
}
public function Stock_update(){
   if (session()->get('isLoggedIn') && session()->get('usertype',2)){
      $aid=session()->get('anganvadi_number');
   $anganvadi= new AnganvadiModel();
   $data['anganvadi'] =$anganvadi->where('agn_num', $aid)->findAll();
  
     return view('templates/Stock_update', $data);
   }else{
      return redirect()->back();
   }
}
public function Attendence(){
//    $array =["Morning","Noon","Evening"];
//    foreach($array as $item)
 
 $anganvadi=new FoodModel();
 $aid=session()->get('anganvadi_number');
$anganvadi->select('DISTINCT(malayalam)');
$data['anganvadi']=$anganvadi->where('agn_num',$aid)->findAll();
 //print_r($data);exit;
 return view('templates/Student_Attendence',$data);
}
public function Add_Food(){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
   $anganvadi=new FoodModel();
   $aid=session()->get('anganvadi_number');
   $data=[
       'name'=>$this->request->getPost('item'),
       'malayalam'=>$this->request->getPost('malayalam'),
       'day'=>$this->request->getPost('days'),
       'agn_num'=>$aid,
       'meal_time'=>$this->request->getPost('event')
   ];
   $anganvadi->save($data);
  return redirect('Teacher_Fooditems');
}else{
   return redirect()->back();
}
}
public function Add_stock(){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
   $anganvadi = new AnganvadiModel();
   $temp=$this->request->getVar('quantity');
   $aid=session()->get('anganvadi_number');
  $gm=$temp*1000;
   $data=[
       'item'=>$this->request->getPost('title'),
       'quantity'=>$gm,
       'unit'=>$this->request->getPost('unit'),
        'locale_title'=>$this->request->getPost('locale_title'),
          'agn_num'=>$aid
   ];
  $anganvadi->save($data);
  return redirect('Stock_update');
}else{
   return redirect()->back();
}
}
public function Add_Attendence(){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
   $anganvadi = new AttendenceModel();
   $Student=$this->request->getVar('Student');
   $Adult=$this->request->getVar('Adult');
   $date=$this->request->getVar('date');
   $today=date('l', strtotime($date));
    $fir=$this->request->getVar('fir');
    $sec=$this->request->getVar('sec');
    $thir=$this->request->getVar('thir');
   $aid=session()->get('anganvadi_number');
   $dat=[
         'Student'=>$Student,
         'Adult'=>$Adult,
         'date'=>$date,
         'day'=> $today,
         'agn_num'=>$aid
     ];
   $stock=new AnganvadiModel();
   $ingmodel = new Ingredient_Model();
  $arayitem=[$fir,$sec,$thir];
  print_r($arayitem);exit;
  foreach( $arayitem as $one){
   $ingmodel->select('id,status,ingredient,quantity,Aquantity,anganvadi_num,meal_time,unit,name');
   $where = "anganvadi_num='$aid' AND name='$one'";
      $ingredients=$ingmodel->where($where)->findAll();
       foreach( $ingredients as $item){
         $s=$item['quantity']*$Student;
           $a=$item['Aquantity']*$Adult;
           $tm=$item['meal_time'];
           $un=$item['unit'];
           $sum=$s+$a;
           $food=$item['ingredient'];
            $arr="agn_num='$aid' AND locale_title='$food'";
    $decrease=$stock->where($arr)->first();
   $qty=$decrease['quantity'];
   $en=$decrease['item'];
  
   $unit=$decrease['unit'];
     $bale=$qty-$sum;
    $id=$decrease['rid'];
    if($bale<=0){
      $data = [
         'quantity' =>0 
      ];

      $stock->update($id,$data);
      continue;
   }
    $data = [
       'quantity' =>$bale 
    ];
 $stock->update($id,$data);
           $report=new Report();
           $report->select('id,agn_num,item,qty,month');
           $mnt=date("F");
          $repfind = "agn_num='$aid' AND (item='$food' AND month='$mnt')";
          $repsum= $report->where($repfind)->first();
            if($repsum){
               $c=$repsum['qty'];
               $i=$repsum['id'];
             $l=$sum+$c;
             $ch=[
               'qty'=>$l,
               'balance'=>$bale
             ];
          $report->update($i,$ch);
           
          }
          if(!$repsum){
            $rep=[
               'agn_num'=>$aid,
               'item'=>$food,
               'qty'=>$sum,
               'month'=>date("F"),
               'unit'=>$unit,
               'balance'=>$bale
            ];
           $report->save($rep);
          }
    }
   }
 return redirect('Attendence');
   }
   else{
 //return redirect()->back();
   }
}
public function View_Attendence(){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
   $anganvadi= new AttendenceModel();
   $aid=session()->get('anganvadi_number');
        $data['anganvadi']=$anganvadi->where('agn_num', $aid)->findAll();
     return view('templates/View_Attendence', $data);
   }else{
      return redirect()->back();
   }
}
public function Add_ingredients($fid = null){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
   $anganvadi = new FoodModel();
    $data['anganvadi']=$anganvadi->find($fid);
    return view('templates/Add_ingredients', $data);
   }else{
      return redirect()->back();
   }
   }
public function Add_ingredient(){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
   $anganvadi = new Ingredient_Model();
   $aid=session()->get('anganvadi_number');
  $Anganvadi= new FoodModel();
  $data=[
         'quantity'=>$this->request->getPost('Student'),
         'Aquantity'=>$this->request->getPost('Adult'),
         'name'=>$this->request->getPost('item'),
          'unit'=>$this->request->getPost('Unit'),
         'ingredient'=>$this->request->getPost('Ingredients'),
         'status'=>$this->request->getPost('Day'),
         'anganvadi_num'=>$aid,
         'meal_time'=>$this->request->getPost('time')
     ];
   $anganvadi->save($data);
   
   return redirect('Teacher_Fooditems');
   }else{
      return redirect()->back();
   }
}
public function View_ingredient(){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
  $anganvadi= new Ingredient_Model();
  $aid=session()->get('anganvadi_number');
       $data['anganvadi']=$anganvadi->where('anganvadi_num',$aid)->findAll();
     return view('templates/View_ingredients', $data);
   }else{
      return redirect()->back();
   }
}
 public function Fetch($fid = null){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
  $Anganvadi= new FoodModel();
  $aid=session()->get('anganvadi_number');
  $data['Anganvadi']=$Anganvadi->where('agn_num',$aid)->find($fid);

  $anganvadi= new AnganvadiModel(); 
  $dataI['anganvadi']=$anganvadi->where('agn_num',$aid)->findAll();
   $array = ['first' => $data, 'second' => $dataI];
    return view('templates/Fetch_ingredient', $array);
   }else{
      return redirect()->back();
   }
 }
 public function Report(){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
   $anganvadi= new Report();
   $aid=session()->get('anganvadi_number');
        $data['anganvadi']=$anganvadi->where('agn_num', $aid)->findAll();
       
     return view('templates/Report', $data);
   }else{
      return redirect()->back();
   }
}

public function EditStock($rid = null){
   if (session()->get('isLoggedIn') && session()->get('usertype')==2){
   $anganvadi = new AnganvadiModel();
    $data['anganvadi']=$anganvadi->find($rid);
   return view('templates/EditStock', $data);
   }else{
   }
   }
   public function Edit_stocks($rid = null){
      if (session()->get('isLoggedIn') && session()->get('usertype')==2){
         $anganvadi = new AnganvadiModel();
       $stock=$this->request->getVar('stock');
       $gm=$stock*1000;
       $data=[
      'quantity'=>$gm
       ];
       $anganvadi->update($rid,$data);
      }
   } 


   public function read(){
      $anganvadi=new FoodModel();
      $date=$this->request->getPost('item');
      $newDate = date('l', strtotime($date));
  
         $where = "(day='$newDate' OR day='daily')AND (agn_num='20') AND (meal_time='Morning')";
         $data= $anganvadi->where($where)->first();
         $a=$data['malayalam'];
         $arr= "(day='$newDate' OR day='daily')AND (agn_num='20') AND (meal_time='Noon')";
         $data2= $anganvadi->where($arr)->first();
         $b=$data2['malayalam'];
         $array= "(day='$newDate' OR day='daily')AND (agn_num='20') AND (meal_time='Evening')";
         $data3= $anganvadi->where($array)->first();
         $c=$data3['malayalam'];
          $arrayd['data']=['fir'=>$a,'sec'=>$b,'thir'=>$c];
         return $this->response->setJSON($arrayd);
         
      }
   
//----------------------------
//Admin functions
public function Admin_Home(){
   if (session()->get('isLoggedIn')&&session()->get('usertype')==1){
         return view('templates/Admin_Home');
   }else{
      return redirect()->back();
   }
}

public function View_food(){
   if (session()->get('isLoggedIn')&&session()->get('usertype')==1){
   $anganvadi= new FoodModel();
        $data['anganvadi']=$anganvadi->findAll();
     
     return view('templates/View_food', $data);
   }else{
      return redirect()->back();
   }
}

public function View_stock(){
   if (session()->get('isLoggedIn')&&session()->get('usertype')==1){
   $anganvadi= new AnganvadiModel();
        $data['anganvadi']=$anganvadi->findAll();
     return view('templates/View_stock', $data);
   }else{
      return redirect()->back();
   }
}

public function View_User(){
   if (session()->get('isLoggedIn')&&session()->get('usertype')==1){
   $anganvadi= new UserModel();
   $array = ['status' =>1,'usertype'=>2];
        $data['anganvadi']=$anganvadi->where($array)->findAll();
     return view('templates/View_Users', $data);
   }else{
      return redirect()->back();
   }
}
public function Admin_Attendence(){
   if (session()->get('isLoggedIn')&&session()->get('usertype')==1){
   $anganvadi= new AttendenceModel();
        $data['anganvadi']=$anganvadi->findAll();
     return view('templates/Admin_Attendence', $data);
   }else{
      return redirect()->back();
   }
}
public function Admin_Ingredients(){
   if (session()->get('isLoggedIn')&&session()->get('usertype')==1){
   $anganvadi= new Ingredient_Model();
        $data['anganvadi']=$anganvadi->findAll();
   
     return view('templates/Admin_Ingredients', $data);
   }else{
      return redirect()->back();
   }
}
public function Approval()
       {
         if (session()->get('isLoggedIn') && session()->get('usertype')==1){
         $Anganvadi= new UserModel();
        $result['Anganvadi']=$Anganvadi->where('status',0)->findAll();
 
           return view('templates/Approval',$result);
         }
       }
       public function Decision($id = null){
         if (session()->get('isLoggedIn') && session()->get('usertype')==1){
         $anganvadi= new UserModel();
         $query = $anganvadi->get($id);
            foreach ($query->getResult() as $row){
               $b=$row->status;
            }
            $b=1;
           $data=['status'=>$b]; 
          
            $anganvadi->update($id,$data);
            return redirect()->back();
         }else{
            return redirect()->back();
         }
       }
       public function Reject($id = null){
         if (session()->get('isLoggedIn') && session()->get('usertype')==1){
        $Anganvadi= new UserModel();
        $Anganvadi->delete($id);
        return redirect()->back();
         }  else{
            return redirect()->back();
         }  
      }  
      public function Remove($id = null){
         if (session()->get('isLoggedIn') && session()->get('usertype')==1){
        $Anganvadi= new UserModel();
        $Anganvadi->delete($id);
        return redirect()->back();
         }  else{
            return redirect()->back();
         }  
      }  
//--------------------
public function UserLogin(){
   $session = session();
   $userModel = new UserModel();
   $email = $this->request->getVar('email');
   $password = $this->request->getVar('password');
   $data = $userModel->where('email', $email)->first();
   if($data){
       $pass = $data['password'];
      $authenticatePassword = password_verify($password,$pass);
       if($authenticatePassword){
           $ses_data = [
               'id' => $data['id'],
                'anganvadi_number'=>$data['anganvadi_number'],
               'password' => $data['password'],
               'email' => $data['email'],
               'usertype'=>$data['usertype'],
               'isLoggedIn' => TRUE
           ];
            $session->set($ses_data);
          $type=$data['usertype'];
            $status=$data['status'];
            if ($type==1) {
             return redirect()->to('Ahome');
            }
            if($type==2&&$status==1)
            return redirect()->to('Thome');
             else{
               $session->setFlashdata('msg', 'You are not a authorized user!');
               return redirect()->to('templates/login');
             }
       }else{
          $session->setFlashdata('msg', 'Password is incorrect.');
           return redirect()->to('templates/login');
       }
   }else{
       $session->setFlashdata('msg', 'Email does not exist.');
       return redirect()->to('templates/login');
   }
}
public function Logout()
{
    $session = session();
     $session->destroy();              
    return redirect()->to('templates/login');
}
}