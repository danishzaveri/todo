 
 <?php $x = $model->id; ?>
<tr class="edit_tr" id="<?php echo $x; ?>">

                        <td class="edit_td"> 
                            <span id="title_<?php echo $x; ?>" class="text">
                                <?php echo $model->title ?></span>
                            <?php //echo CHtml::link($m->title, array('todo/display', 'id' => $m->id));  ?>
                        </td>
                        
                        <td>  <input type="text" value="<?php echo $model->title; ?>" class="editbox" id="title_input_<?php echo $x; ?>">
                        </td>
                        
                        <td class="edit_td"> 
                            <span id="content_<?php echo $x; ?>" class="text">
                                <?php echo $model->content ?></span>
                            <?php //echo CHtml::link($m->title, array('todo/display', 'id' => $m->id));  ?>
                        </td>

                        <td>  <input type="text" value="<?php echo $model->content; ?>" class="editbox" id="content_input_<?php echo $x; ?>">
                        </td>

                        <td> <?php echo CHtml::button('Update', array('class' => 'update', 'id' => "button".$model->id)); ?>
                        </td>

                       
                        
                        <td><?php echo CHtml::button('Delete', array('class' => 'delete', 'id' => $model->id)); ?>
                        </td>
                    </tr>








 