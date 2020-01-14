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
                                    <th>姓名</th>
                                    <th>电话</th>
                                    <th>电子邮件</th>
                                    <th>留言</th>
                                    <th>时间</th>
                                    <!-- <th>操作</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($contacts as $row):?>
                                <tr>
                                    <td class="center"><?=$row['id']?></td>
                                    <td class="center"><?=$row['name']?></td>
                                    <td class="center"><?=$row['phone']?></td>
                                    <td class="center"><?=$row['email']?></td>
                                    <td class="center"><?=$row['message']?></td>
                                    <td class="center"><?=$row['create_time']?></td>
                                    <!-- <td class="center">
                                        <button class="btn btn-warning edit_type" value="<?=$row['id']?>">编辑</button>
                                    </td> -->
                                </tr>
                                <?php endforeach?>
                                <!-- <tr>
                                    <td class="center" colspan="6"></td>
                                    <td class="center">
                                        <button class="btn btn-success add_type">新增</button>
                                    </td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once(VIEWPATH.'admin/common/footer_v.php');?>

<?php require_once(VIEWPATH.'admin/common/foot_v.php');?>