<div id="content">
    <ul class="breadcrumb">

    </ul>
    <div class="heading-buttons">
        <h3 class="glyphicons show_thumbnails"><i></i>Module Clip</h3>

        <div class="buttons pull-right">
            <a class="glyphicons" href="Clip.php"><< Quay lại</a>
        </div>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    <div class="widget widget-gray widget-body-white">
        <div class="widget-head">
            <h4 class="heading">Thêm mới clip</h4>
        </div>
    </div>
    <div class="form-notice">
        <?php
        $use = new Class_ClassTableClip();
        $use->id = $_REQUEST['id'];
        $array = $use->SelectId();
        foreach($array as $arrayItem){
        ?>
        <form name="form" id="formCatalog" action="ClipUpdateAction.php" method="post">
            <div><input type="hidden" name="id" value="<?php echo $arrayItem->cl_id;?>"/></div>
            <div class="form">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" placeholder="Name..." id="name" name="name" class="form-control" value="<?php echo $arrayItem->cl_name; ?>">
                </div>
                <div class="form-group">
                    <label>Link Embed: </label>
                    <input type="text" placeholder="Link Embed..." id="url" name="url" class="form-control" value="<?php echo $arrayItem->cl_url; ?>">
                </div>
                <div class="form-group width">
                    <label>Status: </label>
                    <select class="form-control" name="state">
                        <option value="0">--Status--</option>
                        <option value="0" <?php if($arrayItem->cl_state==0){?>selected="selected" <?php }?>>Không hiệu lực</option>
                        <option value="1" <?php if($arrayItem->cl_state==1){?>selected="selected" <?php }?>>Hiệu lực</option>
                    </select>
                </div>
                <div>
                    <input type="submit" name="sub" id="sub" value="Save"/>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>
