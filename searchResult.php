<!DOCTYPE html>
<html lang="en">
<?php require_once "asset/header.html"?>
<body class="bg-light">
<section class="text-white" id="introduction">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading text-emphasize">Search the Article</h2>
                <hr class="my-5">
                <div class="col-lg-8 mx-auto">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form class="navbar-form navbar-search my-lg-0" action="search.php">
            <div class="input-group">
                <div class="input-group-btn">
                    <select class="btn btn-primary" name="keywordsType">
                        <option class="btn" value="name" <?php if (isset($_SESSION['keywordsType'])&&$_SESSION['keywordsType']=="name") {
                            echo "selected";
                        } ?>>Name</option>
                        <option class="btn" value="platform" <?php if (isset($_SESSION['keywordsType'])&&$_SESSION['keywordsType']=="platform") {
                            echo "selected";
                        } ?>>Platform</option>
                    </select>
                </div>
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
</section>
<section id="resultdetail">
    <div class='container'>
        <div id="result">
            <?php
            if (isset($_SESSION['resultSet'])) {
                echo $_SESSION['resultSet'];
            }
            ?>
        </div>
    </div>
</section>
<section id=page>
    <div class="container">
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
