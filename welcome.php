<?php
require 'config.php';
session_start();

if(!isset($_SESSION['sess_user'])){
    header('Location: index.php');
}

$email = $_SESSION['sess_user'];
$result = mysqli_query($conn, "select * from users where email = '$email'");
$row = mysqli_fetch_array($result);

$Fname = $row["first_name"];
$Lname = $row["last_name"];



if(isset($_POST["DELETE_ACCOUNT"])){
    echo '<script language="javascript">window.location = "http://localhost/lab8/delete.php";</script>';

}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>

<style>
body {
  margin: 0;
  height: 100%;
  font-family: sans-serif;
}
section {
  position: relative;
  display: grid;
  place-items: center;
  top: 0;
  left: 0;
  width: 100%;
  height: 100vh;
  background: radial-gradient(circle at bottom, #fff, #0000 80%),
    linear-gradient(to top, #7b93e8 0%, #0000 70%),
    linear-gradient(to bottom, #0000, rgba(255, 255, 255, 0.4) 70%), #7b93e8;
  -webkit-animation: bg 20s linear infinite;
  animation: bg 20s linear infinite;
  text-align: center;
  overflow: hidden;
}
/* changing colours */
@keyframes bg {
  0%,
  100% {
    background-color: #009ee0;
  } /* cyan */
  25% {
    background-color: #19b525;
  } /* verde */
  50% {
    background-color: #ffed00;
  } /* amarillo */
  75% {
    background-color: #e2007a;
  } /* magenta */
}
h1 {
  text-transform: capitalize;
  font-variant: small-caps;
  text-decoration: overline underline;

  text-shadow: 0 0 4px #fff;
  z-index: 2;
}
.header__bg {
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  position: absolute;
}
/* rotating SVG background */
.header__bg:after {
  content: "";
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 800 800'%3E%3Cdefs%3E%3Cfilter id='filtr' x='-.021' y='-.021' width='1.042' height='1.042' color-interpolation-filters='sRGB'%3E%3CfeFlood flood-color='rgb(158,236,254)' result='result9'/%3E%3CfeGaussianBlur in='SourceGraphic' result='result8' stdDeviation='7'/%3E%3CfeTurbulence baseFrequency='0.05' numOctaves='2' result='result7' type='fractalNoise'/%3E%3CfeColorMatrix result='result5' values='1 0 0 0 0 0 1 0 0 0 0 0 1 0 0 0 0 0 2 -0.75 '/%3E%3CfeComposite in='result8' in2='result7' operator='out' result='result6'/%3E%3CfeDisplacementMap in='result5' in2='result6' result='result4' scale='100'/%3E%3CfeComposite in='result8' in2='result4' k1='1' k3='0.5' operator='arithmetic' result='result2'/%3E%3CfeComposite in='SourceGraphic' in2='result2' operator='in' result='fSourceGraph'/%3E%3CfeMerge result='result10'%3E%3CfeMergeNode in='result9'/%3E%3CfeMergeNode in='fSourceGraph'/%3E%3C/feMerge%3E%3CfeComposite in2='SourceAlpha' operator='in' result='result11'/%3E%3C/filter%3E%3C/defs%3E%3Crect transform='matrix(1.0048 0 0 1.0048 .099807 .099807)' x='-4' y='-4' width='800' height='800' fill='LightCoral' filter='url(%23filtr)'/%3E%3Cg fill='none' stroke='%23606' stroke-width='1'%3E%3Cpath d='M769 229L1037 260.9M927 880L731 737 520 660 309 538 40 599 295 764 126.5 879.5 40 599-197 493 102 382-31 229 126.5 79.5-69-63'/%3E%3Cpath d='M-31 229L237 261 390 382 603 493 308.5 537.5 101.5 381.5M370 905L295 764'/%3E%3Cpath d='M520 660L578 842 731 737 840 599 603 493 520 660 295 764 309 538 390 382 539 269 769 229 577.5 41.5 370 105 295 -36 126.5 79.5 237 261 102 382 40 599 -69 737 127 880'/%3E%3Cpath d='M520-140L578.5 42.5 731-63M603 493L539 269 237 261 370 105M902 382L539 269M390 382L102 382'/%3E%3Cpath d='M-222 42L126.5 79.5 370 105 539 269 577.5 41.5 927 80 769 229 902 382 603 493 731 737M295-36L577.5 41.5M578 842L295 764M40-201L127 80M102 382L-261 269'/%3E%3C/g%3E%3Cg fill='%23808'%3E%3Ccircle cx='769' cy='229' r='5'/%3E%3Ccircle cx='539' cy='269' r='5'/%3E%3Ccircle cx='603' cy='493' r='5'/%3E%3Ccircle cx='731' cy='737' r='5'/%3E%3Ccircle cx='520' cy='660' r='5'/%3E%3Ccircle cx='309' cy='538' r='5'/%3E%3Ccircle cx='295' cy='764' r='5'/%3E%3Ccircle cx='40' cy='599' r='5'/%3E%3Ccircle cx='102' cy='382' r='5'/%3E%3Ccircle cx='127' cy='80' r='5'/%3E%3Ccircle cx='370' cy='105' r='5'/%3E%3Ccircle cx='578' cy='42' r='5'/%3E%3Ccircle cx='237' cy='261' r='5'/%3E%3Ccircle cx='390' cy='382' r='5'/%3E%3C/g%3E%3C/svg%3E");
  width: 800%;
  height: 800%;
  position: absolute;
  top: -400%;
  right: -400%;
  opacity: 0.3;
  animation-name: rotate;
  animation-duration: 180s;
  animation-iteration-count: infinite;
  animation-timing-function: cubic-bezier(0.5, 0.1, 0.25, 1);
}
@keyframes rotate {
  0% {
    transform: rotateZ(0deg);
  }
  100% {
    transform: rotateZ(360deg);
  }
}
/* scrolling SVG shapes */
.background-shapes {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 4000px;
  background-size: 100%;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='1600' height='800' viewBox='0 0 1600 800' %3E%3Cdefs%3E%3ClinearGradient id='a' x2='0' y1='1'%3E%3Cstop stop-color='%230FF' offset='0'/%3E%3Cstop stop-color='%23CF6' offset='1'/%3E%3C/linearGradient%3E%3ClinearGradient id='b' x2='0' y2='1'%3E%3Cstop stop-color='%23F00' offset='0'/%3E%3Cstop stop-color='%23FC0' offset='1'/%3E%3C/linearGradient%3E%3C/defs%3E%3Cg fill-opacity='0' stroke-miterlimit='10'%3E%3Cpath d='m1408.8 492 41.35-70 39.66 70z' stroke='url(%23a)' stroke-width='2'/%3E%3Ccircle cx='500' cy='100' r='40' stroke='url(%23a)' stroke-width='4'/%3E%3Cpath d='m400.73 622.9h-83.73c0-23.12 18.74-41.9 41.9-41.9s41.86 18.75 41.86 41.9z' stroke='url(%23a)' stroke-width='2'/%3E%3Cpath d='m150 273.49-31.543 44.8 31.543 44.8 31.543-44.8z' stroke='url(%23b)' stroke-width='4'/%3E%3Crect x='1029' y='639' width='100' height='100' stroke='url(%23b)' stroke-width='8'/%3E%3Cpath d='m1386.4 198.4-21.1 36.4h-42l-21-36.4 21-36.4h42z' stroke='url(%23b)' stroke-width='4'/%3E%3C/g%3E%3C/svg%3E");
  animation: 60s infiniteScroll linear infinite;
}
@keyframes infiniteScroll {
  0% {
    top: 0;
  }
  100% {
    top: -900px;
  }
}

main {
  top: 100vh;
  padding: 2em 2em 1em;
  background: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='500' height='500'%3E%3Cfilter id='noise' x='0' y='0'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3CfeBlend mode='screen'/%3E%3C/filter%3E%3Crect width='500' height='500' filter='url(%23noise)' opacity='0.5'/%3E%3C/svg%3E");
}

p.heading {
  margin-top: 200px;
}

p.top {
  margin-top: 20px;
  margin-bottom: 20px;
  font-size: 25px;
}

h1{
    font-size: 40px;
}

label{
    font-size: 17px;
}
input{
    font-size: 17px;
}

a{
    font-size: 25px;
}
</style>


<body>
    <center><p class = "heading">
    <h1> <?php echo "Hello ".$Fname.' '.$Lname; ?> </h1></p>
<br/>

<p class = "top">
<a href="profile.php"> Profile Details </a><br />
<p class = "top">
<a href="update.php"> Update Profile </a><br />
<p class = "top">
<a href="logout.php"> Log out </a>
<p class = "top">
<form method="post">
        <input type="submit" name="DELETE_ACCOUNT"
                class="button" value="DELETE ACCOUNT" />

    </form>
</p>
</center>
</body>
</html>
