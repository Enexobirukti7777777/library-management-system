<?php

// include("database.php");
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "books";
$conn ="";
$conn = mysqli_connect($db_server,$db_user,$db_pass, $db_name );
if($conn)
{
    echo"connected";

}else{
    echo"error";

}
$sql="SELECT * from book  WHERE 1";

$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)> 0){
   while( $row=mysqli_fetch_assoc($result)){
    echo $row["TITLE"]."<br>";
    echo $row["AUTHOR"]."<br>";
    echo $row["PUBLISHER"]."<br>";
    echo $row["ISBN"]."<br>";
    echo $row["number of copies"]."<br>";
}
}

else{
    echo"no result found";
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <link rel="stylesheet" href="as.css">
    
    <script src="as.js"></script>
</head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <title>LIBRARY MANAGMENT SYSTEM</title>
    <body>  
        <form action="<?php htmlspecialchars ($_SERVER["php_self"]);?>"method="post">

        <div class="wrapper">
    <div class="form-group">
        <lable for="title">Title</lable>

        <input type="text" class="form-control" id="title" required><br><br>
    
    </div>
    <div class="form-group">
        <lable for="author">Aouthor</lable>
        <input type="text" class="form-control" id="author" required><br><br>
    </div>
    <div class="form-group">
        <lable for="publisher">publisher</lable>
        <input type="text" class="form-control" id="publisher" required><br><br>
    </div>
    <div class="form-group">
        <lable for="isbn">international standard book number </lable>
        <input type="text" class="form-control" id="isbn" required><br><br>
    </div>
    <div class="form-group">
        <lable for="copies">number of copies</lable>
        <input type="text" class="form-control" id="copies"required><br><br>
        
    
    </div>
    <button type="button" class="btn btn-primary" onclick="addBook()">Add book</button>
    <button type="button" class="btn btn-primary" onclick="removeBook()">remove book</button><br>
</form>
<hr>
<form>
    <div class="form-group">
        <lable for="search">search </lable>
        <input type="text" class="form-control" id="search" onkeyup="searchBook()">
        </div>
    </form>
        </div>
        
    <table class="table">
        <thread>
            <tr>
                <th>Title</th><br><br><br><br>
                <th>AUTHOR</th><br>
                <th>publisher</th><br>
                <th>isbn</th><br>
                <th>copies Available</th>
                
            </tr>

        </thread>
        <tbody id="bookList"></tbody>
    </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="as.js"></script>
    


     
</body>
</html>
<?php
if($_SERVER["REQUEST_METHOD "]='POST'){
    $title=filter_input(INPUT_POST,"TITLE",FILTER_SANITIZE_SPECIAL_CHARS);
    $author=filter_input(INPUT_POST,"AUTHOR",FILTER_SANITIZE_SPECIAL_CHARS);
    $publisher=filter_input(INPUT_POST,"PUBLISHER",FILTER_SANITIZE_SPECIAL_CHARS);
    $isbn=filter_input(INPUT_POST,"ISBN",FILTER_SANITIZE_SPECIAL_CHARS);
    $numberofcopies=filter_input(INPUT_POST,"number of copies",FILTER_SANITIZE_SPECIAL_CHARS);
    if(empty($title)){
        echo"please enter title";

    }
    elseif(empty($author)){
        echo"please enter author";

    }
    elseif(empty($publisher)){
        echo"please enter publisher";
}
elseif(empty($isbn)){
    echo"please enter isbn";
}
elseif(empty($numberofcopies)){
    echo"please enter numberofcopies";
}

}
// mysqli_close($conn);

?>