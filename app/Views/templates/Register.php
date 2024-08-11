<?= $this->extend('templates/home') ?>

<?= $this->section('content') ?>
<div class="container-fluid text-center">    
    <div class="row content">
        <div class="animate form login_form col-xs-12 col-md-6 text-center">
          <section class="login_content">
            <form method="POST" action="<?= base_url('RegisterUser')?>">
                <div class="form-group">
                    <label for="exampleInputAnganvadinumber">Anganvadi number</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" required placeholder="Anganvadi number" name="Anumber">
                </div>
                <div class="form-group">
                    <label for="exampleInputTeachername">Teacher name</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Teacher name" required name="Tname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmailaddress">Email address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required placeholder="Email address " name="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputContact">Contact</label>
                    <input type="text" class="form-control" id="exampleInputEmail1"  required placeholder="Contact " name="contact">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1"  required placeholder="Password " name="password">
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmpasword">Confirm pasword</label>
                    <input type="password" class="form-control" id="exampleInputEmail1"  required placeholder="Confirm pasword " name="confirmpassword">
                </div>
                
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
          </section>
        </div>
    </div>
</div>
<?= $this->endSection() ?> 