<form method="post" action="<?= $_SERVER['PHP_SELF']?>?action=create" enctype="multipart/form-data">
    <label>Title:
        <input type="text" name="title" required/>
    </label>
    <label>Content:
        <textarea name="content"></textarea>
    </label>
    <label>Image:
        <input type="file" name="image"/>
    </label>
    <input type="submit" value="create"/>
</form>