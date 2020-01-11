<?php require_once(VIEWPATH.'common/head_v.php');?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content">
                        <div>
                            <form>
                                <input type="text" class="form-control span1" name="machine_id" placeholder="考勤机ID"<?=$filters['machine_id']?' value="'.$filters['machine_id'].'"':''?>>
                                <input type="text" class="form-control span2 form_datetime" name="start_time" placeholder="开始时间"<?=$filters['start_time']?' value="'.$filters['start_time'].'"':''?>>
                                <input type="text" class="form-control span2 form_datetime" name="end_time" placeholder="结束时间"<?=$filters['end_time']?' value="'.$filters['end_time'].'"':''?>>
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
                                    <th>考勤时间</th>
                                    <th>所属日</th>
                                    <th>创建人</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($attendence as $row):?>
                                <tr>
                                    <td class="center"><?=$row['id']?></td>
                                    <td class="center"><?=$row['machine_id']?></td>
                                    <td class="center"><?=$row['check_time']?></td>
                                    <td class="center"><?=$row['check_date']?></td>
                                    <td class="center"><?=$row['create_user']?></td>
                                    <td class="center"><?=$row['create_time']?></td>
                                    <td class="center">
                                        <button class="btn btn-success set_check_date" value="<?=$row['id']?>">设为前日卡</button>
                                        <button class="btn btn-success set_check_date1" value="<?=$row['id']?>">设为当日卡</button>
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
$('.set_check_date').on('click', function(){
    var check_id = $(this).val();
    console.log(check_id);
    $.ajax({ 
        url: "/checkin/attendence/setcheckdate",
        data: {"check_id": check_id, type: 2},
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
$('.set_check_date1').on('click', function(){
    var check_id = $(this).val();
    console.log(check_id);
    $.ajax({ 
        url: "/checkin/attendence/setcheckdate",
        data: {"check_id": check_id, type: 1},
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
    format: 'yyyy-mm-dd hh:ii:ss',
    todayBtn:  1,
    autoclose: 1,
});
</script>
<?php require_once(VIEWPATH.'common/foot_v.php');?>