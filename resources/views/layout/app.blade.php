<html>
<head>
    <title>Project Tasks Arrangement Page </title>
    <style>
        #app {
            padding: 1em;
        }
    </style>
</head>
<body>

<div id="app">
   <?php
    $projects = $data['projects'];
    $tasks = $data['tasks'];
    $stories = $data['stories'];



    ?>
    <project-tasks :stories="'{{$stories}}'"  :tasks="'{{$tasks}}'"></project-tasks>
</div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
