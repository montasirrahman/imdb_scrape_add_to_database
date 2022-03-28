
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<div class="width_all">
		<form action="insert.php" method="post">
		
		
		
<?php
include("asset/simple_html_dom.php");
 ?>		
		
		
		
		<?php
		// Show Data from database
		error_reporting(E_ERROR | E_WARNING | E_PARSE); 


		include 'db.php';
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT id, mo_tv_ep, imdb_id, title FROM imdb_all ORDER by id DESC limit 0,1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			$tt_imdb = $row["imdb_id"];
			echo $tt_imdb ;
		  }
		} else {
		  echo "0 results";
		}
		$conn->close();
		?>		
		
		
		
		
		
		
<?php		
		$plus1 =  substr($tt_imdb, 2, 20);
		
		$plus2 = 1;
		
		$sum_plus = $plus1 + $plus2;
		
		$tt2 = 'tt' . sprintf('%07d', $sum_plus);
		
		echo $tt2 ;
		
	
?>	

<?php
/*
$word01 = "title";
$mystring01 = "title, title, releaseinfo";
 
// Test if string contains the word 
if(strpos($mystring01, $word01) !== false){
    echo "not avalable";
} else{
    echo "show!";
}
*/
?>	
		
		
		
		
		
		
		
		
		
		
		
		

<?php 	

// tt1877830 tt5788792 tt11434042

//$tt = 'tt1160419';

$tt = $tt2; //tt1160419


$imdb = file_get_html($imdbUrl . '/' . $tt);

echo '<title>'.$imdb->find('h1.sc-b73cd867-0.eKrKux', 0)->plaintext.'</title>';

$allep = ''.$imdb->find('a.ipc-button.ipc-button--single-padding.ipc-button--center-align-content.ipc-button--default-height.ipc-button--core-baseAlt.ipc-button--theme-baseAlt.ipc-button--on-textPrimary.ipc-text-button.subnav__all-episodes-button.sc-2a366625-5.febJEF . div.ipc-button__text', 0)->plaintext.'';



	if (strlen($allep) > '2') {
  		echo $allep;
		
		
		
echo '
Episode 
<textarea id="text" cols="40" rows="1" name="mo_tv_ep" placeholder="" required>episode</textarea>

IMDB ID
<textarea id="text" cols="40" rows="1" name="imdb_id" placeholder="" required>'.$tt.'</textarea>

Ep
<textarea id="text" cols="40" rows="1" name="ep" placeholder="" required>'.$imdb->find('div.sc-96c24c5b-5.dcuCii . div.sc-2a366625-1.cHCfvp', 0)->plaintext.'</textarea>

';


$tv_id01 = substr(''.$imdb->find('a.ipc-button.ipc-button--single-padding.ipc-button--center-align-content.ipc-button--default-height.ipc-button--core-baseAlt.ipc-button--theme-baseAlt.ipc-button--on-textPrimary.ipc-text-button.subnav__all-episodes-button.sc-2a366625-5.febJEF', 0)->href.'', 7, 9);

echo 'Tv id :
<textarea id="text" cols="40" rows="1" name="tv_id" placeholder="" required>'.$tv_id01.'</textarea>



Title
<textarea id="text" cols="40" rows="1" name="title" placeholder="" required>'.$imdb->find('h1.sc-b73cd867-0.fbOhB', 0)->plaintext.''.$imdb->find('h1.sc-b73cd867-0.eKrKux', 0)->plaintext.''.$imdb->find('h1.sc-b73cd867-0.cAMrQp', 0)->plaintext.'</textarea>


Year
<textarea id="text" cols="40" rows="1" name="year_r" placeholder="" required>'.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.sc-52284603-0.blbaZJ.baseAlt . li.ipc-inline-list__item', 0)->plaintext.'</textarea>

Images URL:
<textarea id="text" cols="40" rows="1" name="image_url" placeholder="" >'.$imdb->find('div.ipc-media.ipc-media--poster-27x40.ipc-image-media-ratio--poster-27x40.ipc-media--baseAlt.ipc-media--poster-l.ipc-poster__poster-image.ipc-media__img . img.ipc-image', 0)->src.'</textarea>


Genres : 
<textarea id="text" cols="40" rows="1" name="genre" placeholder="" required>'.$imdb->find('span.ipc-chip__text', 0)->plaintext.', '.$imdb->find('span.ipc-chip__text', 1)->plaintext.', '.$imdb->find('span.ipc-chip__text', 2)->plaintext.'</textarea>


Plot(char190) : 
<textarea id="text" cols="40" rows="6" name="plot" placeholder="" >'.$imdb->find('span.sc-16ede01-0.fMPjMP', 0)->plaintext.'</textarea>

Rating : 
<textarea id="text" cols="40" rows="1" name="rating" placeholder="" >'.$imdb->find('span.sc-7ab21ed2-1.jGRxWM', 0)->plaintext.'</textarea>

Number of People :  
<textarea id="text" cols="40" rows="1" name="number_of_people" placeholder="" >'.$imdb->find('div.sc-7ab21ed2-3.dPVcnq', 0)->plaintext.'</textarea>

';

$director = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 0)->href.'';
$director2 = basename(parse_url($director, PHP_URL_PATH));

echo 'Director : 
<textarea id="text" cols="40" rows="1" name="director" placeholder="" required>'.$director2.'</textarea>
';

$writers01 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 1)->href.'';
$writers1 = basename(parse_url($writers01, PHP_URL_PATH));

echo 'Writers :
<textarea id="text" cols="40" rows="1" name="writers" placeholder="" required>'.$writers1.'</textarea>
';

$artists01  = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 0)->href.'';
$artists1 = basename(parse_url($artists01, PHP_URL_PATH));

$artists02 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 1)->href.'';
$artists2 = ', ' . basename(parse_url($artists02, PHP_URL_PATH));

$artists03 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 2)->href.'';
$artists3 = ', ' . basename(parse_url($artists03, PHP_URL_PATH));

$artists04 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 3)->href.'';
$artists4 = ', ' . basename(parse_url($artists04, PHP_URL_PATH));

$artists05 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 4)->href.'';
$artists5 = ', ' . basename(parse_url($artists05, PHP_URL_PATH));

$artists06 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 5)->href.'';
$artists6 = ', ' . basename(parse_url($artists06, PHP_URL_PATH));

$artists07 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 6)->href.'';
$artists7 = ', ' . basename(parse_url($artists07, PHP_URL_PATH));

$artists08 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 7)->href.'';
$artists8 = ', ' . basename(parse_url($artists08, PHP_URL_PATH));

$artists09 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 8)->href.'';
$artists9 = ', ' . basename(parse_url($artists09, PHP_URL_PATH));

$artists010 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 9)->href.'';
$artists10 = ', ' . basename(parse_url($artists010, PHP_URL_PATH));

$artists011 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 10)->href.'';
$artists11 = ', ' . basename(parse_url($artists011, PHP_URL_PATH));

$artists012 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 11)->href.'';
$artists12 = ', ' . basename(parse_url($artists012, PHP_URL_PATH));

$artists013 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 12)->href.'';
$artists13 = ', ' . basename(parse_url($artists013, PHP_URL_PATH));

$artists014 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 13)->href.'';
$artists14 = ', ' . basename(parse_url($artists014, PHP_URL_PATH));

$artists015 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 14)->href.'';
$artists15 = ', ' . basename(parse_url($artists015, PHP_URL_PATH));

$artists016 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 15)->href.'';
$artists16 = ', ' . basename(parse_url($artists016, PHP_URL_PATH));

$artists017 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 16)->href.'';
$artists17 = ', ' . basename(parse_url($artists017, PHP_URL_PATH));

$artists018 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 17)->href.'';
$artists18 = ', ' . basename(parse_url($artists018, PHP_URL_PATH));






echo 'Artists : 
<textarea id="text" cols="40" rows="1" name="artists" placeholder="" required>'.$artists1 . $artists2 . $artists3 . $artists4 . $artists5 . $artists6 . $artists7 . $artists8 . $artists9 . $artists10 . $artists11 . $artists12 . $artists13 . $artists14 . $artists15 . $artists16 . $artists17 . $artists18.'</textarea>
';
		
		
		
		
		
	} else {

		$movtv = ''.$imdb->find('span.sc-89e7233a-1.dWZpw.episode-guide-text', 0)->plaintext.'';

		if (strlen($movtv) < '2') {

//------------------------------------------------------------------------------Movie-------		
echo '
Movie 
<textarea id="text" cols="40" rows="1" name="mo_tv_ep" placeholder="" required>movie</textarea>

IMDB ID
<textarea id="text" cols="40" rows="1" name="imdb_id" placeholder="" required>'.$tt.'</textarea>
';

echo '

Title
<textarea id="text" cols="40" rows="1" name="title" placeholder="" required>'.$imdb->find('h1.sc-b73cd867-0.eKrKux', 0)->plaintext.''.$imdb->find('h1.sc-b73cd867-0.cAMrQp', 0)->plaintext.''.$imdb->find('h1.sc-b73cd867-0.fbOhB', 0)->plaintext.'</textarea>

Year
<textarea id="text" cols="40" rows="1" name="year_r" placeholder="" required>'.$imdb->find('span.sc-52284603-2.iTRONr', 0)->plaintext.'</textarea>



Images URL:
<textarea id="text" cols="40" rows="1" name="image_url" placeholder="" >'.$imdb->find('div.ipc-media.ipc-media--poster-27x40.ipc-image-media-ratio--poster-27x40.ipc-media--baseAlt.ipc-media--poster-l.ipc-poster__poster-image.ipc-media__img . img.ipc-image', 0)->src.'</textarea>


Genres : 
<textarea id="text" cols="40" rows="1" name="genre" placeholder="" required>'.$imdb->find('span.ipc-chip__text', 0)->plaintext.', '.$imdb->find('span.ipc-chip__text', 1)->plaintext.', '.$imdb->find('span.ipc-chip__text', 2)->plaintext.'</textarea>


Plot(char190) : 
<textarea id="text" cols="40" rows="6" name="plot" placeholder="" >'.$imdb->find('span.sc-16ede01-0.fMPjMP', 0)->plaintext.'</textarea>

Rating : 
<textarea id="text" cols="40" rows="1" name="rating" placeholder="" required>'.$imdb->find('span.sc-7ab21ed2-1.jGRxWM', 0)->plaintext.'</textarea>

Number of People :  
<textarea id="text" cols="40" rows="1" name="number_of_people" placeholder="" required>'.$imdb->find('div.sc-7ab21ed2-3.dPVcnq', 0)->plaintext.'</textarea>
';

echo '
Moviemeter or Popularity : 
<textarea id="text" cols="40" rows="1" name="moviemeter" placeholder="">'.$imdb->find('div.sc-edc76a2-1.gopMqI', 0)->plaintext.'</textarea>

';

//--------------------Director----------
$word0 = 'nm';
$mystring0 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 0)->href.'';
 
// Test if string contains the word 
if(strpos($mystring0, $word0) == false){
    echo "not available Director <br>";
} else{
    $director = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 0)->href.'';
	$director2 = basename(parse_url($director, PHP_URL_PATH));
	
	echo 'Director :
	<textarea id="text" cols="40" rows="1" name="director" placeholder="" required>'.$director2.'</textarea> 
	';
}

//------------------writer---------------

$word1 = 'nm';
$mystring1 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 1)->href.'';
 
// Test if string contains the word 
if(strpos($mystring1, $word1) == false){
    echo "not available Writer <br>";
} else{
	$writers01 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 1)->href.'';
	$writers1 = basename(parse_url($writers01, PHP_URL_PATH));

	$writers02 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 2)->href.'';
	$writers2 = ', ' . basename(parse_url($writers02, PHP_URL_PATH));

	$writers03 = ''.$imdb->find('ul.ipc-inline-list.ipc-inline-list--show-dividers.ipc-inline-list--inline.ipc-metadata-list-item__list-content.base . li.ipc-inline-list__item . a.ipc-metadata-list-item__list-content-item.ipc-metadata-list-item__list-content-item--link', 3)->href.'';
	$writers3 = ', ' . basename(parse_url($writers03, PHP_URL_PATH));

	echo 'Writers : 
	<textarea id="text" cols="40" rows="1" name="writers" placeholder="" required>'.$writers1 . $writers2 . $writers3.'</textarea>
	';
}


//--------------------Artist----------
$word2 = 'nm';
$mystring2 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 0)->href.'';
 
// Test if string contains the word 
if(strpos($mystring2, $word2) == false){
    echo "not available Artist <br>";
} else{
	$artists01  = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 0)->href.'';
	$artists1 = basename(parse_url($artists01, PHP_URL_PATH));

	$artists02 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 1)->href.'';
	$artists2 = ', ' . basename(parse_url($artists02, PHP_URL_PATH));

	$artists03 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 2)->href.'';
	$artists3 = ', ' . basename(parse_url($artists03, PHP_URL_PATH));

	$artists04 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 3)->href.'';
	$artists4 = ', ' . basename(parse_url($artists04, PHP_URL_PATH));

	$artists05 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 4)->href.'';
	$artists5 = ', ' . basename(parse_url($artists05, PHP_URL_PATH));

	$artists06 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 5)->href.'';
	$artists6 = ', ' . basename(parse_url($artists06, PHP_URL_PATH));

	$artists07 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 6)->href.'';
	$artists7 = ', ' . basename(parse_url($artists07, PHP_URL_PATH));

	$artists08 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 7)->href.'';
	$artists8 = ', ' . basename(parse_url($artists08, PHP_URL_PATH));

	$artists09 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 8)->href.'';
	$artists9 = ', ' . basename(parse_url($artists09, PHP_URL_PATH));

	$artists010 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 9)->href.'';
	$artists10 = ', ' . basename(parse_url($artists010, PHP_URL_PATH));

	$artists011 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 10)->href.'';
	$artists11 = ', ' . basename(parse_url($artists011, PHP_URL_PATH));

	$artists012 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 11)->href.'';
	$artists12 = ', ' . basename(parse_url($artists012, PHP_URL_PATH));

	$artists013 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 12)->href.'';
	$artists13 = ', ' . basename(parse_url($artists013, PHP_URL_PATH));

	$artists014 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 13)->href.'';
	$artists14 = ', ' . basename(parse_url($artists014, PHP_URL_PATH));

	$artists015 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 14)->href.'';
	$artists15 = ', ' . basename(parse_url($artists015, PHP_URL_PATH));

	$artists016 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 15)->href.'';
	$artists16 = ', ' . basename(parse_url($artists016, PHP_URL_PATH));

	$artists017 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 16)->href.'';
	$artists17 = ', ' . basename(parse_url($artists017, PHP_URL_PATH));

	$artists018 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 17)->href.'';
	$artists18 = ', ' . basename(parse_url($artists018, PHP_URL_PATH));




	echo 'Artists : 
	<textarea id="text" cols="40" rows="1" name="artists" placeholder="" required>'.$artists1 . $artists2 . $artists3 . $artists4 . $artists5 . $artists6 . $artists7 . $artists8 . $artists9 . $artists10 . $artists11 . $artists12 . $artists13 . $artists14 . $artists15 . $artists16 . $artists17 . $artists18.'</textarea>
	';

}




			  
		} else {
	
//----------------------------------------------------------------TV-Shows-----------------	

echo '
Tv-Shows
<textarea id="text" cols="40" rows="1" name="mo_tv_ep" placeholder="" required>tv-show</textarea>

IMDB ID
<textarea id="text" cols="40" rows="1" name="imdb_id" placeholder="" required>'.$tt.'</textarea>
	

Title
<textarea id="text" cols="40" rows="1" name="title" placeholder="" required>'.$imdb->find('h1.sc-b73cd867-0.fbOhB', 0)->plaintext.''.$imdb->find('h1.sc-b73cd867-0.eKrKux', 0)->plaintext.'</textarea>


Year
<textarea id="text" cols="40" rows="1" name="year_r" placeholder="" required>'.$imdb->find('span.sc-52284603-2.iTRONr', 0)->plaintext.'</textarea>

Images URL:
<textarea id="text" cols="40" rows="1" name="image_url" placeholder="" required>'.$imdb->find('div.ipc-media.ipc-media--poster-27x40.ipc-image-media-ratio--poster-27x40.ipc-media--baseAlt.ipc-media--poster-l.ipc-poster__poster-image.ipc-media__img . img.ipc-image', 0)->src.'</textarea>


Genres : 
<textarea id="text" cols="40" rows="1" name="genre" placeholder="" required>'.$imdb->find('span.ipc-chip__text', 0)->plaintext.', '.$imdb->find('span.ipc-chip__text', 1)->plaintext.', '.$imdb->find('span.ipc-chip__text', 2)->plaintext.'</textarea>


Plot(char190) : 
<textarea id="text" cols="40" rows="6" name="plot" placeholder="" required>'.$imdb->find('span.sc-16ede01-0.fMPjMP', 0)->plaintext.'</textarea>

Rating : 
<textarea id="text" cols="40" rows="1" name="rating" placeholder="" required>'.$imdb->find('span.sc-7ab21ed2-1.jGRxWM', 0)->plaintext.'</textarea>

Number of People :  
<textarea id="text" cols="40" rows="1" name="number_of_people" placeholder="" required>'.$imdb->find('div.sc-7ab21ed2-3.dPVcnq', 0)->plaintext.'</textarea>

Moviemeter or Popularity : 
<textarea id="text" cols="40" rows="1" name="moviemeter" placeholder="" required>'.$imdb->find('div.sc-edc76a2-1.gopMqI', 0)->plaintext.'</textarea>

';


$artists01  = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 0)->href.'';
$artists1 = basename(parse_url($artists01, PHP_URL_PATH));

$artists02 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 1)->href.'';
$artists2 = ', ' . basename(parse_url($artists02, PHP_URL_PATH));

$artists03 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 2)->href.'';
$artists3 = ', ' . basename(parse_url($artists03, PHP_URL_PATH));

$artists04 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 3)->href.'';
$artists4 = ', ' . basename(parse_url($artists04, PHP_URL_PATH));

$artists05 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 4)->href.'';
$artists5 = ', ' . basename(parse_url($artists05, PHP_URL_PATH));

$artists06 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 5)->href.'';
$artists6 = ', ' . basename(parse_url($artists06, PHP_URL_PATH));

$artists07 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 6)->href.'';
$artists7 = ', ' . basename(parse_url($artists07, PHP_URL_PATH));

$artists08 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 7)->href.'';
$artists8 = ', ' . basename(parse_url($artists08, PHP_URL_PATH));

$artists09 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 8)->href.'';
$artists9 = ', ' . basename(parse_url($artists09, PHP_URL_PATH));

$artists010 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 9)->href.'';
$artists10 = ', ' . basename(parse_url($artists010, PHP_URL_PATH));

$artists011 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 10)->href.'';
$artists11 = ', ' . basename(parse_url($artists011, PHP_URL_PATH));

$artists012 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 11)->href.'';
$artists12 = ', ' . basename(parse_url($artists012, PHP_URL_PATH));

$artists013 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 12)->href.'';
$artists13 = ', ' . basename(parse_url($artists013, PHP_URL_PATH));

$artists014 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 13)->href.'';
$artists14 = ', ' . basename(parse_url($artists014, PHP_URL_PATH));

$artists015 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 14)->href.'';
$artists15 = ', ' . basename(parse_url($artists015, PHP_URL_PATH));

$artists016 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 15)->href.'';
$artists16 = ', ' . basename(parse_url($artists016, PHP_URL_PATH));

$artists017 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 16)->href.'';
$artists17 = ', ' . basename(parse_url($artists017, PHP_URL_PATH));

$artists018 = ''.$imdb->find('a.sc-11eed019-2.sc-11eed019-3.duxWLP.fWdDzi.title-cast-item__char', 17)->href.'';
$artists18 = ', ' . basename(parse_url($artists018, PHP_URL_PATH));



echo 'Artists : 
<textarea id="text" cols="40" rows="1" name="artists" placeholder="" required>'.$artists1 . $artists2 . $artists3 . $artists4 . $artists5 . $artists6 . $artists7 . $artists8 . $artists9 . $artists10 . $artists11 . $artists12 . $artists13 . $artists14 . $artists15 . $artists16 . $artists17 . $artists18.'</textarea>
';
	
	
		}


	}

						
?>


 <script>
 function clickme_s() {
  console.log('You clicked me');
}
let intervalFunction;
let count = 0;
window.onload = function () {
  intervalFunction = setInterval(function () {
    if (typeof document.getElementsByClassName('btn-primary')[0] != "undefined") {
      document.getElementsByClassName('btn-primary')[0].click();
      count++;
      if (count === 1) {
        console.log("Now you have clicked me 1 times!! let me take a break")
        clearInterval(intervalFunction)
      }
    }
  }, 1);
}
</script>
<button type="submit" class="btn-primary" onclick="clickme_s()">Add Record</button>

				<br>
		</form>
		
	</div>
</body>
</html>

