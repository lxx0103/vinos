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
                                    <th>地区</th>
                                    <th>图片</th>
                                    <th>链接</th>
                                    <th>描述</th>
                                    <th>是否启用</th>
                                    <th>更新时间</th>
                                    <th>更新人</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($bodegas as $row):?>
                                <tr>
                                    <td class="center"><?=$row['id']?></td>
                                    <td class="center"><?=$row['name']?></td>
                                    <td class="center"><?=$sorted_zones[$row['zone_id']]['name']?></td>
                                    <td class="center"><img src="<?=$row['img']?>" style="height: 50px;"></td>
                                    <td class="center"><?=$row['url']?></td>
                                    <td class="center"><?=$row['desc']?></td>
                                    <td class="center"><?=$row['is_show']==1?'是':'否'?></td>
                                    <td class="center"><?=$row['update_time']?></td>
                                    <td class="center"><?=$row['update_user']?></td>
                                    <td class="center">
                                        <button class="btn btn-warning edit_bodega" value="<?=$row['id']?>">编辑</button>
                                    </td>
                                </tr>
                                <?php endforeach?>
                                <tr>
                                    <td class="center" colspan="9"></td>
                                    <td class="center">
                                        <button class="btn btn-success add_bodega">新增</button>
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

<div class="modal fade" id="bodega_edit_form" tabindex="-1" role="dialog" style="top: 30%; display: none;">
    <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5></h5>
        </div>
        <div class="widget-content nopadding">
            <form action="#" method="get" class="form-horizontal">
                <div class="control-group">
                    <label class="control-label">酒庄名称 :</label>
                    <div class="controls">
                        <input type="text" id="name" name="name" placeholder="酒庄名称" />
                    </div>
                </div>                
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
                <div class="control-group">
                    <label class="control-label">链接 :</label>
                    <div class="controls">
                        <input type="text" id="url" name="url" placeholder="链接" />
                    </div>
                </div>   
                <div class="control-group">
                    <label class="control-label">描述 :</label>
                    <div class="controls">
                        <input type="text" id="desc" name="desc" placeholder="描述" />
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
                    <a class="btn btn-success" id="save_bodega" style="float: right;">保存</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once(VIEWPATH.'admin/common/footer_v.php');?>

<script>
$('.add_bodega').on('click', function(){
    $('#bodega_edit_form').find('h5').text('新增');
    $('#bodega_edit_form').find('#id').val(0);
    $('#bodega_edit_form').find('#name').val('');
    $('#bodega_edit_form').find('#zone_id').val('');
    $('#bodega_edit_form').find('#img').val('');
    $('#bodega_edit_form').find('#url').val('');
    $('#bodega_edit_form').find('#desc').val('');
    $('#bodega_edit_form').find('#is_show').val(1);
    $('#bodega_edit_form').find('#p-img').attr('src','');
    $('#bodega_edit_form').modal('show');
})
$('.edit_bodega').on('click', function(){
    var id = $(this).val();
    $.ajax({ 
        url: "/admin/bodega/one",
        data: {"id":id},
        dataType: 'json',
        type: 'POST',
        success: function(result){
            if(result.status == 1){
                $('#bodega_edit_form').find('h5').text('修改');
                $('#bodega_edit_form').find('#id').val(result.data.id);
                $('#bodega_edit_form').find('#name').val(result.data.name);
                $('#bodega_edit_form').find('#zone_id').val(result.data.zone_id);
                $('#bodega_edit_form').find('#img').val(result.data.img);
                $('#bodega_edit_form').find('#url').val(result.data.url);
                $('#bodega_edit_form').find('#desc').val(result.data.desc);
                $('#bodega_edit_form').find('#is_show').val(result.data.is_show);
                $('#bodega_edit_form').find('#p-img').attr('src',result.data.img);
                $('#bodega_edit_form').modal('show');
            }else{
                layer.alert(result.msg);
            }
        }
    });
})
$('#save_bodega').on('click', function(){
    $.ajax({ 
        url: "/admin/bodega/save",
        data: {"name":$("#name").val(), "zone_id":$("#zone_id").val(), "img":$("#img").val(), "url":$("#url").val(), "desc":$("#desc").val(), "is_show":$("#is_show").val(), "id":$("#id").val()},
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
            $('#bodega_edit_form').find('#img').val('/uploads/'+data.upload_data.file_name);
        },
        error: function(data, status, e) {  //提交失败自动执行的处理函数。
            console.error(e);
        }
    });
}
</script>
<?php require_once(VIEWPATH.'admin/common/foot_v.php');?>