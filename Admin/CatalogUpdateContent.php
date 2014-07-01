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
        <?php
        $use = new Class_ClassTableCatalog();
        $use->id = $_REQUEST['id'];
        $array = $use->SelectId();
        foreach($array as $arrayItem){
        ?>
        <form name="form" id="formCatalog" action="CatalogUpdateAction.php" method="post">
            <div><input type="hidden" name="id" value="<?php echo $arrayItem->ca_id;?>"/></div>
            <div class="form">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" placeholder="Name..." id="name" name="name" class="form-control" value="<?php echo $arrayItem->ca_name;?>">
                </div>
                <div class="form-group ">
                    <label>CatalogID: </label>
                    <input type="text" placeholder="Mã danh mục..." name="catalogID" id="catalogID" class="form-control" value="<?php echo $arrayItem->catalogid;?>">
                </div>
                <div>
                    <input type="submit" name="sub" id="sub" value="Save"/>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>
