<?php
    namespace application\models;
    use PDO;

    class ApiModel extends Model {
        public function restArea() {
            $sql = "SELECT user.nick,
                    title, rest_address AS restAddr
                    FROM restaurant rest
                LEFT JOIN bobf bob
                    ON rest.irest = bob.irest
                LEFT JOIN user
                    ON bob.iuser = user.iuser";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
            
        }

    }