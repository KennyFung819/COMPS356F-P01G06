<?php

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_GET['keywordsInput'])) {
    //redirect the page if the inputs from users are invalid
    header("Location:searchingResult.php");
    die;
}

//set the $_SESSION variables
if (isset($_GET['page'])) {
    $_SESSION['page']=(int)$_GET['page'];
} else {
    $_SESSION['page']=1;
}

$_SESSION['keywordsInput']=$_GET['keywordsInput'];
$keywordsArray=processString($_SESSION['keywordsInput']);
if ($keywordsArray!=null) {
    $_SESSION['resultBuffer']=makeConnection($keywordsArray);
} else {
    $_SESSION['resultBuffer']=null;
}

if ($_SESSION['resultBuffer']!=null) {
    $_SESSION['resultSet']=processHtml($_SESSION['resultBuffer'], $_SESSION['page']);
    $_SESSION['pages']=processPages($_SESSION['resultBuffer'], $_SESSION['page']);
    unset($_SESSION['resultBuffer']);
} else {
    $_SESSION['resultSet']="<p>the article you want to search doesn't exist, please try other keywords</p>";
    $_SESSION['pages']=null;
}
//redirection
header("Location:searchingResult.php?keywordsInput=".$_SESSION['keywordsInput']."&page=".$_SESSION['page']);

/**
 *this function is used to split input string into separate words by regular expression
 *assume that the key words are separated by spaces(one or more)
 */

function processString($keywords)
{
    $pattern="/[\s]+/";
    $keywords=trim($keywords);
    $separateWords=preg_split($pattern, $keywords);
    foreach ($separateWords as $word) {
        echo $word."<br>";
    }
    return $separateWords;
}

function makeConnection(array $keywords)
{
    echo "making connection<br>";
    $host='localhost';
    $user='root';
    $password='';
    $database='cellfish';
    $port=3306;
    $conn=new mysqli($host, $user, $password, $database, $port);
    if (mysqli_connect_errno()) {
        echo "cannot open the connection";
        return null;
    }
    //
    else {
        echo "connect successfully<br>";
        $sql = "Select id,title,introduction,image,dateTime from post LEFT JOIN tag ON tag.postID = Id where ";
        $i =  0;
        $keywordsTotal = count($keywords);
        foreach ($keywords as $word) {
            if(++$i === $keywordsTotal) {
                $sql=$sql."title like lower('%$word%') OR tag.tagType like lower('%$word%')";
            } else {
                $sql=$sql."title like lower('%$word%') OR tag.tagType like lower('%$word%') OR ";
            }
        }
        $sql=$sql." and 1=1";
        echo $sql;
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $stmt->store_result();
        //$result=$conn->store_result();
        echo "<br>the num of rows is ".$stmt->num_rows."<br>";
        if ($stmt->num_rows==0) {
            echo $result->num_rows;
            return null;
        }
        $conn->close();
        echo "<br>the result number now is".$stmt->num_rows."<br>";
        return $stmt;

    }
}

/**
*process the result and return string with html tags
*/
function processHtml(mysqli_stmt $resultSet,$page)
{
  echo "entering the processhtml function<br>";
  echo "the page is ".$page."<br>";
    $html="";
    $temp="";

    //valify the value of page
    if ($page>$resultSet->num_rows/20+1||$page<1) {
        $page=1;
    }
    $resultSet->data_seek(($page-1)*20);
    $resultSet->bind_result($id,$title,$intro,$image,$datetime);
    for ($count=0;$count<20;$count++) {
        //add html tags into fetched record
        if(!$resultSet->fetch())
          break;
        $html=$html."
      <div class='row'>
      <div class='col-lg-3 col-md-6 text-left'>
      <a href=detail.php?id=$id>
        <img src='$image' alt='article at $datetime' height='200'/>
        <h4>$title</h4></a>
      </div>
      <div class='col-lg-6 col-lg-offset-3 col-md-6 text-center'><p class='text-muted mb-0'>$intro</p></div>
      </div>";
    }
    echo $html;
    return $html;
}
function processPages(mysqli_stmt $resultset,$page){
      $keywordsInput=$_SESSION['keywordsInput'];
      $count=0;
      $pageHtml='';
      if ($page>=5) {
          $count=$_SESSION-4;
      } else {
          $count=1;
      }
      $pages=(int)($resultset->num_rows/20)+1;
      $pageHtml="<div><hr></div><span class='col-lg-5 col-md-6 text-right text-muted'>select pages here ▶ </span><ul class='pagination col-lg-7 col-md-6'>";
      if ($page!=1) {
          echo "<li><a href='searchingResult.php?keywordsInput=$keywordsInput&page=".($page-1)."'>previous page</a></li>";
      }
      for ($times=0;$times<10&&$count<=$pages;$count++,$times++) {
          if ($count==$page) {
              $pageHtml=$pageHtml."<li><a href='#'>$count</a></li>";
          } else {
              $pageHtml=$pageHtml."<li><a href='searchingResult.php?&keywordsInput=$keywordsInput&page=$count'>$count</a></li>";
          }
      }
      echo "the number of total pages is".$pages;
      if ($page<$pages) {
          $pageHtml=$pageHtml."<li><a href='searchingResult.php?&keywordsInput=$keywordsInput&page=".($page+1)."'>next page</a></li>";
      }
      $pageHtml=$pageHtml."</ul>";
      return $pageHtml;
}

?>







