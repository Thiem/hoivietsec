<?php
//include_once "Class/PhotoCategoryClass.php";
?>
<div id="content">
    <ul class="breadcrumb">
        <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
        <li class="divider"></li>
        <li><a href="PhotoGallery.php">Thư viện ảnh</a></li>
        <li class="divider"></li>
        <li>Thêm mới thư viện ảnh</li>
    </ul>
    <div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
        <h3 class="glyphicons display"><i></i>Thêm mới thư viện ảnh</h3>
        <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
                src="Image/circle_back_arrow.png"
                alt=""/>Trang trước</a>

        <div class="clearfix"></div>
        <div class="separator"></div>
    </div>
    <div class="form-news">
        <form name="PhotoGallery" id="PhotoGallery" action="PhotoGalleryAddAction.php" method="post"
              enctype="multipart/form-data" accept-charset="utf-8">
            <?php
            $photoCategory= new Class_PhotoCategoryClass();
            $getPhotoCategoryTitle = $photoCategory->getPhotoCategoryTitle();
            if ($getPhotoCategoryTitle == null) {
                echo "<center>Không có danh mục ảnh được đăng, mời bạn nhập danh mục ảnh<center>";
            } else {

            ?>
            <div class="form">
                <div class="form-group ">
                    <label>Tên ảnh * </label>
                    <input type="text" placeholder="Tên danh mục ảnh..." name="data[PhotoGallery][name]" id="title"
                           class="form-control">
                </div>

                <div class="form-group width">
                    <label>Danh mục ảnh </label>

                    <select class="form-control" name="data[PhotoGallery][photoCat]" style="width: 715px">
                <?php foreach ($getPhotoCategoryTitle as $item)
                {
                    ?>
                        <option value="<?php echo $item->photo_cat_id?>"><?php echo $item->photo_cat_title?></option>
                        <?php }?>
                    </select>

                </div>
                <div class="form-group width">
                    <label>Số thự tự hiển thị </label>
                    <select class="form-control" name="data[PhotoGallery][number]" style="width: 150px">
                        <option value="1">1
                        </option>
                        <option value="2">2
                        </option>
                    </select>
                </div>
                <div class="form-group width">
                    <label for="status">Trạng thái đăng trang chủ:
                    <input type="checkbox" name="data[PhotoGallery][status]" value="1" id="status"/></label>
                </div>
                <div class="form-group width">
                    <label>Upload Image: </label><input type="file" name="image" id="image"/>
                </div>
                <div>
                    <input type="submit" value="Thêm vào thư viện ảnh "/>
                </div>
            </div>
            <?php }?>
        </form>
    </div>
</div>
