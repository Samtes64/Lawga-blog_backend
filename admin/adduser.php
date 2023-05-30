
<?php
include 'component/header.php'
?>

    <section class="form_section">

        <div class="container form_section-container">
            <h2>Add User</h2>
            <div class="alert_message error">
                <p>This is an error message</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" placeholder="First Name">
                <input type="text" placeholder="Last Name">
                <select >
                    <option value="" disabled selected>Select user type</option>
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                    
                </select>
                <input type="text" placeholder="UserName">
                <input type="text" placeholder="Email">
                <input type="text" placeholder="Create Password">
                <input type="text" placeholder="Confirm Password">
                <div class="form_control">
                    <label for="avatar">Add picture</label>
                    <input type="file" id="avatar">
                </div>
                <button type="submit" class="btn">Add User</button>
            </form>
        </div>

    </section>



    <?php
 include '../components/footer.php'
 ?>