<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $delete_query = "DELETE FROM books WHERE id = $id";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: list_books.php");
    } else {
        echo "
        <script>
            alert('Failed to delete book'); 
            window.location='list_books.php';
        </script>";
        exit;
    }
}

mysqli_close($conn);
?>