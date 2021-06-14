<?php

function getAllCategories(){
    global $db;
    $query = $db->query("SELECT * FROM categories ");

    $categories = $query->fetchAll();
    return $categories;

}


function getCategory($categoryId){
    global $db;
    $query = $db->prepare("SELECT * FROM categories WHERE id = ?" );
    $query->execute([$categoryId]);
    return $query->fetch();
}


    function addCategory($name, $description, $fileName){
        global $db;
        $query = $db->prepare('INSERT INTO categories (name, description, img) VALUES (?, ?, ?)');
        return $query->execute(
        [
            $name,
            $description,
            $fileName
        ]
    );
}

function deleteCategory($categoryId) {
    global $db;
    $query = $db->prepare('DELETE FROM categories WHERE id = ?');
    return $query->execute([$categoryId]);
}

function updateCategory($categoryId, $data, $newFileName=false) {
    global $db;

    if($newFileName) {
        $query = $db->prepare('UPDATE categories SET name = :new_name, description = :new_description, img = :new_img WHERE id = :category_id');
        return $query->execute(
        [
            'new_description' => $data['description'],
            'category_id' => $categoryId,
            'new_name' => $data['name'],
            'new_img' => $newFileName
        ]
    );
}
        else {
            $query = $db->prepare('UPDATE categories SET name = :new_name, description = :new_description WHERE id = :category_id');
            return $query->execute(
            [
                'new_description' => $data['description'],
                'category_id' => $categoryId,
                'new_name' => $data['name']
            ]
        );
    }
}
?>

