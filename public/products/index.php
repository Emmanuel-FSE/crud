<?php
/** @var $pdo \PDO */
require_once "../../database.php";

$search = $_GET['search'] ?? '';

if($search) {
  $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :title ORDER BY create_date DESC');
  $statement->bindValue(':title', "%$search%");
} else {
  $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
}

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<?php include_once "../../views/partials/header.php"; ?>
  <body>

  <h2>Products CRUD</h2>
  <p>
        <a href="create.php" class="btn btn-success">Create Product</a>
  </p>
  <?php
  if($search) {?>
    <a href="index.php" class="btn btn-danger">Clear Search</a>
  <?php }
  ?>

  <form class="searchForm" action="">
    <div class="input-group mb-3">
      <input type="text" class="form-control" placeholder="Search for products" name="search" value="<?php echo $search ?>">
      <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">Search</button>
      </div>
    </div>
  </form>


  <table class="table table-striped table-warning">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Create_date</th>
      <th scope="col">Description</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($products as $i => $product) { ?>
        <tr>
      <th scope="row"><?php echo $i + 1 ?></th>
      <td>
        <img class="thumb-image" src="/<?php echo $product['image'] ?>">
      </td>
      <td><?php echo $product['title'] ?></td>
      <td><?php echo $product['price'] ?></td>
      <td><?php echo $product['create_date'] ?></td>
      <td><?php echo $product['description'] ?></td>
      <td>
      <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-outline-primary">Edit</a>

      <form style="display: inline-block" method="post" action="delete.php">
        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
      <button type="submit" class="btn btn-outline-danger">Delete</button>
      </form>
      </td>
    </tr>
    <?php } 
    ?>
  </tbody>
</table>
  </body>
</html>