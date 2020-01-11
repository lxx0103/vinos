<?php require_once(VIEWPATH.'common/head_v.php');?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>角色名称</th>
                                    <th>是否启用</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($roles as $row):?>
                                <tr>
                                    <td class="center"><?=$row['id']?></td>
                                    <td class="center"><?=$row['role_name']?></td>
                                    <td class="center"><?=$row['is_enable']==1?'是':'否'?></td>
                                    <td class="center"><?=$row['update_time']?></td>
                                    <td class="center"><?=$row['update_user']?></td>
                                    <td class="center">
                                        <button class="btn btn-warning edit_role" value="<?=$row['id']?>">编辑</button>
                                        <a class="btn btn-danger" href="/privilege/privilege?role_id=<?=$row['id']?>">权限</button>
                                    </td>
                                </tr>
                                <?php endforeach?>
                                <tr>
                                    <td class="center" colspan="5"></td>
                                    <td class="center">
                                        <button class="btn btn-success add_role">新增</button>
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

<div class="modal fade" id="role_edit_form" tabindex="-1" role="dialog" style="top: 30%; display: none;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">角色名称 :</label>
                    <div class="controls">
                        <input type="text" id="role_name" name="role_name" placeholder="角色名称" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">是否启用 :</label>
                    <div class="controls">
                        <select name="is_enable" id="is_enable" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="role_id" id="role_id" value="">
                <div class="form-actions">
                    <a class="btn btn-success" id="save_role" style="float: right;">保存</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(VIEWPATH.'common/footer_v.php');?>

<script>
$('.add_role').on('click', function(){
    $('#role_edit_form').find('h5').text('新增用户');
    $('#role_edit_form').find('#role_id').val(0);
    $('#role_edit_form').find('#role_name').val('');
    $('#role_edit_form').find('#is_enable').val(1);
    $('#role_edit_form').modal('show');
})
$('.edit_role').on('click', function(){
    var role_id = $(this).val();
    $.ajax({ 
        url: "/privilege/role/one",
        data: {"role_id":role_id},
        dataType: 'json',
        type: 'POST',
        success: function(result){
            if(result.status == 1){
                $('#role_edit_form').find('h5').text('修改用户');
                $('#role_edit_form').find('#role_id').val(result.data.id);
                $('#role_edit_form').find('#role_name').val(result.data.role_name);
                $('#role_edit_form').find('#is_enable').val(result.data.is_enable);
                $('#role_edit_form').modal('show');
            }else{
                layer.alert(result.msg);
            }
        }
    });
})
$('#save_role').on('click', function(){
    $.ajax({ 
        url: "/privilege/role/save",
        data: {"role_name":$("#role_name").val(), "is_enable":$("#is_enable").val(), "role_id":$("#role_id").val()},
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
<?php require_once(VIEWPATH.'common/foot_v.php');?>