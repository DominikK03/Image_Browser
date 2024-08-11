<?php require 'partials/head.php' ?>
<?php require 'partials/nav.php' ?>
<?php require 'partials/banner.php' ?>
    <div class="container-fluid">

        <div class="mb-2 p-1 bg-dark text-white">
            <h1 class="display-4 text-center fw-bold">Upload your Image</h1>
        </div>
        <div class="p-3 border-bottom">
            <h2 class="lead display-6 text-start fw-bold">
                Requirements
            </h2>
            <small>
                <p class="lead text-secondary fs-6">
                    File must be image type (.jpg .jpeg .png .gif) <br>
                    Maximum file size: 1 MB <br>
                    File cannot be uploaded second time
                </p>
            </small>

        </div>
        <div class="m-3 p-3 border-bottom text-center">
            <form action="/upload/uploadimage" method="post" enctype="multipart/form-data">
                <input class="btn btn-sm border-secondary rounded" type="file" name="image">
                <button class="btn btn-outline-secondary btn-sm" type="submit">Upload</button>
            </form>
        </div>
        <div class="m-3 p-3 text-center">
            <?php if (!empty($uploadStatus)) { ?>
                Status of uploaded file: <strong><?= strtoupper($uploadStatus) ?></strong>
            <?php } ?>
        </div>

    </div>
    </div>
<?php require 'partials/footer.php'; ?>