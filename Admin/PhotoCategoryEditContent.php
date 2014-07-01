<div id="content">
    <ul class="breadcrumb">
        <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
        <li class="divider"></li>
        <li><a href="GroupList.php">Danh mục ảnh</a></li>
        <li class="divider"></li>
        <li>Sửa thông tin danh mục ảnh</li>
    </ul>
    <div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
        <h3 class="glyphicons display"><i></i>Sửa thông tin danh mục ảnh</h3>
        <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
                src="Image/circle_back_arrow.png"
                alt=""/>Trang trước</a>

        <div class="clearfix"></div>
        <div class="separator"></div>
    </div>
    <div class="form-news">
        <form name="PhotoCatForm" id="PhotoCatForm" action="PhotoCategoryEditAction.php?id=<?php echo $_REQUEST['id']?>" method="post"
              enctype="multipart/form-data" accept-charset="utf-8">
            <?php
            $photoCat = new Class_PhotoCategoryClass();
            $photoCat->photoCategoryId = $_REQUEST['id'];
            $item = $photoCat->onePhotoCategory();

            ?>
            <div class="form">
                <div class="form-group ">
                    <label>Tên danh mục ảnh * </label>
                    <input type="text" placeholder="Tên danh mục ảnh..." name="data[PhotoCat][name]" id="title"
                           value="<?php echo $item['photo_cat_title'] ?>"
                           class="form-control">
                </div>
                <div class="form-group width">
                    <label>Số thự tự hiển thị </label>
                    <input type="text" name="data[PhotoCat][number]" value="<?php echo $item['photo_cat_number']?>" class="form-control"/>
                </div>
                <div class="form-group width">
                    <label>Trạng thái đăng trang chủ: </label>
                    <input type="checkbox" value="1" <?php if ($item['photo_cat_status'] == 1){?>checked="checked" <?php }?> name="data[PhotoCat][status]"/>

                </div>
                <div class="form-group width">
                    <?php if ($item['photo_cat_avatar'] ==  null){?>
                        <img src="Image/no-image.jpg" alt="" style="height: 100px"/>
                    <?php } else {?>
                    <label>Ảnh hiện tại: </label>
                    <img src="Image/PhotoCategory/<?php echo $item['photo_cat_avatar'] ?>" alt=""/>
                    <?php }?>
                    <br/>
                    <label>Xóa ảnh cũ:
                        <input type="checkbox" name="data[PhotoCat][Image]" value="1"/>
                    </label>
                    <br/>
                    <label>Đổi ảnh khác: </label><input type="file" name="image" id="image"/>
                    <input type="hidden" name="data[PhotoCat][oldImage]" value="<?php echo $item['photo_cat_avatar'] ?>"/>

                </div>
                <div>
                    <input type="submit" value="Sửa danh mục ảnh "/>
                </div>
            </div>
        </form>
    </div>
</div>
