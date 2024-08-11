
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
                
                  
                  <th>Food item</th>
                  <th> Sl no</th>
                  <th>Raw Item</th>
                  <th>Quantity Per Student</th>
                  <th>Quantity Per Adult</th>
                  
                </tr>
                <tr>
                <?php
                
                $count = 0;
              foreach($anganvadi as $item):
                 $count++;
                   ?> 
                <tr> <td><?php echo $item['name'] ?></td>
                   <td><?php echo $count ?></td>
                  <td><?php  echo  $item['ingredient'] ?></td>
                  <td><?php echo $item['quantity'] ?><?php echo $item['unit'] ?></td>
                  <td><?php echo $item['Aquantity'] ?><?php echo $item['unit'] ?></td>
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
                  <h3 class="modal-title">Add new item</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
               
</div>
<?= $this->endSection() ?>