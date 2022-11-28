<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact us</title>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Cairo:wght@400;500;600;700&family=Lobster&family=Open+Sans:wght@400;700&family=Work+Sans:ital,wght@0,300;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link rel="stylesheet" href="Css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/bootstrap.min.css">
    <style>
        .container{
            background-color: transparent;
            position: initial;
        }
        .card{
            margin: 15px;
            width: 300px;
        }
        .z{
            position: relative;
            top: -550px;
            left: 120px;
        }
        }
    </style>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap");

    </style>
</head>
<body>

<div class="container z py-5">
    <div class="row mt-4">
<?php
try {
    $db = new mysqli('localhost','root','','sakanat');

}catch(PDOException $e){
    echo "Connection failed : ". $e->getMessage();
}
$sql="SELECT * FROM Home";
$query=mysqli_query($db,$sql);

if(mysqli_num_rows($query)>0)
{
    while ($rows=mysqli_fetch_assoc($query)){
        $home=$rows['hID'];
    ?>


<div class="col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="pic">
                <!--picture-->
                <?php
        $sql2="SELECT * FROM Home_img where HID='$home'";
        $query2=mysqli_query($db,$sql2);

        if(mysqli_num_rows($query2)>0)
        {
            $row=mysqli_fetch_assoc($query2);
            $photo=$row['imgPath'];
//                $photo=$rows['photo'];
            echo  '<img class="image" src="'.$photo.'">'; }?>
            </div>

            <div class="info">
                <!-- title + information-->
                <h3 style="font-size: 22px"><?php
                    echo $rows['Hcity'];
                    echo '<a href="viewHome.php?HomeId='.$rows['hID'].'"  class="btn btn-lg " style="text-decoration: none"><i class="fa-solid fa-angles-right"></i> </a><br>'; ?>
                </h3>
                <h4><?php echo $rows['street']; ?></h4>
                <p style="font-size: 16px"><?php echo $rows['description']; ?> </p>
                <p><?php echo '<a href="viewHome.php?property_id='.$rows['hID'].'"  class="btn btn-lg btn-primary btn-block" >View Property </a><br>'; ?></p><br>


            </div>
        </div>
    </div>
</div>
<?php
    }
}
?>
    </div>
</div>
</body>
</html>
