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

    $storeRefArray =[];
    foreach ($stories as $story){
        $temp = json_decode($story,true);
        $tempList=$temp['daily_tasks_lisk'];
        $tempList = json_decode($tempList,true);
        $refTemp =[];
        foreach ($tempList as $item ){
            $refTemp['story']=$temp['name'];
            $refTemp['relative_day']=$item['relative_day'];
            $refTemp['task'] =$item['task_name'];
            array_push($storeRefArray,$refTemp);
        }
    }
//    var_dump($storeRefArray);
    $storeRefArray =json_encode($storeRefArray,true);
//    var_dump($storeRefArray);
    ?>


    <project-tasks

        :storeRefArray="'{{$storeRefArray}}'"
        :tasks="'{{$tasks}}'"
    ></project-tasks>
</div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
