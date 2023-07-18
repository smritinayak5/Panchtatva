<?php
  include 'musicdatabase.php';
  function search_results($keywords){
    global $connection;
    //This array will hold and return the searched results
    $returned_results = array();
    // This where variable will be used to build dynamic where clause in query
    $where ="";
    // It will store the searched keywords in an array
    $keywords = preg_split("/[\s]+/",$keywords);
    //It will count total Keywords
    $total_keywords = count($keywords);
    foreach($keywords as $key =>$keyword){
        $where .= "keywords LIKE '%$keyword%'";
        if($key != $total_keywords-1){
          $where .= " AND ";
        }
    }
    $query ="SELECT title,description,url FROM articles WHERE $where ";
    $result = mysqli_query($connection,$query);
    $result_num="";
    if($result){
    $result_num =  mysqli_num_rows($result);
      }else{
      $result_num= 0;
  }
  if($result_num===0){
    return false;
  }else{
      while($result_row = mysqli_fetch_assoc($result)){
        $returned_results [] = array(
            'title' => $result_row['title'],
            'description' => $result_row['description'],
            'url' => $result_row['url'],
        );
      }
    return $returned_results;
  }
  }
?>