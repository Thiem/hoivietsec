<div class="body_left">
    <?php
    $member = new Class_MemberClass();
    //THUC HIEN CAU LENH SQL DE SEARCH
    if(isset($_REQUEST['data'])){
        $val = $_REQUEST['data']; // lay gia tri cua form sang.
    }
    if (isset($val['Member']['timkiem'])) {
        $member->search = $val['Member']['tukhoa'];
        $member->memberGender = $val['Member']['gioitinh'];
        $member->memberYearStart = $val['Member']['tunam']['year'];
        $member->memberGroupId = $val['Member']['group_id'];
    }
    if(!isset($val['Member']['group_id'])){
        $val['Member']['group_id'] = 0;
    }
    if(!isset($val['Member']['gioitinh'])){
        $val['Member']['gioitinh'] = 0;
    }
    if(!isset($val['Member']['tunam']['year'])){
        $val['Member']['tunam']['year'] = 0;
    }
    //KET THUC SEARCH
    //{
    ?>
    <div id="main-content">
        <div id="breadcrumb"><span class="breadcrumb-home">
          <span class="breadcrumb-home">
	<a href="/">Trang chủ</a>››
	<a href="/gioithieu.html">Danh sách hội viên</a></span>
        </div>
    </div>
    <div class="content" id="member-pages">
        <div id="fsearchmember">
            <form id="MemberIndexForm" method="post" action="Member.php" accept-charset="utf-8">
                <div style="display:none;"><input type="hidden" name="_method" value="POST"></div>
                <select name="data[Member][gioitinh]" id="MemberGioitinh">
                    <option value="0">Giới tính</option>
                    <option value="1" <?php if ($val['Member']['gioitinh'] == 1){ ?>selected="selected" <?php } ?>>Nam
                    </option>
                    <option value="2" <?php if ($val['Member']['gioitinh'] == 2){ ?>selected="selected" <?php } ?>>Nữ
                    </option>
                </select>
                <select name="data[Member][group_id]" id="MemberGroupId">
                    <option value="0">Chi hội tham gia</option>
                    <?php
                    $group = new Class_GroupListClass();
                    $nameGroup = $group->nameGroup();
                    if ($nameGroup == null) {
                        echo "Không có chi hội nào";
                    } else {
                        foreach ($nameGroup as $groupItem) {
                            ?>
                            <option value="<?php echo $groupItem->group_id ?>"
                                    <?php if ($groupItem->group_id == $val['Member']['group_id']){ ?>selected="selected" <?php } ?>><?php echo $groupItem->group_name ?>
                            </option>
                        <?php
                        }
                    } ?>
                </select>
                <select name="data[Member][tunam][year]" id="MemberTunamYear">
                    <option value="0">Năm bắt đầu</option>
                    <?php
                    for ($i = date("Y"); $i >= 1980; $i--) {
                        ?>
                        <option value="<?php echo $i ?>"
                                <?php if ($val['Member']['tunam']['year'] == $i){ ?>selected="selected" <?php } ?>><?php echo $i ?></option>
                    <?php } ?>
                </select>
                <input name="data[Member][tukhoa]" type="text" class="input" maxlength="50"
                       id="MemberHotendem"  <?php if (isset($val['Member']['tukhoa'])) { ?> value="<?php echo $val['Member']['tukhoa'] ?>" <?php } ?>>
                <input class="submit" type="submit" value="Tìm kiếm" name="data[Member][timkiem]" style="padding: 7px">
            </form>
        </div>
        <table width="100%" cellpadding="0" cellspacing="0">
            <tbody>
            <tr bgcolor="#CCCCCC">
                <th align="center" width="40" height="28"><a href="/members/index/page:1/sort:id/direction:desc"
                                                             class="asc">STT</a></th>
                <th align="center"><a href="/members/index/page:1/sort:ten/direction:asc">Họ và tên</a></th>
                <th align="center" width="110"><a href="/members/index/page:1/sort:chucvu/direction:asc">Chức vụ</a>
                </th>
                <th align="center" width="180"><a href="/members/index/page:1/sort:email/direction:asc">Email</a></th>
                <th align="center" width="180"><a href="/members/index/page:1/sort:diachi/direction:asc">Địa chỉ</a>
                </th>
            </tr>
            <?php
            $banghi = 0;
            //BEGINING
            if (isset($_REQUEST['rows'])) {
                $display = $_REQUEST['rows'];
            } else {
                $display = 50;
            }
            // Tinh tong so trang can hien thi
            if (isset($_REQUEST['page']) && (int)$_REQUEST['page']) {
                $page = $_REQUEST['page'];
            } else { // tu tinh page
                $records = $member->CountRows();
                if ($records > $display) {
                    $page = ceil($records / $display);
//                                $use2->page = $_REQUEST['page'];
                } else {
                    $page = 1;
                }
            }
            $start = (isset($_GET['start']) && (int)$_GET['start'] >= 0) ? $_GET['start'] : 0;
            if (isset($_REQUEST['start'])) {
                $stt = $_REQUEST['start'] + 1;
            } else {
                $stt = 1;
            }
            $member->display = $display;
            $member->start = $start;
            $info = $member->showAllMember();
            if ($info == null) {
                echo '<center>Không có dữ liệu</center>';
            } else {
                foreach ($info as $selectArrayItem) {
                    $banghi++;
                    ?>
                    <tr>
                        <td align="center"><?php echo $banghi ?></td>
                        <td>
                            <a href="MemberDetail.php?id=<?php echo $selectArrayItem->mem_id; ?>"><?php echo $selectArrayItem->fullname; ?></a>
                        </td>
                        <td><?php echo $selectArrayItem->mem_competence; ?></td>
                        <td><?php echo $selectArrayItem->mem_email; ?></td>
                        <td><?php echo $selectArrayItem->mem_home_address; ?></td>
                    </tr>
                <?php }
            } ?>
            </tbody>
        </table>
        <!--        chen trang-->
        <div class="paging">
            <?php

            //                                echo $page; die;
            if ($page > 1) {
                $next = $start + $display;
                $prev = $start - $display;
                $current = $start / $display + 1;

                // hien thi trang previous
                if ($current != 1) {
                    ?>
                    <span>
                        <a href='Member.php?rows=<?php echo $display ?>&start=<?php echo $prev ?>'>Prev</a>
                    </span> |
                <?php
                }
                // Hien thi so link
                for ($i = 1; $i <= $page; $i++) {
                    if ($current != $i) {
                        ?>
                        <span>
                            <a href='Member.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                       </span> |
                    <?php
                    } else {
                        ?>
                        <span class="current">
                <a href='Member.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                        </span> |
                    <?php
                    }

                }
                // Hien thi trang next
                if ($current != $page) {
                    ?>
                    <span>
                        <a href='Member.php?rows=<?php echo $display ?>&start=<?php echo $next ?>'>Next</a>
                    </span>
                <?php
                }
            }

            ?>
        </div>
        <!--        ket thuc chen trang-->
    </div>

</div>