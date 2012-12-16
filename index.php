<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>workshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="just for example">
    <meta name="author" content="Kutuzov Ivan">

    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            padding-top: 20px;
            padding-bottom: 40px;
        }

            /* Custom container */
        .container-narrow {
            margin: 0 auto;
            max-width: 700px;
        }
        .container-narrow > hr {
            margin: 30px 0;
        }

            /* Main marketing message and sign up button */
        .jumbotron {
            margin: 60px 0;
            text-align: center;
        }
        .jumbotron h1 {
            font-size: 72px;
            line-height: 1;
        }
        .jumbotron .btn {
            font-size: 21px;
            padding: 14px 24px;
        }

            /* Supporting marketing content */
        .marketing {
            margin: 60px 0;
        }
        .marketing p + h4 {
            margin-top: 28px;
        }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>

<div class="container-narrow">

    <div class="masthead">
        <h3 class="muted">Workshop for Ventilator</h3>
    </div>

    <hr>

    <ul class="nav nav-pills">
        <li><a id="firstLink" href="/index.php?page=stat">Stat</a></li>
        <li><a id="secondLink" href="/index.php?page=user">User</a></li>
        <li><a id="therdLink" href="/index.php?page=task">Task</a></li>
    </ul>

    <div class="row-fluid marketing">

<?php
    include_once './lib.php';

    $page = 'stat';
    if (isset($_REQUEST['page']) && in_array($page, array('stat','user','task'))) {
        $page = $_REQUEST['page'];    
    }
    
    $userList = SampleFramework::loadUserList();    

?>
        <table class="table table-striped  table-bordered table-hover">
            <thead>
                <th>Surname</th><th>Name</th><th>Patronymic</th><th>TasksCount</th>
            </thead>
            <tbody>
            <?php foreach ($userList as $key => $user) : ?>
                <tr>
                    <td><?= $user['surname'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['patronymic'] ?></td>
                    <td><?= $user['task_count'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <hr>

    <div class="footer">
        <p>&copy; Company 2012</p>
    </div>

</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>