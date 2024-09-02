<?php
include 'include/navbar.php';
include 'database_connection.php';


session_start();





?>




<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->

    <style>
        table,
        th,
        td {
            border: 1px solid;

            margin-left: auto;
            margin-right: auto;
            text-align: center;
            align-content: center;

        }

        .maindiv {
            border: 5px outset blue;
            align-content: center;

            text-align: center;
        }

        .enterdiv {
            text-align: center;
        }
    </style>
    <title></title>
</head>

<body>

    <div class="maindiv">
        <h1>List Of Available Articles</h1>
        <div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Article ID</th>
                            <th>Article Name</th>
                            <th>Article Author</th>
                            <th>Article Co-Author</th>
                            <th colspan="3">Operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'database_connection.php';

                        $selectquery = "select * from journal";
                        $query = mysqli_query($conn, $selectquery);
                        $nums = mysqli_num_rows($query);

                        while ($res = mysqli_fetch_array($query)) {
                        ?>

                            <tr>
                                <td> <?php echo $res['article_id']; ?></td>
                                <td><?php echo $res['article_name']; ?></td>
                                <td><?php echo $res['author_name']; ?></td>
                                <td><?php echo $res['coauthor']; ?></td>
                                <td><a href="updates.php?editid=<?php echo $res['article_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="UPDATE">
                                        <i class="fa fa-edit" aria-hidden="true"></i></a>
                                </td>
                                <td><a href="delete.php?delid=<?php echo $res['article_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="DELETE">
                                        <i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                <td><a href="delete.php?=<?php echo $res['article_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="HTML">
                                        <i class="fa fa-file-code-o" aria-hidden="true"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>



                    </tbody>
                </table>

            </div>
        </div>

    </div>
</body>

</html>