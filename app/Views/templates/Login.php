<?= $this->extend('templates/home') ?>

<?= $this->section('content') ?>
<div class="container-fluid text-center">  
    <?php
    if(session()->getFlashdata('msg')):
    ?>
    <script>
        alert("<?= session()->getFlashdata('msg');?>");
    </script>  
    <?php
    endif;
    ?>
    <div class="row content">
        <div class="animate form login_form col-xs-12 col-md-6 text-center">
          <section class="login_content">
            <form method="POST" action="<?= base_url('UserLogin') ?>">
                <div class="form-group">
                    <label for="exampleInputEmail1">email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required name="password">
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