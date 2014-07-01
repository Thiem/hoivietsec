<div id="content">
    <ul class="breadcrumb">

    </ul>
    <div class="heading-buttons">
        <h3 class="glyphicons show_thumbnails_with_lines"><i></i>Quản lý thông báo</h3>

        <div class="buttons pull-right">
            <a class="glyphicons" href="Notice.php"><< Quay lại</a>
        </div>
        <div class="clearfix" style="clear: both;"></div>
    </div>
    <div class="widget widget-gray widget-body-white">
        <div class="widget-head">
            <h4 class="heading">Thêm mới thông báo</h4>
        </div>
    </div>
    <div class="form-notice">
        <form name="form" id="formCatalog" action="NoticeAddAction.php" method="post">
            <div class="form">
                <div class="form-group">
                    <label>Title: </label>
                    <input type="text" placeholder="Title..." id="title" name="title" class="form-control">
                </div>
                <div class="form-group ">
                    <label>Author: </label>
                    <input type="text" placeholder="Author..." name="author" id="author" class="form-control">
                </div>
                <div class="form-group width"><label>Date Posted: </label><input class="form-control" type="text" name="datepicker"
                                                                                 id="datepicker" placeholder="yy/mm/dd"/></div>
                <div><label>Description: </label>

                    <div class="editor">
                        <textarea class="ckeditor" name="description" id="description">

                        </textarea>
                    </div>
                </div>
                <div><label>Content: </label>

                    <div class="editor">
                        <textarea class="ckeditor" name="content" id="content">

                        </textarea>
                    </div>
                </div>
                <div><label>Upload Image: </label><input type="file" name="image" id="image"/></div>
                <div class="form-group width">
                    <label>Status: </label>
                    <input style="margin-top: -3px" type="checkbox" name="state[]"  value="1"/>
                    <input style="margin-top: -3px" type="hidden" name="state[]" value="0" />
                    <label style="margin-left: 20px">Focus: </label>
                    <input style="margin-top: -3px" type="checkbox" name="focus[]" value="1"/>
                    <input style="margin-top: -3px" type="hidden" name="focus[]"  value="0"/>
                </div>
                <div>
                    <input type="submit" name="sub" id="sub" value="Save"/>
                </div>
            </div>
        </form>
    </div>
</div>
