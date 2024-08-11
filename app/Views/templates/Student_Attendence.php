
<?= $this->extend('templates/Teacher_Layout') ?>

<?= $this->section('content') ?> 

<script>
    <?php
if(session()->getFlashdata('status'))
    {?>
<script>
alert("<?= session()->getFlashdata('status'); ?>");
</script>
<?php
}
?>
</script>
<div class="container-fluid text-center">    
    <div class="row content">
        <div class="animate form login_form col-xs-12 col-md-6 text-center">
          <section class="login_content">
            <form method="POST" action="<?= base_url('Add_Attendence')?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Student Attendence</label>
                    <input type="number" class="form-control"   required placeholder="Enter Attendence" name="Student">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Adult</label>
                    <input type="number" class="form-control"   required placeholder="Enter Attendence" name="Adult">
                </div>
                <div class="form-group " id="i">
                    <label for="exampleInputEmail1">date</label>
                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>"  required placeholder="Enter Attendence" id="get" name="date">
                </div>
                <!-- <select class="form-control" id="exampleInputEmail1" required  name="days" style="width:100px">
                        <option value="" selected disabled hidden>days</option>
                     
                        // endforeach;
                        ?>
                </select> -->

        
                <label for="">Morning</label>
                <select class="form-control" name="fir" style="width:400px;">
                     
                        <?php
                       foreach($anganvadi as $item):
                        ?>
                        <option id="one"  value="<?= $item['malayalam']?>"><?php echo $item['malayalam'] ?></option>
                         <?php
                         endforeach;
                         ?>
                     </select>
                        
                <label for="">Noon</label>
                <select class="form-control"  name="sec"    style="width:400px;">
                        <!-- <option value="" ></option>   -->
                       
                        <!-- <option value="" id="two" selected disabled hidden></option> -->
                      
                          <?php
                       foreach($anganvadi as $item):
                        ?>
                         <option id="two" value="<?=  $item['malayalam']?>"><?php echo $item['malayalam'] ?></option>
                         <?php
                         endforeach;
                         ?>
                </select>
                <label for="">Evening</label>
                <select class="form-control"   name="thir" style="width:400px">
                        <!-- <option value="" selected disabled hidden id="three"></option>   -->
                       
                        <!-- <option value="" id="three" selected disabled hidden></option> -->
                       
                          <?php
                          
                       foreach($anganvadi as $item):
                        ?>
                       <option id="three"  value="<?=  $item['malayalam']?>"><?php echo $item['malayalam'] ?></option>
                         <?php
                         endforeach;
                         ?>
                </select>
                
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </section>
        </div>
    </div>
</div>
<script>
      $(document).ready(function(){
    var leng=$("#i").length;
       // debugger;
    var item=$("#get").val();

    if(leng>0){
   
    $.ajax({
        method:"post",
        url:"/ajax/read",
         data:{
         'item':item
         },
         success:function(response){
         $.each(response,function(key,item){
            debugger;
      var  a=item['fir'];
        $("select[name='fir']" ).find('option[value="'+ a +'"]').attr('selected','selected');
    
    //  l=$("#one").val(a);
     //  var g=$("#one").val();
        
        b=item['sec'];
      //  $('#two').text(b);
      $("select[name='sec']" ).find('option[value="'+ b +'"]').attr('selected','selected');
        // m=$('#two').val(b);
         c=item['thir']
        // alert(c);
        $("select[name='thir']" ).find('option[value="'+ c +'"]').attr('selected','selected');
       // $('#three').text(c);
       //  n=$('#three').val(c);
        
     });
     }
     //},
    //  error:function(err) {
    //   console.log(err);  
    //  }
      });
       $("#get").on('change',function(){
        var item=$("#get").val();
            $.ajax({
        method:"post",
        url:"/ajax/read",
         data:{
         'item':item
         },
         success:function(response){
         $.each(response,function(key,item){
            console.log(item);
        a=item['fir'];
        $("select[name='fir']" ).find('option[value="'+ a +'"]').attr('selected','selected');
     //   $("#one" ).text(a);
     // l=$("#one").val(a);
         b=item['sec'];
         $("select[name='sec']" ).find('option[value="'+ b +'"]').attr('selected','selected');
      //  $('#two').text(b);
       //  m=$('#two').val(b);
         c=item['thir'];
         $("select[name='thir']" ).find('option[value="'+ c +'"]').attr('selected','selected');
       // $('#three').text(c);
       //  n=$('#three').val(c);
         });
         }
     });
     
    
        });
    }
        });
   

</script>
<?= $this->endSection() ?>