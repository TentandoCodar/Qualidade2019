<?php 
    
    class User {
        private $pdo;

        public function __construct() {
            $this -> pdo = new PDO(DBCON, DBUSER,DBPASS);
        }

        public function login($data,$pass) {
            $db = $this -> pdo;
            $prepare = $db -> prepare("SELECT * from users where (phone = ? or email = ? or user = ?) and pass = ?");
            $values = array($data, $data, $data,$pass);
            $return = $prepare -> execute($values);
            $admin = false;
            $fetch = $prepare -> fetch();
            if($prepare -> rowCount() > 0) {
                if($fetch['admin']) {
                    $admin = true;
                    $id = $fetch['id'];
                }
                else {
                    
                    $id = $fetch['id'];
                }
            }
            
            return array('count' => $prepare -> rowCount(), 'admin' => $admin, 'id' => $id);
        }

        public function signUp($email, $pass, $name, $phone, $user) {
            try {
                
                $db = $this -> pdo;
                $userExists = $this -> verifyIfUserExists($email, $user, $phone);

                if($userExists === true) {
                    return false;
                }
                
                
                $prepare = $db -> prepare("INSERT into users set email=?, user=?, phone=?, pass=?, name=?, admin=true");
                $values = array($email,$user,$phone,$pass,$name);
                $return = $prepare -> execute($values);
                
                return $return;
            }
            catch(PDOException $pdo) {
                return $pdo -> getMessage();
            }
        }

        private function verifyIfUserExists($email,$user,$phone) {
            $db = $this -> pdo;
            $prepare = $db -> prepare("SELECT * from users where email = ? or user = ? or phone = ?");
            $values = array($email, $user, $phone);
            $return = $prepare -> execute($values);
            
            if($prepare -> rowCount() > 0) {
                return true;
            }
            else {
                return false;
            }
        }

        public function makeAdmin($id) {
            try {
                $db = $this -> pdo;

                $prepare = $db -> prepare("UPDATE users set admin=true where id=?");
                $values = array($id);
                $prepare -> execute($values);

                return true;
                
            }
            catch(PDOException $pdo) {
                return $pdo -> getMessage();
            }
        }

        public function index($id = "") {
            $db = $this -> pdo;

            $prepare = $db -> prepare('SELECT * from users where id = ?');
            $prepare -> execute(array($id));
            return $prepare -> fetch();
        }

        public function update($name,$email, $phone,$user, $pass, $new_pass = "", $id) {
            $db = $this -> pdo;
            $passwordIsCorrect = $this -> verifyPassword($id,$pass);

            if($passwordIsCorrect === 0) {
                return 'Incorrect password';
            }

            
            
            $prepare = $db -> prepare('SELECT * from users where (user = ? or phone = ? or email = ?) and id <> ?');
            $array = array($user, $phone, $email,$id);
            $prepare -> execute($array);
            if($prepare -> rowCount() > 0) {
                return false;
            }
            
            $prepare2 = $db -> prepare("UPDATE users set name=?,email=?,user = ?,pass=? where id = ?");
            if($new_pass !== '') {
                echo "new pass";
                $array2 = array($name,$email,$user, $new_pass,$id);
            }
            else {
                $array2 = array($name,$email,$user, $pass,$id);
            }
            
            $prepare2 -> execute($array2);
            return true;
        }

        private function verifyPassword($id,$pass) {
            $db = $this -> pdo;
            $prepare = $db -> prepare('SELECT * from users where id=? and pass = ?');
            $values = array($id,$pass);
            $prepare -> execute($values);
            return $prepare -> rowCount();
        }

        public function adminReceiveUsers() {
            $db = $this -> pdo;

            $prepare = $db -> prepare("SELECT * FROM users where admin=false");

            $prepare -> execute();

            return $prepare -> fetchAll();
        }

        public function delete($id) {
            $db = $this -> pdo;
            
            $prepare = $db -> prepare('DELETE from books_per_users where user_id=?');
            $values = array($id);
            $return = $prepare -> execute($values);
            $prepare = $db -> prepare('DELETE from users where id=?');
            $values = array($id);
            $return = $prepare -> execute($values);

            return $return;
        }

        public function hasMany($table = "") {
            $db = $this -> pdo;

            $prepare = $db -> prepare("SELECT * from users inner join ? on ?.user_id = users.id where users.id = ?");
            $values = array($table,$table);
            $prepare -> execute($values);

            if($prepare -> rowCount() > 0) {
                $return = $prepare -> fetchAll();
                return $return;
            }

            else {
                return "Data is empty";
            }
        }
    }


?>