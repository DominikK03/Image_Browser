<?php require 'partials/nav.php' ?>
<?php require 'partials/head.php' ?>
<?php require 'partials/banner.php' ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <form action="/upload" method="POST" enctype="multipart/form-data">
                <input type="file" name="image">
                <button type="submit">Upload</button>
        </div>
    </main>

<?php require 'partials/footer.php'; ?>