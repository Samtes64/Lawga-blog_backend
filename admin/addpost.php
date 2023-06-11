<?php
include 'component/header.php';

$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);
?>

<section class="form_section">

    <div class="container form_section-container">
        <h2>Add Post</h2>
        <?php if (isset($_SESSION['addpost'])) : ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['addpost'];
                    unset($_SESSION['addpost']);
                    ?>
                </p>
            </div>

        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" placeholder="title">
            <select name="category">
                <option value="" disabled selected>Select catagory</option>
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>

                <?php endwhile ?>
            </select>



            <textarea rows="10" name="body" placeholder="Body"></textarea>
            <?php if (($_SESSION['user_is_admin']) == true) : ?>
                <div class="form_control inline">
                    <input type="checkbox" value="1" name="is_featured" id="is_featured" checked>
                    <label for="is_featured">Featured</label>
                </div>
            <?php endif ?>
            <div class="form_control">
                <label for="thumbnail">Add Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Post</button>
        </form>
    </div>

</section>


<?php
include '../components/footer.php'
?>