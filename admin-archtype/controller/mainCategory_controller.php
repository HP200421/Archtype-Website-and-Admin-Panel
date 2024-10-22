<?php
defined('BASEPATH') OR exit('nope');

class MainCategory extends Authenticated{
    function __construct($conn, $params=array()){
        parent::__construct($conn, $params);
    }
    function index(){            
        $query = "SELECT * FROM main_category;";   
        $result = $this->conn->query($query);
        $this->render('mainCategory/view', array(
            "data" => array(
                "result" => $result,
            )
        ));
    }

    function add() {
        $this->render('mainCategory/add', array(
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
        $table = 'main_category';
        $where = "id = '$id'";
        $result = select_query($this->conn, $table, $where);
        $this->render('mainCategory/edit', array(
            "data" => array(
                "result" => $result,
            ),
            "js" => array(
                'category'
            ),
        ));
    }
    
    function create() {
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['category_name']) ? trim($_POST['category_name']) : '';
            $slug = createSlug($name);
    
         
            $query = "INSERT INTO main_category (category_name, slug) VALUES ('$name', '$slug')";
            $result = $this->conn->prepare($query);
          

            if ($result->execute()) {
                echo json_encode(['success' => true, 'message' => 'Category added successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to add category: ' . $result->error]);
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
            echo json_encode(['success' => false, 'message' => 'Invalid category ID']);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = isset($_POST['category_name']) ? trim($_POST['category_name']) : '';
            $slug = createSlug($name);
           
            $query = "UPDATE main_category SET category_name = '$name', slug = '$slug' WHERE id = '$id'";
            $result = $this->conn->prepare($query);

            if ($result->execute()) {
                echo json_encode(['success' => true, 'message' => 'Category updated successfully']);
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
        
        $sql = "DELETE FROM main_category WHERE id = '$id'";
        if ($this->conn->query($sql) === TRUE) {
            die("<script>alert('Main Category deleted successfully.'); window.location.href = '".LINK."mainCategory';</script>");
        } else {
            echo "Error: " . $this->conn->error;
        }
    }

    function getCategories() {
        $query = "SELECT id, category_name FROM main_category";
        $result = $this->conn->query($query);
    
        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = [
                'id' => $row['id'],
                'name' => htmlspecialchars($row['category_name'])
            ];
        }
    
        echo json_encode($categories);
    }
    

}
?>