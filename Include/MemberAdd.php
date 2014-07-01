<div class="body_left">
    <div class="members form">
        <div id="main-content">
            <div id="breadcrumb"><span class="breadcrumb-home">
          <span class="breadcrumb-home">
	<a href="/">Trang chủ</a>››Đăng ký làm hội viên</span>
            </div>

        </div>
        <div class="content">
            <form id="Fregister" name="Fregister" onsubmit="return checkForm()" enctype="multipart/form-data"
                  method="post" action="MemberAddAction.php" accept-charset="utf-8">
                <div class="input text required">
                    <label for="MemberHotendem">Họ tên đệm<span>*</span></label>
                    <input name="data[Member][hotendem]" type="text" maxlength="50" id="MemberHotendem">
                </div>
                <div class="input text required"><label for="MemberTen">Tên<span>*</span></label>
                    <input name="data[Member][ten]" type="text" maxlength="50" id="MemberTen">
                </div>
                <div class="input text required">
                    <label for="MemberNamsinh">Năm sinh (4 số năm sinh) <span>*</span></label>
                    <input name="data[Member][namsinh]" type="text" class="fnumber" maxlength="4" id="MemberNamsinh">
                </div>
                <div class="label">Giới tính<span>*</span></div>
                <input type="hidden" name="data[Member][gioitinh]" id="MemberGioitinh_" value="">
                <input type="radio" name="data[Member][gioitinh]" id="MemberGioitinh1" value="1">
                <label for="MemberGioitinh1"> Nam </label>
                <input type="radio" name="data[Member][gioitinh]" id="MemberGioitinh2" value="2">
                <label for="MemberGioitinh2"> Nữ</label>

                <div class="input text">
                    <label for="MemberChucvu">Chức vụ</label>
                    <input name="data[Member][chucvu]" type="text" maxlength="100" id="MemberChucvu">
                </div>
                <div class="input text"><label for="MemberCoquancongtac">Cơ quan công tác</label>
                    <input name="data[Member][coquancongtac]" type="text" maxlength="255" id="MemberCoquancongtac">
                </div>
                <div class="input text"><label for="MemberDiachicoquan">Địa chỉ cơ quan</label>
                    <input name="data[Member][diachicoquan]" type="text" maxlength="255" id="MemberDiachicoquan"></div>
                <div class="input text">
                    <label for="MemberDienthoaicoquan">Điện thoại cơ quan</label>
                    <input name="data[Member][dienthoaicoquan]" type="text" maxlength="100" id="MemberDienthoaicoquan">
                </div>
                <div class="input text"><label for="MemberDiachi">Địa chỉ nhà riêng</label><input
                        name="data[Member][diachi]" type="text" maxlength="300" id="MemberDiachi">
                </div>
                <div class="input text"><label for="MemberDienthoainha">Điện thoại nhà</label><input
                        name="data[Member][dienthoainha]" type="text" maxlength="20" id="MemberDienthoainha">
                </div>
                <div class="input text"><label for="MemberDidong">Điện thoại di động</label><input
                        name="data[Member][didong]" type="text" maxlength="20" id="MemberDidong">
                </div>
                <div class="input text"><label for="MemberEmail">Email</label><input name="data[Member][email]"
                                                                                     type="text"
                                                                                     maxlength="100" id="MemberEmail">
                </div>
                <div class="input select required"><label for="MemberWorksId">Đã <span>*</span></label>
                    <select name="data[Member][job_id]" id="MemberWorksId">
                        <?php
                        $job = new Class_JobClass();
                        $jobName = $job->getJob();
                        if ($jobName == null) {
                            echo "Không có lĩnh vực nghề nghiệp nào";
                        } else {
                            foreach ($jobName as $jobItem) {
                                ?>
                                <option value="<?php echo $jobItem->job_id ?>"><?php echo $jobItem->job_name ?>
                                </option>
                            <?php
                            }
                        }?>
                    </select>
                </div>
                Tại Cộng hòa Séc <select name="data[Member][tunam][year]" class="fnumber" id="MemberTunamYear">
                    <option value="">Từ năm</option>
                    <?php
                    for ($i = date("Y"); $i >= 1945; $i--) {
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } ?>

                </select><select name="data[Member][dennam][year]" class="fnumber" id="MemberDennamYear">
                    <option value="">Đến năm</option>
                    <?php
                    for ($i = date("Y"); $i >= 1945; $i--) {
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php } ?>

                </select>

                <div class="input text"><label for="MemberTaicoquan">Tại Trường/Cơ quan</label><input
                        name="data[Member][taicoquan]" type="text" maxlength="255" id="MemberTaicoquan">
                </div>
                <div class="input text"><label for="MemberThanhpho">Thành phố</label><input
                        name="data[Member][thanhpho]"
                        type="text" maxlength="50"
                        id="MemberThanhpho">
                </div>
                <div class="input text"><label for="MemberChuyennganh">Chuyên ngành</label><input
                        name="data[Member][chuyennganh]" type="text" maxlength="50" id="MemberChuyennganh">
                </div>
                <div class="input textarea">
                    <label for="MemberThongtinthem">Hiện tại đang sinh hoạt/<br>tham dự Ban liên lạc <br>Trường/Thành
                        phố/Khóa <br>nào?</label>
                    <textarea name="data[Member][thongtinthem]" cols="30" rows="6" id="MemberThongtinthem">

                    </textarea>
                </div>
                <div class="input file"><label for="MemberAnhdaidien">Ảnh chân dung</label>
                    <input type="file"  name="image" id="MemberAnhdaidien">
                </div>
                <div class="input select required">
                    <label for="MemberCityId">Hội viên thuộc chi hội: <span>*</span>
                    </label>
                    <select name="data[Member][group_id]" id="MemberCityId">
                        <?php
                        $group = new Class_GroupListClass();
                        $nameGroup = $group->nameGroup();
                        if ($nameGroup == null) {
                            echo "Không có chi hội nào";
                        } else {
                            foreach ($nameGroup as $groupItem) {
                                ?>
                                <option value="<?php echo $groupItem->group_id ?>"><?php echo $groupItem->group_name ?>
                                </option>
                            <?php
                            }
                        } ?>
                    </select>
                </div>
                <div class="label">Đã có thẻ hội viên<span>*</span>
                </div>
                <input type="hidden" name="data[Member][thehoivien]" id="MemberThehoivien_" value="">
                <input type="radio" name="data[Member][thehoivien]" id="MemberThehoivien1" value="1">
                <label for="MemberThehoivien1"> Có </label>
                <input type="radio" name="data[Member][thehoivien]" id="MemberThehoivien2" value="0">
                <label for="MemberThehoivien2"> Chưa</label>
                <br>
                <br>

                <div class="submit"><input type="submit" value="Đăng ký"></div>
            </form>
            <br>
            <br>
        </div>
    </div>
</div>
