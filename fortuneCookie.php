<?php
  $json = file_get_contents("http://fortunecookieapi.herokuapp.com/v1/fortunes?limit=544");
  $details = json_decode($json,true);
  $fortuneCookie = array_slice($details, rand(0,543), 1);
  $message = $fortuneCookie["0"]["message"];

  echo "<script>
function showMessage() {
    alert(\"" . "You found a note inside the cookie : \\n\\n" . $message . "\");
}
</script>
";

  echo "<input type=\"image\" onclick=\"showMessage()\" src=\"images/icon_cookie.png\" style=\"width:30px; height:30px\"/>";
 ?>
