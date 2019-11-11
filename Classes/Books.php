<?php 
    
    class Books {
        private $pdo;

        public function __construct() {
            $this -> pdo = new PDO(DBCON, DBUSER,DBPASS);
        }
        
        public function create($name,$color, $description, $tags, $author, $filename) {
            
            
            $db = $this -> pdo;
            $prepare = $db -> prepare('INSERT INTO books set name=?, color=?, description=?, tags=?, author=?, pdf_path=?');
            $values = array($name, $color, $description, $tags,$author,$filename);
            $return = $prepare -> execute($values);

            

            return $return;
        }

        public function generatePDF($file) {
            $tmp_name = $file['tmp_name'];
            $fileNameArray = explode(".",$file['name']);
            $originalName = $fileNameArray[0];
            $ext = $fileNameArray[1];
            if($ext != "pdf") {
                return false;
            }
            if(isset($tmp_name) && !empty($tmp_name)) {
                
                $rand1 = md5(rand(0,200000));
                $rand2 = md5(rand(0,200000));
                $pdf_path = './uploads/'.$originalName.$rand1.$rand2.'.'.$ext;
                $pdf_name = $originalName.$rand1.$rand2.'.'.$ext;
                move_uploaded_file($tmp_name, $pdf_path );
                return $pdf_name;
            }
            else {
                echo $tmp_name;
                echo "Nao tem";
            }
        }

        public function delete($id) {
            $db = $this -> pdo;
            $prepare = $db -> prepare('DELETE FROM books where id=?');
            $return = $prepare -> execute(array($id));

            return $return;
        }

        public function update($description,$id) {
            $db = $this -> pdo;

            $prepare = $db -> prepare('UPDATE books set description = ? where id = ?');

            $values = array($description, $id);

            $return = $prepare -> execute($values);

            return $return;
        }

        public function index($params = "") {
            $db = $this -> pdo;
            if(!$params) {
                $prepare = $db -> prepare('SELECT * from books');
                $prepare -> execute();
                $count = $prepare -> rowCount();
                if($count > 0) {
                    return array('data' => $prepare -> fetchAll(), 'count' => $count);
                }
                else {
                    return false;
                }
            }
            else {
                $query = "SELECT * from books where ";
                $prepare = $db -> prepare($query);
                $cond = 0;
                foreach($params as $param) {
                    if($cond = 0) {
                        $query .= 'tags like %'.$param.'%';
                    }
                    else {
                        $query .= ' or tags like %'.$param.'%';
                    }
                }
            }
        }

        public function download($id, $user_id) {
            $db = $this -> pdo;

            $prepare = $db -> prepare("SELECT * FROM books_per_users where user_id=? and book_id = ?");
            $prepare -> execute(array($user_id, $id));

            if($prepare -> rowCount() > 0) {
                return true;
            }
            $prepare = $db -> prepare('UPDATE books set download_amount = download_amount + 1 where id=?');
            $prepare -> execute(array($id));

            $prepare = $db -> prepare('INSERT INTO books_per_users set user_id=?, book_id = ?');
            $prepare -> execute(array($user_id, $id));
            

            return true;
        }

        

        
    }


?>