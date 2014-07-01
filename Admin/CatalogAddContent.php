<div id="content">
    <ul class="breadcrumb">

    </ul>
    <div class="heading-buttons">
        <h3 class="glyphicons show_thumbnails_with_lines"><i></i>Quản lý danh mục</h3>

        <div class="buttons pull-right">
            <a class="glyphicons" href="Catalog.php"><< Quay lại</a>
        </div>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    <div class="widget widget-gray widget-body-white">
        <div class="widget-head">
            <h4 class="heading">Thêm mới danh mục</h4>
        </div>
    </div>
    <div class="form-notice">
        <form name="form" id="formCatalog" action="CatalogAddAction.php" method="post">
            <div class="form">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" placeholder="Name..." id="name" name="name" class="form-control">
                </div>
                <div class="form-group ">
                    <label>CatalogID: </label>
                    <input type="text" placeholder="Mã danh mục..." name="catalogID" id="catalogID" class="form-control">
                </div>
                <div>
                    <input type="submit" name="sub" id="sub" value="Save"/>
                </div>
            </div>
        </form>
    </div>
</div>
