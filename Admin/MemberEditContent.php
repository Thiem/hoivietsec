<?php include_once("../Class/GroupListClass.php");
include_once("../Class/MemberClass.php");
include_once("../Class/JobClass.php");
?>
<div id="content">
<ul class="breadcrumb">
    <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
    <li class="divider"></li>
    <li><a href="Member.php">Danh sách thành viên</a></li>
    <li class="divider"></li>
    <li>Sửa thông tin thành viên</li>
</ul>
<div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
    <h3 class="glyphicons display"><i></i>Sửa thông tin thành viên</h3>
    <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
            src="Image/circle_back_arrow.png"
            alt=""/>Trang trước</a>

    <div class="clearfix"></div>
    <div class="separator"></div>
</div>
<div class="form-news">
<form name="MemberEditForm" id="MemberEditForm" action="MemberEditAction.php?id=<?php echo $_REQUEST['id'] ?>"
      method="post"
      enctype="multipart/form-data" accept-charset="utf-8">
<?php
$member = new Class_MemberClass();
$member->memberId = $_REQUEST['id'];
$item = $member->getMember();
?>
<div class="form">
<div class="form-group ">
    <label>Họ tên đệm * </label>
    <input type="text" placeholder="Họ tên đệm..." name="data[Member][hotendem]" id="title"
           value="<?php echo $item['mem_first_name'] ?>"
           class="form-control">
</div>
<div class="form-group ">
    <label>Tên * </label>
    <input type="text" placeholder="Tên..." name="data[Member][ten]" id="title"
           value="<?php echo $item['mem_last_name'] ?>"
           class="form-control">
</div>
<div class="form-group ">
    <label>Năm sinh* </label>
    <input type="text" placeholder="Điền 4 số ..." name="data[Member][namsinh]" id="title"
           value="<?php echo $item['mem_birthday'] ?>"
           class="form-control">
</div>
<div class="form-group ">
    <label>Giới tính </label>
    <input type="radio" name="data[Member][gioitinh]" id="MemberGioitinh1" value="1"
           <?php if ($item['mem_gender'] == 1){ ?>checked="checked" <?php } ?>>
    <label for="MemberGioitinh1"> Nam </label>
    <input type="radio" name="data[Member][gioitinh]" id="MemberGioitinh2" value="2"
           <?php if ($item['mem_gender'] == 0){ ?>checked="checked" <?php } ?>>
    <label for="MemberGioitinh2"> Nữ</label>
</div>
<div class="form-group ">
    <label for="MemberChucvu">Chức vụ </label>
    <input name="data[Member][chucvu]" type="text" maxlength="100" id="MemberChucvu"
           value="<?php echo $item['mem_competence'] ?>"
           class="form-control">
</div>
<div class="form-group ">
    <label for="MemberCoquancongtac">Cơ quan công tác </label>
    <input name="data[Member][coquancongtac]" type="text" maxlength="255" id="MemberCoquancongtac"
           value="<?php echo $item['mem_office'] ?>"
           class="form-control">
</div>
<div class="form-group ">
    <label for="MemberDiachicoquan">Địa chỉ cơ quan </label>
    <input name="data[Member][diachicoquan]" type="text" maxlength="255" id="MemberDiachicoquan"
           value="<?php echo $item['mem_office_address'] ?>"
           class="form-control">
</div>
<div class="form-group ">
    <label for="MemberDienthoaicoquan">Điện thoại cơ quan </label>
    <input name="data[Member][dienthoaicoquan]" type="text" maxlength="255" id="MemberDienthoaicoquan"
           value="<?php echo $item['mem_office_phone'] ?>" class="form-control">
</div>
<div class="form-group ">
    <label for="MemberDiachi">Địa chỉ nhà riêng </label>
    <input name="data[Member][diachi]" type="text" maxlength="255" id="MemberDiachi"
           value="<?php echo $item['mem_home_address'] ?>" class="form-control">
</div>
<div class="form-group ">
    <label for="MemberDienthoainha">Điện thoại nhà </label>
    <input name="data[Member][dienthoainha]" type="text" maxlength="255" id="MemberDienthoainha"
           value="<?php echo $item['mem_home_phone'] ?>" class="form-control">
</div>
<div class="form-group ">
    <label for="MemberDidong">Điện thoại di động </label>
    <input name="data[Member][didong]" type="text" maxlength="255" id="MemberDidong"
           value="<?php echo $item['mem_cell_phone'] ?>" class="form-control">
</div>
<div class="form-group ">
    <label for="MemberEmail">Email </label>
    <input name="data[Member][email]" type="text" maxlength="255" id="MemberEmail"
           value="<?php echo $item['mem_email'] ?>" class="form-control">
</div>
<div class="form-group width">
    <label>Đã làm ngành nghề công việc : * </label>
    <select class="form-control" name="data[Member][job_id]">
        <?php
        $job = new Class_JobClass();
        $jobName = $job->getJob();
        if ($jobName == null) {
            echo "Không có lĩnh vực nghề nghiệp nào";
        } else {
            foreach ($jobName as $jobItem) {
                ?>
                <option value="<?php echo $jobItem->job_id ?>"
                        <?php if ($jobItem->job_id == $item['job_id']){ ?>selected="selected" <?php } ?>><?php echo $jobItem->job_name ?>
                </option>
            <?php
            }
        }?>
    </select>
</div>
<div class="form-group width">
    <label>Tại Cộng hòa Séc </label>
    <select class="form-control" name="data[Member][tunam][year]">
        <?php
        for ($i = date("Y"); $i >= 1980; $i--) {
            ?>
            <option value="<?php echo $i ?>"
                    <?php if ($item['mem_year_start'] == $i){ ?>selected="selected" <?php } ?>><?php echo $i ?></option>
        <?php } ?>
    </select>
    <select class="form-control" name="data[Member][dennam][year]">
        <?php
        for ($j = date("Y"); $j >= 1980; $j--) {
            ?>
            <option value="<?php echo $i ?>"
                    <?php if ($item['mem_year_finish'] == $j){ ?>selected="selected" <?php } ?>><?php echo $j ?></option>
        <?php } ?>
    </select>
</div>
<div class="form-group ">
    <label for="MemberTaicoquan">Tại Trường/Cơ quan </label>
    <input name="data[Member][taicoquan]" type="text" maxlength="255" id="MemberTaicoquan"
           value="<?php echo $item['mem_local'] ?>" class="form-control">
</div>
<div class="form-group ">
    <label for="MemberThanhpho">Thành phố </label>
    <input name="data[Member][thanhpho]" type="text" maxlength="255" id="MemberThanhpho"
           value="<?php echo $item['mem_city'] ?>" class="form-control">
</div>
<div class="form-group ">
    <label for="MemberChuyennganh">Chuyên ngành </label>
    <input name="data[Member][chuyennganh]" type="text" maxlength="255" id="MemberChuyennganh"
           value="<?php echo $item['mem_specialty'] ?>" class="form-control">
</div>
<div class="form-group ">
    <label for="MemberChuyennganh">Hiện tại đang sinh hoạt/tham dự Ban liên lạcTrường/Thành phố/Khóa
        nào? </label>
    <textarea name="data[Member][thongtinthem]" cols="20" rows="6" id="MemberThongtinthem"
              style="width: 715px"><?php echo $item['mem_information'] ?></textarea>
</div>
<!--    <div class="form-group width">-->
<!---->
<!--        <label>Ảnh chân dung: </label>-->
<!--        <input type="file" name="data[Member][anhdaidien]" id="data[Member][anhdaidien]"-->
<!--               class="form-control"/>-->
<!---->
<!--    </div>-->
<div class="form-group width">
    <label>Ảnh hiện tại: </label>
    <img src="Image/MemberPhoto/<?php echo $item['mem_img'] ?>" alt=""/>
    <label>Thay thế ảnh khác:
        <input type="checkbox" name="data[Member][anhdaidien1]" value="1"/>
    </label>
    <br/>
    <label>Chọn ảnh: </label><input type="file" name="image" id="image"/>
    <input type="hidden" name="data[Member][anhdaidien2]" value="<?php echo $item['mem_img'] ?>"/>

</div>
<div class="form-group width">
    <label>Hội viên thuộc chi hội * </label> // lay tu bang chi hoi ra
    <select class="form-control" name="data[Member][group_id]">

        <?php
        $group = new Class_GroupListClass();
        $nameGroup = $group->nameGroup();
        if ($nameGroup == null) {
            echo "Không có chi hội nào";
        } else {
            foreach ($nameGroup as $groupItem) {
                ?>
                <option value="<?php echo $groupItem->group_id ?>"
                        <?php if ($groupItem->group_id == $item['group_id']){ ?>selected="selected" <?php } ?>><?php echo $groupItem->group_name ?>
                </option>
            <?php
            }
        } ?>
    </select>
</div>
<div class="form-group ">
    <label>Đã có thẻ hội viên * </label>
    <input type="radio" name="data[Member][thehoivien]" id="MemberThehoivien1" value="1"
           <?php if ($item['mem_card'] == 1){ ?>checked="checked" <?php } ?>>
    <label for="MemberGioitinh1"> Có</label>
    <input type="radio" name="data[Member][thehoivien]" id="MemberThehoivien2" value="0"
           <?php if ($item['mem_card'] == 0){ ?>checked="checked" <?php } ?>>
    <label for="MemberGioitinh2"> Chưa</label>
</div>
<div class="form-group width">
    <label>Trạng thái đăng trang chủ: </label>
    <select class="form-control" name="data[Member][status]" style="width: 150px">
        <option value="1" <?php if ($item['mem_status'] == 1){ ?>selected="selected" <?php } ?>>
            Đăng
        </option>
        <option value="0" <?php if ($item['mem_status'] == 0){ ?>selected="selected" <?php } ?>>
            Không đăng
        </option>
    </select>

</div>
<div class="form-group width">
    <label>Số thứ tự hiển thị </label>
    <select class="form-control" name="data[Member][number]" style="width: 150px">
        <option value="1" <?php if ($item['mem_number'] == 1){ ?>selected="selected" <?php } ?>>
            1
        </option>
        <option value="2" <?php if ($item['mem_number'] == 2){ ?>selected="selected" <?php } ?>>
            2
        </option>
    </select>
</div>
<div class="form-group width">
    <label>Thành viên ban chấp hành: </label>
    <select class="form-control" name="data[Member][thanhvienchaphanh]" style="width: 150px">
        <option value="1" <?php if ($item['mem_association'] == 1){ ?>selected="selected" <?php } ?>>
            Có
        </option>
        <option value="0" <?php if ($item['mem_association'] == 0){ ?>selected="selected" <?php } ?>>
            Không
        </option>
    </select>

</div>
<div class="form-group width">
    <label>Số thứ tự hiển thị danh sách ban chấp hành </label>
    <select class="form-control" name="data[Member][sothanhvienbanchaphanh]" style="width: 150px">
        <option value="1" <?php if ($item['mem_association_number'] == 1){ ?>selected="selected" <?php } ?>>
            1
        </option>
        <option value="2" <?php if ($item['mem_association_number'] == 2){ ?>selected="selected" <?php } ?>>
            2
        </option>
    </select>
</div>
<div>
    <input type="submit" value="Sửa danh thông tin thành viên "/>
</div>
</div>
</form>
</div>
</div>
