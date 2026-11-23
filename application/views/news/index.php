<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title; ?></h1>
    <a href="<?php echo site_url('news/create'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white-50"></i> Add News
    </a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
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
                            <a href="<?php echo site_url('news/' . $news_item['slug']); ?>">View</a>

                            <?php if ($this->session->userdata('is_logged_in')) { ?>
                                |
                                <a href="<?php echo site_url('news/edit/' . $news_item['id']); ?>">Edit</a> |
                                <a href="<?php echo site_url('news/delete/' . $news_item['id']); ?>"
                                   onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                            <?php } // end if ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
