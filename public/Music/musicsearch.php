<?php
  include 'musicdatabase.php'; // include db.php file for databse connectivity
  include 'musicfunction.php'; // include function.php file to use the function
 ?>
<html>
  <head>
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="music.css">
  </head>
  <body>
    <h1>Musics</h1>
    <h2>Old Hindi Songs</h2>
    <div class="container">
        <form action="" method="POST">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input type="text" name="keywords" placeholder="Search">
            <button type="submit" name="submit">Search</button>
        </form>
    </div>
 <div class="result">   
<?php
//capturing form values upon form submission
if(isset($_POST['submit']))
{
    // Purifying Keywords to avoid SQL injection and additional white spaces
    $keywords = mysqli_real_escape_string($connection,htmlentities(trim($_POST['keywords'])));
    $errors = array();
    if(empty($keywords))
    {
        $errors[] = "You did not enter any search term";
    }
    else
    {
        if(strlen($keywords)<4)
        {
            $errors[] = "Search term should be at least 4 characters long";
        }
        if(search_results($keywords)===false)
        {
            $errors[] = "Your search did not return any results";
        }
    }
    if(empty($errors))
    {
        //Calling function if there was no error in entered kewyords
        $results = search_results($keywords);
        $result_num = count($results);
        //Displaying returned results
        echo "Your search for <strong>". $keywords. "</strong> produced " . $result_num . "results<br  />";
        foreach($results as $result)
        {
            echo "<h4>" .$result['title'] . "</h4>";
            echo "<h5>" .$result['description'] . "</h5>";
            echo "<a href=\"" .$result['url'] . "\">" . $result['url'] . "</a>";
        }
    }
    else
    {
        // Display errors in case the entered keywords voilates validation rules
        foreach($errors as $error)
        {
            echo $error . "<br />";
        }
    }
}
?>
 </div>
</body>
</html>