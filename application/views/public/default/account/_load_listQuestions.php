<?php if (!empty($data)) foreach ($data as $value) : ?>
    <tr>
        <td><label class="i-check"><input class="check-item chk_id" type="checkbox" name="id[]" value="<?php echo $value->id ?>"><i></i></label></td>
        <td><?php echo $value->id ?></td>
        <td><?php echo $value->title ?></td>
        <td><?php echo $value->answer1 ?></td>
        <td><?php echo $value->answer2 ?></td>
        <td><?php echo $value->answer3 ?></td>
        <td><?php echo $value->answer4 ?></td>
        <td>
            <a class="smooth ctrl edit" href="javascript:;" onclick="edit_questions('<?php echo $value->id ?>')"><i class="fa fa-pencil"></i></a>
            <a class="smooth ctrl del" href="javascript:;" onclick="delete_questions('<?php echo $value->id ?>',this)"><i class="fa fa-trash"></i></a>
        </td>
    </tr>
<?php endforeach; ?>
