<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    foreach($event as $data):?> 

    <p><?= $data['title']?></p>

    <img src="<?=base_url()?>assets/images/<?=$data["gambar"]?>" alt="">

    <?php endforeach; ?>
</body>
</html>