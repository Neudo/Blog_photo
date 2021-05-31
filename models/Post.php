
<?php

function getAllPosts(){
    global $db;
    $query = $db->query("SELECT *
    FROM posts
    ORDER BY date DESC ");
    $posts = $query->fetchAll();
    return $posts;
}

function getLatestPosts(){
    global $db;
    $query = $db->query("SELECT posts.*, users.pseudo AS author
    FROM posts
    JOIN users ON posts.user_id = users.id
    ORDER BY posts.date DESC LIMIT 2 ");

    $latestPosts = $query->fetchAll();
    return $latestPosts;

}

function getPost($postId){
    global $db;
    $query = $db->prepare("SELECT * FROM posts
    WHERE posts.id = ?");
    $query->execute([$postId]);

    return $query->fetch();
}


function getPostsByCategoryId($categoryId){
    global $db;
    $query = $db->prepare("SELECT p.*, u.pseudo AS author
    FROM posts p
    JOIN categories_posts cp ON p.id = cp.post_id
    JOIN categories c ON cp.category_id = c.id
    JOIN users u ON p.user_id = u.id
    WHERE c.id = ?
    ORDER BY p.date DESC") ;
    $query->execute([$categoryId]);
    return $query->fetchAll();
}

    function addPost($title, $summary, $content, $image){
        global $db;
        $query = $db->prepare('INSERT INTO posts (title, summary, content, img) VALUES (?, ?, ?, ?)');
        $query->execute(
            [
                $title,
                $summary,
                $content,
                $image
            ]
        );

        $lastInsertedId = $db->lastInsertId();

        $selectedCategories = $_POST['categories'];
        foreach($selectedCategories as $category) {

            $query = $db->prepare('INSERT INTO categories_posts (post_id, category_id) VALUES (?, ?)');
            return $query->execute(
                [
                    $lastInsertedId,
                    $category
                ]
            );
        }
    }

function deletePost($postId) {
    global $db;
    $query = $db->prepare('DELETE FROM posts WHERE id = ?');
    return $query->execute([$postId]);
}


        function updatePost($postId, $data, $newFileName=false) {
            global $db;

        if($newFileName) {
            $query = $db->prepare('UPDATE posts SET title = :new_title, summary = :new_summary, content = :new_content, img = :new_img WHERE id = :post_id');
            return $query->execute(
            [
                'new_title' => $data['title'],
                'post_id' => $postId,
                'new_summary' => $data['summary'],
                'new_content' => $data['content'],
                'new_img' => $newFileName
            ]

            
        );
    }
            else {
                $query = $db->prepare('UPDATE posts SET title = :new_title, summary = :new_summary, content = :new_content WHERE id = :post_id');
                return $query->execute(
                [
                    'new_title' => $data['title'],
                    'post_id' => $postId,
                    'new_summary' => $data['summary'],
                    'new_content' => $data['content'],
                ]
            );
        }
    }
?>
