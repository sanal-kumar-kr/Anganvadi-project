<?= $this->extend('templates/Teacher_Layout') ?>
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
                  <th>Item name in malayalam</th>
                  <th>day</th>
                  <th>Meal Time</th>
                  <!--<th>Serving_days</th>
                  <th>Serving_time</th>-->
                </tr>
                <?php
                $count = 0;
                 foreach($first['anganvadi'] as $item):
                   $count++;
                   ?>
                  <tr>
                  <td><?php echo $count ?></td>
                  <td><?php echo $item['name'] ?></td>
                  <td><?php echo $item['malayalam'] ?></td>
                  <td><?php echo $item['day'] ?></td>
                  <td><?php echo $item['meal_time'] ?></td>
                  <td>
                
                  <a href="<?= base_url('Fetch/'.$item['fid'])?>"><button class="btn btn-success btn-ingredients" data-fid="<?//php echo $item->fid ?>">Add Ingredient</button></a>

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
                

                  <form action="<?= base_url('Add_Food/')?>" method="post">
                 
                  
                    <input type="text" name="item" id="item" placeholder="Item name" required  id="go">
                   
                    <input type="text" name="malayalam" id="item" placeholder="Item name in malayalam" required id="go">
                    <select class="form-control" id="exampleInputEmail1" required  name="days" style="width:100px">
                        <option value="" selected disabled hidden>days</option>
                        <?php
                        foreach($second as $days):
                        ?>
                        <option value="<?= $days ?>"><?php echo $days ?></option>
                        <?php
                        endforeach;
                        ?>
                        </select>
                        <select class="form-control" id="exampleInputEmail1" required  name="event" style="width:140px">
                        <option value="" selected disabled hidden>Time</option>
                        <option value="Morning">Morning</option>
                        <option value="Noon">Noon</option>
                        <option value="Evening">Evening</option>
                        </select>
                    <input type="submit" value="Add Item">
                    <p id="one"></p>
                  </form>
               
                </div>
              </div>
            </div>
          </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<style>
  
</style>

<?= $this->endSection() ?>