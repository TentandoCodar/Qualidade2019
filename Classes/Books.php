<?php 
    
    class Books {
        private $pdo;

        public function __construct() {
            $this -> pdo = new PDO(DBCON, DBUSER,DBPASS);
        }
        
        public function create($name,$color, $description) {
            $db = $this -> pdo;
            $prepare = $db -> prepare('INSERT INTO books set name=?, color=?, description=?');
            $values = array($name, $color, $description);
            $return = $prepare -> execute($values);

            return $return;
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

        public function index($query = "") {
            $db = $this -> pdo;
            if(!$query) {
                $prepare = $db -> prepare('SELECT * from books');

                $prepare -> execute();

                if($prepare -> rowCount() > 0) {
                    return $prepare -> fetchAll();
                }
                else {
                    return false;
                }
            }
        }

        public function download($id, $user_id) {
            $db = $this -> pdo;

            $prepare = $db -> prepare('UPDATE books set download_amount = download_amount + 1 where id=?');
            $prepare -> execute(array($id));

            $prepare = $db -> prepare('INSERT INTO books_per_users set user_id=?, book_id = ?');
            $prepare -> execute(array($user_id, $id));
            

            return true;
        }

        
    }


?>