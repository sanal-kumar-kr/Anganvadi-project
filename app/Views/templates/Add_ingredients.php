<?= $this->extend('templates/Teacher_Layout') ?>
<?= $this->section('content') ?>
<div class="container-fluid text-center">    
    <div class="row content">
        <div class="animate form login_form col-xs-12 col-md-6 text-center">
          <section class="login_content">
            <form method="POST" action="<?= base_url('FetchAdd') ?>">
                <div class="form-group">
                    <h1 for="exampleInputEmail1">Add ingredient</h1>
                    <h1><input type="text" value="<?=  $anganvadi['name'] ?>" readonly style="border:none" name="items"></h1>
                    
                       
                </div>
                <div class="form-group">
                     <label for="Quantity">Ingredient</label>
                     <input type="text" class="form-control" id="" placeholder="Ingredient" required name="ingredient">
                   
                    </div>
               
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
          </section>
        </div>
    </div>
</div>
<?= $this->endSection() ?>