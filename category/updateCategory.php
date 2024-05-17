<?php
require_once '../database/connection.php';
if (!isset($_GET['id'])) {
    header('Location: category.php');
    exit();
}
$category_id = $_GET['id'];
// Fetch category details from the database
$conn = get_connection();
$query = "SELECT * FROM categories WHERE id='$category_id'";
$result = mysqli_query($conn, $query);
// Check if category exists
if (mysqli_num_rows($result) == 0) {
    header('Location: category.php');
    exit();
}
$category = mysqli_fetch_assoc($result);

// Update category name in the database get data from user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $category_name = $_POST['category_name'];
   
    if (!empty($category_name)) {
        // Update category name in the database
        $sql = "UPDATE `categories` SET category_name = '$category_name' WHERE id='$category_id'";
        $result = mysqli_query($conn, $sql);
        echo 33;

        if ($result) {
            // Redirect to category page after successful update
            header('Location: category.php');
            exit();
        }
    } else {
        // Redirect if category name is empty
        header('Location: updateCategory.php');
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update-Category</title>
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
        <h1 class="text-center mb-4">Update-Category</h1>
        <form action="updateCategory.php?id=<?php echo $category_id; ?>" method="post">

            <div class="form-group">
                <label for="category_name">category:</label>
                <input type="text" class="form-control" id="category_name" name="category_name"
                    value="<?php echo $category['category_name']; ?>">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary mr-2"><i
                        class="fas fa-plus-circle mr-1"></i>Update-Category
                </button>
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
