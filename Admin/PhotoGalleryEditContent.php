<?php //include_once("Class/PhotoGalleryClass.php");
//include_once("Class/PhotoCategoryClass.php");
?>
<div id="content">
    <ul class="breadcrumb">
        <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
        <li class="divider"></li>
        <li><a href="PhotoGallery.php">Thư viện ảnh</a></li>
        <li class="divider"></li>
        <li>Sửa thông tin thư viện ảnh</li>
    </ul>
    <div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
        <h3 class="glyphicons display"><i></i>Sửa thông tin thư viện ảnh</h3>
        <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
                src="Image/circle_back_arrow.png"
                alt=""/>Trang trước</a>

        <div class="clearfix"></div>
        <div class="separator"></div>
    </div>
    <div class="form-news">
        <form name="PhotoGallery" id="PhotoGallery" action="PhotoGalleryEditAction.php?id=<?php echo $_REQUEST['id'] ?>"
              method="post"
              enctype="multipart/form-data" accept-charset="utf-8">
            <?php
            $photoGallery = new Class_PhotoGalleryClass();
            $photoGallery->photoGalleryId = $_REQUEST['id'];
            $item = $photoGallery->onePhotoGallery();

            ?>
            <div class="form">
                <div class="form-group ">
                    <label>Tên ảnh </label>
                    <input type="text" placeholder="Tên ảnh..." name="data[PhotoGallery][name]" id="title"
                           value="<?php echo $item['photo_name'] ?>"
                           class="form-control">
                </div>
                <div class="form-group width">
                    <label>Danh mục ảnh </label>
                    <select class="form-control" name="data[PhotoGallery][group]" style="width: 715px">
                        <?php
                        $photoCategory = new Class_PhotoCategoryClass();
                        $photoCat = $photoCategory->getPhotoCategoryTitle();
                        if ($photoCat == null) {
                            echo "Không có danh mục nào";
                        } else {
                            foreach ($photoCat as $value) {

                                ?>

                                <option value="<?php echo $value->photo_cat_id ?>"
                                        <?php if ($item['photo_cat_id'] == $value->photo_cat_id){ ?>selected="selected" <?php } ?>>
                                    <?php echo $value->photo_cat_title ?>
                                </option>
                            <?php }
                        } ?>
                    </select>
                </div>
                <div class="form-group width">
                    <label>Số thự tự hiển thị </label>
                    <input type="text" name="data[PhotoGallery][number]" value="<?php echo $item['photo_number']?>" class="form-control"/>
                </div>
                <div class="form-group width">
                    <label for="status">Trạng thái đăng trang chủ:
                        <input type="checkbox" value="1" name="data[PhotoGallery][status]" id="status" <?php if ($item['photo_status'] == 1){ ?>checked="checked"<?php } ?>/></label>
                    </select>

                </div>
                <div class="form-group width">
                    <?php if ($item['photo_img'] == null){?>
                        <img src="Image/no-image.jpg" alt="" style="height: 100px"/>
                    <?php } else {?>
                    <label>Ảnh hiện tại: </label>
                    <br/>
                    <img src="Image/PhotoGallery/<?php echo $item['photo_img'] ?>" alt=""/>
                    <?php }?>
                    <br/>
                    <label>Xóa ảnh cũ:
                        <input type="checkbox" name="data[PhotoGallery][Image]" value="1"/>
                    </label>
                    <br/>
                    <label>Thay thế ảnh khác: </label><input type="file" name="image" id="image"/>
                    <input type="hidden" name="data[PhotoGallery][oldImage]" value="<?php echo $item['photo_img'] ?>"/>

                </div>
                <div>
                    <input type="submit" value="Sửa danh mục ảnh "/>
                </div>
            </div>
        </form>
    </div>
</div>
