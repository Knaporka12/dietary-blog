<?php 
    
    class dataProvider {

        function __construct($source){
            $this->source = $source;
        }

        //POSTY

        public function getPosts() {
            
        }
        
        public function getPost($id) {
            
        }
        
        public function addPost($title, $content, $categoryId, $userId) {
            
        }
        
        public function updatePost($id, $newTitle, $newContent, $newCategoryId) {
            
        }
        
        public function deletePost($id) {
            
        }

        public function getPostsByCategory($categoryId) {
            

        }
        
        public function getPostsByTitle($searchedPhrase) {
            
        }

        //KATEGORIE

        public function getCategories() {
            
        }
        
        public function addCategory($categoryName) {
            
        }

        public function getCategory($id) {
            
        }

        //UŻYTKOWNICY 

        public function getUsers(){
            
        }

        public function getUser($id){

        }

        public function addUser($name, $surename, $email, $password){
            
        }

    }