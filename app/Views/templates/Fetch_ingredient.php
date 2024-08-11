
<?= $this->extend('templates/Teacher_Layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid text-center">    
    <div class="row content">
        <div class="animate form login_form col-xs-12 col-md-6 text-center">
          <section class="login_content">
            <form method="POST" action="<?= base_url('Add_ingredient') ?>">
                <div class="form-group">
                    <h1 for="exampleInputEmail1">Add ingredient</h1>
                    <input type="hidden" value="<?= $first['Anganvadi']['malayalam'] ?>" style="border:none" name="item">
                    <input type="hidden" value="<?= $first['Anganvadi']['day'] ?>" style="border:none" name="Day">
                    <input type="hidden" value="<?= $first['Anganvadi']['meal_time'] ?>" style="border:none" name="time">
                    <select class="form-control" id="exampleInputEmail1" required  name="Ingredients" >
                 <option value="" selected disabled hidden>Add ingredient</option>
                     <?php
                     foreach($second['anganvadi'] as $item):
                     ?>  
                        <option value="<?php echo $item['locale_title'] ?>"><?php echo $item['locale_title'] ?></option>
                        <?php
                        endforeach;
                        ?>
                </select>
                </div>
                <div class="form-group">
                     <input type="text" class="form-control" id="" placeholder="Quantity per Student" required name="Student">
                     <input type="text" class="form-control" id="" placeholder="Quantity per Adult" required name="Adult">
                     <select class="form-control" id="exampleInputEmail1" required  name="Unit">
                        <option value="" selected disabled hidden>unit</option>
                        <option value="ml">ml</option>
                        <option value="gm">gm</option>
                        <option value="Nos">Nos</option>
                        </select>
                    </div>
               
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
          </section>
        </div>
    </div>
</div>
<?= $this->endSection() ?>