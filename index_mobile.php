<?php
require_once('geo_location.php');
$user_ip = get_ip();
$user_city = get_city_by_ip($user_ip);
if (!empty($_POST['change_loc']))
{
  $user_city = htmlspecialchars($_POST['change_loc']);
  if (city_is_valid($user_city))
    echo 'yay';
  else
    header('Location: error.php');
}
echo 'mobile';
?>

<!DOCTYPE html>
<html>
  <title>Snow Day Calculator</title>
  <head>
    <link rel = stylesheet href = 'styles-mobile.css' />
    <link rel="icon" type="image/png" href="SnowDayCalc.png" sizes="16x16">
  </head>
  <script src = 'scripts.js'></script>
  <body>
    <div class = main id = 'calc' align = center>
      <h1>Snow Day Calculator</h1>
      <br>
      <form id = 'calc_form' action = 'index_mobile.php' method = post>
        <?php
        echo '<h3 id = region>Your current location: '.$user_city.', MA</h3>';
        echo "<input type = hidden name = 'loc' value = ".$user_city."/>";
        ?>
        <input type = button value = 'Change Location' onclick = "hide('change', 0); hide('change_btn' , 0)"/>
        <br><br>
        <input type = submit value = 'Get Results'/>
        <br><br>
        <input style = 'visibility: hidden;' id = 'change' type = text placeholder = 'Input City' name = 'change_loc'/>
        <br><br>
        <input style = 'visibility: hidden;' id = 'change_btn' type = submit value = 'OK'/>
      </form>
      <div id = 'results'>
      </div>
    </div>
    <div class = hidden id = 'info' align = center>
      <h1>How It Works</h1>
    </div>         
    <div class = hidden id = 'ml' align = center>
      <h1>Machine Learning</h1>
    </div>
    <div class = hidden id = 'weather' align = center>
      <h1>Current Weather Conditions</h1>
      <?php
        echo "<iframe src = 'https://www.wunderground.com/cgi-bin/findweather/getForecast?query=".$user_city.", MA' width = 95% height = 80% style = 'border: none'></iframe>";
      ?>
      <a href = 'https://www.wunderground.com' style = 'text-decoration: none; color: white;'>Weather Underground</a>
    </div>
    <div id = 'nav'>
      <button class = active type = button onclick = "menuClick('calc', this);"><img src = 'SnowDayCalc.png' width = 64px height = 64px/></button>
      <button type = button onclick = "menuClick('info', this);"><img src = 'Info.png' width = 64px height = 64px/></button>
      <button type = button onclick = "menuClick('ml', this);"><img src = 'ML.png' width = 64px height = 64px/></button>
      <button type = button onclick = "menuClick('weather', this);"><img src = 'snowflake.png' width = 64px height = 64px/></button>
    </div>
  </body>
</html>
