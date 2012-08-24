<?php
$this->breadcrumbs = array(
    'All tasks',
);
?>
<style>
    .update
    {
        display:none
    }
    .editbox
    {
        display:none
    }
</style>

<?php Yii::app()->clientScript->registerScript('deleteapp', '
        $(".delete").live("click",function(e) {
            e.preventDefault();
            if (confirm("Are you sure you want to delete this row?"))
            {
                var parent = $(this).parent().parent();
                var id = $(this).attr("id");
               // alert(id); 
                //console.log(parent);
                var string = "id="+ id ;
              
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "' . $this->createUrl("todo/delete") . ' ",
                    data: string ,         
                    cache: false,
                    success: function(data){
                       //alert(data);
                       //console.log(JSON.stringify(data));
                       
                       //$("#id").hide();
                       var button = $("#"+data.id);       
                       // $("#content_input_"+ID).show();
                       button.remove();
                        //console.log(button.parent().parent().nodeName);
                       // $(".message").html(data.message);
                        alert(data.message);
                     
                    }
                });
            }
        });
    ');
?>


<?php
Yii::app()->clientScript->registerScript('updateapp', '
    
        $(".edit_td").live("click",function()
        {         var parents = $(this).parent();
            var ID=parents.attr("id");//getting id of tr ie id of our tuple
            $("#title_"+ID).hide(); //that particular title is hidden
            $("#content_"+ID).hide();//that particular content is hidden 
            $("#title_input_"+ID).show();//now title input fields are displayed
            $("#content_input_"+ID).show();//now content input field is displayed
            $("#button"+ID).show();
            
        });
        
        $(".update").live("click",function()
        {
        var parents = $(this).parent().parent();
            var ID=parents.attr("id");//getting id of tr
            var title=$("#title_input_"+ID).val();//getting value set in text box by user
            var content=$("#content_input_"+ID).val();//getting value set in text box by user
          
                $.ajax({
                    type: "POST",
                    url: "' . $this->createUrl("todo/update") . ' ",
                    data: {title:title,content:content,id:ID},
                    cache: false,
                    success: function(html)
                    {
                        $("#title_"+ID).html(title);
                        $("#content_"+ID).html(content);
                        $(".editbox").hide();
                         $(".update").hide();
                         $(".text").show();
                    }
                });
        });
        $(".editbox").live("mouseup",function() 
        {
            return false
        });     
');
?>

<?php
Yii::app()->clientScript->registerScript('createapp', '
   
       $(".insert").live("submit",function(){
                 var querystring = $(this).serialize();
     alert(querystring);
                
                $.ajax({
                    type: "POST",
                    url: "' . $this->createUrl("todo/add") . ' ",
                    data: querystring,
                    cache: false,
                    success: function(data)
                    {
                    
                     if(data.status == "success")
                     {
           
                        $("#todo-table").append(data.update);
                        alert("value successfully entered");
                     }
                    //var newsList = $(".news-list");
                    
                        //console.log(JSON.stringify(data));
                       
                        
                        //$(".text").html(data.title);
                        //$(".text").html(data.content);
                        //alert(data.title);

                         
                    }
                });
//                   $(".creates").live({        
// click: function() {
//    $(this).after("data.update");
//  },
 
return false;

        });

');
?>



<div class="form">

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo CHtml::link('Profiles', array('register/display')); ?>
    </div>

    <div class="row">
        <?php echo CHtml::link('New User?', array('register/add')); ?>
    </div>

    <div class="row">
        <?php echo CHtml::link('Add new task', array('todo/add')); ?>
    </div>

    <h1>Tasks</h1>
     <!--<pre>
    <?php //print_r($model);  ?>
    </pre>-->



    <form class="insert">
        title <input type="text" name="title" />
        content<input type="text" name="content" />
        <input type="submit" class="creates">
    </form>


    <form id="form1">
        <table>
            <tbody id="todo-table">
                <?php foreach ($model as $m): ?>
                    <?php $x = $m->id; ?>
                    <tr class="edit_tr" id="<?php echo $x; ?>">

                        <td class="edit_td"> 
                            <span id="title_<?php echo $x; ?>" class="text">
                                <?php echo $m->title ?></span>
                            <?php //echo CHtml::link($m->title, array('todo/display', 'id' => $m->id));  ?>
                        </td>
                        
                        <td>  <input type="text" value="<?php echo $m->title; ?>" class="editbox" id="title_input_<?php echo $x; ?>">
                        </td>
                        
                        <td class="edit_td"> 
                            <span id="content_<?php echo $x; ?>" class="text">
                                <?php echo $m->content ?></span>
                            <?php //echo CHtml::link($m->title, array('todo/display', 'id' => $m->id));  ?>
                        </td>

                        <td>  <input type="text" value="<?php echo $m->content; ?>" class="editbox" id="content_input_<?php echo $x; ?>">
                        </td>

                        <td> <?php echo CHtml::button('Update', array('class' => 'update', 'id' => "button".$m->id)); ?>
                        </td>

                        <?php //echo CHtml::button('update', array('submit' => array('todo/update', 'id' => $m->id)));                       ?>
                            <?php //echo CHtml::button('delete', array('submit' => array('todo/delete', 'id' => $m->id)));  ?>
                        
                        <td><?php echo CHtml::button('Delete', array('class' => 'delete', 'id' => $m->id)); ?>
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
 

</div>      