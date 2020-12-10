<!DOCTYPE html>
<html>
<head>
	<title>Room Calculator...</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
	<div class="container">
<div class="jumbostron bg-danger text-green">
	
<form action="" method="POST">
	<label>Enter number of Persons (age greater than 13 years) :</label><br><input type="text" name="persons" placeholder="Enter number of Persons greater than 13 years old"><br><br>
	<label>Enter number of kids under 13 years old :</label><br><input type="text" name="k13" placeholder="Enter number of kids under 13 years old"><br><br><br><br>
	<label>Enter number of kids under 5 years old :</label><br>
	<input type="text" name="k5" placeholder="Enter number of kids under 5 years old"><br><br>
	<label>Enter rent for triple bed room:</label><br>
	<input type="text" name="rent_triple_bed_room"><br><br>
	<label>Enter rent for double bed room:</label><br>
	<input type="text" name="rent_double_bed_room"><br><br>
	<label>Enter rent for single bed room:</label><br>
	<input type="text" name="rent_single_bed_room"><br><br>
	<label>Enter rent for extra bed :</label><br>
	<input type="text" name="rent_extra_bed"><br><br>
    <input type="submit" name="submit" value="submit" class="btn btn-success">
</form>
</div>
</div>
</body>
</html>



<?php
if(isset($_POST['submit']))
{
 $persons = $_POST['persons'];
 $k13 = $_POST['k13'];
 $initial_k13 = $k13;

 $rent_triple_bed_room = $_POST['rent_triple_bed_room'];
 $rent_double_bed_room = $_POST['rent_double_bed_room'];
 $rent_single_bed_room = $_POST['rent_single_bed_room'];
 $rent_extra_bed = $_POST['rent_extra_bed'];

 echo $persons."Persons are available<br><br>" ;
 $triple_bed_rooms = intval($persons/3);
 echo $triple_bed_rooms."Triple Bed Rooms Required <br>";
 $rem = $persons%3;
 echo $rem."Persons remaining after triple bed rooms <br><br>";
 $k13 = $k13 - $triple_bed_rooms;
 $double_bed_rooms = intval($rem/2);
 echo $double_bed_rooms."Double Bed Rooms Required <br>";
 $rem = $rem%2 ;
 echo $rem."Persons remaining after Double bed rooms<br><br>";
 $k13 = $k13 - $double_bed_rooms;
 $single_bed_rooms = intval($rem);
 $k13 = $k13 - $single_bed_rooms;
 echo $single_bed_rooms."single_bed_rooms_required<br><br>";
 echo "kids under 13 remaining".$k13.'<br><br>';
 $kids_with_extra_bed = $initial_k13 - $k13 ;

 $rent1 = $triple_bed_rooms*$rent_triple_bed_room + $double_bed_rooms*$rent_double_bed_room + $single_bed_rooms*$rent_single_bed_room + $kids_with_extra_bed*$rent_extra_bed;


 if($k13>0)
  {
 	$remaining_kids = $k13;
 	$k13_triple_bed_rooms = intval($k13/4); //triple bed have one extra bed for kid
    $k13 = $k13 - 4*$k13_triple_bed_rooms ;   
 	$k13_double_bed_rooms = intval($k13/3);
 	$k13 = $k13 - 3*$k13_double_bed_rooms;
    $k13_single_bed_rooms = intval($k13/2);//charge of single_bed will apply .
    $k13 = $k13 - 3*$k13_single_bed_rooms;
    $k13_single_bed_room = intval($k13);
    $sum2 = 0;
    $rent2 = $k13_triple_bed_rooms * ($rent_triple_bed_room + $rent_extra_bed ) + $k13_double_bed_rooms * ($rent_double_bed_room + $rent_extra_bed ) + $k13_single_bed_rooms * ($rent_single_bed_room + $rent_extra_bed ) + $k13_single_bed_room  * ($rent_single_bed_room);
   }

 $sum1 = $triple_bed_rooms + $double_bed_rooms + $single_bed_rooms;
 $sum2 = $k13_triple_bed_rooms + $k13_double_bed_rooms + $k13_single_bed_rooms ;
 $sum = $sum1 + $sum2 ;
 echo "Total rooms required for persons(age greater than 13 years)".$sum1."<br><br>";
  echo "Total rooms required seperate for kids under 13 years old".$sum2."<br><br>";
 echo '<h1> Total rooms required</h1>'.$sum.'<br><br>';
 $total_triple_bed_rooms = $triple_bed_rooms + $k13_triple_bed_rooms;
 $total_double_bed_rooms = $double_bed_rooms + $k13_double_bed_rooms;
 $total_single_bed_rooms = $single_bed_rooms + $k13_single_bed_rooms;
 echo '<h2>Total triple bed rooms required:</h2>'.$total_triple_bed_rooms.'<br><br><br>';
 echo '<h2>Total double  bed rooms required:</h2>'.$total_double_bed_rooms.'<br><br><br>';
 echo '<h2>Total single bed rooms required:</h2>'.$total_single_bed_rooms.'<br><br>';
 $rent = $rent1 + $rent2;
 echo '<h2 color="red">Total rent in rupees is :</h2>'.$rent.'<br><br>';
 }
?>