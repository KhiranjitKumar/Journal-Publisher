<?php
include 'include/navbar.php'
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
            <?php
            include 'database_connection.php';
            session_start();


            if (!isset($_SESSION['username'])) {
                header("Location: index.php");
            }

            if (isset($_SESSION['MSG'])) {
                echo $_SESSION['MSG'];
                unset($_SESSION['MSG']);
            }

            $ids = $_GET['editid'];
            $showquerry = "select * from journal where article_id ={$ids} ";
            $showdata = mysqli_query($conn, $showquerry);
            $nums = mysqli_num_rows($showdata);
            echo "$ids";
            $arrdata = mysqli_fetch_array($showdata);

            if (isset($_POST['submit_data'])) {
                $updateids = $_GET['editid'];
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

                $updatesql = " UPDATE `journal` SET `article_name`='[$article_name]', `author_name`='[$author_name]',`coauthor`='[$coauthor]',`article_intro`='[$article_intro]',`affiliation`='[$affiliation]',`article_body`='[$article_body]',`result`='[$result]',`abstract`='[$abstract]',`conclusion`='[$conclusion]',`refer`='[$refer]', WHERE 'article_id' = '[$updateids]'";
                // $sql = "insert into journal(article_name, author_name,coauthor,affiliation,article_intro,abstract,article_body,result,conclusion,refer)
                //  values ('$article_name','$author_name','$coauthor','$affiliation','$article_intro','$abstract','$article_body',' $result','$conclusion','$refer')";

                if (mysqli_query($conn, $updatesql)) {
                    $_SESSION['MSG'] = 'Data Saved';
                    header('location:showdata.php');
                    die();
                } else {
                    echo "please try again";
                }
            }


            ?>

            <!-- for article name -->
            <label for="article_name">Enter article name</label>
            <div contenteditable="true" id="Article_name" value="<?php echo $arrdata['article_id'] ?> "><?php echo $arrdata['article_name'] ?></div><input type="button" onclick="updateData('<?php echo $updateids['editid'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>"></div>

            <!-- for author info -->
            <label for="article_name">Enter author information</label>
            <div contenteditable="true" id="Author_name" value="<?php echo $arrdata['article_id'] ?>"><?php echo $arrdata['author_name'] ?></div><input type="button" onclick="updateData('<?php echo $arrdata['author_name'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>"></div>
            <!-- for co author name -->
            <label for="article_name">Enter Co author information</label>
            <div contenteditable="true" id="CoAuthor" value="<?php echo $arrdata['article_id'] ?>"><?php echo $arrdata['coauthor'] ?></div><input type="button" onclick="updateData('<?php echo $arrdata['article_id'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>"></div>
            <!-- for affiliation -->
            <label for="article_name">Enter Affiliation</label>
            <div contenteditable="true" id="Affiliation" value="<?php echo $arrdata['article_id'] ?>"><?php echo $arrdata['affiliation'] ?></div><input type="button" onclick="updateData('<?php echo $arrdata['article_id'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>"></div>
            <!-- For introduction -->
            <label for="article_name">Enter Introduction</label>
            <div contenteditable="true" id="Introduction" value="<?php echo $arrdata['article_id'] ?>"><?php echo $arrdata['article_intro'] ?></div><input type="button" onclick="updateData('<?php echo $arrdata['article_id'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>"></div>

            <!-- For abstract -->
            <label for="article_name">Enter abstract</label>
            <div contenteditable="true" id="Abstract" value="<?php echo $arrdata['article_id'] ?>"><?php echo $arrdata['abstract'] ?></div><input type="button" onclick="updateData('<?php echo $arrdata['article_id'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>"></div>

            <!-- For Body -->
            <label for="article_name">Enter article body</label>
            <div contenteditable="true" id="ArticleBody" value="<?php echo $arrdata['article_id'] ?>"><?php echo $arrdata['article_body'] ?></div><input type="button" onclick="updateData('<?php echo $arrdata['article_id'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>"></div>

            <!-- For result-->
            <label for="article_name">Enter article result</label>
            <div contenteditable="true" id="ArticleResult" value="<?php echo $arrdata['article_id'] ?>"><?php echo $arrdata['result'] ?></div><input type="button" onclick="updateData('<?php echo $arrdata['article_id'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>"></div>

            <!-- For conclusion-->
            <label for="article_name">Enter conclusion</label>
            <div contenteditable="true" id="ArticleConclusion" value="<?php echo $arrdata['article_id'] ?>"><?php echo $arrdata['conclusion'] ?></div><input type="button" onclick="updateData('<?php echo $arrdata['article_id'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>"></div>

            <!-- For Refrences-->
            <label for="article_name">Enter References</label>
            <div contenteditable="true" id="ArticleRefer" value="<?php echo $arrdata['article_id'] ?>"><?php echo $arrdata['refer'] ?></div><input type="button" onclick="updateData('<?php echo $arrdata['article_id'] ?>')" value="Update">
            <div id="msg<?php echo $arrdata['article_id'] ?>">
                </d<script src="jquery-3.6.0.min.js">
                </script>



                <input type="submit" class="publish-btn" name="update_data" value="Update">
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
<!-- <script src="include/jquery-3.6.0.min.js"></script>
<script>
    function updateData(article_id) {
        let html = jQuery('' + article_id).html();
        console.log(html)
    }
</script> -->