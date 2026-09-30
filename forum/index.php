<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hlavní stránka</title>
    <link rel="stylesheet" type="text/css" href="assets/style/mainPage.css">
</head>
<body>
    <div class="mainWrapper">
        <div class="card">
            <div class="mainHeader">
                <h1>Vítejte :)</h1>
                <hr>
            </div>
            <div class="newPost">
                <div class="formCard">
                    <form action="src/query/newPost/inputPost.php" method="POST" autocomplete="off">
                        <div class="formSpacing">
                            <div class="form">
                                <label>Nadpis</label>
                                <input type="text" id="header" name="header" required>
                                <label>Text</label>
                                <textarea id="text" name="text" cols="30" row="10" required></textarea>
                                <label>Přezdívka</label>
                                <input type="text" id="username" name="username" required>
                            </div>

                            <div class="centerSubmit">
                                <input type="submit" value="Odeslat">
                            </div> 
                        </div>    
                    </form>
                </div>
            </div>
            <?php 
                require "src/connector/init.php";
                $sqlData = "SeLeCt header, text, username, timestamp fRoM post";
                $articles = $db->query($sqlData, []);
            ?>
            <div class="postList">
                <?php foreach($articles as $article):?>
                    <article class="post">
                        <div class=header>
                            <h2><?=$article['header'];?></h2>
                            <h5><?=$article['username']?></h5>
                        </div>                        
                        <p><?=$article['text']?></p>
                    </article>
                <?php endforeach;?>

            </div>
            
        </div>
    </div>
</body>
</html>