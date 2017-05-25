<?php
    $username = 'root';
    $password = '';
    
    $database = new PDO('mysql:host=localhost;dbname=booklist;charset=UTF8;', $username,$password);
    
    if ($_POST['book_title']) {
        
        $sql = 'INSERT INTO books (book_title) VALUES(:book_title)';
        
        $statement = $datebase->prepare($sql);
        
        $statement->bindParam(':book_title', $_POST['book_title']);
        
        $statement->excecute();
        
        $statement = null;
    }
    
    $sql = 'SELECT * FROM books ORDER BY created_at DESC';
    
    $statement = $database->query($sql);

    $records = $statement->fetchAll();

    $statement = null;
    
    $database = null;
?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Booklist</title>
    </head>
    <body>
<?php
    // フォームデータ送受信確認用コード(本番では削除)
    print '<div style="background-color: skyblue;">';
    print '<p>動作確認用：</p>';
    print_r($_POST);
    print '</div>';
?>
        <h1></h1><a href="booklist.php">Booklist</h1></a>
        <h2>書籍の登録フォーム</h2>
        <form action="booklist.php" method="post">
            <input type="text" name="book_title" placeholder="書籍タイトルを入力" required>
            <input type="submit" name="submit_add_book" value="登録">
        </form>
        <h2>登録された書籍一覧</h2>
        <ul>
<?php
            if ($records) {
                foreach ($records as $record) {
                    $book_title = $record['book_title'];
?>
                    <li><?php print htmlspecialchars($book_title, ENT_QUOTES, 'UTF-8'); ?></li>
<?php
                }
            }  
?>
        </ul>
    </body>
</html>