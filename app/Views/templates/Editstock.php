
<?= $this->extend('templates/Teacher_Layout') ?>

<?= $this->section('content') ?>

<div class="container-fluid text-center">    
    <div class="row content">
        <div class="animate form login_form col-xs-12 col-md-6 text-center">
          <section class="login_content">
            <form method="POST" action="<?= base_url('Edit_stocks/'. $anganvadi['rid'])?>">
                <div class="form-group">
                  <h1><?php echo $anganvadi['locale_title'] ?></h1>
                    <input type="text" class="form-control"  value="<?=$anganvadi['quantity']/1000 ?>" name="stock" required name="Adult">
                </div>
        
        
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
          </section>
        </div>
        </div>
</div>

<?= $this->endSection() ?>