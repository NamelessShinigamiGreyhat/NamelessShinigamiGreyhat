<?php
if (isset($_GET['clearFilter'])){
    header("Location: index.php");
    exit();
}?>

    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

<?php
include('header.php');
?>
<div class="container text-center" style="padding-top: 100px";>
    <form method="get">
        <div class="mb-3">
            <label>Фильтрация по цене:</label>
            <input type="number" min="0" step="0.01" name="costFrom" placeholder="Цена от" value="<?php echo isset($_GET['costFrom']) ? htmlspecialchars($_GET['costFrom']) : ""; ?>" class="form-control">
            <input type="number" min="0" step="0.01" name="costTo" placeholder="Цена до" value="<?php echo isset($_GET['costTo']) ? htmlspecialchars($_GET['costTo']) : ""; ?>" class="form-control mt-3">
            <div class="mb-3">
                <label>Торговая точка:</label>
                <select name="point" class="form-control">
                    <option value="" <?php if (isset($_GET['point']) && htmlspecialchars($_GET['point']) == '') echo 'selected'?>>Выберите точку</option>
                    <option value="1" <?php if (isset($_GET['point']) && htmlspecialchars($_GET['point']) == 1) echo 'selected'?>>Московская точка</option>
                    <option value="2" <?php if (isset($_GET['point']) && htmlspecialchars($_GET['point']) == 2) echo 'selected'?>>Сибирская точка</option>
                    <option value="3" <?php if (isset($_GET['point']) && htmlspecialchars($_GET['point']) == 3) echo 'selected'?>>Саратовская точка</option>
                    <option value="4" <?php if (isset($_GET['point']) && htmlspecialchars($_GET['point']) == 4) echo 'selected'?>>Сирийская точка</option>
                    <option value="5" <?php if (isset($_GET['point']) && htmlspecialchars($_GET['point']) == 5) echo 'selected'?>>Волгоградская точка</option>

                </select>
            </div>
            <div class="mb-3">
                <label>Примечание:</label>
                <input class="form-control" placeholder="Примечание"
                       name="description" value="<?php echo isset($_GET['description']) ? htmlspecialchars($_GET['description']) : ""; ?>"></input>
            </div>
            <div class="mb-3">
                <label>Адрес Покупателя:</label>
                <input type="text" name="adress" placeholder="Введите адрес покупателя " value="<?php echo isset($_GET['adress']) ? htmlspecialchars($_GET['adress']) : ""; ?>"
                       class="form-control">
            </div>
            <input type="submit" value="Применить фильтр" class="btn btn-primary">
            <input type="submit" name="clearFilter" value="Очистить фильтр" class="btn btn-danger">
    </form>
</div>

<div class="container text-center mt-3">
    <table>
        <thead>
        <tr>
            <th scope="col">Скан сека</th>
            <th scope="col">Адрес Покупателя</th>
            <th scope="col">Торговая точка</th>
            <th scope="col">Примечание</th>
            <th scope="col">Cтоимость</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include('logic.php');
        ?>
        </tbody>
    </table>
</div>
