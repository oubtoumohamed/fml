<?php 

function get_content($url){
	$res = file_get_contents($url);
	return json_decode($res, true);
}

$data = get_content(
    'http://iphone.hespress.com/hesport/json/menu/competitions'
);
    /*<!-- matches : list of matches -->
    <matches>
        <matche id="3143701" />
        <matche id="3143702" />
        <matche id="3143703" />
    </matches>*/
$ids = [];
$ii = 1;
foreach ($data['competitions'] as $comp) {
  $matches = get_content('http://iphone.hespress.com/hesport/json/matches?season='.$comp['id']);
  foreach ($matches['matches'] as $mtch) {
    //$ids[ $mtch['team_a']['id'] ] = $mtch['team_a']['id'];
    //$ids[ $mtch['team_b']['id'] ] = $mtch['team_b']['id'];
  $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?> \n
<matche xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:noNamespaceSchemaLocation=\"matche.xsd\"> \n";
    $xml .= "   <id>".$mtch['id']."</id> \n";
    $xml .= "   <competition_id>".$comp['id']."</competition_id> \n";
    $xml .= "   <date>".$mtch['date_utc']."</date> \n";
    $xml .= "   <time>".$mtch['time_utc']."</time> \n";
    $xml .= "   <status>".$mtch['status']."</status> \n";
    $xml .= "   <stadium></stadium> \n";
    $xml .= "   <winner>".$mtch['winner']."</winner> \n \n";
    $xml .= "   <team_a id=\"".$mtch['team_a']['id']."\" score=\"".$mtch['full_time_score_a']."\" /> \n";
    $xml .= "   <team_b id=\"".$mtch['team_b']['id']."\" score=\"".$mtch['full_time_score_b']."\" /> \n";
    $xml .= "</matche>";

  mkdir("data/matches/".$comp['id'], 0777);
  $mtchFile = fopen("data/matches/".$comp['id']."/matche-".$mtch['id'].".xml", "w") or die("Unable to open file!");
  chmod($mtchFile, 0777);
  fwrite($mtchFile, $xml);
  fclose($mtchFile);
  }
}

echo "string";
die();

foreach ($ids as $id_) {
  $team = get_content('http://iphone.hespress.com/hesport/json/team?id='.$id_);
  $team = $team['team'];
  $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?> \n
<team xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:noNamespaceSchemaLocation=\"team.xsd\"> \n";
    $xml .= "   <id>".$id_."</id> \n";
    $xml .= "   <name>".$team['infos']['الاسم الرسمي']."</name> \n";
    $xml .= "   <image>".$team['image']."</image> \n";
    $xml .= "   <country>".$team['infos']['الدولة']."</country> \n";
    $xml .= "   <adrese>".$team['infos']['عنوان']."</adrese> \n";
    $xml .= "   <website>".$team['infos']['الموقع الإلكتروني']."</website> \n";
    $xml .= "   <creation-date>".$team['infos']['تأسست']."</creation-date> \n";

    $players_xml = "";
    $coaches_xml = "";

    foreach ($team['squads'] as $key => $value) {
      $player = get_content('http://iphone.hespress.com/hesport/json/person?id='.$p['id']);
      $player = $player['person'];
      if( $key == 'المدرب' ){
        foreach ($value as $p) {
          $coaches_xml .= "     <coach id=\"".$p['id']."\" /> \n";
        }
      }
      else{
        foreach ($value as $p) {
          $players_xml .= "     <player id=\"".$p['id']."\" /> \n";
        }
      }

        $xml_player = "<?xml version=\"1.0\" encoding=\"UTF-8\"?> \n
<player xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" 
    xsi:noNamespaceSchemaLocation=\"player.xsd\"> \n";

        $xml_player .= "   <team_id>".$id_."</team_id> \n";
        $xml_player .= "   <id>".$player['id']."</id> \n";
        $xml_player .= "   <name>".$player['name']."</name> \n";
        $xml_player .= "   <image>".$player['image']."</image> \n";
        $xml_player .= "   <position>".$player['infos'][3]['value']."</position> \n";
        $xml_player .= "   <nationality>".$player['infos'][4]['value']."</nationality> \n";
        $xml_player .= "   <birth-day>".$player['infos'][5]['value']."</birth-day> \n";
        $xml_player .= "   <length  unit=\"cm\">".explode(' ', $player['infos'][7]['value'])[0]."</length> \n";
        $xml_player .= "   <weight  unit=\"kg\">".explode(' ', $player['infos'][8]['value'])[0]."</weight> \n";
        $xml_player .= "</player>";


      $pfile = fopen("data/players/player-".$player['id'].".xml", "w") or die("Unable : player!");
      chmod($pfile, 0777);
      fwrite($pfile, $xml_player);
      fclose($pfile);
    }

    $xml .= "   <players> \n";
    $xml .= $players_xml;
    $xml .= "   </players> \n";
    $xml .= "   <coaches> \n";
    $xml .= $coaches_xml;
    $xml .= "   </coaches> \n";
  $xml .= '</team>';


  //mkdir("data/teams/".$id_, 0777);
  $myfile = fopen("data/teams/team-".$id_.".xml", "w") or die("Unable to open file!");
  chmod($myfile, 0777);
  fwrite($myfile, $xml);
  fclose($myfile);
}



die;

require 'header.php';











 ?>

          <div class="col-md-4 right-side">
            @section('right-side')
              @include('frontend.right-side')
            @show
          </div>
          <div class="col-md-8 left-side">
            @section('left-side')
            @show
          </div>
<?php require 'footer.php'; ?>