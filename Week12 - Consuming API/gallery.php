<?php
require_once('authentication.php');
$page_title = null;
$page_title = 'Gallery';

require_once('header.php');



// connect to the database
require('db.php');

//get movie posters
$sql = "SELECT movie_id, title, photo FROM movies WHERE photo IS NOT NULL";
$cmd = $conn->prepare($sql);
$cmd->execute();
$movies = $cmd->fetchAll();

echo  '<h1>Movie Posters</h1><main class="container">' ;
foreach ($movies as $movie){
  echo '<div class="col-sm-3">
  <a href="movie.php?movie_id='.$movie['movie_id'].'" title="Movie Details">
    <img class="thumbnail" src="images/'.$movie['photo'].'" title="'.$movie['title'].'" />
  </a></div>';
}

//get book Posters
$sql = "SELECT book_id, title, photo FROM books WHERE photo IS NOT NULL";
$cmd = $conn->prepare($sql);
$cmd->execute();
$books = $cmd->fetchAll();

//echo  '<h1>Book Posters</h1>';
foreach ($books as $book){
  echo '<div class="col-sm-3">
  <a href="book.php?book_id='.$book['book_id'].'" title="Book Details">
    <img class="thumbnail" src="images/'.$book['photo'].'" title="'.$book['title'].'" />
  </a></div>';
}

echo  '</main>' ;
//disconnect
$conn = null;
?>
<?php require_once('footer.php');?>
