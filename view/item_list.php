<?php include('view/header.php');?>
<section id="list" class="list">
    <header class="list__row list__header">
        <h1>Items:</h1>

        <form action="." method="get" id="list__header__select" class="list__header__select">
            <input type="hidden" name="action" value="list_items">
            <select class="select-box" name="categoryID" required>
                <option value="0">View All</option>
                <?php foreach ($categories as $category) : ?>
                <?php if ($categoryID == $category['categoryID']) { ?>
                    <option value ="<?= $category['categoryID'] ?>" selected>
                <?php }  else { ?>
                    <option value ="<?= $category['categoryID'] ?>" selected>
                <?php } ?>
                    <?= $category['categoryName'] ?>
                    </option>
                    <?php endforeach ?>
            </select>
            <button class="add-button bold">Go</button>
        </form>
    </header>
    

    <?php if($items) { ?>
    <ul>
    <?php foreach ($items as $item) : ?>
        <li>
        <?= $item['title'] ?>
        <?= $item['description'] ?>
        <?= $item['categoryName'] ?>
        
        <div class="list__removeItem">
            <form action="." method="POST">
                <input type="hidden" name="action" value="delete_item">
                <input type="hidden" name="ItemNum" value="<?= $item['ItemNum']; ?>">
                <button type="submit" class="button delete_bttn">X</button>
            </form>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php } else { ?>
        <br>
        <?php if ($categoryID) { ?>
            <p>No Items Exist For This Category Yet.</p>
            
        }
    <?php } else { ?>
        <p> No Items Exist Yet.</p>

    <?php } ?>
<?php } ?>

<br>
</section>

<section class="form-sect" aria-label="New Item Input Section">
        <h2>Add Item:</h2>

            <form action="." method="post" id="add__form" class="add__form">
                <input type="hidden" name="action" value="add_item">
                <div class="add__inputs">
                <label>Category:</label>
                <select class="cat-select-box" name ="categoryID" required>
                    <option value="">Please Select</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['categoryID'];?>">
                        <?= $category['categoryName'];?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <label>Title:</label>
                <input type="text" name="title" maxlength="20" required>
                <label>Description:</label>
                <input type="text" name="description" maxlength="50" required>
            </div>
            <div class="add__item">
            <button class="button submit_bttn" type="submit" aria-label="submit a new item">Add Item</button>
            </div>
        </form>
</section>
<br>
<p><a href=".?action=list_categories">View/Edit Categories</a></p>




<?php include('view/footer.php');?>