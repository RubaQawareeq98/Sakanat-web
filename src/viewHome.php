<?php
include 'navbar.php';
isset($_SESSION["email"]);

$property_id=$_GET['property_id'];
if(isset($_POST['review'])) {
    $user= $_SESSION['user_id'];
    $rate=$_POST['rating'];
    $comment = $_POST['rev'];
    $sql3= "INSERT INTO `review`(`comment`, `rate`, `HID`,`userId`) VALUES ('$comment','$rate','$property_id','$user')";
    $query2 = mysqli_query($db, $sql3);
    if($db->query($sql3)===TRUE) {

    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="Css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Cairo:wght@400;500;600;700&family=Lobster&family=Open+Sans:wght@400;700&family=Work+Sans:ital,wght@0,300;0,800;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Css/all.min.css">
    <style>
        #mapid { height: 180px; }

        span{
            background-color: black;
        }
        .carousel-item{
            max-height: 400px;
        }
        .row{
            position: relative;
            top: 10px;
        }
        h3, h4{
            display: inline-block;
        }
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            width: fit-content;
        }

        .rating>input {
            display: none
        }

        .rating>label {
            position: relative;
            width: 1em;
            font-size: 30px;
            font-weight: 300;
            color: #FFD600;
            cursor: pointer
        }

        .rating>label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important
        }

        .rating>input:checked~label:before {
            opacity: 1
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4
        }
        .b{
            text-decoration: none;
            color: white;
            background-color: #1F5662;
            width: 100px;
            height: 40px;
            border-radius: 10px;
        }

        .bio-graph-heading {
            background: #1f5662;
            color: #fff;
            text-align: center;
            font-style: italic;
            padding: 20px 110px;
            border-radius: 4px 4px 0 0;
            -webkit-border-radius: 4px 4px 0 0;
            font-size: 16px;
            font-weight: 200;
        }
        .bio-graph-info {
            color: #000000;
        }
        .bio-graph-info h1 {
            font-size: 30px;
            font-weight: 400;
            margin: 0 0 20px;
        }
        .bio-row {
            width: 50%;
            float: left;
            margin-bottom: 10px;
            padding:0 15px;
        }
        .bio-row p span {
            color: #1F5662;
            font-weight: 600;
            width: 100px;
            display: inline-block;
            background-color: transparent;
        }

        body{
            font-family: 'Times New Roman', 'Times','serif';
        }
        .Book{
            display: flex;
            background-color: #1f5662;
            color: #f0f0f0;
            transform: translateX(1px) translateY(1px);
            box-shadow: black 7px 9px 0;
            border-radius: 10px;
            width: 150px;
            height: 50px;
            padding: 10px 25px;
        }
        .Book:hover{
            display: flex;
            background-color: black;
            color: #f0f0f0;
            transform: translateX(5px) translateY(5px);
            box-shadow: #1f5662 7px 9px 0;
            width: 150px;
            height: 50px;
            padding: 10px 25px;
        }

    </style>
</head>
<body>


<?php
global $d;
try {
    $db = new mysqli('localhost','root','','sakanatpro');

}catch(PDOException $e){
    echo "Connection failed : ". $e->getMessage();
}

$property_id=$_GET['property_id'];
$sql="SELECT * from Home where hID='$property_id'";
$query=mysqli_query($db,$sql);

if(mysqli_num_rows($query)>0)
{
    while($rows=mysqli_fetch_assoc($query)){
        $sql2="SELECT * FROM Home_img where HID='$property_id'";
        $query2=mysqli_query($db,$sql2)
        ;

        $rowcount=mysqli_num_rows($query2);
        ?>


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">


                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            for($i=1;$i<=$rowcount;$i++)
                            {
                                $row=mysqli_fetch_array($query2);
                                $photo=$row['imgPath'];
                                ?>

                                <?php
                                if($i==1)
                                {
                                    ?>
                                    <div class="carousel-item active">
                                        <img class="d-block w-100" alt="..."src="<?php echo $photo ?>">
                                    </div>
                                    <?php
                                }
                                else
                                {
                                    ?>
                                    <div class="carousel-item">
                                        <img class="d-block w-100" alt="..."src="<?php echo $photo ?>">
                                    </div>

                                    <?php
                                }
                            }
                            ?>

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
                <div class="col-sm-6" >
                    <div class="bio-graph-heading">
                        <h1>Room Details</h1>
                    </div>
                    <div class="profile-info col-md-12"style="background-color: #ddd;height: max-content; border-radius: 5px;border: 3px dotted #1F5662">
                        <div class="panel">

                            <div class="panel-body bio-graph-info" >

                                <div class="row" >
                                    <div class="bio-row">
                                        <p><span>Room Name </span>: <?php echo $rows['hName']; ?></p><!--Name come from database-->
                                    </div>
                                    <div class="bio-row">
                                        <p><span>For </span>: <?php echo $rows['gender']; ?></p><!--email come from database-->
                                    </div>
                                    <div class="bio-row">
                                        <p><span>City </span>: <?php echo $rows['city']; ?></p><!--Name come from database-->
                                    </div>

                                    <div class="bio-row">
                                        <p><span>Street</span>: <?php echo $rows['street']; ?></p><!--Birthdate come from database-->
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Contact </span>: <?php echo $rows['contact']; ?></p><!--mobile come from database-->
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Rate(R &#8725; M) </span>: <?php echo $rows['price']; ?></p><!--P.N come from database-->
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Description </span>: <?php echo $rows['description']; ?></p><!--City come from database-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php

                    if(isset($_SESSION["user_email"]) && !empty($_SESSION['user_email'])){

                    ?>
                    <form method="POST" action="book.php">
                        <div class="row">
                            <div class="col-sm-6">
                                <?php
                                $booked=$rows['booked'];
                                $_SESSION['pid']=$property_id;
                                if ($booked==0){ ?>
                                    <input type="hidden" name="property_id" value="<?php echo $rows['property_id']; ?>">
                                    <h3 style="font-size: 20px"><?php echo '<a style="text-decoration:none" class="Book" href="book.php?property_id='.$rows['hID'].'"  class="" >Book Now </a><br>'; ?></h3><br>

                                <?php } else { ?>
                                    <label style="width: max-content;font-size: 25px ; color: #ecb920; font-weight: 700" value="" disabled>Home Booked</label>
                                <?php } ?>
                            </div>
                    </form>
                    <!--                        <form method="POST" action="chatpage.php">-->
                    <!--                            <div class="col-sm-6">-->
                    <!--                                <input type="hidden" name="owner_id" value="--><?php //echo $rows['owner_id']; ?><!--">-->
                    <!--                            </div>-->
                    <!--                        </form>-->
                </div>

                <?php }
                else{
                    echo "<center><h3 style='position: relative;top: 20px;color: red'>You should login to book room.</h3></center>";
                }


                ?>
            </div>


        </div>

        </div>

        </div>
        <div>
            <h3 style="position: relative;left: 50px;top: 20px;margin-bottom: 30px">Home Features:</h3><br>
            <?php
            $sql="SELECT * from Home where hID='$property_id'";
            $query=mysqli_query($db,$sql);
            if(mysqli_num_rows($query)>0) {

                while ($rows = mysqli_fetch_assoc($query)) {
                    $sql2 = "SELECT fID FROM homefeatures where hID='$property_id'";
                    $query2 = mysqli_query($db, $sql2);
                    $rowcount=mysqli_num_rows($query2);
                    if (mysqli_num_rows($query2) > 0) {

                        while ($rows = mysqli_fetch_assoc($query2)) {
                            $fid=$rows['fID'];
                            $sql2 = "SELECT name FROM features where fID='$fid'";
                            $query3 =mysqli_query($db, $sql2);
                            $row = mysqli_fetch_array($query3);
                            ?>
                            <p style="margin-left: 50px;margin-bottom: 20px"><i class="fa-solid fa-check"></i> <?php  echo $row['name']; ?></p>

                            <?php
                        }

                    }
                }
            }

            ?>
        </div>
        <form method="post" style="position: relative;top: 20px;left:20px;width: fit-content;margin-bottom: 30px">
            <textarea name="rev" cols="40" placeholder="Write Your Comment"></textarea>
            <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
            </div>
            <button class="btn btn-success btn-lg" type="submit" name="review">Save</button>
        </form>
        <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1199&amp;height=400&amp;hl=en&amp;q=Nablus&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://formatjson.org/">format json</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:400px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:400px;}.gmap_iframe {height:400px!important;}</style></div>

        <br>


    <?php }}


?>
</div>

<?php

$sql1="SELECT * from review where HID='$property_id'";
$query=mysqli_query($db,$sql1);
echo '<div class="container-fluid">';
echo '<h3>Reviews:</h3>';
echo '</div>';
if(mysqli_num_rows($query)>0)

{
    while($row=mysqli_fetch_assoc($query)){
        ?>
        <div class="container-fluid">
            <ul><li><?php echo $row['comment']; ?> &nbsp;&nbsp;&nbsp;(<i style="color: green" class="fa-regular fa-star"></i><?php echo $row['rate']; ?></span>)</li></ul>
        </div>


        <?php
    }
}
?>
<br><br>

<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>


</body>
</html>
<script type="text/javascript">
    function initialize() {
        var x=document.getElementById("lat").innerText ;
        var y=document.getElementById("lon").innerText ;
        var latlng = new google.maps.LatLng(x,y);
        var map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 13
        });
        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            draggable: false,
            anchorPoint: new google.maps.Point(0, -29)
        });
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(marker, 'click', function() {
            var iwContent = '<div id="iw_container">' +
                '<div class="iw_title"><b>Location</b> : Noida</div></div>';
            // including content to the infowindow
            infowindow.setContent(iwContent);
            // opening the infowindow in the current map and at the current marker location
            infowindow.open(map, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style>
    h3 {
        font-size: 20px;
    }

    h4  {
        font-size: 20px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        text-align: left;
        padding: 1px;
    }
</style>

<style>
    .animated {
        -webkit-transition: height 0.2s;
        -moz-transition: height 0.2s;
        transition: height 0.2s;
    }

    .stars
    {
        margin: 20px 0;
        font-size: 24px;
        color: #d17581;
    }
</style>
