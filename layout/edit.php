<?php if (!empty($news)): ?>
    <form method="post" action="<?= $_SERVER['PHP_SELF']?>?action=save" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $news['id'] ?>"/>
        <label>Title:
            <input type="text" name="title" value="<?= $news['title'] ?>" required/>
        </label>
        <label>Content:
            <textarea name="content"/><?= $news['content'] ?></textarea>
        </label>
        <label>Image:
            <input type="file" name="image" />
        </label>
        <input type="submit" value="save"/>
    </form>
<?php else: ?>
    something went wrong
<?php endif; ?>