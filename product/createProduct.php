<?php
require_once '../database/connection.php';

// Fetch categories from the database
$conn = get_connection();
$query = 'SELECT id, category_name FROM categories';
$result = mysqli_query($conn, $query);

// Store categories in an array
$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $category_id = $_POST['category_id'];

    if (empty($title) || empty($description) || empty($price) || empty($category_id)) {
        header('Location: createProduct.php');
    } else {
        $conn = get_connection();
        $sql = "INSERT INTO products (title , description , price ,image ,category_id)
         values ('$title', '$description', '$price','$image', '$category_id')";
        $result = mysqli_query($conn, $sql);
        header('Location: product.php');
    }
}

?>


<?php include 'layout/productheader.php'; ?>

<body>
    <div class="container">
        <h1 class="mb-4">Add Product</h1>
        <form action="createProduct.php" method="post">
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="price">Price ($):</label>
                <input type="number" class="form-control" id="price" name="price" min="1" step="1"
                    required>
            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                    <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>">
                        <?php echo $category['category_name']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="image">image :</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="description">description:</label>
                <textarea class="form-control" id="description" name="description" required style="resize:none;">
               </textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-plus-circle mr-1"></i>Add
                    Product</button>
                <a href="product.php" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i>Back to
                    Product List</a>
            </div>
        </form>
    </div>

    <?php include 'layout/productfooter.php'; ?>
