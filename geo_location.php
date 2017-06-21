<?php
function get_ip()
{
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
  $pos = strpos($ip, ',');
  $ip = substr($ip, 0, $pos);
  return $ip;
}
function get_city_by_ip($ip)
{
  $xml = simplexml_load_file('http://www.geoplugin.net/xml.gp?ip='.$ip);
  return $xml->geoplugin_city;
}
function city_is_valid($city)
{
  $xml = simplexml_load_file('https://maps.googleapis.com/maps/api/geocode/xml?address='.$city.'+MA&key=AIzaSyA5jfFNt41UavXYy7a7xY77WfqhqLX8pIE');
  $pos = strpos($xml->result->formatted_address, 'MA');
  if (is_numeric($city))
    return FALSE;
  else if ($pos > 0)
    return TRUE;
  return FALSE;
}
function get_weather_data($city)
{
  $year = date('Y');
  $month = date('m');
  $day = date('d');
  /*$xml = simplexml_load_file('http://api.wunderground.com/api/7d397a0bbfb6fc5b/history_'.$year.$month.$day.'/q/CA/'.$city.'.xml');
  $data = xml_parser_create();
  xml_parse_into_struct($data, $xml, $vals);
  xml_parser_free($data;)
  echo $vals;*/
}
?>