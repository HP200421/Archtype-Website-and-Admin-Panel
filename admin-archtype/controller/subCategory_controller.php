<?php
defined('BASEPATH') OR exit('nope');

class SubCategory extends Authenticated{
    function __construct($conn, $params=array()){
        parent::__construct($conn, $params);
    }
    function index(){            
        $query = "SELECT sub_category.id as sub_id, 
                         sub_category.subcategory_name, 
                         main_category.id AS main_id, 
                         main_category.category_name 
                  FROM sub_category 
                  INNER JOIN main_category 
                  ON sub_category.main_category_id = main_category.id;";   
        $result = $this->conn->query($query);
        $this->render('subCategory/view', array(
            "data" => array(
                "result" => $result,
            )
        ));
    }
    
    function add() {
        $this->render('subCategory/add', array(
           "data" => array(
                "page" => "add",
                "title" => "add",
           ),
            "js" => array(
                'category'
            ),
            ));
    }

    function edit() {
        $params = $this->params;
        $id = $params[0];
        $table = 'sub_category';
        $where = "id = '$id'";
        $result = select_query($this->conn, $table, $where);
        $this->render('subCategory/edit', array(
            "data" => array(
                "result" => $result,
            ),
            "js" => array(
                'category',
            ),
        ));
    }
    
    function create() {
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['subcategory_name']) ? trim($_POST['subcategory_name']) : '';
            $main_id = isset($_POST['main_category_id']) ? (int)$_POST['main_category_id'] : '';
            $slug = createSlug($name);
            
            $query = "INSERT INTO sub_category (subcategory_name, main_category_id, slug) VALUES ('$name', '$main_id', '$slug')";
            $result = $this->conn->prepare($query);
          

            if ($result->execute()) {
                echo json_encode(['success' => true, 'message' => 'Sub Category added successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add sub category: ' . $result->error]);
            }
    
            $result->close();
            $this->conn->close();
            exit;
        }
    
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        exit;
    }
    
    function update() {
        header('Content-Type: application/json'); // Set content type to JSON
        $params = $this->params;
        $id = $params[0];

        if ($id <= 0) {
            echo json_encode(['success' => false, 'message' => 'Invalid sub category ID']);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['subcategory_name']) ? trim($_POST['subcategory_name']) : '';
            $main_id = isset($_POST['main_category_id']) ? (int)$_POST['main_category_id'] : '';
            $slug = createSlug($name);
           
            $query = "UPDATE sub_category SET subcategory_name = '$name', main_category_id='$main_id', slug = '$slug' WHERE id = '$id'";
            $result = $this->conn->prepare($query);

            if ($result->execute()) {
                echo json_encode(['success' => true, 'message' => 'Sub Category updated successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add category: ' . $result->error]);
            }
            $this->conn->close();
            exit;    
        }
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
        exit;
    }

    function delete(){
        $params = $this->params;
        $id = $params[0];
        
        $sql = "DELETE FROM sub_category WHERE id = '$id'";
        if ($this->conn->query($sql) === TRUE) {
            die("<script>alert('Sub Category deleted successfully.'); window.location.href = '".LINK."subCategory';</script>");
        } else {
            echo "Error: " . $this->conn->error;
        }
    }

   

    function getSubCategories($main_category_id = null) {
        // Fetch the main_category_id from the URL if not passed directly
        if ($main_category_id === null) {
            // If using a routing mechanism, this can be accessed via $_GET or $_REQUEST depending on your setup.
            if (isset($_GET['main_category_id'])) {
                $main_category_id = $_GET['main_category_id'];
            } else {
                // If the parameter is passed in the URL, capture it from the request URI
                $uri_parts = explode('/', $_SERVER['REQUEST_URI']);
                $main_category_id = end($uri_parts); // Last part of the URL should be the ID
            }
        }

        if ($main_category_id) {
            $query = "SELECT id, subcategory_name FROM sub_category WHERE main_category_id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $main_category_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $subcategories = [];
            while ($row = $result->fetch_assoc()) {
                $subcategories[] = [
                    'id' => $row['id'],
                    'name' => htmlspecialchars($row['subcategory_name'])
                ];
            }

            echo json_encode($subcategories);
        } else {
            echo json_encode([]); 
        }
    }


    
}
?>