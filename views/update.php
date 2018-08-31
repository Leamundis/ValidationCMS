<form action="/action/updateOne" method="POST">
        <tr>
            <td>
                <label for="title">Titre</label>
                <textarea name="title"><?php echo $values->title ?></textarea>
            </td>
            <td>
                <label for="content">Contenu</label>
                <textarea name="content"><?php echo $values->content ?></textarea>
            </td>  
            <td>
                <?php if($values->hidden == 1): ?>
                    <input type="checkbox" name="hidden" value="1" checked> Hidden
                <?php else: ?>
                    <input type="checkbox" name="hidden" value="0"> Hidden
                <?php endif; ?>
            </td>
            <td>
                <?php if($values->log == 1): ?>
                    <input type="checkbox" name="log" value="1" checked> Log
                <?php else: ?>
                    <input type="checkbox" name="log" value="0"> Log
                <?php endif; ?>
            </td>
        </tr>
        <input type="submit" value="Update">
</form>
