
<?= $this->extend('templates/Admin_Layout') ?>

<?= $this->section('content') ?>
    



<div class="container-fluid">    
    <div class="row content">
        <div class="animate form login_form col-xs-12">
          <section class="login_content">
            <div class="row">
              <div class="col-sm-12">


            <div class="row">
              <table class="table">
                <tr>
                  <th>Sl no</th>
                  <th>Item</th>
                  <th>Item name in malayalam</th>
                  <th>day</th>
                </tr>
                <?php
                $count = 0;
                 foreach($anganvadi as $item):
                   $count++;
                   ?>
                  <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $item['name'] ?></td>
                  <td><?php echo $item['malayalam'] ?></td>
                  <td><?php echo $item['day'] ?></td>
                </tr>
                  <?php
               endforeach;
                ?>
              </table>
            </div>
          </section>
          </div>
        </div> 
       </div>
     </div>
    </div>
<?= $this->endSection() ?>