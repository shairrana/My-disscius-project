<div class="mb-3">
    <label for="category" class="form-label">Select Category</label>
    <select name="category" class="form-control">
        <option value="">Select</option>
        <?php
        include("./comanfile/connectiondb.php");
        $getoption = $conbd->prepare("SELECT * FROM category");
        $getoption->execute();
        $result = $getoption->fetchAll();
        foreach ($result as $row) {
            $CId = $row['id'];
            $category = $row['category'];

            echo "<option value='$CId'>$category</option>";
        }
        ?>
    </select>
</div>