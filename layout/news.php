<?php if ($news) : ?>
    <table>
        <caption>News</caption>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
        foreach ($news as $item) :
            ?>
            <tr>
                <td><?= $item['title'] ?></td>
                <td><?= $item['content'] ?></td>
                <td><?= date('F j, Y, g:i a',$item['date']) ?></td>
                <td><img width="50" src="<?= $item['image']?>"/></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $item['id'] ?>"/>
                        <input type="submit" formaction="<?= $_SERVER['PHP_SELF']?>?action=editform" value="edit"/>
                        <input type="submit" formaction="<?= $_SERVER['PHP_SELF']?>?action=delete" value="delete"/>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php else : ?>
    oops
<?php endif; ?>
<a href="<?= $_SERVER['PHP_SELF']?>?action=createform">Add new news</a>
