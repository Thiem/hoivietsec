<div id="content">
    <ul class="breadcrumb">
    </ul>
    <div class="heading-buttons">
        <h3 class="glyphicons display"><i></i>Quản lý tin tức</h3>
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
        $use = new Class_ClassTableNews();
        $use->id = $_REQUEST['id'];
        $array = $use->SelectId();
        foreach($array as $arrayItem){
        ?>
        <form name="formNews" id="formNews" action="NewUpdateAction.php" method="post" enctype="multipart/form-data">
            <div><input type="hidden" name="id" value="<?php echo $arrayItem->ne_id;?>"/></div>
            <div class="form">
                <div class="form-group ">
                    <label>Title: </label>
                    <input type="text" placeholder="Title..." name="title" id="title" class="form-control" value="<?php echo $arrayItem->ne_title; ?>">
                </div>
                <div class="form-group ">
                    <label>Author: </label>
                    <input type="text" placeholder="Author..." name="author" id="author" class="form-control" value="<?php echo $arrayItem->ne_author; ?>">
                </div>
                <div class="form-group width"><label>Date Posted: </label><input class="form-control" type="text" name="datepicker"
                                                                          id="datepicker" placeholder="yy/mm/dd" value="<?php echo $arrayItem->ne_date;?>"/></div>
                <div><label>Description: </label>

                    <div class="editor">
                        <textarea class="ckeditor" name="description" id="description">
                            <?php echo $arrayItem->ne_destion;?>
                        </textarea>
                    </div>
                </div>
                <div><label>Content: </label>

                    <div class="editor">
                        <textarea class="ckeditor" name="content" id="content">
                            <?php echo $arrayItem->ne_content;?>
                        </textarea>
                    </div>
                </div>
                <div><label>Upload Image: </label><input type="file" name="image" id="image"/>
                <img width="150" height="50" src="Image/<?php echo $arrayItem->ne_image; ?>"><br/>
                <label>Xóa ảnh: </label><input style="margin-top: -3px" type="checkbox" name="delFile" value="1">
                <input type="hidden" name="nameImage" value="<?php echo $arrayItem->ne_image;?>">
                </div>
                <div class="form-group">
                    <label>Catalog: </label>
                    <select class="form-control" name="catalogID">
                        <option value="0">--Catalog--</option>
                        <?php
                        $select = new Class_ClassTableCatalog();
                        $catalogArray = $select->SelectCatalogName();
                        foreach ($catalogArray as $catalogItem) {
                            ?>
                            <option value="<?php echo $catalogItem->ca_id;?>"<?php if($arrayItem->catalogid==$catalogItem->ca_id){?>selected="selected" <?php }?>><?php echo $catalogItem->ca_name;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group width">
                    <label>Status: </label>
                    <input style="margin-top: -3px" type="checkbox" name="state[]" <?php if($arrayItem->ne_state==1){?>checked="checked"<?php }?> value="1"/>
                    <input style="margin-top: -3px" type="hidden" name="state[]" value="0" />
                    <label style="margin-left: 20px">Focus: </label>
                    <input style="margin-top: -3px" type="checkbox" name="focus[]" <?php if($arrayItem->ne_focus==1){?>checked="checked"<?php }?> value="1"/>
                    <input style="margin-top: -3px" type="hidden" name="focus[]"  value="0"/>
                    <label style="margin-left: 20px">Special: </label>
                    <input style="margin-top: -3px" type="checkbox" name="special[]" <?php if($arrayItem->ne_special==1){?>checked="checked"<?php }?> value="1"/>
                    <input style="margin-top: -3px" type="hidden" name="special[]"  value="0"/>
                </div>
                <div>
                    <button type="submit">Save</button>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</div>
