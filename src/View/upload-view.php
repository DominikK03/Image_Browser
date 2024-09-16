<div class="col-2">
    <div class="mb-2 p-1 text-center">
        <h1 class="fw-bold fs-6">Upload</h1>
    </div>

    <div class="p-1 text-center">
        <form action="/uploadimage" method="post" enctype="multipart/form-data">
            <input class="form-control form-control-sm mb-2" type="file" name="image" style="border:none;" required>
            <button class="btn btn-sm btn-outline-secondary" type="submit">Upload</button>
        </form>
    </div>

    <div class="text-center mt-1">
        <small class="text-muted">
            File must be image (.jpg, .jpeg, .png, .gif)<br>
            Max size: 1 MB<br>
            Only one upload allowed
        </small>
    </div>

    <div class="text-center mt-1">
        <?php if (!empty($uploadStatus)) { ?>
            <small>Status: <strong><?= strtoupper($uploadStatus) ?></strong></small>
        <?php } ?>
    </div>
</div>