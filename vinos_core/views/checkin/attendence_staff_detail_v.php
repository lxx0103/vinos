<?php require_once(VIEWPATH.'common/head_v.php');?>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>姓名</th>
                                    <th>部门</th>
                                    <th>工号</th>
                                    <th>日期</th>
                                    <th>打卡次数</th>
                                    <th>打卡时间</th>
                                    <th>应上班时间</th>
                                    <th>正班时间</th>
                                    <th>加班时间</th>
                                    <th>请假时间</th>
                                    <th>旷工时间</th>
                                    <th>迟到时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($attendences as $key =>$value):?>
                                <tr>
                                    <td class="center"><?=$staff['name']?></td>
                                    <td class="center"><?=$staff['dept_name']?></td>
                                    <td class="center"><?=$staff['staff_code']?></td>
                                    <td class="center"><?=$key?></td>
                                    <td class="center"><?=$value['check_count']?></td>
                                    <td class="center">
                                    <?php foreach($value['check_detail'] as $check_detail_key => $check_detail_value):?>
                                        <?=$check_detail_value?><br/>
                                    <?php endforeach;?>
                                    </td>
                                    <td class="center"><?=$value['legal_work_time']?>小时</td>
                                    <td class="center"><?=$value['work_time']?>小时</td>
                                    <td class="center"><?=$value['over_time']?>小时</td>
                                    <td class="center"><?=$value['holiday_time']?>小时</td>
                                    <td class="center"><?=$value['off_time']?>小时</td>
                                    <td class="center"><?=$value['late_time']?>分钟</td>
                                    <td class="center">
                                        <button class="btn btn-warning check_in" value="<?=$key?>">补卡</button>
                                    </td>
                                </tr>
                                <?php endforeach?>
                                <tr>
                                    <td class="center">总计：</td>
                                    <td class="center" colspan="5"></td>
                                    <td class="center"><?=$sum['legal_work_time']?>小时</td>
                                    <td class="center"><?=$sum['work_time']?>小时</td>
                                    <td class="center"><?=$sum['over_time']?>小时</td>
                                    <td class="center"><?=$sum['holiday_time']?>小时</td>
                                    <td class="center"><?=$sum['off_time']?>小时</td>
                                    <td class="center"><?=$sum['late_time']?>分钟</td>
                                    <td class="center">
                                        <button class="btn btn-warning check_in" value="<?=$key?>">补卡</button>
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

<div class="modal fade" id="check_in_form" tabindex="-1" role="dialog" style="top: 30%; display: none;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">补卡时间 :</label>
                    <div class="controls">
                        <input type="text" id="check_time" name="check_time" class="form_datetime" />
                    </div>
                </div>
                <input type="hidden" name="machine_id" id="machine_id" value="<?=$staff['machine_id']?>">
                <input type="hidden" name="check_date" id="check_date" value="">
                <div class="form-actions">
                    <a class="btn btn-success" id="save_check_in" style="float: right;">保存</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(VIEWPATH.'common/footer_v.php');?>

<script>
$('.check_in').on('click', function(){
    var check_date = $(this).val();
    $('#check_in_form').find('h5').text('补卡');
    $('#check_in_form').find('#check_date').val(check_date);
    $('#check_in_form').modal('show');
})
$('#save_check_in').on('click', function(){
    $.ajax({ 
        url: "/checkin/attendence/checkin",
        data: {"machine_id":$("#machine_id").val(), "check_date":$("#check_date").val(), "check_time":$("#check_time").val()},
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
    format: 'hh:ii',    
    todayBtn:  1,
    autoclose: 1,
    startView: 1,
    minView: 0
});
</script>
<?php require_once(VIEWPATH.'common/foot_v.php');?>