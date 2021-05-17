
<?php

function getAllPosts(){
    $db = dbConnect();
    $query = $db->query("SELECT posts.*, categories.name, users.pseudo
    FROM posts
    JOIN categories ON posts.category_id = categories.id
    JOIN users ON posts.user_id=users.id
    ORDER BY date DESC ");

    $posts = $query->fetchAll();
    return $posts;

}

function getLatestPosts(){
    $db = dbConnect();
    $query = $db->query("SELECT posts.*, users.pseudo AS author
    FROM posts
    JOIN users ON posts.user_id = users.id
    ORDER BY posts.date DESC LIMIT 2 ");

    $latestPosts = $query->fetchAll();
    return $latestPosts;

}

function getPost($postId){
    $db = dbConnect();
    $query = $db->prepare("SELECT posts.*, users.pseudo AS author
    FROM posts
    JOIN users ON posts.user_id=users.id
    WHERE posts.id = ? ");
    $query->execute([$postId]);

    return $query->fetch();
}


function getPostsByCategoryId($categoryId){
    $db = dbConnect();
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

function addPost($title, $summary, $content, $fileName){
    $db = dbConnect();
    $query = $db->prepare('INSERT INTO posts (title, summary, content, img) VALUES (?, ?, ?, ?)');
    return $query->execute(
    [
        $title,
        $summary,
        $content,
        $fileName
    ]
);
}

function deletePost($postId) {
$db = dbconnect();
$query = $db->prepare('DELETE FROM posts WHERE id = ?');
return $query->execute([$postId]);
}


    function updatePost($postId, $data, $newFileName=false) {
        $db = dbconnect();

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
