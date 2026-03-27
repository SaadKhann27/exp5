<?php

include "db.php";

if(isset($_POST['search']))
{

$search = $_POST['search'];

$sql = "SELECT * FROM books WHERE title LIKE '%$search%'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0)
{

while($row = mysqli_fetch_assoc($result))
{

echo "<div class='book'>";
echo "<img src='images/".$row['image']."'>";
echo "<h3>".$row['title']."</h3>";
echo "<p>".$row['author']."</p>";
echo "</div>";

}

}
else
{
echo "<h3>No books found</h3>";
}

}

?>