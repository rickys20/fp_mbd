<!DOCTYPE html>
<html>
<head>
    <title>New Category</title>
</head>

<body>
    <header>
        <h3>New Category</h3>
    </header>

    <form action="proses-new-category.php" method="POST">

        <fieldset>

        <p>
            <label for="nama">Category Name: </label>
            <input type="text" name="c_name" placeholder="Category Name" />
        </p>
        <p>
            <label for="nama">Description: </label>
            <input type="text" name="desc" placeholder="Description" />
        </p>
        <p>
            <label for="nama">Picture: </label>
            <input type="text" name="pict" placeholder="Picture" />
        </p>
        <p>
            <input type="submit" value="Tambah" name="Simpan" />
        </p>

        </fieldset>

    </form>

    </body>
</html>