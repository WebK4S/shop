        
            <form action="src/admin/addCategory.php" method="POST">
                <input type="text" name="catname" placeholder="Category name" required="required"> <br>
                <input type="submit" value="Add Category">
            </form>
            <?php
            
                if($_SESSION['cat_ok']){
                    echo 'Category added';
                    unset($_SESSION['cat_ok']);
                }
            ?>
       

