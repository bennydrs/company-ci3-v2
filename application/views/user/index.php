<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Informasi</h1>

    <style>
        a:hover,
        a:visited {
            text-decoration: none;
        }
    </style>

    <!-- Content Row -->
    <div class="row">

        <?php foreach ($info as $i) : ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-md-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a href="<?= base_url('user/show_info/' . $i['id']) ?>" class="link">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $i['title']; ?></div>
                                </a>
                                <div class="text-sm text-gray"><?= word_limiter($i['content'], 15); ?></div>
                                <div class="text-xs text-gray"><?= date('d F Y', strtotime($i['created_at'])); ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-info fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->