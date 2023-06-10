<?php
include 'component/header.php'
?>

    <section class="form_section">

        <div class="container form_section-container">
            <h2>Edit Category</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="title">
                

                
                
                <textarea  rows="10" placeholder="Description"></textarea>
                
               
                <button type="submit" class="btn">Update</button>
            </form>
        </div>

    </section>



    <?php
 include '../components/footer.php'
 ?>