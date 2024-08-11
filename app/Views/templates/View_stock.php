<?= $this->extend('templates/Admin_Layout') ?>

<?= $this->section('content') ?>
    

<div class="container-fluid">    
    <div class="row content">
        <div class="animate form login_form col-xs-12">
          <section class="login_content">
            <div class="row">
              <div class="col-sm-12">
              <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#addModel">
  Add new item
</button>
              </div>
            </div>
            <div class="row">
              <table class="table">
                <tr>
                  <th>Sl no</th>
                  <th>Item</th>
                  <th>Name in Malaylam</th>
                  <th>Unit</th>
                </tr>
                <?php
                $count = 0;
                foreach($anganvadi as $item):
                 $count++;
                   ?>
                  <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $item['item'] ?></td>
                  <td><?php echo $item['locale_title'] ?></td>
                  <td><?php echo $item['quantity'] ?><?php echo $item['unit'] ?></td>
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
                <div class="modal-body">
                  <form action="<?= base_url('Add_stock') ?>" method="post">
                    <div class="form-group">
                      <label for="title">Item Name</label>
                      <input type="text" name="title" class="form-control" id="title" placeholder="Enter Item Name">
                    </div>
                    <div class="form-group">
                      <label for="locale_title">Item Name In Malaylam</label>
                      <input type="text" name="locale_title" class="form-control" id="locale_title" placeholder="Enter Item Name In Malayalam">
                    </div>
                    <div class="form-group">
                      <label for="unit">Item Quantity</label>
                      
                     
                      <input type="text" name="unit" class="form-control" id="title" placeholder="Enter Quantity">
                       
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>   
</body>
</html>