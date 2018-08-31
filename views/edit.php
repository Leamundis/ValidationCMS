<table>
    <tr>
        <th>Article</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach($values as $value): ?>
        <tr>
            <td><?php echo $value->title ?></td>
            <td>
                <form method="POST" action="/view/update">
                    <button type="submit" name="title" value="<?php echo $value->title ?>">U</button>
                </form>
            </td>
            <td>
                <form method="POST" action="/action/deleteOne">
                    <button type="submit" name="id" value="<?php echo $value->id ?>">X</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

</table>