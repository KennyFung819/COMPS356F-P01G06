<?php
	require_once('database.php');
	if (!isset($_GET['id'])){
		header("Location: index.php");
	}
	$id = $_GET["id"];
	$sth = $conn->prepare("SELECT Title,Content,Image,DateTime,likeNo,viewCount FROM Post where Id=$id ORDER BY likeNo desc");
    $sth->execute();
	$addView = $conn->prepare("Update Post set viewCount = viewCount+1 where Id=$id");
	$addView->execute();
    $postCom = $conn->prepare("SELECT Id,Title,Introduction FROM Post ORDER BY RAND()");
    $postCom->execute();
    $comment = $conn->prepare("SELECT * FROM Comment WHERE Post_id = $id ORDER BY DateTime;");
    $comment->execute();
		$tag = $conn->prepare("SELECT tagtype FROM tag WHERE postid = $id;");
		$tag->execute();
    $posts = $postCom->fetchAll();
    $comments = $comment->fetchAll();
    $result = $sth->fetchAll();
		$tag = $tag->fetchAll();
    $myDateTime = new DateTime($result[0]['DateTime'], new DateTimeZone('GMT'));
	$myDateTime->setTimezone(new DateTimeZone('Asia/Hong_Kong'));
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<!--For Google+ and Twitter share link-->
	<!--<link rel="canonical" href="http://www.cellfish.com/" />-->
        <?php require_once "asset/header.html"?>
    </head>
    <body>
    <?php require_once "asset/navbar.html"?>


		<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2><?=$result[0]['Title']?></h2>


				<span class="byline"><?=$myDateTime->format('Y-m-d H:i');?></span>
				<i class="am-icon-thumbs-up" id="postLike" onclick="like(<?=$_GET['id']?>,'Post')">
				<?=$result["0"]["likeNo"]?></i>

						<i class="fa fa-eye" id="viewCount"> <?=$result[0]['viewCount']?></i>
										<div class="product-social-links" style="line-height: 12.5px;">
					<!--Facebook share button-->
					<div class="fb-share-button" data-href="http://www.cellfish.com/test" data-layout="button" data-size="large" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.cellfish.com%2Ftest&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore" >Share</a></div>

					<!--Twitter share button-->
					<a class="twitter-share-button"
					href="https://twitter.com/intent/tweet?text=<?=$result[0]['Title']?>"
					data-size="large">
					Tweet</a>

					<!--<div class="g-plus" data-action="share" data-height="29" ></div>-->
					<div class="g-plus" data-action="share" data-height="29" data-href="http://www.cellfish.com/" ></div>
					<!--<g:plus action="share"></g:plus>-->

					<script>
					window.___gcfg = {
						lang: 'en-US',
						parsetags: 'onload'
					};
					</script>
					<script src="https://apis.google.com/js/platform.js" async defer></script>

					</div>

				</p></div>
				<p><?php
				foreach($tag as $keys => $topic){
						echo "<span style=\"  	background-size: 100% 100%; margin : 5px;
						  	background-image: url(images/tag.jpg);\"> ". $topic[0]." </span>";//
				}?></p>

			<p><img src = "<?= $result[0]['Image'] ?>", alt="" class="image image-full" /> </p>
			<p><?=$result[0]['Content']?></p>
			<p style="color:black;border-bottom:1px solid rgba(34,36,38,.15);">Comment</p>
			<article class="am-comment">

<?php
	foreach ($comments as $comment) {
			$myDateTime = new DateTime($comment["DateTime"], new DateTimeZone('GMT'));
    		$myDateTime->setTimezone(new DateTimeZone('Asia/Hong_Kong'));
?>
<a href="#link-to-user-home">
    <img src="200-offline-sprite.png" alt="" class="am-comment-avatar" width="48" height="48"/>
  </a>
  <div class="am-comment-main">
    <header class="am-comment-hd">
      <!--<h3 class="am-comment-title">评论标题</h3>-->
      <div class="am-comment-meta">
        <a href="#link-to-user" class="am-comment-author"><?=$comment["ip"]?></a>
        on <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><?=$myDateTime->format('Y-m-d H:i');?></time>
      </div>
    </header>
    <div class="am-comment-bd">
      <?=$comment["Content"]?><?php $sc = $conn->prepare("SELECT IP,Content FROM SubComment where comment_Id = ".$comment["Id"]." order by DateTime");
    $sc->execute();
    $scs = $sc->fetchAll(); foreach($scs as $sc){?><blockquote><?=$sc["IP"]?>: <?=$sc["Content"]?></blockquote><?php } ?>
    <br>
      <i class="am-icon-thumbs-up" id="Comment<?=$comment["Id"]?>" onclick="like(<?=$comment["Id"]?>,'Comment')"> <?=$comment["likeNo"]?></i><a onclick="reply(<?=$comment["Id"]?>)">reply</a>

	<span style="display:none" id="Comment<?=$comment["Id"]?>ReplyBox"><input type="text" id="replytext<?=$comment["Id"]?>"><input type="submit" class="am-btn am-btn-secondary" value="Reply" onclick="saveReplay(<?=$comment["Id"]?>,document.getElementById('replytext<?=$comment["Id"]?>').value)"></span>
    </div>
  </div>

  <?php
	}
  ?>

  <form class="am-form" action="addComment.php" method="post">
  	<p></p>
  	<textarea style="margin-left: 63px; width:635px" rows="5" id="doc-ta-1" name="comment"></textarea>
  	<input type="hidden" value="<?=$id?>" name="id">
  	<input type="submit" class="am-btn am-btn-secondary" style="margin-left: 550px;" value="Add Comment">
  </form>
</article>
		</div>
		<div id="sidebar">
			<ul class="style1">
				<a href="detail.php?id=<?=$posts[0]["Id"]?>">
				<li class="first">
					<h3><?=$posts[0]["Title"]?></h3>
					<p><?=$posts[0]["Introduction"]?></p>
				</li>
				</a>
				<a href="detail.php?id=<?=$posts[1]["Id"]?>">
				<li class="first">
					<h3><?=$posts[1]["Title"]?></h3>
					<p><?=$posts[1]["Introduction"]?></p>
				</li>
				</a>
				<a href="detail.php?id=<?=$posts[2]["Id"]?>">
				<li class="first">
					<h3><?=$posts[2]["Title"]?></h3>
					<p><?=$posts[2]["Introduction"]?></p>
				</li>
				</a>
			</ul>
			<div id="stwo-col">
				<div class="sbox1">
					<h2>New</h2>
					<ul class="style2">
						<?php
						for($i=3;$i<7;$i++){
							echo "<li><a href='detail.php?id=".$posts[$i]["Id"]."'>".$posts[$i]['Title']."</a></li>";
						}
						?>
					</ul>
				</div>
				<div class="sbox2">
					<h2>Hot</h2>
					<ul class="style2">
						<?php
						for($i=7;$i<10;$i++){
							echo "<li><a href='detail.php?id=".$posts[$i]["Id"]."'>".$posts[$i]['Title']."</a></li>";
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=116344648445954';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <?php require_once "asset/footer.html"?>

	</body>
</html>

<script src="asset/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="asset/js/amazeui.min.js"></script>

<script>
function like(id,type){
	var http = new XMLHttpRequest();
	var url = "addLike.php";
	var params = "id="+id+"&type="+type;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
	    	var myArr = JSON.parse(this.responseText);
	    	console.log(myArr);
	    	var likeNo = myArr["likeNo"];
	    	var ip = myArr["ip"];
	    	var type = myArr["type"];

	    	if(type == "Comment"){
	    		document.getElementById('Comment'+id).innerHTML = myArr["likeNo"];
	    	}else{
	    		document.getElementById('postLike').innerHTML = myArr["likeNo"];
	    	}
	    }
	}
	http.send(params);
}
function reply(id){
	document.getElementById('Comment'+id+'ReplyBox').style.display = "inline";
}
function saveReplay(id,reply){
	var http = new XMLHttpRequest();
	var url = "saveReplay.php";
	var params = "id="+id+"&reply="+reply;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
	    	location.href = "detail.php?id=<?=$id?>";
	    }
	}
	http.send(params);
}

window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);

  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };

  return t;
}(document, "script", "twitter-wjs"));



</script>
