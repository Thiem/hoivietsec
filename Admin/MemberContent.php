<div id="content">
<ul class="breadcrumb">
    <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
    <li class="divider"></li>
    <li>Danh sách hội viên</li>
</ul>
<div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
    <h3 class="glyphicons display"><i></i>Quản lý danh sách thành viên</h3>
    <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
            src="Image/circle_back_arrow.png"
            alt=""/>Trang trước</a>
    <div class="clearfix"></div>
    <div class="separator"></div>
</div>
<?php
$member = new Class_MemberClass();
//THUC HIEN CAU LENH SQL DE SEARCH
if(isset($_REQUEST['data'])){
    $val = $_REQUEST['data']; // lay gia tri cua form sang.
}
 // lay gia tri cua form sang.
if (isset($val['Member']['timkiem']))
{
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
<div class="innerLR">
<div class="widget widget-gray widget-body-white">
<div style="padding: 10px 0;" class="widget-body">
<div role="grid" class="dataTables_wrapper form-inline" id="DataTables_Table_0_wrapper">
    <div class="row-fluid">
        <div class="span6">
            <div id="DataTables_Table_0_length" class="dataTables_length"><label>
                    <select name="DataTables_Table_0_length" id="pagination"
                            aria-controls="DataTables_Table_0" style="width: 70px"
                            onchange="Pagination()" class="form-control">
                        <?php if (isset($_REQUEST['rows'])) { ?>
                            <option value="10"
                                    <?php if ($_REQUEST['rows'] == 10){ ?>selected="selected" <?php } ?>>
                                10
                            </option>
                            <option value="25"
                                    <?php if ($_REQUEST['rows'] == 25){ ?>selected="selected" <?php } ?>>
                                25
                            </option>
                            <option value="50"
                                    <?php if ($_REQUEST['rows'] == 50){ ?>selected="selected" <?php } ?>>
                                50
                            </option>
                            <option value="100"
                                    <?php if ($_REQUEST['rows'] == 100){ ?>selected="selected" <?php } ?>>
                                100
                            </option>
                        <?php } else { ?>
                            <option value="10" selected="selected">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        <?php } ?>
                    </select>Dòng / trang</label></div>
        </div>
    </div>
    <div class="row-fluid1">
        <!--                form search-->
        <div>
            <form action="Member.php" method="post" accept-charset="utf-8">
                <div>


                    <select name="data[Member][gioitinh]" id="MemberGioitinh" style="width: 110px; margin-right: 2px" class="form-control">
                        <option value="0">Giới tính</option>
                        <option value="1" <?php if ($val['Member']['gioitinh'] ==1){?>selected="selected" <?php }?>>Nam</option>
                        <option value="2" <?php if ($val['Member']['gioitinh'] ==2){?>selected="selected" <?php }?>>Nữ</option>
                    </select>
                    <select class="form-control" name="data[Member][group_id]" style="width: 166px; margin-right: 2px">
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
                    <select class="form-control" name="data[Member][tunam][year]" style="width: 135px; margin-right: 2px">
                        <option value="0">Năm bắt đầu</option>
                        <?php
                        for ($i = date("Y"); $i >= 1980; $i--) {
                            ?>
                            <option value="<?php echo $i ?>"
                                    <?php if ($val['Member']['tunam']['year'] == $i){ ?>selected="selected" <?php } ?>><?php echo $i ?></option>
                        <?php } ?>
                    </select>
                    <input type="text" name="data[Member][tukhoa]" style="width: 190px; margin-right: 2px; padding: 6px" class="form-control" <?php if (isset($val['Member']['tukhoa'])){?> value="<?php echo $val['Member']['tukhoa'] ?>" <?php }?>>
                    <input type="submit" aria-controls="DataTables_Table_0" value="Tìm kiếm" style="padding: 3px" class="form-control" name="data[Member][timkiem]">
                </div>

            </form>
        </div>
        <!-- ket thuc form search-->
    </div>
</div>
<div>
    <table
        class="dynamicTable table table-striped table-bordered table-primary table-condensed dataTable"
        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        <thead>
        <tr role="row">
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 10px;"
                aria-label="Rendering eng.: activate to sort column ascending">STT
            </th>
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 250px;"
                aria-label="Rendering eng.: activate to sort column ascending">Họ và tên
            </th>
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 150px;"
                aria-label="Browser: activate to sort column ascending">Chức vụ
            </th>
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 60px;"
                aria-label="Platform(s): activate to sort column ascending">Thứ tự
            </th>
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 50px;"
                aria-label="Platform(s): activate to sort column ascending">Status.
            </th>
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 50px;"
                aria-label="CSS grade: activate to sort column ascending">Edit.
            </th>
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 50px;"
                aria-label="CSS grade: activate to sort column ascending">Delete.
            </th>
        </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php
        $banghi = 0;

//        if (isset($_REQUEST['search']) && isset($_REQUEST['search']) != "") {
//            $member->search = $_REQUEST['search'];
//        }
        //                            BEGINING
        if (isset($_REQUEST['rows'])) {
            $display = $_REQUEST['rows'];
        } else {
            $display = 10;
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

        $info = $member->getAllMember();
        if ($info == null) {
            echo '<center>Không có dữ liệu</center>';
        } else {
        //                            $selectArray1 = $member->getAllMember();

        foreach ($info as $selectArrayItem) {
            $banghi++;
            ?>
            <tr class="gradeA odd">
                <td  class="center" style="vertical-align: middle; "><?php echo $stt++; ?></td>
                <td class=""><a href="MemberView.php?id=<?php echo $selectArrayItem->mem_id; ?>"><?php echo $selectArrayItem->fullname; ?></a></td>
                <td class=" "><?php echo $selectArrayItem->mem_competence; ?></td>
                <td class="center" style="vertical-align: middle"><?php echo $selectArrayItem->mem_number; ?></td>
                <td class="center" style="vertical-align: middle" id="ajax<?php echo $selectArrayItem->mem_id; ?>">
                    <a onclick="state(<?php echo $selectArrayItem->mem_id; ?>,<?php echo $selectArrayItem->mem_status; ?>)">
                        <?php if ($selectArrayItem->mem_status == 1) {
                            echo '<img src="Image/circle_green.png"/>';
                        } else {
                            echo '<img src="Image/circle_red.png"/>';
                        } ?>
                    </a>
                </td>
                <td class="center" style="vertical-align: middle"><a
                        href="MemberEdit.php?id=<?php echo $selectArrayItem->mem_id; ?>"
                        >Edit</a></td>
                <td class="center" style="vertical-align: middle"><a
                        href="ObjectDelete.php?id=<?php echo $selectArrayItem->mem_id; ?>&table=member&page=Member.php&table_id=mem_id"
                        class="Del">Del</a></td>
            </tr>
        <?php

        }
        ?>
        </tr></tbody>
    </table>
    <?php echo "Có " . $banghi . "/" . $records . " bản ghi" ?>

    <!--                        CHEN TRANG-->
    <div class="separator top form-inline small">
        <div style="margin: 0;" class="pagination pagination-small pull-right">
            <ul>
                <?php

                //                                echo $page; die;
                if ($page > 1) {
                    $next = $start + $display;
                    $prev = $start - $display;
                    $current = $start / $display + 1;

                    // hien thi trang previous
                    if ($current != 1) {
                        ?>
                        <li>
                            <a href='Member.php?rows=<?php echo $display ?>&start=<?php echo $prev ?>'>Previous</a>
                        </li>
                    <?php
                    }
                    // Hien thi so link
                    for ($i = 1; $i <= $page; $i++) {
                        if ($current != $i) {
                            ?>
                            <li>
                                <a href='Member.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                            </li>
                        <?php
                        } else {
                            ?>
                            <li class="active"><a
                                    href='Member.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                            </li>
                        <?php
                        }

                    }
                    // Hien thi trang next
                    if ($current != $page) {
                        ?>
                        <li>
                            <a href='Member.php?rows=<?php echo $display ?>&start=<?php echo $next ?>'>Next</a>
                        </li>
                    <?php
                    }
                }

                ?>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <!--END CHEN TRANG-->
</div>
</div>
</div>
</div>
</div>
<?php } ?>
</div>
<script>

    $(".Del").click(function () {
        reVal = confirm('Bạn có chắc chắn xóa bản ghi này không?');
        return reVal;
    });
    function state(id, ne_state) {
        if (ne_state == 1) {
            ne_state = 0;
        }
        else {
            ne_state = 1;
        }
        $.ajax({
            type: "POST",
            url: "ObjectAjaxState.php?id=" + id + "&ne_state=" + ne_state + "&table=member&table_status=mem_status&tableid=mem_id",
            success: function (data) {
                if (ne_state == 1) {
                    $('#ajax' + id).html(data);
                } else {
                    $('#ajax' + id).html(data);
                }
            }
        });
    }
</script>
<script>
    function Pagination() {
        location.href = "Member.php?rows=" + $('#pagination').val();
    }
</script>
