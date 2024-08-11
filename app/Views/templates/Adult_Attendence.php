
<?= $this->extend('templates/Teacher_Layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid text-center">    
    <div class="row content">
        <div class="animate form login_form col-xs-12 col-md-6 text-center">
          <section class="login_content">
            <form method="POST" action="<?= base_url('AdultCout')?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">Adult Attendence</label>
                    <input type="number" class="form-control"   required placeholder="Enter Attendence" name="Adult">
                </div>
                
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

<?= $this->endSection() ?>