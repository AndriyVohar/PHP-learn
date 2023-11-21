<?php
//5. Асоціативний масив “Проект” (Код, автор проекту, кошторис проекту у грн., оцінки проекту у трьох номінаціях
//(цілі числа від 1 до 5)). Запит проектів, кошторис яких не більше У грн.,
//які у трьох номінаціях у сумі набрали не менше, ніж Х балів.

//== 1. Описати літерал нумерованого масиву із 5 -7 масивів з текстовими ключами, що містять дані про об'єкти згідно із варіантом .
//== 2. Вивести дані про об'єкти в таблицю. 
//== 3. Підготувати функцію для вибору всіх елементів масиву, що відповідають запиту. Вивести їх в таблицю.
//== 4. Передбачити можливість передачі параметрів запиту через рядок стану (наприклад index.php?country=ukraine&min_age=18)
//== 5. Створити форму для додавання нового об'єкту до масиву.  
//== 6. Створити форму редагування даних про об'єкт.
// 7. Перед редагуванням здійснити валідацію даних (ПІБ не може бути порожнім рядком, заробітна плата повинна бути невід'ємним числом, тощо).

// $project = [
//     'code'=>null,
//     'author'=>null,
//     'estimate'=>null,
//     'scores'=>[
//         'score1'=>null,
//         'score2'=>null,
//         'score3'=>null,
//     ],
// ];
//1. Описати літерал нумерованого масиву із 5 -7 масивів з текстовими ключами, що містять дані про об'єкти згідно із варіантом .
$projects = [
    1=>[
        'code'=>1,
        'author'=>'Галь Олександр',
        'estimate'=>30000,
        'scores'=>[
            'score1'=>4,
            'score2'=>5,
            'score3'=>4,
        ],
    ],
    2=>[
        'code'=>2,
        'author'=>'Андрусик Вероніка',
        'estimate'=>25000,
        'scores'=>[
            'score1'=>3,
            'score2'=>4,
            'score3'=>4,
        ],
    ],
    3=>[
        'code'=>3,
        'author'=>'Вогар Андрій',
        'estimate'=>50000,
        'scores'=>[
            'score1'=>5,
            'score2'=>5,
            'score3'=>4,
        ],
    ],
    4=>[
        'code'=>4,
        'author'=>'Півкач Віктор',
        'estimate'=>15000,
        'scores'=>[
            'score1'=>3,
            'score2'=>2,
            'score3'=>3,
        ],
    ],
    5=>[
        'code'=>5,
        'author'=>'Новікова Руслана',
        'estimate'=>18000,
        'scores'=>[
            'score1'=>3,
            'score2'=>3,
            'score3'=>3,
        ],
    ],
];
//2. Вивести дані про об'єкти в таблицю. 
include 'table.phtml';

//3. Підготувати функцію для вибору всіх елементів масиву, що відповідають запиту. Вивести їх в таблицю.
function filteredProjects($projects, $maxEstimate, $minSumScores){
    echo '
    <br><br>
    <h2>Відфільтрований список проектів</h2><br>
    <center>
    <table border="1">
        <tr>
        <th>Код</th>
        <th>Автор</th>
        <th>Кошторис</th>
        <th>Оцінки</th>
        </tr>
    ';
    foreach($projects as $project){
        if(($project['estimate']<=$maxEstimate)&&(($project['scores']['score1']+$project['scores']['score2']+$project['scores']['score3'])>=$minSumScores)){
            echo '<tr>
            <td>'.$project['code'].'</td>
            <td>'.$project['author'].'</td>
            <td>'.$project['estimate'].'</td>
            <td>'.$project['scores']['score1'].','
                .$project['scores']['score2'].','
                .$project['scores']['score3'].','.
            '</td>
            </tr>';
        }
    }
    echo '</table></center>';
}

// 4. Передбачити можливість передачі параметрів запиту через рядок стану (наприклад index.php?country=ukraine&min_age=18)
if(isset($_GET['max_estimate'])&&isset($_GET['min_sum_scores'])){
    $maxEstimate = intval($_GET['max_estimate']);
    $minSumScores = intval($_GET['min_sum_scores']);
    filteredProjects($projects,$maxEstimate,$minSumScores);
}

// 5. Створити форму для додавання нового об'єкту до масиву.
include 'form.phtml';
//Додавання об'єкту до масиву
if($_SERVER['REQUEST_METHOD']==='POST'&&isset($_POST['code'])){
    $code = $_POST['code'];
    $author = $_POST['author'];
    $estimate = $_POST['estimate'];
    $scores = $_POST['scores'];

    $projects[] = [
        'code'=>$code,
        'author'=>$author,
        'estimate'=>$estimate,
        'scores'=>$scores,
    ];
    include 'table.phtml';
}

// 6. Створити форму редагування даних про об'єкт.
include 'form_change.phtml';
// 7. Перед редагуванням здійснити валідацію даних (ПІБ не може бути порожнім рядком, заробітна плата повинна бути невід'ємним числом, тощо).
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit-code"])) {
    $editCode = $_POST["edit-code"];
    $projectToEdit = $projects[(int)$editCode];

    if($projectToEdit){
        ?>
        <center>
        <form method="POST">
            <input type="hidden" name="edit-code" value="<?=$editCode; ?>">
            <label>
                ПІБ автора
                <input name="edit-author" type="text" id="edit-author" value="<?= $projectToEdit['author'];?>">
            </label><br>
            <label>
                Кошторис
                <input name="edit-estimate" type="number" id="edit-estimate" value="<?= $projectToEdit['estimate'];?>">
            </label><br>
            <label>
                Перша оцінка
                <input name="edit-score1" type="number" id="edit-score1" value="<?= $projectToEdit['scores']['score1'];?>">
            </label><br>
            <label>
                Друга оцінка
                <input name="edit-score2" type="number" id="edit-score2" value="<?= $projectToEdit['scores']['score2'];?>">
            </label><br>
            <label>
                Третя оцінка
                <input name="edit-score3" type="number" id="edit-score3" value="<?= $projectToEdit['scores']['score3'];?>">
            </label><br>
            <button name="change-project" type="submit">Змінити дані</button>
        </form>
        </center>
        <?php

        //Валідація даних, а після цього запис у масив проектів
        if($_SERVER["REQUEST_METHOD"]==="POST"&&isset($_POST["edit-author"])){
            $editAuthor = $_POST["edit-author"];
            $editEstimate = $_POST["edit-estimate"];
            $editScore1=$_POST["edit-score1"];
            $editScore2=$_POST["edit-score2"];
            $editScore3=$_POST["edit-score3"];
            if($editAuthor===''||(int)$editEstimate<0||(int)$editScore1<0||(int)$editScore2<0||(int)$editScore3<0){
                return false;
            }
            $projects[(int)$editCode] = [
                'code'=>$editCode,
                'author'=>$editAuthor,
                'estimate'=>$editEstimate,
                'scores'=>[
                    'score1'=>$editScore1,
                    'score2'=>$editScore2,
                    'score3'=>$editScore3,
                ],
            ];
            include 'table.phtml';
        }      
    }
}


// function updateObject($projects,$code,$updatedProject){
//     foreach($projects as &$project){
//         if($project['code']===$code){
//             return $project;
//         }
//     }
// }