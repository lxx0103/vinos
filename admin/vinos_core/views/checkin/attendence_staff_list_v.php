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
                                <input type="text" class="form-control span1" name="staff_code" placeholder="工号"<?=$filters['staff_code']?' value="'.$filters['staff_code'].'"':''?>>
                                <input type="text" class="form-control span2 form_datetime" name="month" placeholder="月份"<?=$filters['month']?' value="'.$filters['month'].'"':''?>>
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
                                    <th>部门</th>
                                    <th>姓名</th>
                                    <th>工号</th>
                                    <th>应出勤小时</th>
                                    <th>实际出勤小时</th>
                                    <th>加班小时</th>
                                    <th>请假小时</th>
                                    <th>缺勤小时</th>
                                    <th>迟到分钟</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($staff as $row):?>
                                <tr>
                                    <td class="center"><?=$sorted_depts[$row['dept_id']]['dept_name']?></td>
                                    <td class="center"><?=$row['name']?></td>
                                    <td class="center"><?=$row['staff_code']?></td>
                                    <td class="center"><?=$row['sum']['legal_work_time']?></td>
                                    <td class="center"><?=$row['sum']['work_time']?></td>
                                    <td class="center"><?=$row['sum']['over_time']?></td>
                                    <td class="center"><?=$row['sum']['holiday_time']?></td>
                                    <td class="center"><?=$row['sum']['off_time']?></td>
                                    <td class="center"><?=$row['sum']['late_time']?></td>
                                    <td class="center">
                                        <a class="btn btn-success" href="/checkin/attendence/detail?staff_id=<?=$row['id']?>&month=<?=$filters['month']?>">明细</button>
                                    </td>
                                </tr>
                                <?php endforeach?>
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
                            <?php if($total/$filters['page_size']>=$filters['page']): ?>
                            <a tabindex="0" class="fg-button ui-button ui-state-default" href="<?=$query_str.'page='.($filters['page']+1)?>"><?=$filters['page']+1?></a>
                            <?php endif;?>
                            <?php if($total/$filters['page_size']>=$filters['page']+1): ?>
                            <a tabindex="0" class="fg-button ui-button ui-state-default" href="<?=$query_str.'page='.($filters['page']+2)?>"><?=$filters['page']+2?></a>
                            <?php endif;?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once(VIEWPATH.'common/footer_v.php');?>

<script>
$(".form_datetime").datetimepicker({
    format: 'yyyy-mm',    
    todayBtn:  1,
    autoclose: 1,
    startView: 4,
    minView: 3
});
</script>
<?php require_once(VIEWPATH.'common/foot_v.php');?>