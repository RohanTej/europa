<?php
    $loc_html = $_POST['loc_html'];
    $loc = $_POST['loc'];
    $loc_html = str_replace(" ", "%20", $loc_html);

    //coords
    $api_coord_url = 'https://api.opencagedata.com/geocode/v1/json?q='.$loc_html.'&key=ccd52a44e4b54dc9b989669a9c374410';
    $location = json_decode(file_get_contents($api_coord_url));

    $lat = $location->results[0]->geometry->lat;
    $lng = $location->results[0]->geometry->lng;
    $coords = $lat . "," . $lng;

    //temp
    $api_url = 'https://api.darksky.net/forecast/061e391aef36dc5d6097acba9470befa/' . $coords;
    $forecast = json_decode(file_get_contents($api_url));
    
    //echo '<pre>';
    //print_r($api_url);
    //echo '</pre>';

    $jd = cal_to_jd(CAL_GREGORIAN,date("m"),date("d"),date("Y"));
    //echo (jddayofweek($jd,1));

    $temp_current = $forecast->currently->temperature;
    $temp_current = ($temp_current - 32)*(5/9);
    $temp_current = round($temp_current);
    $summary_current = $forecast->currently->icon;
    for ($i = 1; $i <= 7; $i++) {
        $day_i[$i] = $forecast->daily->data[$i]->icon;

        $day_h[$i] = ($forecast->daily->data[$i]->temperatureHigh);
        $day_h[$i] = ($day_h[$i] - 32)*(5/9);
        $day_h[$i] = round($day_h[$i]);

        $day_l[$i] = ($forecast->daily->data[$i]->temperatureLow);
        $day_l[$i] = ($day_l[$i] - 32)*(5/9);
        $day_l[$i] = round($day_l[$i]);
    }

    echo "<table class='table text-center'>
    <tr><td colspan='14'><h5>Current weather at $loc is</h5></td></tr>
    <tr><td colspan='14'><h1><img src='assets/weather_icons/$summary_current.png' width='150px' height='150px' align='middle'> $temp_current&deg;C</h1></td></tr>
    <tr>
        <td colspan='2'>" . jddayofweek($jd+1,1) . "</td>
        <td colspan='2'>" . jddayofweek($jd+2,1) . "</td>
        <td colspan='2'>" . jddayofweek($jd+3,1) . "</td>
        <td colspan='2'>" . jddayofweek($jd+4,1) . "</td>
        <td colspan='2'>" . jddayofweek($jd+5,1) . "</td>
        <td colspan='2'>" . jddayofweek($jd+6,1) . "</td>
        <td colspan='2'>" . jddayofweek($jd+7,1) . "</td>
    </tr>
    <tr>
        <td colspan='2'><img src='assets/weather_icons/" . $day_i[1] . ".png' width='50px' height='50px' align='middle'></td>
        <td colspan='2'><img src='assets/weather_icons/" . $day_i[2] . ".png' width='50px' height='50px' align='middle'></td>
        <td colspan='2'><img src='assets/weather_icons/" . $day_i[3] . ".png' width='50px' height='50px' align='middle'></td>
        <td colspan='2'><img src='assets/weather_icons/" . $day_i[4] . ".png' width='50px' height='50px' align='middle'></td>
        <td colspan='2'><img src='assets/weather_icons/" . $day_i[5] . ".png' width='50px' height='50px' align='middle'></td>
        <td colspan='2'><img src='assets/weather_icons/" . $day_i[6] . ".png' width='50px' height='50px' align='middle'></td>
        <td colspan='2'><img src='assets/weather_icons/" . $day_i[7] . ".png' width='50px' height='50px' align='middle'></td>
    </tr>
    <tr>
        <td class='text-right'><b>".$day_h[1]."&deg;C</b></td>
        <td class='text-left color'>".$day_l[1]."&deg;C</td>

        <td class='text-right'><b>".$day_h[2]."&deg;C</b></td>
        <td class='text-left color'>".$day_l[2]."&deg;C</td>

        <td class='text-right'><b>".$day_h[3]."&deg;C</b></td>
        <td class='text-left color'>".$day_l[3]."&deg;C</td>

        <td class='text-right'><b>".$day_h[4]."&deg;C</b></td>
        <td class='text-left color'>".$day_l[4]."&deg;C</td>

        <td class='text-right'><b>".$day_h[5]."&deg;C</b></td>
        <td class='text-left color'>".$day_l[5]."&deg;C</td>

        <td class='text-right'><b>".$day_h[6]."&deg;C</b></td>
        <td class='text-left color'>".$day_l[6]."&deg;C</td>

        <td class='text-right'><b>".$day_h[7]."&deg;C</b></td>
        <td class='text-left color'>".$day_l[7]."&deg;C</td>
    </tr>
</table>";

function curl_get_contents($url)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
?>