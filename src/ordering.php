<div>
    <span>Sort</span>
<form action="index.php?action=view&category=<?php echo $_GET['category'];?>" method="POST">
    <select name="order">
        <option value="name">Name</option>
        <option value="price">Price</option>     
    </select>
    <select name="ordering">
        <option value="ASC">Growing</option>
        <option value="DESC">Downing</option>     
    </select>
    
    <input type="submit" value="Sort"/>     
</form>
</div>    