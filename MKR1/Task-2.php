(20 балів) На сервері зберігається список студентів Товарів (Id, Назва,
Країна виробника, Ціна). Розробити Web сторінку для перегляду всього
списку товарів. Розмістити біля кожного товару кнопку для вилучення
його даних.

<?php
$products = [
    ['Id' => 1, 'Name' => 'Smartphone', 'Country' => 'China', 'Price' => 500],
    ['Id' => 2, 'Name' => 'Laptop', 'Country' => 'USA', 'Price' => 1200],
    ['Id' => 3, 'Name' => 'Tablet', 'Country' => 'South Korea', 'Price' => 300],
    ['Id' => 4, 'Name' => 'Camera', 'Country' => 'Japan', 'Price' => 800],
    ['Id' => 5, 'Name' => 'Television', 'Country' => 'Mexico', 'Price' => 700],
    ['Id' => 6, 'Name' => 'Headphones', 'Country' => 'Germany', 'Price' => 100],
    ['Id' => 7, 'Name' => 'Refrigerator', 'Country' => 'Sweden', 'Price' => 900],
    ['Id' => 8, 'Name' => 'Gaming Console', 'Country' => 'USA', 'Price' => 400],
    ['Id' => 9, 'Name' => 'Coffee Maker', 'Country' => 'Italy', 'Price' => 150],
    ['Id' => 10, 'Name' => 'Smartwatch', 'Country' => 'South Korea', 'Price' => 250],
];

$csvFileName = 'product.csv';
$fp = fopen($csvFileName, 'w');

// Запишіть заголовок стовпців (назви)
$header = array_keys($products[0]);
fputcsv($fp, $header);

// Записуйте дані товарів в CSV файл
foreach ($products as $product) {
    fputcsv($fp, $product);
}

fclose($fp);

function deleteProductById(&$products, $productId) {
    foreach ($products as $key => $product) {
        if ($product['Id'] == $productId) {
            unset($products[$key]); // Видалити товар з масиву
            break; // Зупинити обробку, якщо товар знайдено
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['product_id'])) {
        $productId = $_POST['product_id'];
        deleteProductById($products, $productId);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Список Товарів</title>
</head>
<body>
<h1>Список Товарів</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Назва</th>
        <th>Країна виробника</th>
        <th>Ціна</th>
    </tr>
    <?php
    foreach ($products as $product) {
        echo "<tr>";
        echo "<td>" . $product['Id'] . "</td>";
        echo "<td>" . $product['Name'] . "</td>";
        echo "<td>" . $product['Country'] . "</td>";
        echo "<td>" . $product['Price'] . "</td>";
        echo "<td>
            <form method='POST'>
                <input type='hidden' name='product_id' value='" . $product['Id'] . "'>
                <input type='submit' value='Вилучити'>
            </form>
        </td>";
        echo "</tr>";
    }
    ?>
</table>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    table, th, td {
        border: 1px solid #000;
    }

    th, td {
        padding: 8px;
        text-align: left;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    h1 {
        text-align: center;
    }
</style>

</body>
</html>
