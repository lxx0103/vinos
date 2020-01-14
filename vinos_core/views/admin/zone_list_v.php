<?php require_once(VIEWPATH.'admin/common/head_v.php');?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>名称</th>
                                    <th>显示行数</th>
                                    <th>是否启用</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($zones as $row):?>
                                <tr>
                                    <td class="center"><?=$row['id']?></td>
                                    <td class="center"><?=$row['name']?></td>
                                    <td class="center"><?=$row['row']?></td>
                                    <td class="center"><?=$row['is_show']==1?'是':'否'?></td>
                                    <td class="center"><?=$row['update_time']?></td>
                                    <td class="center"><?=$row['update_user']?></td>
                                    <td class="center">
                                        <button class="btn btn-warning edit_zone" value="<?=$row['id']?>">编辑</button>
                                    </td>
                                </tr>
                                <?php endforeach?>
                                <tr>
                                    <td class="center" colspan="6"></td>
                                    <td class="center">
                                        <button class="btn btn-success add_zone">新增</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="dept_edit_form" tabindex="-1" role="dialog" style="top: 30%; display: none;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">地区名称 :</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" placeholder="地区名称" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">显示行数 :</label>
                    <div class="controls">
                        <select name="row" id="row" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">是否启用 :</label>
                    <div class="controls">
                        <select name="is_show" id="is_show" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="">
                <div class="form-actions">
                    <a class="btn btn-success" id="save_dept" style="float: right;">保存</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(VIEWPATH.'admin/common/footer_v.php');?>

<script>
$('.add_zone').on('click', function(){
    $('#dept_edit_form').find('h5').text('新增');
    $('#dept_edit_form').find('#id').val(0);
    $('#dept_edit_form').find('#name').val('');
    $('#dept_edit_form').find('#row').val('');
    $('#dept_edit_form').find('#is_show').val(1);
    $('#dept_edit_form').modal('show');
})
$('.edit_zone').on('click', function(){
    var id = $(this).val();
    $.ajax({ 
        url: "/admin/zone/one",
        data: {"id":id},
        dataType: 'json',
        type: 'POST',
        success: function(result){
            if(result.status == 1){
                $('#dept_edit_form').find('h5').text('修改');
                $('#dept_edit_form').find('#id').val(result.data.id);
                $('#dept_edit_form').find('#name').val(result.data.name);
                $('#dept_edit_form').find('#row').val(result.data.row);
                $('#dept_edit_form').find('#is_show').val(result.data.is_show);
                $('#dept_edit_form').modal('show');
            }else{
                layer.alert(result.msg);
            }
        }
    });
})
$('#save_dept').on('click', function(){
    $.ajax({ 
        url: "/admin/zone/save",
        data: {"name":$("#name").val(), "row":$("#row").val(), "is_show":$("#is_show").val(), "id":$("#id").val()},
        dataType: 'json',
        type: 'POST',
        success: function(result){            
            if(result.status == 1){
                layer.alert(result.msg, function(){
                    window.location.reload();
                });
            }else{
                layer.alert(result.msg, function(){
                    //关闭后的操作
                });
            }
        }
    });
})
</script>
<?php require_once(VIEWPATH.'admin/common/foot_v.php');?>