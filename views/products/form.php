<?php if(!empty($errors)) {?>
<div class="alert alert-danger">
    <?php foreach ($errors as $error){?>
      <div><?php echo $error ?></div>
    <?php } ?>
</div>
<?php } ?>

<form action="" method="post" enctype="multipart/form-data">
    <?php
    if($product['image']){?>
        <img class="update-product" src="/<?php echo $product['image'] ?>" alt="">
    <?php }
    ?>
<div class="mb-3">
  <label class="form-label">Product Image</label>
  <input type="file" class="form-control" name="image">
</div>

<div class="mb-3">
  <label class="form-label">Product Title</label>
  <input placeholder="<?php echo $product['title'] ?>"  type="text" class="form-control" name="title">
</div>

<div class="mb-3">
  <label class="form-label">Product Description</label>
  <textarea placeholder="<?php echo $product['description'] ?>"  class="form-control" name="description"></textarea>
</div>

<div class="mb-3">
  <label class="form-label">Product Price</label>
  <input placeholder="<?php echo $product['price'] ?>"  type="number" step=".01" name="price" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>