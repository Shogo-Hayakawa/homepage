<?php
    error_reporting(E_ALL & ~E_NOTICE);
?>

<?php
    // 摂氏、華氏変換
    if($_REQUEST['a'] != NULL)  {
        $a = $_REQUEST['a'];
    }
    else {
        $a = 0;
    }
    $b = $a * 1.8 + 32;

    // 西暦、和暦変換
    $wareki = array("明治", "大正", "昭和", "平成", "令和"); // 明治、大正、昭和、平成、令和
    if($_REQUEST['c'] != NULL)  {
        $c = $_REQUEST['c'];
    }
    else {
        $c = 2019;
    }

    // 平成
    if(1990 <= $c && $c <= 2018)  {
        $d = 3;
        $e = $wareki[$d];
        $f = $c - 2000 + 12;
    } // 昭和
    else if(1927 <= $c && $c <= 1988)  {
        $d = 2;
        $e = $wareki[$d];
        $f = $c - 1900 - 25;
    }// 大正
    else if(1913 <= $c && $c <= 1925)  {
        $d = 1;
        $e = $wareki[$d];
        $f = $c - 1900 - 11;
    }// 明治
    else if(1869 <= $c && $c <= 1911)  {
        $d = 0;
        $e = $wareki[$d];
        $f = $c - 1900 + 33;
    }// 令和元年
    else if($c == 2019)  {
        $d = 4;
        $e = $wareki[$d];
        $f = "元";
    }// 平成元年
    else if($c == 1989)  {
        $d = 3;
        $e = $wareki[$d];
        $f = "元";
    }// 昭和元年
    else if($c == 1926)  {
        $d = 2;
        $e = $wareki[$d];
        $f = "元";
    }// 大正元年
    else if($c == 1912)  {
        $d = 1;
        $e = $wareki[$d];
        $f = "元";
    }// 明治元年
    else if($c == 1868)  {
        $d = 0;
        $e = $wareki[$d];
        $f = "元";
    }
    else if($c <= 1867) {
        $e = "そんな昔のことは";
        $f = "わからないですね…";
    }
    else if($c >= 2020) {
        $d = 4;
        $e = $wareki[$d];
        $f = $c - 2000 - 18;
    }

    // BMI、適正体重計算
    if($_REQUEST['g'] != NULL)  {
        $g = $_REQUEST['g'];    // 身長
    }
    else {
        $g = 1;
    }

    // BMI
    if($_REQUEST['h'] != NULL)  {
        $h = $_REQUEST['h'];    // 体重
    }
    else {
        $h = 1;
    }
    if($g != 0)    {
        $i = $h / (($g / 100) * ($g / 100));
    }
    else {
        $i = "計算できません。";
    }

    // 適正体重
    $j = ($g / 100) * ($g / 100) * 22;

?>

<html>
<head>
<title>かんたん計算</title>
<link rel="stylesheet" type="text/css" href="phpstyle.css" />
</head>
<body id = entire>
<h3>かんたん計算</h3>
<div id = "comment">
<p>日常生活で役立ちそうな計算、変換を行うツールです。</p>
<p>色々やってみてください。</p>
<p>気が向いたら他にも追加するかもです。</p>
<p id = "menubar">戻る場合は<a href = "../php.html">こちら</a>から。PHP紹介ページに戻ります。</p>
</div>

<!--摂氏、華氏変換-->
<div id = "temperature">
<h4>・摂氏→華氏</h4>
<form>
<p>摂氏：
<input type = "number" name = "a" value = "<?php  echo $a; ?>">℃ ： 
<input type = "submit" name = "" value = "変換する">
</p>
<p>華氏：
<span><?php echo $b; ?></span>℉
</p>
</form>
</div>

<!--西暦和暦変換-->
<div id = "year">
<h4>・西暦→和暦（明治～令和まで）</h4>
<form>
<p>西暦：
<input type = "number" name = "c" value = "<?php  echo $c; ?>">年 ： 
<input type = "submit" name = "" value = "変換する">
</p>
<p>和暦：
<span><?php echo $e; echo $f; ?></span>
<?php
    if($c >= 1868)   {
        echo("年");
    }
    if($c >= 2109) {
        echo("  いや長過ぎでしょ…");
    }
?>
<?php
    if($c == 2019)  {
        echo("(平成31年)");
    }
    else if($c == 1989) {
        echo("(昭和64年)");
    }
    else if($c == 1926) {
        echo("(大正15年)");
    }
    else if($c == 1912) {
        echo("(明治45年)");
    }
?>
</p>
</form>
</div>


<!--BMI計算-->
<div id = "bmi">
<h4>・BMI、適正体重計算</h4>
<form>
<p>身長：
<input type = "number" name = "g" value = "<?php  echo $g; ?>">cm
</p>
<p>体重：
<input type = "number" name = "h" value = "<?php  echo $h; ?>">kg：
<input type = "submit" name = "" value = "計算する">
</p>
<p>BMI：
<span><?php echo $i; ?></span>
</p>
<p>適正体重：
<span><?php echo $j; ?>kg</span>
</p>
</form>
</div>

</body>
</html>