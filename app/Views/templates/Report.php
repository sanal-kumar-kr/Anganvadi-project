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
                <th>Month</th>
                  <th>Item</th>
                  <th>Quantity Used</th>
                  <th>Balance</th>
                </tr>
                <?php
                $count = 0;
                 foreach($anganvadi as $item):
                   ?>
                  <tr>
                  <td><?php echo $item['month']?></td>
                  <td><?php echo $item['item'] ?></td>
                 
                  <td><?php echo $item['qty']///1000  ?><?php //echo $item['unit']?></td>
                  <td><?php echo $item['balance'] ?></td>
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