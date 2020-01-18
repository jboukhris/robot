<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <link content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<div class="container">
    <div class="row">

            <?php foreach ($robots as $robot):?>
            <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="<?php echo url('images',$robot->link); ?>" alt="...">
                <div class="caption">
                    <h3><?php echo $robot->name ;?></h3>
                    <p><?php echo $robot->category->title;?></p>
                    <p><a href="#" class="btn btn-primary" role="button">Button</a></p>
                </div>
            </div>

        </div>
            <?php endforeach;?>
    </div>
</div>

</body>
</html>