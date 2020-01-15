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
                                    <th>地区</th>
                                    <th>图片</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($maps as $row):?>
                                <tr>
                                    <td class="center"><?=$row['id']?></td>
                                    <td class="center"><?=$sorted_zones[$row['zone_id']]['name']?></td>
                                    <td class="center"><img src="<?=$row['img']?>" style="height: 50px;"></td>
                                    <td class="center"><?=$row['update_time']?></td>
                                    <td class="center"><?=$row['update_user']?></td>
                                    <td class="center">
                                        <button class="btn btn-warning edit_map" value="<?=$row['id']?>">编辑</button>
                                    </td>
                                </tr>
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="map_edit_form" tabindex="-1" role="dialog" style="top: 30%; display: none;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">     
                <div class="control-group">
                    <label class="control-label">地区 :</label>
                    <div class="controls">
                        <select name="zone_id" id="zone_id" class="form-control">
                            <option value="0">请选择</option>
                            <?php foreach($zones as $zone):?>
                            <option value="<?=$zone['id']?>"><?=$zone['name']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">图片 :</label>
                    <div class="controls">
                        <img id="p-img" src="" style="height: 50px;">
                        <input type="hidden" id="img" name="img"  />
                        <input type="file" name="file" id="file" onchange="fileUpload()" style="display: none;">
                        <input type="button" οnclick="select_file()" value="上传" id="upload_btn">
                    </div>
                </div>
                <input type="hidden" name="id" id="id" value="">
                <div class="form-actions">
                    <a class="btn btn-success" id="save_map" style="float: right;">保存</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(VIEWPATH.'admin/common/footer_v.php');?>

<script>
$('.edit_map').on('click', function(){
    var id = $(this).val();
    $.ajax({ 
        url: "/admin/map/one",
        data: {"id":id},
        dataType: 'json',
        type: 'POST',
        success: function(result){
            if(result.status == 1){
                $('#map_edit_form').find('h5').text('修改');
                $('#map_edit_form').find('#id').val(result.data.id);
                $('#map_edit_form').find('#zone_id').val(result.data.zone_id);
                $('#map_edit_form').find('#img').val(result.data.img);
                $('#map_edit_form').find('#p-img').attr('src',result.data.img);
                $('#map_edit_form').modal('show');
            }else{
                layer.alert(result.msg);
            }
        }
    });
})
$('#save_map').on('click', function(){
    $.ajax({ 
        url: "/admin/map/save",
        data: {"zone_id":$("#zone_id").val(), "img":$("#img").val(), "id":$("#id").val()},
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
$('#upload_btn').on('click', function(){
    $("#file").trigger("click");
})

function fileUpload(){
    var formData = new FormData();
    formData.append('file', $('#file')[0].files[0]);
    $.ajax({
        url : '/admin/upload',//这里写你的url
        type : 'POST',
        data : formData,
        contentType: false,// 当有文件要上传时，此项是必须的，否则后台无法识别文件流的起始位置
        processData: false,// 是否序列化data属性，默认true(注意：false时type必须是post)
        dataType: 'json',//这里是返回类型，一般是json,text等
        clearForm: true,//提交后是否清空表单数据
        success: function(data) {   //提交成功后自动执行的处理函数，参数data就是服务器返回的数据。
            $("#p-img").attr('src', '/uploads/'+data.upload_data.file_name);
            $('#map_edit_form').find('#img').val('/uploads/'+data.upload_data.file_name);
        },
        error: function(data, status, e) {  //提交失败自动执行的处理函数。
            console.error(e);
        }
    });
}
</script>
<?php require_once(VIEWPATH.'admin/common/foot_v.php');?>