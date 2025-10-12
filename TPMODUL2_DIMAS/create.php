<?php
include 'connect.php';

if (isset($_POST['create'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $categoryId = mysqli_real_escape_string($conn, $_POST['category_id']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);

    $query = "INSERT INTO books (title, category_id, author, stock) VALUES ('$title', '$categoryId', '$author', '$stock')";

    if (mysqli_query($conn, $query)) {
        header("Location: list_books.php");
        exit;
    } else {
        echo "
        <script>
            alert('Failed to add book: " . mysqli_error($conn) . "'); 
            window.location='list_books.php';
        </script>
        ";
        exit;
    }
}
?>