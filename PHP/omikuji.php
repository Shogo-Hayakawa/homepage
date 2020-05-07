<?php
$fortune = array("大吉", "吉", "中吉", "小吉", "末吉", "凶", "大凶");
$index = rand(0, count($fortune) - 1);
$result = $fortune[$index];
?>

<html>
<head>
<title>おみくじ</title>
<link rel="stylesheet" type="text/css" href="phpstyle.css" />
</head>
<body>
<div id="contents">
<h1>おみくじ</h1>
<p>あなたの運勢は…。</p>
<p><span id="result"><?php echo $result; ?></span></p>

<?php
if($index == 0) {
    print("最高の運勢です！令和時代はあなたにとって、最高の時代になるでしょう。");
}
else if($index == 1) {
    print("良い運勢です！令和時代でも良いスタートダッシュが切れるでしょう。");
}
else if($index == 2)    {
    print("どちらかというと良い運勢ですね。焦らず、堅実に物事を進めましょう。");
}
else if($index == 3)    {
    print("まずまずですね。ごく普通の日常になるでしょう。");
}
else if($index == 4)    {
    print("微妙ですねー。悪いことは起こらないと思いますよ、多分。");
}
else if($index == 5)    {
    print("凶のあなたは慎重に、気をつけて日々を過ごしましょう。");
}
else if($index == 6)    {
    print("あぁ…ドンマイです。");
}
?>
<p id = "menubar"><a href = "../omikuji.html">戻る</a></p>
</div>

</body>
</html>