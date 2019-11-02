<?php
// CSC 337 Project Best Reads
//
// 1) Use a query parameter from AJAX to echo back an array of image urls. 
// To return an array to a JavaScript you need json_encode. Do not hard 
// code the array. This service should work if more folders are added.
//$urls = ["./books/2001spaceodessy", "./books/wizardofoz"];
//echo json_encode($urls);
// Output would be this (json_encode adds an escape character: \ before /
// [".\/books\/2001spaceodessy",".\/books\/wizardofoz"]


// 2) Use a different query parameter to echo back the html for one information
// page containing the book cover, title, author, ...
// File name: bestreads.css
if(isset($_GET['folder'])) {
    $info = file_get_contents($_GET['folder'].'/info.txt');
    $review = file_get_contents($_GET['folder'].'/review.txt');
    $description = file_get_contents($_GET['folder'].'/description.txt');
    $movieJson = array(
        "title" => explode("\n",$info)[0],
        "author" => explode("\n",$info)[1],
        "description" => $description,
        "writtenby" => explode("\n",$review)[0],
        "rating" => explode("\n",$review)[1],
        "review" => explode("\n",$review)[2]
    );
    echo json_encode($movieJson);
} else {
    $bookArray = glob ( './books/*' );
    // print_r($bookArray);
    echo json_encode ( $bookArray );
}
?>