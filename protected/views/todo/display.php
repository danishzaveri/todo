<?php
$this->breadcrumbs = array(
    'View Task',
);
?>
<h1>View Task</h1>

<table>
    <tr><td><?php echo("Title"); ?></td>
    <td><?php echo("Content"); ?></td></tr>
    <tr><td><?php echo($model->title); ?></td>
    <td><?php echo($model->content); ?></td></tr>

</table>