<?= $this->extend('templates/Admin_Layout') ?>

<?= $this->section('content') ?>
<div class="container-fluid">    
    <div class="row content">
        <div class="animate form login_form col-xs-12">
          <section class="login_content">
            <div class="row">
              <div class="col-sm-12">

            </div>
</div>
            <div class="row">
              <table class="table">
                <tr>
                  <th>Anganvadi number</th>
                  <th>teacher name</th>
                  <th>email</th>
                  <th>contact</th>
                </tr>
                 <?php
                 foreach($anganvadi as $data):
                 ?>
                  <tr>
                  <td><?php  echo $data['anganvadi_number'] ?></td>
                  <td><?php  echo $data['teacher_name'] ?></td>
                  <td><?php  echo $data['email'] ?></td>
                  <td><?php  echo $data['contact'] ?></td>
                  <td><a href="<?= base_url('Remove/'.$data['id']) ?>"><button class="btn btn-success btn-ingredients" data-fid="<?//php echo $item->fid ?>">Remove</button></a>
                </tr>
                <?php
             endforeach;
                 ?>
              </table>
            </div>
            
          </section>
          <div class="modal" tabindex="-1" role="dialog" id="addModel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                 
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>