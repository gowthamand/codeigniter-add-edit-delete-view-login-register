<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
    <a href="<?php echo site_url('news'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">News List</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
    </div>
    <div class="card-body">
        <?php $attributes = array("name" => "newsform", "role" => "form"); ?>
        <?php echo form_open_multipart('news/create', $attributes); ?>
        <div class="form-group <?php echo form_error('title') ? 'has-error' : '' ?>">
            <label class="control-label">Enter Title</label>
            <input name="title" placeholder="Enter Title" class="form-control">
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
