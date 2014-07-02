<div id="content">
<ul class="breadcrumb">
    <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
    <li class="divider"></li>
    <li>Danh sách chi hội</li>
</ul>
<div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
    <h3 class="glyphicons display"><i></i>Quản lý danh sách chi hội</h3>
    <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
            src="Image/circle_back_arrow.png"
            alt=""/>Trang trước</a>

    <div class="clearfix"></div>
    <div class="separator"></div>
</div>
<div class="innerLR">
<div class="widget widget-gray widget-body-white">
<div style="padding: 10px 0;" class="widget-body">
<div role="grid" class="dataTables_wrapper form-inline" id="DataTables_Table_0_wrapper">
    <div class="row-fluid">
        <div class="span3">
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
        <div class="span6">
            <form action="GroupList.php" method="post">
                <div class="dataTables_filter" id="DataTables_Table_0_filter">
                    <input type="text" name="search"
                           aria-controls="DataTables_Table_0" <?php if (isset($_REQUEST['search'])) { ?> value="<?php echo $_REQUEST['search'] ?>" <?php } ?>
                           style="padding: 6px">
                    <input
                        type="submit" aria-controls="DataTables_Table_0" value="Tìm kiếm" class="form-control"></div>

            </form>
        </div>
        <div class="buttons pull-right">
            <a class="btn btn-primary btn-icon glyphicons circle_plus" href="GroupListAdd.php"><i></i> Thêm mới</a>
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
                    rowspan="1" colspan="1" style="width: 350px;"
                    aria-label="Rendering eng.: activate to sort column ascending">Tên chi Hội
                </th>

                <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                    rowspan="1" colspan="1" style="width: 100px;"
                    aria-label="Platform(s): activate to sort column ascending">Thứ tự
                </th>
                <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                    rowspan="1" colspan="1" style="width: 50px;"
                    aria-label="CSS grade: activate to sort column ascending">Trạng thái
                </th>
                <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                    rowspan="1" colspan="1" style="width: 50px;"
                    aria-label="CSS grade: activate to sort column ascending">Edit
                </th>
                <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                    rowspan="1" colspan="1" style="width: 50px;"
                    aria-label="CSS grade: activate to sort column ascending">Delete
                </th>
            </tr>
            </thead>
            <tbody role="alert" aria-live="polite" aria-relevant="all">
            <?php
            $use2 = new Class_GroupListClass();

            if (isset($_REQUEST['search']) && isset($_REQUEST['search']) != "") {
                $use2->search = $_REQUEST['search'];
            }

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
                $records = $use2->CountRows();
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
            $use2->display = $display;
            $use2->start = $start;
            $selectArray = $use2->listGroup();
            if ($selectArray == null) {
                echo 'Khong tim thay';
            } else {
                foreach ($selectArray as $selectArrayItem) {
                    ?>
                    <tr class="gradeA odd">
                        <td class="center" style="vertical-align: middle;"><?php echo $stt++; ?></td>
                        <td class=""><?php echo $selectArrayItem->group_name; ?></td>
                        <td class="center"
                            style="vertical-align: middle;"><?php echo $selectArrayItem->group_number; ?></td>
                        <td class="center" style="vertical-align: middle;"
                            id="ajax<?php echo $selectArrayItem->group_id; ?>">
                            <a onclick="state(<?php echo $selectArrayItem->group_id; ?>,<?php echo $selectArrayItem->group_id; ?>)">
                                <?php if ($selectArrayItem->group_status == 1) {
                                    echo '<img src="Image/circle_green.png"/>';
                                } else {
                                    echo '<img src="Image/circle_red.png"/>';
                                } ?>
                            </a>
                        </td>
                        <td class="center" style="vertical-align: middle;"><a
                                href="GroupListEdit.php?id=<?php echo $selectArrayItem->group_id; ?>"
                                >Edit</a></td>
                        <td class="center" style="vertical-align: middle;"><a
                                href="ObjectDelete.php?id=<?php echo $selectArrayItem->group_id;?>&table=group&page=GroupList.php&table_id=group_id"
                                class="Del">Del</a></td>
                    </tr>
                <?php
                }
            }
            ?>
            </tr></tbody>
        </table>

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
                                <a href='GroupList.php?rows=<?php echo $display ?>&start=<?php echo $prev ?>'>Previous</a>
                            </li>
                        <?php
                        }
                        // Hien thi so link
                        for ($i = 1; $i <= $page; $i++) {
                            if ($current != $i) {
                                ?>
                                <li>
                                    <a href='GroupList.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                                </li>
                            <?php
                            } else {
                                ?>
                                <li class="active"><a
                                        href='GroupList.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                                </li>
                            <?php
                            }

                        }
                        // Hien thi trang next
                        if ($current != $page) {
                            ?>
                            <li>
                                <a href='GroupList.php?rows=<?php echo $display ?>&start=<?php echo $next ?>'>Next</a>
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
            url: "ObjectAjaxState.php?id=" + id + "&ne_state=" + ne_state + "&table=group&table_status=group_status&tableid=group_id",
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
        location.href = "GroupList.php?rows=" + $('#pagination').val();
    }
</script>
