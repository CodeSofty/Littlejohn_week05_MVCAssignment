<?php include('view/header.php'); ?>

<?php if($categories) { ?>
    <section id="list" class="list">

    <header class="list__row list__header"> 
        <h1>Categories: </h1>
    </header>
    <ul> 
    <?php foreach ($categories as $category) : ?>
        <li>
            <?= $category['categoryName']?>

            <div class="list__removeCategory">
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_category">
                    <input type="hidden" name="categoryID" value="<?= $category['categoryID']?>">
                    <button class="button delete_bttn">X</button>
                </form>
            </div>
        </li>
    <?php endforeach; ?>
    </ul>
    </section>
    <?php } else { ?>

        <p>No categories exist yet.</p>

    <?php } ?>


    <section id="add" class="add">
        <h2>Add Category:</h2>
        <form action="." method="post" id="add__form" class="add__form">
            <input type="hidden" name="action" value="add_category">
            <div class="add__inputs">
                <label>Name:</label>
                <input type="text" name="categoryName" maxlength 50 autofocus required>
            </div>
            <div class="add__category">
                <button type="submit" class="add-button bold">Add Category</button>
            </div>
        </form>
    </section>
    <br>
    <p><a href=".">View/Add Items</a></p>




<?php include('view/footer.php') ?>