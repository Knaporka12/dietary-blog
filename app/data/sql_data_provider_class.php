<?php
    
    require('data_provider_class.php');
    require('category_class.php');
    require('post_class.php');
    require('user_class.php');
    
    class sqlDataProvider extends dataProvider {

        private $user = CONFIG['dbUser'];
        private $password = CONFIG['dbPassword'];

        //POSTY

        public function getPosts() {
            return $this->query(
                "
                    SELECT posts.id, posts.categoryId, posts.title, posts.content, categories.name AS categoryName
                    FROM posts
                    INNER JOIN categories ON categories.id = posts.categoryId
                ",
                "post"
            );
        }
        
        public function getPost($id) {
            return $this->query(
                "
                    SELECT posts.id, posts.categoryId, posts.title, posts.content,
                    categories.name AS categoryName,
                    users.name AS userName, users.surename AS userSurename
                    FROM posts
                    INNER JOIN categories ON categories.id = posts.categoryId
                    INNER JOIN users ON users.id = posts.userId
                    WHERE posts.id = :id
                ",
                'post',
                [':id' => $id],
                false
            );
        }
        
        public function addPost($title, $content, $categoryId, $userId) {
            $this->execute(
                'INSERT INTO posts (categoryId, title, content, userId) VALUES (:categoryId, :title, :content, :userId)',
                [
                    ':categoryId' => $categoryId,
                    ':content' => $content,
                    ':title' => $title,
                    ':userId' => $userId
                ]
            );
        }
        
        public function updatePost($id, $newTitle, $newContent, $newCategoryId) {
            $this->execute(
                '
                    UPDATE posts SET
                    title = :newTitle, content = :newContent, categoryId = :newCategoryId 
                    WHERE id = :id
                ',
                [
                    ':newTitle' => $newTitle,
                    ':newContent' => $newContent,
                    ':id' => $id,
                    ':newCategoryId' => $newCategoryId,
                ]      
            );
        }
        
        public function deletePost($id) {
            $this->execute(
                'DELETE FROM posts WHERE id = :id',
                [':id' => $id]
            );
        }

        public function getPostsByCategory($categoryId) {
            return $this->query(
                'SELECT * FROM posts WHERE CategoryId = :id',
                'post',
                [':id' => $categoryId],
            );
        }

        public function getPostsByUser($userId) {
            return $this->query(
                'SELECT * FROM posts WHERE userId = :id',
                'post',
                [':id' => $userId],
            );
        }

        public function getPostsByTitle($searchedPhrase) {
            return $this->query(
                'SELECT * FROM posts WHERE title LIKE :searchedPhrase',
                'post',
                [':searchedPhrase' => '%' . $searchedPhrase . '%']
            );
        } 

        //KATEGORIE
        
        public function getCategories() {
            return $this->query('SELECT * from categories', 'category');
        }
        
        public function addCategory($categoryName) {
            $this->execute(
                'INSERT INTO categories (name) VALUES (:categoryName)',
                [':categoryName' => $categoryName]
            );
        }

        public function getCategory($id) { //miala byc uzywana ale jednak nie jest 
            return $this->query(
                'SELECT * from categories WHERE id = :id',
                'category',
                [":id" => $id],
                false
            );
        }

        //UŻYTKOWNICY

        public function getUsers(){

            $users =  $this->query('SELECT * FROM users', 'user');
            $usersArray = [];

            foreach($users as $user) {
                $usersArray[$user->email] = ['password' => $user->password, 'id' => $user->id];
            }

            return $usersArray;
        }

        public function getUser($id){
            return $this->query(
                'SELECT * FROM users WHERE id = :id',
                'user',
                [':id' => $id],
                false
            ); //ZOBACZ CZY TO DZIAŁA, NA PEWNO COS W TYM KIERUNKU
        }

        public function addUser($name, $surename, $email, $password){
            $this->execute(
                '
                    INSERT INTO users (name, surename, email, password)
                    VALUES (:name, :surename, :email, :password)
                ',
                [
                    ':name' => $name,
                    ':surename' => $surename,
                    ':email' => $email,
                    ':password' => $password
                ]
            );
        }

        //PRYWATNE

        private function query($sql, $class, $sqlParams = [], $multiple = true){

            $db = $this->connect();
            if (!$db) return null;

            $query = null;

            if (empty($sqlParams)) {
                $query = $db->query($sql);
            } else {
                $query = $db->prepare($sql);
                $query->execute($sqlParams);
            }

            $data = $query->fetchAll(PDO::FETCH_CLASS, $class);
    
            $db = null;
            $query = null;
            
            if ($multiple) return $data;
            if (count($data)) return $data[0];
            return null;

        }
        private function execute($sql, $sqlParams){

            $db = $this->connect();
            if (!$db) return null;

            $stmt = $db->prepare($sql);
            $stmt->execute($sqlParams);
    
            $db = null;
            $stmt = null;

        }

        private function connect(){

            try {
                $db =  new PDO($this->source, $this->user, $this->password);
                $_SESSION['error'] = null;
                return $db;
            } catch (PDOException $err) {
                $error = "Database Error " . $err->getMessage();
                $_SESSION['error'] = $error;
                redirect('error.php');
            }
        }

    }