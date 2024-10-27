<?php
defined('BASEPATH') OR exit('nope');

class Post extends Authenticated{
    function __construct($conn, $params=array()){
        parent::__construct($conn, $params);
    }
    
    function index() {
        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
        $mainCategoryId = isset($_GET['main_id']) ? $_GET['main_id'] : '';
        $subCategoryId = isset($_GET['sub_id']) ? $_GET['sub_id'] : '';
    
        // Pagination
        $limit = 15;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;
    
        $query = "SELECT p.id, 
                         p.post_name, 
                         p.thumbnail_image, 
                         p.details, 
                         p.main_id, 
                         p.sub_id, 
                         p.status, 
                         p.location, 
                         mc.category_name AS main_category_name, 
                         sc.subcategory_name AS sub_category_name
                  FROM posts p
                  LEFT JOIN main_category mc ON p.main_id = mc.id
                  LEFT JOIN sub_category sc ON p.sub_id = sc.id
                  WHERE p.post_name LIKE ?
                    AND (? = '' OR p.main_id = ?)
                    AND (? = '' OR p.sub_id = ?)
                  ORDER BY p.id DESC
                  LIMIT ? OFFSET ?;
                  ";
    
        // Prepare the statement
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error); // Debugging line to show SQL error
        }
    
        $searchTermWildcard = '%' . $searchTerm . '%';
    
        $stmt->bind_param('siiiiii', $searchTermWildcard, $mainCategoryId, $mainCategoryId, $subCategoryId, $subCategoryId, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
    
        $countQuery = "SELECT COUNT(*) as total
                       FROM posts p
                       WHERE p.post_name LIKE ?
                       AND (? = '' OR p.main_id = ?)
                       AND (? = '' OR p.sub_id = ?)";
    
        $stmtCount = $this->conn->prepare($countQuery);
        if (!$stmtCount) {
            die("Prepare failed: " . $this->conn->error); // Debugging line for count query
        }
    
        // Bind parameters for the count query
        $stmtCount->bind_param('sssss', $searchTermWildcard, $mainCategoryId, $mainCategoryId, $subCategoryId, $subCategoryId);
        $stmtCount->execute();
        $countResult = $stmtCount->get_result()->fetch_assoc();
        $totalRows = $countResult['total'];
        $totalPages = ceil($totalRows / $limit);
    
        // Render the view with the results
        $this->render('post/view', array(
            "data" => array(
                'result' => $result,
                'totalPages' => $totalPages,
                'currentPage' => $page,
                'searchTerm' => htmlspecialchars($searchTerm),
                'main_id' => htmlspecialchars($mainCategoryId),
                'sub_id' => htmlspecialchars($subCategoryId)
            ),
            'js' => array(
                'pagination',
                'category'
            )
        ));
    }
    
    
    function add() {
        $this->render('post/add', array(
           "data" => array(
                "page" => "add",
                "title" => "add",
           ),
            "js" => array(
                'category'
            ),
            ));
    }

    function create() {
        header('Content-Type: application/json');
        $targetDir = UPLOAD;
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postName = isset($_POST['post_name']) ? trim($_POST['post_name']) : '';
            $location = isset($_POST['location']) ? trim($_POST['location']) : '';
            $status = trim($_POST['status']);
            $subCatId = isset($_POST['sub_id']) ? $_POST['sub_id'] : '';
            $mainCatId = isset($_POST['main_id']) ? $_POST['main_id'] : '';
            $postDetails = isset($_POST['details']) ? trim($_POST['details']) : '';
            $post_files = $_FILES['post_files'];
            $thumbnail_image = $_FILES['thumbnail'];
            $slug = createSlug($postName);
    
            if (empty($postName) || empty($location) || empty($subCatId) || empty($mainCatId)) {
                echo json_encode(['success' => false, 'message' => 'Post name, location, sub-category, and main category are required.']);
                exit();
            }
    
            $postFilePaths = [];
            $thumbnailFilePaths = [];
            $uploadSuccess = true;
    
            // Handle thumbnail upload
            if (!empty($thumbnail_image['name'])) {
                $uploadResult = uploadFile($thumbnail_image);
                if (!$uploadResult['uploadSuccess']) {
                    $uploadSuccess = false;
                    echo json_encode(['success' => false, 'message' => $uploadResult['uploadError']]);
                    exit();
                }
                $thumbnailFilePaths = $uploadResult['filePaths'];
            }
    
            // Handle post files upload
            if (!empty($post_files['name'][0])) {
                $uploadResult = uploadFile($post_files);
                if (!$uploadResult['uploadSuccess']) {
                    $uploadSuccess = false;
                    echo json_encode(['success' => false, 'message' => $uploadResult['uploadError']]);
                    exit();
                }
                $postFilePaths = $uploadResult['filePaths'];
            }
    
            if ($uploadSuccess) {
                $postFilePathsJson = json_encode($postFilePaths);
                $thumbnailFilePathsJson = json_encode($thumbnailFilePaths);
    
                $query = "INSERT INTO posts (post_name, location, status, main_id, sub_id, details, post_images, thumbnail_image, slug) 
                          VALUES ('$postName', '$location', '$status', '$mainCatId', '$subCatId', '$postDetails', '$postFilePathsJson', '$thumbnailFilePathsJson', '$slug')";
                $result = $this->conn->query($query);
    
                if ($result) {
                    echo json_encode(['success' => true, 'message' => 'Post added successfully.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Database insertion error.']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'File upload error.']);
            }
    
            $this->conn->close();
            exit();
        }
    
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
        exit();
    }
     

    function delete(){
        $params = $this->params;
        $id = $params[0];
        $table = 'posts';
        $where = "id = '$id'";
        $result = select_query($this->conn, $table, $where);

        if ($result && $getalldata = mysqli_fetch_assoc($result)) {
            $post_images_json = $getalldata['post_images'];
            $thumbnail_image_json = $getalldata['thumbnail_image'];
            $post_images_filePaths = json_decode($post_images_json, true);
            $thumbnail_image_filePaths = json_decode($thumbnail_image_json, true);

            deleteFile($post_images_filePaths);
            deleteFile($thumbnail_image_filePaths);
            $sql = "DELETE FROM posts WHERE id = '$id'";
            if ($this->conn->query($sql) === TRUE) {
                die("<script>alert('Post deleted successfully.'); window.location.href = '".LINK."post';</script>");
            } else {
                echo "Error: " . $this->conn->error;
            }
        }
    }

    function edit() {
        $params = $this->params;
        $id = $params[0];
        $table = 'posts';
        $where = "id = '$id'";
        $result = select_query($this->conn, $table, $where);
        $this->render('post/edit', array(
           "data" => array(
                "result" => $result,
           ),
            "js" => array(
                'category'
            ),
            ));
    }

    function update1() {
        header('Content-Type: application/json'); // Set content type to JSON
        $params = $this->params;
        $id = $params[0];
        $table = 'posts';
        $where = "id = '$id'";
        $result = select_query($this->conn, $table, $where);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $post_images_json = $row['post_images'];
            $thumbnail_image_json = $row['thumbnail_image'];
            $post_images_filePaths = json_decode($post_images_json, true);
            $thumbnail_image_filePath = json_decode($thumbnail_image_json, true);
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $postName = validate($_POST['post_name']);
                $location = validate($_POST['location']);
                $status = validate($_POST['status']);
                $postDetails = isset($_POST['details']) ? trim($_POST['details']) : '';
                $subCatId = isset($_POST['sub_id']) ? $_POST['sub_id'] : '';
                $mainCatId = isset($_POST['main_id']) ? $_POST['main_id'] : '';
                $post_images = $_FILES['post_files'];
                $thumbnail_image = $_FILES['thumbnail'];
                $slug = createSlug($postName);
                
                // Validate input fields
                if ($postName == "" || $location == "" || $subCatId == "" || $mainCatId == "") {
                    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
                    exit;
                }
    
                // Handle file deletions
                $deletedPostImages = isset($_POST['RemovePostImages']) ? $_POST['RemovePostImages'] : [];
                $deletedThumbnailImage = isset($_POST['RemoveThumbnailImage']) ? $_POST['RemoveThumbnailImage'] : [];
                $remainingPostImages = array_diff($post_images_filePaths, $deletedPostImages);
                $remainingThumbnailImage = array_diff($thumbnail_image_filePath, $deletedThumbnailImage);
                
                foreach ($deletedPostImages as $filePath) {
                    if (file_exists(UPLOAD . $filePath)) {
                        unlink(UPLOAD . $filePath);
                    }
                }
    
                foreach ($deletedThumbnailImage as $filePath) {
                    if (file_exists(UPLOAD . $filePath)) {
                        unlink(UPLOAD . $filePath);
                    }
                }
    
                $newpostFilePaths = [];
                $newthumbnailFilePaths = [];
                $uploadSuccess = true;
    
                if (!empty($post_images['name'][0])) {
                    $uploadResult = uploadFile($post_images);
                    if (!$uploadResult['uploadSuccess']) {
                        $uploadSuccess = false;
                        echo json_encode(['success' => false, 'message' => $uploadResult['uploadError']]);
                        die();
                    }
                    $newpostFilePaths = $uploadResult['filePaths'];
                }
                
                if (!empty($thumbnail_image['name'][0])) {
                    $uploadResult = uploadFile($thumbnail_image);
                    if (!$uploadResult['uploadSuccess']) {
                        $uploadSuccess = false;
                        echo json_encode(['success' => false, 'message' => $uploadResult['uploadError']]);
                        die();
                    }
                    $newthumbnailFilePaths = $uploadResult['filePaths'];
                }        
                
                if ($uploadSuccess) {
                    $finalPostPaths = array_merge($remainingPostImages, $newpostFilePaths);
                    $finalThumbnailPaths = array_merge($remainingThumbnailImage, $newthumbnailFilePaths);
                    
                    $postFilesJson = json_encode($finalPostPaths);
                    $thumbnailFilesJson = json_encode($finalThumbnailPaths);
                
                    $query = "UPDATE posts SET 
                              post_name='$postName', 
                              location='$location', 
                              status='$status',
                              sub_id='$subCatId',
                              main_id='$mainCatId',
                              details='$postDetails', 
                              post_images='$postFilesJson', 
                              thumbnail_image='$thumbnailFilesJson' 
                              slug='$slug'
                              WHERE id='$id'";
                    
                    $updateResult = $this->conn->query($query);
    
                    if ($updateResult) {
                        echo json_encode(['success' => true, 'message' => 'Event updated successfully.']);
                        die();
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Database update error.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'File upload error.']);
                }
    
                $this->conn->close();
                exit;
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Event data not found.']);
            exit;
        }
    
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
        exit;
    }

    function update() {
        header('Content-Type: application/json'); // Set content type to JSON
        $params = $this->params;
        $id = $params[0];
        $table = 'posts';
        $where = "id = '$id'";
        $result = select_query($this->conn, $table, $where);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $post_images_json = $row['post_images'];
            $thumbnail_image_json = $row['thumbnail_image'];
            $post_images_filePaths = json_decode($post_images_json, true);
            $thumbnail_image_filePath = json_decode($thumbnail_image_json, true);
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $postName = validate($_POST['post_name']);
                $location = validate($_POST['location']);
                $status = validate($_POST['status']);
                $postDetails = isset($_POST['details']) ? trim($_POST['details']) : '';
                $subCatId = isset($_POST['sub_id']) ? $_POST['sub_id'] : '';
                $mainCatId = isset($_POST['main_id']) ? $_POST['main_id'] : '';
                $post_images = $_FILES['post_files'];
                $thumbnail_image = $_FILES['thumbnail'];
                
                // Validate input fields
                if ($postName == "" || $location == "" || $subCatId == "" || $mainCatId == "") {
                    echo json_encode(['success' => false, 'message' => 'All fields are required.']);
                    exit;
                }
    
                // Handle file deletions
                $deletedPostImages = isset($_POST['RemovePostImages']) ? $_POST['RemovePostImages'] : [];
                $deletedThumbnailImage = isset($_POST['RemoveThumbnailImage']) ? $_POST['RemoveThumbnailImage'] : [];
                $remainingPostImages = array_diff($post_images_filePaths, $deletedPostImages);
    
                // Delete files that are marked for deletion
                foreach ($deletedPostImages as $filePath) {
                    if (file_exists(UPLOAD . $filePath)) {
                        unlink(UPLOAD . $filePath);
                    }
                }
    
                // If the user wants to delete the thumbnail
                if (!empty($deletedThumbnailImage)) {
                    foreach ($thumbnail_image_filePath as $filePath) {
                        if (file_exists(UPLOAD . $filePath)) {
                            unlink(UPLOAD . $filePath); // Delete the existing thumbnail if marked for deletion
                        }
                    }
                    $thumbnail_image_filePath = []; // Reset the thumbnail path to indicate no thumbnail
                }
    
                $newpostFilePaths = [];
                $uploadSuccess = true;
    
                // Upload new post images
                if (!empty($post_images['name'][0])) {
                    $uploadResult = uploadFile($post_images);
                    if (!$uploadResult['uploadSuccess']) {
                        $uploadSuccess = false;
                        echo json_encode(['success' => false, 'message' => $uploadResult['uploadError']]);
                        die();
                    }
                    $newpostFilePaths = $uploadResult['filePaths'];
                }
    
                // Check if a new thumbnail image is uploaded
                $newThumbnailPath = '';
                if (!empty($thumbnail_image['name'][0])) {
                    // Upload the new thumbnail image
                    $uploadResult = uploadFile($thumbnail_image);
                    if (!$uploadResult['uploadSuccess']) {
                        $uploadSuccess = false;
                        echo json_encode(['success' => false, 'message' => $uploadResult['uploadError']]);
                        die();
                    }
                    $newThumbnailPath = $uploadResult['filePaths'][0]; // Assume single file upload
                } else {
                    // If no new thumbnail uploaded, retain the existing one
                    $newThumbnailPath = !empty($thumbnail_image_filePath) ? $thumbnail_image_filePath[0] : '';
                }
    
                if ($uploadSuccess) {
                    // Combine existing and new file paths
                    $finalPostPaths = array_merge($remainingPostImages, $newpostFilePaths);
                    $finalThumbnailPaths = !empty($newThumbnailPath) ? [$newThumbnailPath] : [];
    
                    $postFilesJson = json_encode($finalPostPaths);
                    $thumbnailFilesJson = json_encode($finalThumbnailPaths);
                
                    // Update the database
                    $query = "UPDATE posts SET 
                              post_name='$postName', 
                              location='$location', 
                              status='$status',
                              sub_id='$subCatId',
                              main_id='$mainCatId',
                              details='$postDetails', 
                              post_images='$postFilesJson', 
                              thumbnail_image='" . json_encode($finalThumbnailPaths) . "' 
                              WHERE id='$id'";
                    
                    $updateResult = $this->conn->query($query);
    
                    if ($updateResult) {
                        echo json_encode(['success' => true, 'message' => 'Event updated successfully.']);
                        die();
                    } else {
                        echo json_encode(['success' => false, 'message' => 'Database update error.']);
                    }
                } else {
                    echo json_encode(['success' => false, 'message' => 'File upload error.']);
                }
    
                $this->conn->close();
                exit;
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Event data not found.']);
            exit;
        }
    
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
        exit;
    }
    
    
}
?>