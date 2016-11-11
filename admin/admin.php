<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>admin</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        <link href="../css/style.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <table id="table">
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
                    <td><?= date('F j, Y, g:i a', $item['date']) ?></td>
                    <td><img width="50" src="<?= $item['image'] ?>"/></td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= $item['id'] ?>"/>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <button id="createform">Create news</button>
        </table>
    </body>
</html>
