


<?php
require_once '../database/connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $category_name = $_POST['category_name'];

    if (empty($category_name) ) {
        header('Location: createCategory.php');
    } else {
        $conn = get_connection();
        $sql = "INSERT INTO categories (category_name )
         values ('$category_name')";
        $result = mysqli_query($conn, $sql);
        header('Location: category.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Categoris</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <style>
        /* Optional: Add some custom styling */
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 500px;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center mb-4">Add Category</h1>
        <form action="createCategory.php" method="post">
          
            <div class="form-group">
                <label for="category_name">category:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-plus-circle mr-1"></i>Add
                    category</button>
                <a href="category.php" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i>Back to
                    category List</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
