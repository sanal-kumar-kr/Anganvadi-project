<?php
    include('header.php');
?>
<div class="container-fluid">    
    <div class="row content">
        <div class="animate form login_form col-xs-12">
          <section class="login_content">
            <table class="table">
              <tr>
                <th>Anganvadi number</th>
                <th>Teacher</th>
                <th>Email</th>
                <th>Contact</th>
              </tr>
              <?php
              foreach($data as $item) {
                ?>
                <tr>
                <td><?php echo $item->aganvadi_number ?></td>
                <td><?php echo $item->teacher_name ?></td>
                <td><?php echo $item->email ?></td>
                <td><?php echo $item->contact ?></td>
              </tr>
                <?php
              }
              ?>
            </table>
          </section>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>