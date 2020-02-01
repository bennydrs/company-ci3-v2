<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <div class="card mb-4 py-3 border-bottom-primary">
            <div class="card-body">
                <h1 class="h3 mb-2 font-weight-bold text-gray-800"><?= $info['title'] ?></h1>
                <div class="text-xs mb-3 text-gray"><?= date('d F Y', strtotime($info['created_at'])); ?></div>
                <div class="text-dark">
                    <?= $info['content'] ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->