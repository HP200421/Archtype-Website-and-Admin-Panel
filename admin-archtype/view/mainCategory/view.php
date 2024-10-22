<?php 
$data = $result->fetch_all(MYSQLI_ASSOC);
?>

<div class="d-flex flex-row-reverse mb-3">
    <a href="<?= LINK; ?>mainCategory/add">
        <button class="btn btn-primary m-1">
            <i class="icon-plus"></i> Add Category
        </button>
    </a>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Categories</h4>
                <div class="table-responsive pt-1">
                    <?php if (!empty($data)) : ?>
                        <?php foreach ($data as $index => $category) : ?>
                            <div class="card mb-1 d-flex flex-row justify-content-between p-1 border rounded shadow-sm align-items-center">
                                <div>
                                    <span class="font-normal ml-4"><?= $index + 1; ?>.</span>
                                    <span class="m-3 font-medium text-xs"><?= htmlspecialchars($category['category_name']); ?></span>
                                </div>
                                <div class="d-flex gap-1">
                                    <a href="mainCategory/edit/<?= $category['id']; ?>">
                                        <button type="button" class="btn btn-inverse-success btn-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                            </svg>
                                        </button>
                                    </a>
                                    <a href="mainCategory/delete/<?= $category['id']; ?>" onClick="return confirm('Are you sure you want to delete this category?');">
                                        <button type="button" class="btn btn-inverse-danger btn-icon ml-2">
                                            <i class="icon-trash"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>No categories found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>