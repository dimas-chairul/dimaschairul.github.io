<?php
include 'connect.php';

if (isset($_POST['update'])) {    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $categoryId = mysqli_real_escape_string($conn, $_POST['category_id']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $stock = mysqli_real_escape_string($conn, $_POST['stock']);


    $query = "UPDATE books SET title = '$title', category_id = '$categoryId', author = '$author', stock = '$stock' WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: list_books.php");
        exit;
    } else {
        echo "
        <script>
            alert('Failed to update book: " . mysqli_error($conn) . "');
            window.location='form_update_book.php?id=$id';
        </script>
        ";
        exit;
    }
}
?>