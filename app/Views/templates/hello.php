<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
        alert("<?= session()->getFlashdata('msg');?>");
    </script>  
    <table>
        <tr>
            <th>
                item
            </th>
        </tr>
        <?php 

  foreach($anganvadi as $item):
?>
        <tr>
            <td><?php echo $item['name'] ?></td>
            <td><a href="<?= base_url('getid/'.$item['fid']) ?>"><button>id</button></a></td>
        </tr>
    <?php
        endforeach;
        ?>
    </table>
</body>
</html>