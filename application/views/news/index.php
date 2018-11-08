<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-10">
            <h3 class="page-header"><?php echo $title; ?></h3>
        </div>
        <div class="col-lg-2">
            <a href="<?php echo site_url('news/create'); ?>" class="page-header btn btn-success pull-right">Add News</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo $title; ?>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Sn</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($news as $news_item): ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $news_item['title']; ?></td>
                                    <td><?php echo $news_item['text']; ?></td>
                                    <td>
                                        <a href="<?php echo site_url('news/' . $news_item['slug']); ?>"><label
                                                    style="cursor: pointer;">View</label></a>

                                        <?php if ($this->session->userdata('is_logged_in')) { ?>
                                            |
                                            <a href="<?php echo site_url('news/edit/' . $news_item['id']); ?>"><label
                                                        style="cursor: pointer;">Edit</label></a> |
                                            <a href="<?php echo site_url('news/delete/' . $news_item['id']); ?>"
                                               onClick="return confirm('Are you sure you want to delete?')">
                                                <label style="cursor: pointer;">Delete</label></a>
                                        <?php } // end if ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>