<div id="content">
    <ul class="breadcrumb">
        <li><a href="Index.php" class="glyphicons home"><i></i>Trang quản trị</a></li>
        <li class="divider"></li>
        <li><a href="GroupList.php">Danh mục ảnh</a></li>
        <li class="divider"></li>
        <li>Thêm mới danh mục ảnh</li>
    </ul>
    <div class="heading-buttons" style="background: #ECECEC; padding: 2px;">
        <h3 class="glyphicons display"><i></i>Thêm mới danh mục ảnh</h3>
        <a href="javascript:void(0)" style="float: right; margin-right: 10px; margin-top: 15px;" onclick="goBack()"><img
                src="Image/circle_back_arrow.png"
                alt=""/>Trang trước</a>

        <div class="clearfix"></div>
        <div class="separator"></div>
    </div>
    <div class="form-news">
        <form name="FaqEditForm" id="FaqEditForm" action="PhotoCategoryAddAction.php" method="post"
              enctype="multipart/form-data" accept-charset="utf-8">

            <div class="form">
                <div class="form-group ">
                    <label>Tên danh mục ảnh * </label>
                    <input type="text" placeholder="Tên danh mục ảnh..." name="data[PhotoCat][name]" id="title"
                           class="form-control">
                </div>
                <div class="form-group width">
                    <label>Số thự tự hiển thị </label>
                    <select class="form-control" name="data[PhotoCat][number]" style="width: 150px">
                        <option value="1">1
                        </option>
                        <option value="2">2
                        </option>
                    </select>
                </div>
                <div class="form-group width">
                    <label>Trạng thái đăng trang chủ: </label>
                    <select class="form-control" name="data[PhotoCat][status]" style="width: 150px">
                        <option value="1">Đăng
                        </option>
                        <option value="0">Không đăng
                        </option>
                    </select>
                </div>
                <div class="form-group width">
                    <label>Upload Image: </label><input type="file" name="image" id="image"/>
                </div>
                <div>
                    <input type="submit" value="Thêm mới danh mục ảnh "/>
                </div>
            </div>
        </form>
    </div>
</div>
