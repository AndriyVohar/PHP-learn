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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editCodeUser"])) {
    $editCode = $_POST["editCodeUser"];
    $employeeToEdit = findAnEmployeeByCode($financeDepartments, $editCode);

    if ($employeeToEdit) {
        ?>
        <form method="post">
            <input type="hidden" name="editCode" value="<?= $editCode; ?>">
            <label for="editFullName">Full name</label>
            <input name="editFullName" type="text" id="editFullName" value="<?= $employeeToEdit['fullName']; ?>">
            <br>
            <label for="editPosition">Position</label>
            <input name="editPosition" type="text" id="editPosition" value="<?= $employeeToEdit['position']; ?>">
            <br>
            <label for="editSalary">Salary</label>
            <input name="editSalary" type="text" id="editSalary" value="<?= $employeeToEdit['salary']; ?>">
            <br>
            <label for="editChildrenAmount">Amount of children</label>
            <input name="editChildrenAmount" type="text" id="editChildrenAmount" value="<?= $employeeToEdit['childrenAmount']; ?>">
            <br>
            <label for="editWorkExperience">Work experience</label>
            <input name="editWorkExperience" type="text" id="editWorkExperience" value="<?= $employeeToEdit['workExperience']; ?>">
            <br />
            <br />
            <button type="submit">Save Changes</button>
        </form>
        <?php
    } else {
        $error_message =  "Employee not found with code: $editCode";
    }
}


function findAnEmployeeByCode($array, $code)
{
    foreach ($array as $employee) {

        if (isset($employee['code']) && $employee['code'] == $code) {
            return $employee;
        }
    }
    return false;
}
// function findProjectByCode($projects, $code){
//     foreach($projects as $project){
//         if($project['code']===$code){
//             return $project;
//         }
//     }
// }
// function updateObject($projects,$code,$updatedProject){
//     foreach($projects as &$project){
//         if($project['code']===$code){
//             return $project;
//         }
//     }
// }