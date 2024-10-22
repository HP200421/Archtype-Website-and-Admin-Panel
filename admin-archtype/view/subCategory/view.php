<?php
$data = $result->fetch_all(MYSQLI_ASSOC);

$categoryTree = [];
foreach ($data as $item) {
    $categoryTree[$item['main_id']]['main_id'] = $item['main_id'];
    $categoryTree[$item['main_id']]['category_name'] = $item['category_name'];
    $categoryTree[$item['main_id']]['subcategories'][] = [
        'sub_id' => $item['sub_id'],
        'subcategory_name' => $item['subcategory_name']
    ];
}

function showCategories($categories) {
    $index = 1;
    foreach ($categories as $category) {
        echo '<div class="card mb-2 border">';
        echo '<div class="card-body">';
        
        echo '<h5 class="font-weight-bold mb-3">' .($index).'. '. htmlspecialchars($category['category_name']) . '</h5>';

        if (!empty($category['subcategories'])) {
            echo '<div class="d-flex flex-column">';

            foreach ($category['subcategories'] as $subcategory) {
                echo '<div class="d-flex justify-content-between align-items-center mb-2 border p-1 rounded" style="margin-left: 1.5em;">'; // Added 
            
                echo '<span><i class="mdi mdi-subdirectory-arrow-right"></i> ' . htmlspecialchars($subcategory['subcategory_name']) . '</span>';

          
                echo '<div class="d-flex gap-1">';
                echo '<a href="subCategory/edit/' . $subcategory['sub_id'] . '"><button type="button" class="btn btn-inverse-success btn-icon">';
                echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">';
                echo '<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>';
                echo '</svg></button></a>';
                
                echo '<a href="subCategory/delete/' . $subcategory['sub_id'] . '" onClick="return confirm(\'Are you sure you want to delete this subcategory?\');">';
                echo '<button type="button" class="btn btn-inverse-danger btn-icon"><i class="icon-trash"></i></button></a>';
                echo '</div></div>'; 
            }

            echo '</div>'; 
        }

        echo '</div>'; 
        echo '</div>'; 

        $index++;
    }
}
?>

<div class="d-flex flex-row-reverse mb-3">
    <a href="<?= LINK; ?>subCategory/add">
        <button class="btn btn-primary m-1">
            <i class="icon-plus"></i> Add Subcategory
        </button>
    </a>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Subcategories</h4>
                <div class="table-responsive pt-1">
                    <?php showCategories($categoryTree); ?>
                </div>
            </div>
        </div>
    </div>
</div>
