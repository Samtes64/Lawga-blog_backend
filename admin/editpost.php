<?php
include 'component/header.php'
?>

    <section class="form_section">

        <div class="container form_section-container">
            <h2>Edit Post</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="title">
                <select >
                    <option value="1" disabled selected>Select catagory</option>
                    <option value="1">Personal blog</option>
                    <option value="1">Lifestyle</option>
                    <option value="1">Technology</option>
                    <option value="1">Business</option>
                    <option value="1">Entertainment</option>
                    <option value="1">Politics</option>
                    <option value="1">Sports</option>
                    <option value="1">Art and culture</option>
                    <option value="1">Science</option>
                    <option value="1">Enviroment</option>
                </select>

                
                
                <textarea  rows="10" placeholder="Body"></textarea>
                <div class="form_control inline">
                    <input type="checkbox" id="is_featured" checked  >
                    <label for="is_featured" >Featured</label>
                </div>
                <div class="form_control">
                    <label for="thumbnail">Add Thumbnail</label>
                    <input type="file" id="thumbnail">
                </div>
                <button type="submit" class="btn">Update Post</button>
            </form>
        </div>

    </section>



    <?php
 include '../components/footer.php'
 ?>