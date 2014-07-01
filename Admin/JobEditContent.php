<div id="content">
    <ul class="breadcrumb">
        <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
        <li class="divider"></li>
        <li><a href="Job.php">Danh sách ngành nghề -công việc đã làm ở Séc</a></li>
        <li class="divider"></li>
        <li>Thêm ngành nghề -công việc đã làm ở Séc</li>
    </ul>
    <div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
        <h3 class="glyphicons display"><i></i>Thêm ngành nghề -công việc đã làm ở Séc</h3>
        <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
                src="Image/circle_back_arrow.png"
                alt=""/>Trang trước</a>

        <div class="clearfix"></div>
        <div class="separator"></div>
    </div>
    <div class="form-news">
        <form name="JobForm" id="JobForm" action="JobEditAction.php?id=<?php echo $_REQUEST['id'] ?>"
              method="post" enctype="multipart/form-data" accept-charset="utf-8">
            <?php
            $job= new Class_JobClass();
            $job->jobId = $_REQUEST['id'];
            $item = $job->oneJob();
            ?>
            <div class="form">
                <div class="form-group ">
                    <label>Tên ngành nghề * </label>
                    <input type="text" placeholder="Tên ngành nghề..." name="data[Job][name]" id="title"
                           class="form-control" value="<?php echo $item['job_name']?>">
                </div>
                <div class="form-group width">
                    <label>Số thự tự hiển thị </label>
                    <input type="text" placeholder="Số thự tự hiển thị..." name="data[Job][number]" class="form-control" value="<?php  echo ($item['job_number'])?>"/>
                </div><div class="form-group width">
                    <label for="status">Trạng thái đăng trang chủ:
                    <input type="checkbox" value="1" name="data[Job][status]" id="status"  <?php if ($item['job_status']==1){?>checked="checked" <?php }?>/> </label>
                </div>
                <div>
                    <input type="submit" value="Sửa thông tin công việc"/>
                </div>
            </div>
        </form>
    </div>
</div>
