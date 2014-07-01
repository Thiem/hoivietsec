<?php $gallery = new Class_PhotoGalleryClass();
$gallery->photoCategoryId = $_REQUEST['id'];
?>
<div class="body_left">
    <div id="main-content">
        <div id="breadcrumb"><span class="breadcrumb-home">
          <span class="breadcrumb-home">
	<a href="index.php">Trang chủ</a>››
	<a href="PhotoGallery.php">Thư viện ảnh</a></span>
        </div>

    </div>
    <div class="content" style="margin-left:20px;margin-top:10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody>
            <tr>
                <td height="10">
                </td>
            </tr>
            <tr>
                <?php
                if (isset($_REQUEST['rows'])) {
                    $display = $_REQUEST['rows'];
                } else {
                    $display = 30;
                }
                // Tinh tong so trang can hien thi
                if (isset($_REQUEST['page']) && (int)$_REQUEST['page']) {
                    $page = $_REQUEST['page'];
                } else { // tu tinh page
                    $records = $gallery->countShowRow();
                    if ($records > $display) {
                        $page = ceil($records / 3 * $display);
//                                $use2->page = $_REQUEST['page'];
                    } else {
                        $page = 1;
                    }
                }
                $start = (isset($_GET['start']) && (int)$_GET['start'] >= 0) ? $_GET['start'] : 0;
                $gallery->display = $display;
                $gallery->start = $start;
                $gallery->photoCategoryId = $_REQUEST['id'];
                $selectArray = $gallery->showPhoto();
                if ($selectArray == null) {
                    echo 'Khong tim thay';
                } else {
                $i = 0;
                foreach ($selectArray as $selectArrayItem) {
                $i++;
                ?>
                <td width="208">
                    <div style="width: 198px; height: 149px; border: 1px #CCCCCC solid; padding:2px;"
                         align="center">
                        <a href="Galleries.php?id=<?php echo $selectArrayItem->photo_cat_id; ?>">
                            <?php if ($selectArrayItem->photo_img == null) { ?>
                                <img src="Admin/Image/no-image.jpg" alt="" width="198"/>
                            <?php } else { ?>
                                <img
                                    src="Admin/Image/PhotoGallery/<?php echo $selectArrayItem->photo_img; ?>"
                                    alt="" width="198" height="149"/>
                            <?php } ?>
                        </a>
                    </div>
                    <!--                    <div style="margin: 10px 0 10px 0;" align="left">-->
                    <!--                        <b>-->
                    <!--                            <a href="Galleries.php?id=-->
                    <?php //echo $selectArrayItem->photo_cat_id; ?><!--" class="link_text_14_xanh_dam">--><?php //echo $selectArrayItem->photo_cat_title; ?>
                    <!--                            </a>-->
                    <!--                        </b>-->
                    <!--                    </div>-->
                </td>
                <?php
                if ($i % 3 == 0) {
                ?>
            </tr>
            <tr>
                <?php
                }
                ?>
                <?php
                }
                }
                ?>
            </tr>


            </tbody>
        </table>

    </div>
</div>
