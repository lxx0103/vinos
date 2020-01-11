<?php require_once(VIEWPATH.'common/head_v.php');?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content">
                        <div>
                            <form>
                                <select name="dept_id" class="span2">
                                    <option value="0">请选择部门</option>
                                    <?php foreach($depts as $dept):?>
                                    <option value="<?=$dept['id']?>"<?=$dept['id']==$filters['dept_id']?' selected':''?>><?=$dept['dept_name']?></option>
                                    <?php endforeach?>
                                </select>
                                <input type="text" class="form-control span1" name="name" placeholder="姓名"<?=$filters['name']?' value="'.$filters['name'].'"':''?>>
                                <input type="text" class="form-control span1" name="staff_code" placeholder="工号"<?=$filters['staff_code']?' value="'.$filters['staff_code'].'"':''?>>
                                <input type="submit" class="form-control btn btn-success" style="margin-bottom: 10px;" value="搜索">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>考勤机ID</th>
                                    <th>工号</th>
                                    <th>姓名</th>
                                    <th>部门</th>
                                    <th>性别</th>
                                    <th>生日</th>
                                    <th>职务</th>
                                    <th>联系电话</th>
                                    <th>手机</th>
                                    <th>地址</th>
                                    <th>入职时间</th>
                                    <th>离职时间</th>
                                    <th>是否启用</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($staff as $row):?>
                                <tr>
                                    <td class="center"><?=$row['id']?></td>
                                    <td class="center"><?=$row['machine_id']?></td>
                                    <td class="center"><?=$row['staff_code']?></td>
                                    <td class="center"><?=$row['name']?></td>
                                    <td class="center"><?=$sorted_depts[$row['dept_id']]['dept_name']?></td>
                                    <td class="center"><?=$row['gender']==1?'男':'女'?></td>
                                    <td class="center"><?=$row['birthday']?></td>
                                    <td class="center"><?=$sorted_positions[$row['position_id']]['position_name']?></td>
                                    <td class="center"><?=$row['phone']?></td>
                                    <td class="center"><?=$row['mobile']?></td>
                                    <td class="center"><?=$row['address']?></td>
                                    <td class="center"><?=$row['in_date']?></td>
                                    <td class="center"><?=$row['out_date']?></td>
                                    <td class="center"><?=$row['is_enable']==1?'是':'否'?></td>
                                    <td class="center">
                                        <button class="btn btn-warning edit_staff" value="<?=$row['id']?>">编辑</button>
                                    </td>
                                </tr>
                                <?php endforeach?>
                                <tr>
                                    <td class="center" colspan="14"></td>
                                    <td class="center">
                                        <button class="btn btn-success add_staff">新增</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="dataTables_paginate" style="padding-bottom: 5px;">
                        <button class="pull-left" style="margin-left: 10px;">总计：<?=$total?>个</button>
                        <span> 
                            <?php if($filters['page']>=3): ?>
                            <a tabindex="0" class="first fg-button ui-button ui-state-default" href="<?=$query_str.'page=1'?>">第一页</a>
                            <a tabindex="0" class="fg-button ui-button ui-state-default" href="<?=$query_str.'page='.($filters['page']-2)?>"><?=$filters['page']-2?></a>
                            <?php endif;?>
                            <?php if($filters['page']>=2): ?>
                            <a tabindex="0" class="fg-button ui-button ui-state-default" href="<?=$query_str.'page='.($filters['page']-1)?>"><?=$filters['page']-1?></a>
                            <?php endif;?>
                            <a tabindex="0" class="fg-button ui-button ui-state-default ui-state-disabled"><?=$filters['page']?></a>
                            <?php if($total/$filters['page_size']>=$filters['page']+1): ?>
                            <a tabindex="0" class="fg-button ui-button ui-state-default" href="<?=$query_str.'page='.($filters['page']+1)?>"><?=$filters['page']+1?></a>
                            <?php endif;?>
                            <?php if($total/$filters['page_size']>=$filters['page']+2): ?>
                            <a tabindex="0" class="fg-button ui-button ui-state-default" href="<?=$query_str.'page='.($filters['page']+2)?>"><?=$filters['page']+2?></a>
                            <?php endif;?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staff_edit_form" tabindex="-1" role="dialog" style="top: 10%; display: none;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">工号 :</label>
                    <div class="controls">
                        <input type="text" id="staff_code" name="staff_code" placeholder="工号" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">姓名 :</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" placeholder="姓名" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">部门 :</label>
                    <div class="controls">
                        <select name="dept_id" id="dept_id" class="form-control">
                            <option value="0">请选择</option>
                            <?php foreach($depts as $dept):?>
                            <option value="<?=$dept['id']?>"><?=$dept['dept_name']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">性别 :</label>
                    <div class="controls">
                        <select name="gender" id="gender" class="form-control">
                            <option value="0">请选择</option>
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">生日 :</label>
                    <div class="controls">
                        <input type="text" id="birthday" name="birthday" class="datepicker" placeholder="生日" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">职务 :</label>
                    <div class="controls">
                        <select name="position_id" id="position_id" class="form-control">
                            <option value="0">请选择</option>
                            <?php foreach($positions as $position):?>
                            <option value="<?=$position['id']?>"><?=$position['position_name']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">联系电话 :</label>
                    <div class="controls">
                        <input type="text" id="phone" name="phone" placeholder="联系电话" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">手机 :</label>
                    <div class="controls">
                        <input type="text" id="mobile" name="mobile" placeholder="手机" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">地址 :</label>
                    <div class="controls">
                        <input type="text" id="address" name="address" placeholder="地址" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">入职时间 :</label>
                    <div class="controls">
                        <input type="text" id="in_date" name="in_date" class="datepicker" placeholder="入职时间" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">离职时间 :</label>
                    <div class="controls">
                        <input type="text" id="out_date" name="out_date" class="datepicker" placeholder="离职时间" />
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
                <input type="hidden" name="staff_id" id="staff_id" value="">
                <div class="form-actions">
                    <a class="btn btn-success" id="save_staff" style="float: right;">保存</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(VIEWPATH.'common/footer_v.php');?>

<script>
$('.add_staff').on('click', function(){
    $('#staff_edit_form').find('h5').text('新增');
    $('#staff_edit_form').find('#staff_code').val();
    $('#staff_edit_form').find('#name').val();
    $('#staff_edit_form').find('#dept_id').val();
    $('#staff_edit_form').find('#gender').val();
    $('#staff_edit_form').find('#birthday').val();
    $('#staff_edit_form').find('#position_id').val();
    $('#staff_edit_form').find('#phone').val();
    $('#staff_edit_form').find('#mobile').val();
    $('#staff_edit_form').find('#address').val();
    $('#staff_edit_form').find('#in_date').val();
    $('#staff_edit_form').find('#out_date').val();
    $('#staff_edit_form').find('#is_enable').val(1);
    $('#staff_edit_form').find('#staff_id').val();
    $('#staff_edit_form').modal('show');
})
$('.edit_staff').on('click', function(){
    var staff_id = $(this).val();
    $.ajax({ 
        url: "/organization/staff/one",
        data: {"staff_id":staff_id},
        dataType: 'json',
        type: 'POST',
        success: function(result){
            if(result.status == 1){
                $('#staff_edit_form').find('h5').text('修改');
                $('#staff_edit_form').find('#staff_id').val(result.data.id);
                $('#staff_edit_form').find('#staff_code').val(result.data.staff_code);
                $('#staff_edit_form').find('#name').val(result.data.name);
                $('#staff_edit_form').find('#dept_id').val(result.data.dept_id);
                $('#staff_edit_form').find('#gender').val(result.data.gender);
                $('#staff_edit_form').find('#birthday').val(result.data.birthday);
                $('#staff_edit_form').find('#position_id').val(result.data.position_id);
                $('#staff_edit_form').find('#phone').val(result.data.phone);
                $('#staff_edit_form').find('#mobile').val(result.data.mobile);
                $('#staff_edit_form').find('#address').val(result.data.address);
                $('#staff_edit_form').find('#in_date').val(result.data.in_date);
                $('#staff_edit_form').find('#out_date').val(result.data.out_date);
                $('#staff_edit_form').find('#is_enable').val(result.data.is_enable);
                $('#staff_edit_form').modal('show');
            }else{
                layer.alert(result.msg);
            }
        }
    });
})
$('#save_staff').on('click', function(){
    $.ajax({ 
        url: "/organization/staff/save",
        data: {"staff_code":$("#staff_code").val(), "name":$("#name").val(), "dept_id":$("#dept_id").val(), "gender":$("#gender").val(), "birthday":$("#birthday").val(), "position_id":$("#position_id").val(), "phone":$("#phone").val(), "mobile":$("#mobile").val(), "address":$("#address").val(), "in_date":$("#in_date").val(), "out_date":$("#out_date").val(), "is_enable":$("#is_enable").val(), "staff_id":$("#staff_id").val()},
        dataType: 'json',
        type: 'POST',
        success: function(result){            
            if(result.status == 1){
                layer.alert(result.msg, function(){
                    window.location.reload();
                });
            }else{
                layer.alert(result.msg);
            }
        }
    });
})
$('.datepicker').datepicker({
     format: 'yyyy-mm-dd',
});
</script>
<?php require_once(VIEWPATH.'common/foot_v.php');?>