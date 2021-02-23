<?php

class tbl_location{
     public $id;
     public $name;
     public $distance;
     public $isavailable;
  
     
function __construct()
{
$dbcon = new Dbcon();
$this->conn = $dbcon->conn;


}
     
function ced_getDropdown()
{

try {

$sql = "SELECT `name`, `distance` FROM `tbl_location` WHERE `is_available`='1'";

$res = $this->conn->query($sql);

//print_r($res->fetch_assoc());
if ($res->num_rows > 0) {
$i = 0;
while ($row = $res->fetch_assoc()) {
$this->arraysloc[$i] = $row;
++$i;
}
return $this->arraysloc;
} else {

return 0;
}
} catch (Exception $e) {
return $e;
}
}



function calculateFare($pickUp, $drop, $cabType, $luggage)
{

$distancefare = 0;
$luggagefare = 0;
$pickUplocation = "";
$droplocation = "";


switch ($cabType) {

case 'CedMicro': {

static $cedmicroAmount = 50;


$distance = $pickUp - $drop;

$totalDistance = ($distance > 0) ? ($pickUp - $drop) : ($pickUp - $drop) * -1;

if ($totalDistance < 160) {

if ($totalDistance >= 100) {
$distancefare += 735 + (($totalDistance - 60) * 8.50);
} else if ($totalDistance >= 50) {
$distancefare += 135 + (($totalDistance - 10) * 8.50);
} else if ($totalDistance >= 10) {
$distancefare += 135 + (($totalDistance - 10) * 8.50);
}
} else {
$distancefare += 1755;
$distancefare += (($totalDistance - 160) * 8.50);
}



$totalfare = $cedmicroAmount + $distancefare;
}
break;
case 'CedMini': {
static $cedminiAmount = 150;


$distance = $pickUp - $drop;

$totalDistance = ($distance > 0) ? ($pickUp - $drop) : ($pickUp - $drop) * -1;

if ($totalDistance < 160) {

if ($totalDistance >= 100) {
$distancefare += 795 + (($totalDistance - 60) * 9.50);
} else if ($totalDistance >= 50) {
$distancefare += 145 + (($totalDistance - 10) * 9.50);
} else if ($totalDistance >= 10) {
$distancefare += 145 + (($totalDistance - 10) * 9.50);
}
} else {
$distancefare += 1120;
$distancefare += (($totalDistance - 160) * 9.50);
}

if ($luggage <= 10) {
$luggagefare += 100;
} else if ($luggage > 10 && $luggage <= 20) {
$luggagefare += 200;
} else {
$luggagefare += 400;
}



$totalfare = $cedminiAmount + $luggagefare + $distancefare;
}
break;
case 'CedRoyal': {
static $cedroyalAmount = 200;


$distance = $pickUp - $drop;

$totalDistance = ($distance > 0) ? ($pickUp - $drop) : ($pickUp - $drop) * -1;

if ($totalDistance < 160) {

if ($totalDistance >= 100) {
$distancefare += 855 + (($totalDistance - 60) * 10.50);
} else if ($totalDistance >= 50) {
$distancefare += 155 + (($totalDistance - 10) * 10.50);
} else if ($totalDistance >= 10) {
$distancefare += 155 + (($totalDistance - 10) * 10.50);
}
} else {
$distancefare += 1220;
$distancefare += (($totalDistance - 160) * 10.50);
}

if ($luggage <= 10) {
$luggagefare += 50;
} else if ($luggage > 10 && $luggage <= 20) {
$luggagefare += 100;
} else {
$luggagefare += 200;
}



$totalfare = $cedroyalAmount + $luggagefare + $distancefare;
}
break;
case 'CedSUV': {
static $cedsuvAmount = 250;

$distance = $pickUp - $drop;

$totalDistance = ($distance > 0) ? ($pickUp - $drop) : ($pickUp - $drop) * -1;

if ($totalDistance < 160) {

if ($totalDistance >= 100) {
$distancefare += 915 + (($totalDistance - 60) * 11.50);
} else if ($totalDistance >= 50) {
$distancefare += 165 + (($totalDistance - 10) * 11.50);
} else if ($totalDistance >= 10) {
$distancefare += 165 + (($totalDistance - 10) * 11.50);
}
} else {
$distancefare += 1320;
$distancefare += (($totalDistance - 160) * 11.50);
}

if ($luggage <= 10) {
$luggagefare += 50;
} else if ($luggage > 10 && $luggage <= 20) {
$luggagefare +=100 ;
} else {
$luggagefare +=200 ;
}



$totalfare = $cedsuvAmount + $luggagefare + $distancefare;
}
break;
default:
echo "Something Went Wrong !!";
}


$sql = "SELECT `name`, `distance` FROM `tbl_location` WHERE `is_available`='1' AND `distance` IN ('$pickUp','$drop')";

$res = $this->conn->query($sql);

//print_r($res->fetch_assoc());
if ($res->num_rows > 0) {
$i = 0;
while ($row = $res->fetch_assoc()) {
$this->arraysloc[$i] = $row;
++$i;
}

if ($this->arraysloc[0]['distance'] == $pickUp) {
$fromLocation = $this->arraysloc[0]['name'];
}

if ($this->arraysloc[1]['distance'] == $drop) {
$toLocation = $this->arraysloc[1]['name'];
}



return array('totalfare' =>$totalfare,'totaldistance' =>$totalDistance,'fromLocation'=>$fromLocation,'toLocation'=>$toLocation);
} else {
  return 0;
}
}
}