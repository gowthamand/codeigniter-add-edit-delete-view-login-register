<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3 class="page-header"><?php echo $title; ?></h3>
        </div>
        <div class="col-lg-2">
            <a href="<?php echo site_url('news'); ?>" class="page-header btn btn-success pull-right">News List</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $title; ?></div>
                <?php $attributes = array("name" => "newsform", "role" => "form"); ?>
                <?php echo form_open_multipart('news/create', $attributes); ?>
                <div class="panel-body">
                <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>"">
                    <label class="control-label"> Enter Title</label>
                    <input name="title" placeholder="Eneter Title" class="form-control">
                </div>
                <div class="form-group <?php echo form_error('text') ? 'has-error' : '' ?>">
                    <label class="control-label">Enter Text</label>
                    <textarea name="text" class="form-control" rows="10" cols="40"></textarea>
                </div>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>"/>
                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                <a href="<?php echo site_url('news'); ?>" class="btn btn-warning">Reset</a>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
