<div id="content">
<ul class="breadcrumb">
    <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
    <li class="divider"></li>
    <li><a href="PhotoCategory.php">Danh mục ảnh</a></li>
    <li class="divider"></li>
    <li>Thư viện ảnh</li>
</ul>
<div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
    <h3 class="glyphicons display"><i></i>Quản lý thư viện ảnh</h3>
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
            <form action="PhotoGallery.php" method="post">
                <div class="dataTables_filter" id="DataTables_Table_0_filter">
                    <input type="text" name="search"
                           aria-controls="DataTables_Table_0" <?php if (isset($_REQUEST['search'])) { ?> value="<?php echo $_REQUEST['search'] ?>" <?php } ?>
                           style="padding: 6px">
                    <input
                        type="submit" aria-controls="DataTables_Table_0" value="Tìm kiếm" class="form-control"></div>

            </form>
        </div>
        <div class="buttons pull-right">
            <a class="btn btn-primary btn-icon glyphicons circle_plus" href="PhotoGalleryAdd.php"><i></i> Thêm mới</a>
        </div>
        <div style="clear: both"></div>
        <div style="float:right">
            <select name="DataTables_Table_0_length" id="listcat"
                    aria-controls="DataTables_Table_0" style="width: 250px"
                    onchange="ListCategory()" class="form-control">
                <option value="0">-Xem theo danh mục ảnh-</option>
                <?php
                $photoCategory = new Class_PhotoCategoryClass();
                $photoCat = $photoCategory->getPhotoCategoryTitle();
                if ($photoCat == null) {
                    echo "Không có danh mục nào";
                } else {
                    foreach ($photoCat as $value) {

                        ?>

                        <option value="<?php echo $value->photo_cat_id ?>"
                                <?php if ($_REQUEST['id'] == $value->photo_cat_id){ ?>selected="selected" <?php } ?>>
                            <?php echo $value->photo_cat_title ?>
                        </option>
                    <?php
                    }
                } ?>
            </select>
        </div>
    </div>
    <br/>
</div>
<div>
    <table
        class="dynamicTable table table-striped table-bordered table-primary table-condensed dataTable"
        id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
        <thead>
        <tr role="row">
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 10px;"
                aria-label="Rendering eng.: activate to sort column ascending">No.
            </th>
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 250px;"
                aria-label="Rendering eng.: activate to sort column ascending">Tên danh mục ảnh
            </th>
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 200px;"
                aria-label="Browser: activate to sort column ascending">Hình ảnh.
            </th>
            <th class="center" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0"
                rowspan="1" colspan="1" style="width: 50px;"
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
        $stt = $_REQUEST['start'] + 1;
        $use2 = new Class_PhotoGalleryClass();

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
        if (isset($_REQUEST['id']) && $_REQUEST['id'] != 0) {
            $use2->catId = $_REQUEST['id'];
            $selectArray = $use2->listPhotoGalleryId();
        } else {
            $selectArray = $use2->listPhotoGallery();
        }
        if ($selectArray == null) {
            echo 'Khong tim thay';
        } else {
            foreach ($selectArray as $selectArrayItem) {
                ?>
                <tr class="gradeA odd">
                    <td class="center" style="vertical-align: middle; "><?php echo $stt++; ?></td>
                    <td style="vertical-align: middle; "><?php echo $selectArrayItem->photo_cat_title; ?></td>
                    <td class=" ">
                        <?php if ($selectArrayItem->photo_img == null) { ?>
                            <img src="Image/no-image.jpg" alt="" width="198"/>
                        <?php } else { ?>
                            <img src="Image/PhotoGallery/<?php echo $selectArrayItem->photo_img; ?>" alt=""
                                 width="198"/>
                        <?php } ?>
                    </td>
                    <td class="center"
                        style="vertical-align: middle; "><?php echo $selectArrayItem->photo_number; ?></td>
                    <td class="center" style="vertical-align: middle; "
                        id="ajax<?php echo $selectArrayItem->photo_id; ?>">
                        <a onclick="state(<?php echo $selectArrayItem->photo_id; ?>,<?php echo $selectArrayItem->photo_status; ?>)">
                            <?php if ($selectArrayItem->photo_status == 1) {
                                echo '<img src="Image/circle_green.png"/>';
                            } else {
                                echo '<img src="Image/circle_red.png"/>';
                            } ?>
                        </a>
                    </td>
                    <td class="center" style="vertical-align: middle; "><a
                            href="PhotoGalleryEdit.php?id=<?php echo $selectArrayItem->photo_id; ?>"
                            >Edit</a></td>
                    <td class="center" style="vertical-align: middle; "><a
                            href="ObjectDelete.php?id=<?php echo $selectArrayItem->photo_id; ?>&table=photo_gallery&page=PhotoGallery.php&table_id=photo_id"
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
                            <a href='PhotoGallery.php?rows=<?php echo $display ?>&start=<?php echo $prev ?>'>Previous</a>
                        </li>
                    <?php
                    }
                    // Hien thi so link
                    for ($i = 1; $i <= $page; $i++) {
                        if ($current != $i) {
                            ?>
                            <li>
                                <a href='PhotoGallery.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                            </li>
                        <?php
                        } else {
                            ?>
                            <li class="active"><a
                                    href='PhotoGallery.php?rows=<?php echo $display ?>&start=<?php echo($display * ($i - 1)) ?>'><?php echo $i ?></a>
                            </li>
                        <?php
                        }

                    }
                    // Hien thi trang next
                    if ($current != $page) {
                        ?>
                        <li>
                            <a href='PhotoGallery.php?rows=<?php echo $display ?>&start=<?php echo $next ?>'>Next</a>
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
            url: "ObjectAjaxState.php?id=" + id + "&ne_state=" + ne_state + "&table=photo_gallery&table_status=photo_status&tableid=photo_id",
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
        location.href = "PhotoGallery.php?rows=" + $('#pagination').val();
    }
</script>
<script>
    function ListCategory() {
        location.href = "PhotoGallery.php?id=" + $('#listcat').val();
    }
</script>
