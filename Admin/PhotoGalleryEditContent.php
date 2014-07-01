<?php include_once("Class/PhotoGalleryClass.php");
include_once("Class/PhotoCategoryClass.php");
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
        <form name="PhotoGalleryEditForm" id="PhotoGalleryEditForm" action="PhotoGalleryEditAction.php?id=<?php echo $_REQUEST['id'] ?>"
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
                    <select class="form-control" name="data[PhotoGallery][number]" style="width: 150px">
                        <option value="1" <?php if ($item['photo_number'] == 1){ ?>selected="selected" <?php } ?>>1
                        </option>
                        <option value="2" <?php if ($item['photo_number'] == 2){ ?>selected="selected" <?php } ?>>2
                        </option>
                    </select>
                </div>
                <div class="form-group width">
                    <label>Trạng thái đăng trang chủ: </label>
                    <select class="form-control" name="data[PhotoGallery][status]" style="width: 150px">
                        <option value="1" <?php if ($item['photo_status'] == 1){ ?>selected="selected" <?php } ?>>
                            Đăng
                        </option>
                        <option value="0" <?php if ($item['photo_status'] == 0){ ?>selected="selected" <?php } ?>>
                            Không đăng
                        </option>
                    </select>

                </div>
                <div class="form-group width">
                    <label>Ảnh hiện tại: </label>
                    <br/>
                    <img src="Image/PhotoGallery/<?php echo $item['photo_img'] ?>" alt=""/>
                    <br/>
                    <label>Thay thế ảnh khác:
                        <input type="checkbox" name="data[PhotoGallery][Image]" value="1"/>
                    </label>
                    <br/>
                    <label>Chọn ảnh: </label><input type="file" name="image" id="image"/>
                    <input type="hidden" name="data[PhotoGallery][oldImage]" value="<?php echo $item['photo_img'] ?>"/>

                </div>
                <div>
                    <input type="submit" value="Sửa danh mục ảnh "/>
                </div>
            </div>
        </form>
    </div>
</div>
