<div id="content">
<ul class="breadcrumb">
    <li><a href="Advert.php" class="glyphicons home"><i></i>Danh sách quảng cáo</a></li>
</ul>
<div class="heading-buttons">
    <h3 class="glyphicons coins"><i></i> Quản lý quảng cáo</h3>
    <div class="buttons pull-right">
        <a class="btn btn-primary btn-icon glyphicons circle_plus" href="AdvertAdd.php"><i></i> Add new</a>
    </div>
    <div class="clearfix" style="clear: both;"></div>
</div>
<div class="innerLR">
<div class="widget widget-gray widget-body-white">
<div class="widget-head">
    <h4 class="heading">Danh sách quảng cáo</h4>
</div>
<div style="padding: 10px 0;" class="widget-body">
<div role="grid" class="dataTables_wrapper form-inline" id="DataTables_Table_0_wrapper">
<div class="row-fluid">
    <div class="span6">
        <div id="DataTables_Table_0_length" class="dataTables_length"><label>
                <select name="DataTables_Table_0_length" id="pagination"
                        aria-controls="DataTables_Table_0" style="width: 70px"
                        onchange="Pagination()">
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
        <form action="Advert.php" method="post">
            <div class="dataTables_filter" id="DataTables_Table_0_filter"><label>Tìm kiếm:
                    <input type="text" name="search"
                           aria-controls="DataTables_Table_0" <?php if (isset($_REQUEST['search'])) { ?> value="<?php echo $_REQUEST['search'] ?>" <?php } ?>>
                    <input
                        type="submit" aria-controls="DataTables_Table_0" value="Tìm"></label></div>

        </form>
    </div>
</div>
<div>
    <table
        class="dynamicTable table table-striped table-bordered table-primary table-condensed dataTable"
        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        <thead>
        <tr role="row">
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 10px;"
                aria-label="Rendering eng.: activate to sort column ascending">No.
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 250px;"
                aria-label="Rendering eng.: activate to sort column ascending">Name
            </th>
            <th class="sorting_desc" role="columnheader" tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 50px;" aria-sort="descending"
                aria-label="Eng. vers.: activate to sort column ascending">Click.
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 50px;"
                aria-label="Platform(s): activate to sort column ascending">Status.
            </th>
            <th class="sorting_desc" role="columnheader" tabindex="0"
                aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 50px;" aria-sort="descending"
                aria-label="Eng. vers.: activate to sort column ascending">Edit.
            </th>
            <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 50px;"
                aria-label="CSS grade: activate to sort column ascending">Delete.
            </th>
        </tr>
        </thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
        <?php

        $use2 = new Class_ClassTableAdvert();
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
        $use2->display = $display;
        $use2->start = $start;
        $selectArray = $use2->SelectAdvert();
        if(isset($_REQUEST['start'])){
            $stt = $_REQUEST['start'] + 1;
        } else{
            $stt = 1;
        }
        if ($selectArray == null) {
            echo "Không tìm thấy kết quả nào!";
        } else {
            foreach ($selectArray as $selectArrayItem) {
                ?>
                <tr class="gradeA odd">
                    <td class="center"><?php echo $stt++; ?></td>
                    <td class=""><?php echo $selectArrayItem->ad_name; ?></td>

                    <td class=" "><?php echo $selectArrayItem->ad_click; ?></td>
                    <td class=" center " id="ajax<?php echo $selectArrayItem->ad_id; ?>">
                        <a onclick="state(<?php echo $selectArrayItem->ad_id; ?>,<?php echo $selectArrayItem->ad_state; ?>)">
                            <?php if ($selectArrayItem->ad_state == 1) {
                                echo '<img src="Image/circle_green.png"/>';
                            } else {
                                echo '<img src="Image/circle_red.png"/>';
                            } ?>
                        </a>
                    </td>
                    <td class="center  sorting_1"><a
                            href="AdvertUpdate.php?id=<?php echo $selectArrayItem->ad_id; ?>">Edit</a>
                    </td>
                    <td class="center "><a
                            href="AdvertDelAction.php?id=<?php echo $selectArrayItem->ad_id; ?>"
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
                        <li><a href='Advert.php?rows=<?php echo $display ?>&start=<?php echo $prev ?>'>Previous</a>
                        </li>
                    <?php
                    }
                    // Hien thi so link
                    for ($i = 1; $i <= $page; $i++) {
                        if ($current != $i) {
                            ?>
                            <li>
                                <a href='Advert.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                            </li>
                        <?php
                        } else {
                            ?>
                            <li class="active"><a
                                    href='Advert.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                            </li>
                        <?php
                        }

                    }
                    // Hien thi trang next
                    if ($current != $page) {
                        ?>
                        <li><a href='Advert.php?rows=<?php echo $display;?>&start=<?php echo $next;?>'>Next</a></li>
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
    function state(id, ad_state) {
        if (ad_state == 1) {
           ad_state = 0;
        }
        else {
            ad_state = 1;
        }
        $.ajax({
            type: "POST",
            url: "AdvertAjaxState.php?id=" + id + "&ad_state=" + ad_state,
            success: function (data) {
                if (ad_state == 1) {
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
        location.href = "Advert.php?rows=" + $('#pagination').val();
    }
</script>
