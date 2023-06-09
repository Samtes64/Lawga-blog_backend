<?php
include 'component/header.php';
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //fetch the category from the database
    $query = "SELECT * FROM categories where id=$id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    }
} else {
    header('location: ' . ROOT_URL . 'admin/managecategory.php');
    die();
}
?>

<section class="form_section">

    <div class="container form_section-container">
        <h2>Edit Category</h2>
        
        <form action="<?=ROOT_URL?>admin/edit-category-logic.php" method="POST">
        <input type="hidden" name="id" value="<?=$category['id']?>" >

            <input type="text" name="title" value="<?=$category['title']?>" placeholder="title">




            <textarea rows="10" name="description" placeholder="Description"><?=$category['description']?></textarea>


            <button type="submit" name="submit" class="btn">Update</button>
        </form>
    </div>

</section>



<?php
include '../components/footer.php'
?>