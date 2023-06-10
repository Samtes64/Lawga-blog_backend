<?php
include 'component/header.php';

//get back form data if invalid
$title = $_SESSION['addcategory-data']['title'] ?? null;
$description = $_SESSION['addcategory-data']['description'] ?? null;

unset($_SESSION['addcategory-data']);
?>

    <section class="form_section">

        <div class="container form_section-container">
            <h2>Add Categroy</h2>
            <?php if(isset($_SESSION['addcategory'])) : ?>
                <div class="alert_message error">
                    <p>
                        <?=$_SESSION['addcategory']; 
                    unset($_SESSION['addcategory']);
                    ?>
                    </p>
                </div>

                <?php endif ?>
            <form action="<?=ROOT_URL?>admin/add-category-logic.php" method="POST">
                <input type="text" name="title" value="<?=$title?>" placeholder="title">
                              
                
                <textarea  rows="10" name="description"  placeholder="Description"><?=$description?></textarea>
               
                <button type="submit" name="submit" class="btn">Add</button>
            </form>
        </div>

    </section>


 <?php
 include '../components/footer.php'
 ?>