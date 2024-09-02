<?php
include 'include/navbar.php'
?>

<?php
session_start();


if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

if(isset($_SESSION['MSG'])){
    echo $_SESSION['MSG'];
    unset($_SESSION['MSG']);
}

if (isset($_POST['submit_data']) ) {
    $con = mysqli_connect('localhost', 'root', '', 'editor');
    $article_name = $_POST['article_name'];
    $author_name = $_POST['author_name'];
    $coauthor = $_POST['coauthor'];
    $affiliation = $_POST['affiliation'];
    $article_intro = $_POST['article_intro'];
    $abstract = $_POST['abstract'];
    $article_body = $_POST['article_body'];
    $result = $_POST['result'];
    $conclusion = $_POST['conclusion'];
    $refer = $_POST['refer'];


    $sql = "insert into journal(article_name, author_name,coauthor,affiliation,article_intro,abstract,article_body,result,conclusion,refer) values ('$article_name','$author_name','$coauthor','$affiliation','$article_intro','$abstract','$article_body',' $result','$conclusion','$refer')";
    if (mysqli_query($con, $sql)) {
        $_SESSION['MSG']='Data Saved';
        header('location:editor.php');
        die();

    } else {
        echo "please try again";
    }
}


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial,scale=1.0">
    <title>ADTU Article Editor</title>

    <style>
        .container {
            max-width: 70%;
            margin: 0 auto;
        }

        .input-field {
            padding: 10px;
        }

        .input-field label {
            text-align: center;
            display: block;
            font-size: 20px;
            margin-left: -8;
            font-weight: 300;
            color: black;
        }


        .input-field input[type='text'] {
            width: 100%;
            padding: 5px;
            margin-left: -8;
            font-size: 16px;
        }

        .publish-btn {
            width: 100%;
            padding: 10px;
            background-color: teal;
            color: white;

        }
    </style>

</head>


<body>

    <div class="container">
        <form method="POST">
            <!-- for article name -->
            <div class="input-field">
                <label for="article_name">Enter article name</label>
                <textarea name="article_name" id="Article_name"></textarea>
            </div>
            <!-- for author info -->
            <div class="input-field">
                <label for="author_name">Enter Author information</label>
                <textarea name="author_name" id="Author_name"></textarea>
            </div>
            <!-- for co author name -->
            <div class="input-field">
                <label for="coauthor">Enter Co Author information</label>
                <textarea name="coauthor" id="CoAuthor"></textarea>
            </div>
            <!-- for affiliation -->
            <div class="input-field">
                <label for="affiliation">Enter Affiliation</label>
                <textarea name="affiliation" id="Affiliation"></textarea>
            </div>
            <!-- For introduction -->
            <div class="input-field">
                <label for="article_intro">Enter Introduction</label>
                <textarea name="article_intro" id="Introduction"></textarea>
            </div>

            <!-- For abstract -->
            <div class="input-field">
                <label for="abstract">Enter abstract</label>
                <textarea name="abstract" id="Abstract"></textarea>
            </div>

            <!-- For Body -->
            <div class="input-field">
                <label for="article_body">Enter Article Body</label>
                <textarea name="article_body" id="ArticleBody"></textarea>
            </div>

            <!-- For result-->
            <div class="input-field">
                <label for="result">Enter result</label>
                <textarea name="result" id="ArticleResult"></textarea>
            </div>

            <!-- For conclusion-->
            <div class="input-field">
                <label for="conclusion">Enter Conclusion</label>
                <textarea name="conclusion" id="ArticleConclusion"></textarea>
            </div>

            <!-- For Refrences-->
            <div class="input-field">
                <label for="refer">Enter Refrences</label>
                <textarea name="refer" id="ArticleRefer"></textarea>
            </div>



            <input type="submit" class="publish-btn" name="submit_data" value="publish">
        </form>
    </div>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('Article_name');
        CKEDITOR.replace('Author_name');
        CKEDITOR.replace('CoAuthor');
        CKEDITOR.replace('Affiliation');
        CKEDITOR.replace('Introduction');
        CKEDITOR.replace('Abstract');
        CKEDITOR.replace('ArticleBody');
        CKEDITOR.replace('ArticleResult');
        CKEDITOR.replace('ArticleConclusion');
        CKEDITOR.replace('ArticleRefer');
    </script>
</body>


</html>