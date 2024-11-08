<?php
$limit = 15; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;
?>
<div class="container">
    <div class="d-flex flex-row justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center">
            <form method="GET" action="<?= LINK; ?>post/index" class="d-flex align-items-center gap-2">
                <input type="text" name="search" class="form-control" placeholder="Search events" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" style="max-height: 35px;">
                <button type="submit" class="btn btn-outline-primary p-2" style="max-height: 35px;"><i class="icon-search"></i></button>
            </form>
        </div>

        <div class="d-flex align-items-center">
            <select name="main_id" class="form-select ml-2" id="parentCategory" style="min-width: 250px; max-height: 40px;">
                <option value="">Select a category</option>
                <!-- Options will be populated dynamically -->
            </select>
        </div>

        <div class="d-flex align-items-center">
            <select name="sub_id" class="form-select ml-2" id="subCategory" style="min-width: 250px; max-height: 40px;">
                <option value="">Select a category</option>
                <!-- Options will be populated dynamically -->
            </select>
        </div>

        <div class="d-flex align-items-center">
            <a href="<?= LINK; ?>post/add" class="btn btn-primary">
                <i class="icon-plus"></i> Add Project
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Project List</h4>
                <div class="table-responsive pt-1">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col">Sr No</th>
                                <th class="col-2">Post Name</th>
                                <th class="col-2">Status</th>
                                <th class="col-2">Location</th>
                                <th class="col-2">Main Category</th>
                                <th class="col-2">Sub Category</th>
                                <th class="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="event-list">
                            <?php
                            $i = $offset; // Start numbering from the current offset and change accordind our need
                            while ($row = mysqli_fetch_array($result)) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= htmlspecialchars($row["post_name"]); ?></td>
                                    <td><?= htmlspecialchars($row["status"]); ?></td>
                                    <td><?= htmlspecialchars($row["location"]); ?></td>
                                    <td><?= isset($row["main_category_name"]) ? htmlspecialchars($row["main_category_name"]) : "No main Category Available" ?></td>
                                    <td><?= isset($row["sub_category_name"]) ? htmlspecialchars($row["sub_category_name"]) : "No sub Category Available" ?></td>
                                    <td>
                                        <a href="post/edit/<?= $row["id"]; ?>"><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                                        <a href="post/delete/<?= $row["id"]; ?>" onclick="return confirm('Are you sure you want to delete this post?');"><button class="btn btn-sm btn-danger">Delete</button></a>
                                    </td>
                                </tr>
                            <?php
                            }
                            if ($i === $offset) { 
                            ?>
                                <tr>
                                    <td colspan="12">No Results Found</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <nav>
                    <ul class="pagination justify-content-center mt-2">
                        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                            <a class="page-link" href="#" data-page="<?= ($page - 1) ?>" data-search="<?= htmlspecialchars($searchTerm) ?>">Previous</a>
                        </li>
                        <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                            <li class="page-item <?= ($p == $page) ? 'active' : '' ?>">
                                <a class="page-link" href="#" data-page="<?= $p ?>" data-search="<?= htmlspecialchars($searchTerm) ?>"><?= $p ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                            <a class="page-link" href="#" data-page="<?= ($page + 1) ?>" data-search="<?= htmlspecialchars($searchTerm) ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
