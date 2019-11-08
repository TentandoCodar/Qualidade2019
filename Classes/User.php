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
                $userExists = $this -> verifyIfUserExists($email, $user, $phone, $pass);

                if($userExists === true) {
                    return false;
                }
                
                
                $prepare = $db -> prepare("INSERT into users set email=?, user=?, phone=?, pass=?, name=?");
                $values = array($email,$user,$phone,$pass,$name);
                $return = $prepare -> execute($values);
                
                return $return;
            }
            catch(PDOException $pdo) {
                return $pdo -> getMessage();
            }
        }

        private function verifyIfUserExists($email,$user,$phone,$pass) {
            $db = $this -> pdo;
            $prepare = $db -> prepare("SELECT * from users where (email = ? or user = ? or pass = ?) and pass = ?");
            $values = array($email, $user, $phone,$pass);
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

        public function index() {
            $db = $this -> pdo;

            $prepare = $db -> prepare("SELECT * from users where admin=false");
            $prepare -> execute();
            return $prepare -> fetchAll();
        }

        public function update($email,$user, $pass, $id) {
            $db = $this -> pdo;
            $prepare = $db -> prepare('SELECT * from users where user = ? and id <> ?');
            $array = array($user,$id);
            $prepare -> execute($array);
            if($prepare -> rowCount() > 0) {
                return false;
            }
            $prepare2 = $db -> prepare("UPDATE users set email=?,user = ?,pass=? where id = ?");
            $array2 = array($email,$user, $pass,$id);
            $prepare2 -> execute($array2);
            return true;
        }

        public function delete($id) {
            $db = $this -> pdo;
            $prepare = $db -> prepare('DELETE from users where id=?');
            $values = array($id);
            $return = $prepare -> execute($values);

            return $return;
        }
    }


?>