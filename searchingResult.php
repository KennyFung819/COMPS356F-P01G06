<!DOCTYPE html>
<html lang="en">
<?php require_once "asset/header.html";
if (!isset($_SESSION)) {
    session_start();
}
?>
<body class="bg-light">
<?php require_once "asset/navbar.html"?>

<div class="container">
    <p>Following is the search record</p>
    <p> </p>
</div>

<div class="text-white top-padded" id="serachResult">
    <div class="container">
        <form class="my-lg-8 text-center" action="search.php">
            <div class="input-group">
                <input type="text" class="form-control" name="keywordsInput" placeholder="please enter the keywords you want to search" value="<?php
                if (!empty($_SESSION['keywordsInput'])&&!ctype_space($_SESSION['keywordsInput'])) {
                    echo trim($_SESSION['keywordsInput']);
                }
                ?>">
                <div class="input-group-btn">
                    <input type="submit" class="btn  btn-primary" value="search">
                </div>
            </div>
        </form>
    </div>
</div>
<div id="resultdetail">
    <div class='container'>
        <div id="result">
            <?php
            if (isset($_SESSION['resultSet'])) {
                echo $_SESSION['resultSet'];
            }
            ?>
        </div>
    </div>
</div>
<section id=page>
    <div class="container text-center">
        <div class="row">
            <?php
            if(isset($_SESSION['pages'])) {
                echo $_SESSION['pages'];
            }
            ?>
        </div>
    </div>
</section>

<?php require_once "asset/footer.html"?>

</body>
</html>
