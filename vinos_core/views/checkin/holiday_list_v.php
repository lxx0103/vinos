<?php require_once(VIEWPATH.'common/head_v.php');?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content">
                        <div>
                            <form>
                                <select name="target" class="span2">
                                    <option value="0">请选择放假对象</option>
                                    <option value="1"<?=$filters['target']==1?' selected':''?>>部门</option>
                                    <option value="2"<?=$filters['target']==2?' selected':''?>>员工</option>
                                    <option value="3"<?=$filters['target']==3?' selected':''?>>全公司</option>
                                </select>
                                <select name="dept_id" class="span2">
                                    <option value="0">请选择部门</option>
                                    <?php foreach($depts as $dept):?>
                                    <option value="<?=$dept['id']?>"<?=$dept['id']==$filters['dept_id']?' selected':''?>><?=$dept['dept_name']?></option>
                                    <?php endforeach?>
                                </select>
                                <input type="text" class="form-control span1" name="staff_code" placeholder="工号"<?=$filters['staff_code']?' value="'.$filters['staff_code'].'"':''?>>                                
                                <select name="type" class="span2">
                                    <option value="0">请选择类型</option>
                                    <option value="1"<?=$filters['type']==1?' selected':''?>>放假</option>
                                    <option value="2"<?=$filters['type']==2?' selected':''?>>事假</option>
                                    <option value="3"<?=$filters['type']==3?' selected':''?>>病假</option>
                                    <option value="4"<?=$filters['type']==4?' selected':''?>>其他</option>
                                </select>
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
                                    <th>放假对象</th>
                                    <th>部门</th>
                                    <th>工号</th>
                                    <th>日期</th>
                                    <th>时长</th>
                                    <th>类型</th>
                                    <th>是否启用</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($holidays as $row):?>
                                <tr>
                                    <td class="center"><?=$row['id']?></td>
                                    <td class="center"><?=$row['target']==1?'部门':($row['target']==2?'员工':($row['target']==3?'全公司':''))?></td>
                                    <td class="center"><?=$row['target']==1?$sorted_depts[$row['dept_id']]['dept_name']:''?></td>
                                    <td class="center"><?=$row['target']==1?'':$row['staff_code']?></td>
                                    <td class="center"><?=$row['holiday']?></td>
                                    <td class="center"><?=$row['hours']?></td>
                                    <td class="center"><?=$row['type']==1?'放假':($row['type']==2?'事假':($row['type']==3?'病假':'其他'))?></td>
                                    <td class="center"><?=$row['is_enable']==1?'是':'否'?></td>
                                    <td class="center"><?=$row['update_time']?></td>
                                    <td class="center"><?=$row['update_user']?></td>
                                    <td class="center">
                                        <button class="btn btn-warning edit_holiday" value="<?=$row['id']?>">编辑</button>
                                    </td>
                                </tr>
                                <?php endforeach?>
                                <tr>
                                    <td class="center" colspan="10"></td>
                                    <td class="center">
                                        <button class="btn btn-success add_holiday">新增</button>
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

<div class="modal fade" id="holiday_edit_form" tabindex="-1" role="dialog" style="top: 30%; display: none;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">放假对象 :</label>
                    <div class="controls">
                        <select name="target" id="target" class="form-control">
                            <option value="0">请选择</option>
                            <option value="1">部门</option>
                            <option value="2">员工</option>
                            <option value="3">全公司</option>
                        </select>
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
                    <label class="control-label">工号 :</label>
                    <div class="controls">
                        <input type="text" id="staff_code" name="staff_code" placeholder="工号" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">日期 :</label>
                    <div class="controls">
                        <input type="text" id="holiday" name="holiday" class="form_datetime" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">时长 :</label>
                    <div class="controls">
                        <input type="text" id="hours" name="hours" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">类型 :</label>
                    <div class="controls">
                        <select name="type" id="type" class="form-control">
                            <option value="0">请选择</option>
                            <option value="1">放假</option>
                            <option value="2">事假</option>
                            <option value="3">病假</option>
                            <option value="4">其他</option>
                        </select>
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
                <input type="hidden" name="holiday_id" id="holiday_id" value="">
                <div class="form-actions">
                    <a class="btn btn-success" id="save_holiday" style="float: right;">保存</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(VIEWPATH.'common/footer_v.php');?>

<script>
$('.add_holiday').on('click', function(){
    $('#holiday_edit_form').find('h5').text('新增');
    $('#holiday_edit_form').find('#holiday_id').val(0);
    $('#holiday_edit_form').find('#target').val(0);
    $('#holiday_edit_form').find('#dept_id').val(0);
    $('#holiday_edit_form').find('#staff_code').val('');
    $('#holiday_edit_form').find('#holiday').val('');
    $('#holiday_edit_form').find('#hours').val('');
    $('#holiday_edit_form').find('#type').val(0);
    $('#holiday_edit_form').find('#is_enable').val(1);
    $('#holiday_edit_form').modal('show');
})
$('.edit_holiday').on('click', function(){
    var holiday_id = $(this).val();
    $.ajax({ 
        url: "/checkin/holiday/one",
        data: {"holiday_id":holiday_id},
        dataType: 'json',
        type: 'POST',
        success: function(result){
            if(result.status == 1){
                $('#holiday_edit_form').find('h5').text('修改');
                $('#holiday_edit_form').find('#holiday_id').val(result.data.id);
                $('#holiday_edit_form').find('#target').val(result.data.target);
                $('#holiday_edit_form').find('#dept_id').val(result.data.dept_id);
                $('#holiday_edit_form').find('#staff_code').val(result.data.staff_code);
                $('#holiday_edit_form').find('#holiday').val(result.data.holiday);
                $('#holiday_edit_form').find('#hours').val(result.data.hours);
                $('#holiday_edit_form').find('#type').val(result.data.type);
                $('#holiday_edit_form').find('#is_enable').val(result.data.is_enable);
                $('#holiday_edit_form').modal('show');
            }else{
                layer.alert(result.msg);
            }
        }
    });
})
$('#save_holiday').on('click', function(){
    $.ajax({ 
        url: "/checkin/holiday/save",
        data: {"target":$("#target").val(), "dept_id":$("#dept_id").val(), "staff_code":$("#staff_code").val(), "holiday":$("#holiday").val(), "hours":$("#hours").val(), "type":$("#type").val(), "is_enable":$("#is_enable").val(), "holiday_id":$("#holiday_id").val()},
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
$(".form_datetime").datetimepicker({
    format: 'yyyy-mm-dd',    
    todayBtn:  1,
    autoclose: 1,
    startView: 4,
    minView: 2
});
</script>
<?php require_once(VIEWPATH.'common/foot_v.php');?>