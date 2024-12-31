

<article>

  <?php
  print($s);
  if (isset($_SESSION['login_user']) && $_SESSION['login_user']['user_id'] > 0) {
    $mypage = '<form action= "" method="post">
              <button type="submit" name="ad">★お気に入り</button>
              </form>';
    print $mypage;
  }
  echo '<br>';
  echo ($google);
  
  echo '<br><br>';
  $num = 1;
  if (isset($entry)) {
    while ($resister = $entry->fetch()) :
      print('' . $num++ . ' ');
      print('名前:' . $resister['name'] . ' ');
      print('日付:' . $resister['day']);
      print('ID:' . $resister['ip_id']);
      echo '<br>';
      print('' . $resister['comment']);
      echo '<br><br><br>';
    endwhile;
  }
  ?>
</article>
<form method="POST" >
  <a>名前</a><br>
  <input type="text" name="name">

  <br>
  <a>コメント</a><br>
  <textarea name="comment" rows="8" cols="40" required></textarea><br>
  <input type="submit" name="add" value="投稿する">
</form>
