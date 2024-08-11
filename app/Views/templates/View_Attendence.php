<?= $this->extend('templates/Teacher_Layout') ?>

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
                  <th>Number of Adults</th>
                  <th>Number of Students</th>
                  <th>Date</th>
                  <th>Day</th>
                </tr>
                <?php
                $count = 0;
                 foreach($anganvadi as $item):
                   $count++;
                   ?>
                  <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $item['Adult'] ?></td>
                  <td><?php echo $item['Student'] ?></td>
                  <td><?php echo $item['date'] ?></td>
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