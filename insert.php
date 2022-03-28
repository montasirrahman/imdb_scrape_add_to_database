
<?php
include 'db.php';
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$mo_tv_ep = mysqli_real_escape_string($conn, $_POST['mo_tv_ep']);
$imdb_id = mysqli_real_escape_string($conn, $_POST['imdb_id']);
$title = mysqli_real_escape_string($conn, $_POST['title']);

	$year_r = mysqli_real_escape_string($conn, $_POST['year_r']);
	$genre = mysqli_real_escape_string($conn, $_POST['genre']);
	$plot = mysqli_real_escape_string($conn, $_POST['plot']);
	$rating = mysqli_real_escape_string($conn, $_POST['rating']);
	$number_of_people = mysqli_real_escape_string($conn, $_POST['number_of_people']);
	$moviemeter = mysqli_real_escape_string($conn, $_POST['moviemeter']);
	$director = mysqli_real_escape_string($conn, $_POST['director']);
	$writers = mysqli_real_escape_string($conn, $_POST['writers']);
	$artists = mysqli_real_escape_string($conn, $_POST['artists']);
	$image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
	$image_url = mysqli_real_escape_string($conn, $_POST['image_url']);
	$ep = mysqli_real_escape_string($conn, $_POST['ep']);
	$tv_id = mysqli_real_escape_string($conn, $_POST['tv_id']);
	$youtube_t = mysqli_real_escape_string($conn, $_POST['youtube_t']);
 
// attempt insert query execution
$sql = "INSERT INTO imdb_all (mo_tv_ep, imdb_id, title, year_r, genre, plot, rating, number_of_people, moviemeter, director, writers, artists, image_url, ep, tv_id, youtube_t) VALUES ('$mo_tv_ep', '$imdb_id', '$title', '$year_r', '$genre', '$plot', '$rating', '$number_of_people', '$moviemeter', '$director', '$writers', '$artists', '$image_url', '$ep', '$tv_id', '$youtube_t')";
if(mysqli_query($conn, $sql)){
    echo 'Records added successfully.<meta http-equiv="refresh" content="0;url=add-record-form.php" />';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 
// close connection
mysqli_close($conn);
?>

