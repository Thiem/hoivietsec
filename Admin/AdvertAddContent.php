<div id="content">
    <ul class="breadcrumb">
    </ul>
    <div class="heading-buttons">
        <h3 class="glyphicons coins"><i></i> Quản lý quảng cáo</h3>
<!--        <div class="buttons pull-right">-->
<!--            <a class="btn btn-primary btn-icon glyphicons circle_plus" href="A"><i></i> Add new</a>-->
<!--        </div>-->
        <div class="buttons pull-right">
            <a class="glyphicons" href="Advert.php"><< Quay lại</a>
        </div>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    <div class="widget widget-gray widget-body-white">
        <div class="widget-head">
            <h4 class="heading">Thêm mới quảng cáo</h4>
        </div>
    </div>
<div class="form-advert">
    <form name="formCatalog" id="formCatalog" action="AdvertAddAction.php" method="post" enctype="multipart/form-data">
        <div class="form">
            <div class="form-group">
                <label>Name: </label>
                <input type="text" placeholder="Name..." id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Link: </label>
                <input type="text" placeholder="Link..." id="link" name="link" class="form-control">
            </div>
            <div><label>Upload Image: </label><input type="file" name="image" id="image"/></div>
            <div class="form-group width">
                <label>Status: </label>
                <select class="form-control" name="state">
                    <option value="0">--Status--</option>
                    <option value="0">Không hiệu lực</option>
                    <option value="1">Hiệu lực</option>
                </select>
            </div>
            <div>
                <input type="submit" name="sub" id="sub" value="Save"/>
            </div>
        </div>
    </form>
</div>
</div>