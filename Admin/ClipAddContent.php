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
        <form name="form" id="formCatalog" action="ClipAddAction.php" method="post">
            <div class="form">
                <div class="form-group">
                    <label>Name: </label>
                    <input type="text" placeholder="Name..." id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Link Embed: </label>
                    <input type="text" placeholder="Link Embed..." id="url" name="url" class="form-control">
                </div>
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
