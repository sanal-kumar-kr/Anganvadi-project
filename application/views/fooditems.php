<?php
    include('header.php');
?>
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
                  <th></th>
                  <!--<th>Serving_days</th>
                  <th>Serving_time</th>-->
                </tr>
                <?php
                if(isset($input)) {print_r($input);}
                $count = 0;
                foreach($data as $item) {
                  $count++;
                  ?>
                  <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $item->name ?></td>
                  <td><button class="btn btn-success btn-ingredients" data-fid="<?php echo $item->fid ?>">Ingredients</button></td>
                  <!-- <td><?php echo $item->unit ?></td>
                  <td><?php echo $item->unit ?></td>-->
                </tr>
                  <?php
                }
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
                  <form action="" method="post">
                    <label for="item">Item name</label>
                    <input type="text" name="item" id="item">
                    <input type="submit" value="Add Item">
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal" tabindex="-1" role="dialog" id="ing-modal">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Ingredients</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="ing-table-wrapper">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sl no</th>
                          <th>Ingredient</th>
                          <th>Qantity (per student)</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                    <button class="btn btn-success add-more-ing">Add new Ingredient</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>