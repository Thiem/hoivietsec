<div id="content">
    <ul class="breadcrumb">
    </ul>
    <div class="heading-buttons">
        <h3 class="glyphicons display"><i></i>Quản lý quảng cáo</h3>
        <div class="buttons pull-right">
            <a class="glyphicons" href="News.php"><< Quay lại</a>
        </div>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    <div class="widget widget-gray widget-body-white">
        <div class="widget-head">
            <h4 class="heading"> Sửa tin tức</h4>
        </div>
    </div>
    <div class="form-news">
        <?php
        $use = new Class_ClassTableAdvert();
        $use->id = $_REQUEST['id'];
        $array = $use->SelectId();
        foreach($array as $arrayItem){
            ?>
            <form name="formNews" id="formNews" action="AdvertUpdateAction.php" method="post" enctype="multipart/form-data">
                <div><input type="hidden" name="id" value="<?php echo $arrayItem->ad_id;?>"/></div>
                <div class="form">
                    <div class="form-group ">
                        <label>Name: </label>
                        <input type="text" placeholder="Name..." name="name" id="name" class="form-control" value="<?php echo $arrayItem->ad_name; ?>">
                    </div>
                    <div class="form-group ">
                        <label>Link: </label>
                        <input type="text" placeholder="Link..." name="link" id="link" class="form-control" value="<?php echo $arrayItem->ad_link; ?>">
                    </div>

                    <div><label>Upload Image: </label><input type="file" name="image" id="image"/></div>
                    <div class="form-group width">
                        <label>Status: </label>
                        <select class="form-control" name="state">
                            <option value="0">--Status--</option>
                            <option value="0" <?php if($arrayItem->ad_state==0){?>selected="selected" <?php }?>>Không hiệu lực</option>
                            <option value="1" <?php if($arrayItem->ad_state==1){?>selected="selected" <?php }?>>Hiệu lực</option>
                        </select>
                    </div>
                    <div>
                        <button type="submit">Save</button>
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
