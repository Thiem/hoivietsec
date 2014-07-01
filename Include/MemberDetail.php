<div class="body_left">
    <div id="main-content">
        <div id="breadcrumb"><span class="breadcrumb-home">
          <span class="breadcrumb-home">
	<a href="Index.php">Trang chủ</a>››Chi tiết hội viên</span>
        </div>

    </div>
    <div class="content" id="member-pages">
        <?php
        $member = new Class_MemberClass();
        $member->memberId = $_REQUEST['id'];
        $item = $member->getMember();
        if ($item == null) {
            echo "<center>Không có dữ liệu</center>";
        } else {

        ?>
            <table width="100%"
                   class="dynamicTable table table-striped table-bordered table-primary table-condensed dataTable"
                   id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" cellpadding="0" cellspacing="0">
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                <tr class="gradeA odd">
                    <td class="label1" width="120">Họ tên</td>
                    <td><?php echo $item['mem_first_name'] . " " . $item['mem_last_name'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Năm sinh</td>
                    <td><?php echo $item['mem_birthday'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Chức vụ</td>
                    <td><?php echo $item['mem_competence'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Giới tính</td>
                    <td><?php if ($item['mem_gender'] == 1) {
                            echo "Nam";
                        } else {
                            echo "Nữ";
                        } ?></td>
                </tr>
                <tr>
                    <td class="label1">Email</td>
                    <td>
                        <a href="mailto:<?php echo $item['mem_email'] ?>"><?php echo $item['mem_email'] ?></a>
                    </td>
                </tr>
                <tr>
                    <td class="label1">Địa chỉ</td>
                    <td><?php echo $item['mem_home_address'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Cơ quan công tác</td>
                    <td><?php echo $item['mem_office'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Địa chỉ cơ quan</td>
                    <td><?php echo $item['mem_office_address'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Điện thoại cơ quan</td>
                    <td><?php echo $item['mem_office_phone'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Điện thoại nhà</td>
                    <td><?php echo $item['mem_home_phone'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Di động</td>
                    <td><?php echo $item['mem_cell_phone'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Công tác</td>
                    <td> <?php
                        $job = new Class_JobClass();
                        $jobName = $job->getJob();
                        if ($jobName == null) {
                            echo "Không có lĩnh vực nghề nghiệp nào";
                        } else {
                            foreach ($jobName as $jobItem) {
                                ?>
                                <?php if ($jobItem->job_id == $item['job_id']) { ?><?php echo $jobItem->job_name ?><?php } ?>
                            <?php
                            }
                        }?></td>
                </tr>
                <tr>
                    <td class="label1">Năm bắt đầu</td>
                    <td><?php echo $item['mem_year_start'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Năm kết thúc</td>
                    <td><?php echo $item['mem_year_finish'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Tại cơ quan / trường</td>
                    <td><?php echo $item['mem_local'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Thuộc thành phố</td>
                    <td><?php echo $item['mem_city'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Chuyên ngành</td>
                    <td><?php echo $item['mem_specialty'] ?></td>
                </tr>
                <tr>
                    <td class="label1">Thuộc chi hội</td>
                    <td>

                        <?php
                        $group = new Class_GroupListClass();
                        $nameGroup = $group->nameGroup();
                        if ($nameGroup == null) {
                            echo "Không có chi hội nào";
                        } else {
                            foreach ($nameGroup as $groupItem) {
                                ?>
                                <?php if ($groupItem->group_id == $item['group_id']) { ?><?php echo $groupItem->group_name ?> <?php } ?>
                            <?php
                            }
                        } ?>
                    </td>
                </tr>
                <tr>
                    <td class="label1">Thông tin thêm</td>
                    <td><?php echo $item['mem_information'] ?></td>
                </tr>
                <tr>
                    <td class="label1">
                        <div align="left">Đã có thẻ hội viên</div>
                    </td>
                    <td><?php if ($item['mem_card'] == 1) {
                            echo "Đã có";
                        } else {
                            echo "Chưa có";
                        } ?></td>
                </tr>
                <tr>
                    <td class="label1">
                        <div align="left"></div>
                    </td>
                    <td>
                        <div align="left">
                            <a href="#"
                               onclick="javascript:window.open('/members/prints/3992', 'pop1win', 'toolbar=no scrollbars=yes')">Bản
                                in</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        <?php }?>
    </div>

</div>