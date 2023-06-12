<?php
include 'component/header.php';

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);


} else{
    header('location: ' . ROOT_URL . 'admin/index.php');
    die();
}

$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);


?>

<section class="form_section">

    <div class="container form_section-container">
        <h2>Edit Post</h2>
        <?php if (isset($_SESSION['addpost'])) : ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['addpost'];
                    unset($_SESSION['addpost']);
                    ?>
                </p>
            </div>

        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/edit-post-logic.php"  method="POST">
        <input type="hidden" name="id" value="<?=$id?>">
            <input type="text" name="title" value="<?=$post['title']?>" placeholder="title">
            <select name="category" value="">
                <option value="" disabled selected>Select catagory</option>
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>

                <?php endwhile ?>
            </select>



            <textarea rows="10" name="body" placeholder="Body"><?=$post['body']?></textarea>
            <?php if (($_SESSION['user_is_admin']) == true) : ?>
                <div class="form_control inline">
                    <input type="checkbox" value="1" name="is_featured" id="is_featured" >
                    <label for="is_featured">Featured</label>
                </div>
            <?php endif ?>
            
            <button type="submit" name="submit" class="btn">Update</button>
        </form>
    </div>

</section>


<?php
include '../components/footer.php'
?>