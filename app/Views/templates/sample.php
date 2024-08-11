<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('click') ?>" method="post">
    quantity
    <input type="text" name="q">
    ingredient
    <input type="text" name="i">
    item
    <input type="number" name="it" value="<?= $anganvadi['fid'] ?>">
    <button type="submit">click</button>
    </form>
</body>
</html>