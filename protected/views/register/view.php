<?php
$this->breadcrumbs = array(
    'View Profile',
);
?>
<h1>View Profile</h1>

<table>
    <tr>

        <td><?php echo CHtml::label('Name', 'Name'); ?></td>
        <td><?php echo CHtml::label('Address', 'Address'); ?></td>
    </tr>
    <tr>
        <td><?php echo($model->name); ?></td>
        <td><?php echo($model->address); ?></td>
    </tr>

</table>