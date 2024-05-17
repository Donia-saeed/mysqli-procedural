

<?php
require_once '../database/connection.php';
// Fetch categories from the database
$conn = get_connection();
$query = 'SELECT * FROM `categories`';
$result = mysqli_query($conn, $query);

// Store categories in an array
$categories = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categories[] = $row;
}

if (!isset($_GET['id'])) {
    header('Location: product.php');
    exit();
}
$product_id = $_GET['id'];
// Fetch product details from the database
$conn = get_connection();
$query = "SELECT * FROM products WHERE id='$product_id'";
$result = mysqli_query($conn, $query);
// Check if product exists
if (mysqli_num_rows($result) == 0) {
    header('Location: product.php');
    exit();
}
$product = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $description = $_POST['description'];
    $image = 'img1.jpg';

    
   
    if (!empty($title)) {
        // Update product name in the database
        $sql = "UPDATE `products` SET 

        title = '$title '
        ,price = '$price ',
        category_id = '$category_id ',
        description = '$description ',
        image = '$image '
         WHERE id='$product_id'";
        $result = mysqli_query($conn, $sql);
    

        if ($result) {
            // Redirect to product page after successful update
            header('Location: product.php');
            exit();
        }
    } else {
        // Redirect if product name is empty
        header('Location: updateProduct.php');
        exit();
    }
}

?>







<?php include 'layout/productheader.php';?>

<body>
    <div class="container">
        <h1 class="mb-4">update-Product</h1>
        <form action="updateProduct.php?id=<?php echo $product_id; ?>" method="post">
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" class="form-control" id="title" name="title"   value="<?php echo $product['title']; ?>"required>
            </div>
        

            <div class="form-group">
                <label for="price">Price ($):</label>
                <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" min="1" step="1"
                    required>
            </div>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" class="form-control" required>
                <option value="">Select Category</option>
                    <?php foreach ($categories as $category): ?>
                    <option  value="<?php echo $category['id']; ?>">
                        <?php echo $category['category_name']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">image :</label>
                <input type="file" class="form-control" id="image" name="image" value="<?php echo $product['image']; ?>" >
            </div>
            <div class="form-group">
                <label for="description">description:</label>
                <textarea class="form-control" id="description" name="description"  required style="resize:none;">
                <?php echo $product['description']; ?> </textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mr-2"><i class="fas fa-plus-circle mr-1"></i>update
                    Product</button>
                <a href="product.php" class="btn btn-secondary"><i class="fas fa-arrow-left mr-1"></i>Back to
                    Product List</a>
            </div>
        </form>
    </div>

    <?php include 'layout/productfooter.php';?>