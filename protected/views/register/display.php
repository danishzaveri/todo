<?php
$this->breadcrumbs = array(
    'Profile',
);
?>
<h1>Profile</h1>

<table bgcolor="#FFCCFF">
    <tr>

        <td><h3><?php echo CHtml::label('Name', 'Name'); ?></h3></td>
    </tr>

    <?php foreach ($model as $m): ?>

        <tr>
            <td> <?php echo ($m->name); ?> </td>
            <td><?php echo CHtml::button('view', array('submit' => array('register/view', 'id' => $m->id))); ?>
                <?php echo CHtml::button('update', array('submit' => array('register/update', 'id' => $m->id))); ?>
                <?php echo CHtml::button('delete', array('submit' => array('register/delete', 'id' => $m->id))); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
