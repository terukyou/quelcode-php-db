<?php require('dbconnect.php');
session_start();
if (!empty($_POST)) {
    // 項目に入力されてない場合
    if ($_POST['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($_POST['phonetic'] === '') {
        $error['name'] = 'blank';
    }
    if ($_POST['email'] === '') {
        $error['name'] = 'blank';
    }
    if ($_POST['phone'] === '') {
        $error['name'] = 'blank';
    }
    if ($_POST['year'] === '' || $_POST['month'] || $_POST['day']) {
        $error['name'] = 'blank';
    }
    if ($_POST['prefecture'] === '') {
        $error['name'] = 'blank';
    }
    // エラーがない時
    if (empty($error)) {
        // POSTをセッションにいれて入力確認画面へ
        $_SESSION['join'] = $_POST;
        header('Location:confirm.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="style.css">
    <title>プレエントリーお申し込み | QUELCODE ISA オンラインプログラミングスクール | 卒業まで学費不要、日本初のISAを採用</title>
</head>

<body>
    <div class="header">
        <h1><img src="/images/cropped-quelcode-2.png" alt="QUELCODEのロゴ"></h1>
    </div>
    <div class="main wrapper">
        <div class="title">
            <h2>【ISA】QUELCODE</h2>
            <h2>プレエントリーフォーム</h2>
            <p>応募はこちらから。日本で初めてISA(学費後払い)を採用したプログラミングスクール<br>の募集です。全国からのご応募をおまちしています。</p>
        </div>
        <form action="" method="post">
            <div>
                <label>お名前<span class="red">必須</span></label>
                <input type="text" name="name" placeholder="山田太郎">
                <p>漢字/フルネームでご記入ください</p>
                <?php if ($error['name'] === 'blank') : ?>
                    <p class="error">お名前は必須項目です</p>
                <?php endif; ?>
            </div>
            <div>
                <label>ふりがな<span class="red">必須</span></label>
                <input type="text" name="phonetic" placeholder="やまだ たろう">
                <?php if ($error['name'] === 'blank') : ?>
                    <p class="error">ふりがなは必須項目です</p>
                <?php endif; ?>
            </div>
            <div>
                <label>メールアドレス<span class="red">必須</span></label>
                <input type="email" name="email" placeholder="example@mail.com">
                <p>確認メールが届きます。入力の間違いがないようにご確認ください。</p>
                <?php if ($error['name'] === 'blank') : ?>
                    <p class="error">メールアドレスは必須項目です</p>
                <?php endif; ?>
            </div>
            <div>
                <label>電話番号<span class="red">必須</span></label>
                <input type="tel" name="phone" placeholder="09012345678">
                <?php if ($error['name'] === 'blank') : ?>
                    <p class="error">電話番号は必須項目です</p>
                <?php endif; ?>
            </div>
            <div>
                <label>生年月日<span class="red">必須</span></label>
                <select name="year">
                    <option value="">-</option>
                    <option value="1900">1900</option>
                    <option value="1901">1901</option>
                    <option value="1902">1902</option>
                    <option value="1903">1903</option>
                    <option value="1904">1904</option>
                    <option value="1905">1905</option>
                    <option value="1906">1906</option>
                    <option value="1907">1907</option>
                    <option value="1908">1908</option>
                    <option value="1909">1909</option>
                    <option value="1910">1910</option>
                    <option value="1911">1911</option>
                    <option value="1912">1912</option>
                    <option value="1913">1913</option>
                    <option value="1914">1914</option>
                    <option value="1915">1915</option>
                    <option value="1916">1916</option>
                    <option value="1917">1917</option>
                    <option value="1918">1918</option>
                    <option value="1919">1919</option>
                    <option value="1920">1920</option>
                    <option value="1921">1921</option>
                    <option value="1922">1922</option>
                    <option value="1923">1923</option>
                    <option value="1924">1924</option>
                    <option value="1925">1925</option>
                    <option value="1926">1926</option>
                    <option value="1927">1927</option>
                    <option value="1928">1928</option>
                    <option value="1929">1929</option>
                    <option value="1930">1930</option>
                    <option value="1931">1931</option>
                    <option value="1932">1932</option>
                    <option value="1933">1933</option>
                    <option value="1934">1934</option>
                    <option value="1935">1935</option>
                    <option value="1936">1936</option>
                    <option value="1937">1937</option>
                    <option value="1938">1938</option>
                    <option value="1939">1939</option>
                    <option value="1940">1940</option>
                    <option value="1941">1941</option>
                    <option value="1942">1942</option>
                    <option value="1943">1943</option>
                    <option value="1944">1944</option>
                    <option value="1945">1945</option>
                    <option value="1946">1946</option>
                    <option value="1947">1947</option>
                    <option value="1948">1948</option>
                    <option value="1949">1949</option>
                    <option value="1950">1950</option>
                    <option value="1951">1951</option>
                    <option value="1952">1952</option>
                    <option value="1953">1953</option>
                    <option value="1954">1954</option>
                    <option value="1955">1955</option>
                    <option value="1956">1956</option>
                    <option value="1957">1957</option>
                    <option value="1958">1958</option>
                    <option value="1959">1959</option>
                    <option value="1960">1960</option>
                    <option value="1961">1961</option>
                    <option value="1962">1962</option>
                    <option value="1963">1963</option>
                    <option value="1964">1964</option>
                    <option value="1965">1965</option>
                    <option value="1966">1966</option>
                    <option value="1967">1967</option>
                    <option value="1968">1968</option>
                    <option value="1969">1969</option>
                    <option value="1970">1970</option>
                    <option value="1971">1971</option>
                    <option value="1972">1972</option>
                    <option value="1973">1973</option>
                    <option value="1974">1974</option>
                    <option value="1975">1975</option>
                    <option value="1976">1976</option>
                    <option value="1977">1977</option>
                    <option value="1978">1978</option>
                    <option value="1979">1979</option>
                    <option value="1980">1980</option>
                    <option value="1981">1981</option>
                    <option value="1982">1982</option>
                    <option value="1983">1983</option>
                    <option value="1984">1984</option>
                    <option value="1985">1985</option>
                    <option value="1986">1986</option>
                    <option value="1987">1987</option>
                    <option value="1988">1988</option>
                    <option value="1989">1989</option>
                    <option value="1990">1990</option>
                    <option value="1991">1991</option>
                    <option value="1992">1992</option>
                    <option value="1993">1993</option>
                    <option value="1994">1994</option>
                    <option value="1995">1995</option>
                    <option value="1996">1996</option>
                    <option value="1997">1997</option>
                    <option value="1998">1998</option>
                    <option value="1999">1999</option>
                    <option value="2000" selected>2000</option>
                    <option value="2001">2001</option>
                    <option value="2002">2002</option>
                    <option value="2003">2003</option>
                    <option value="2004">2004</option>
                    <option value="2005">2005</option>
                    <option value="2006">2006</option>
                    <option value="2007">2007</option>
                    <option value="2008">2008</option>
                    <option value="2009">2009</option>
                    <option value="2010">2010</option>
                    <option value="2011">2011</option>
                    <option value="2012">2012</option>
                    <option value="2013">2013</option>
                    <option value="2014">2014</option>
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                </select>年
                <select name="month">
                    <option value="">-</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>月
                <select name="day">
                    <option value="">-</option>
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                    <option value="6">06</option>
                    <option value="7">07</option>
                    <option value="8">08</option>
                    <option value="9">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>日
                <p>満16歳以上の方を対象としています。</p>
                <?php if ($error['name'] === 'blank') : ?>
                    <p class="error">生年月日は必須項目です</p>
                <?php endif; ?>
                <?php ?>
            </div>
            <div>
                <label>都道府県<span class="red">必須</span></label>
                <select name="prefecture">
                    <option value="">選択してください</option>
                    <?php
                    $prefectures = $db->query('SELECT * FROM prefecture');
                    while ($prefecture = $prefectures->fetch()) {
                        print '<option value="' . $prefecture['id'] . '">' . $prefecture['name'] . '</option>';
                    }
                    ?>
                </select>
                <p>現在のお住まいの都道府県を選択ください。</p>
                <?php if ($error['name'] === 'blank') : ?>
                    <p class="error">都道府県は必須項目です</p>
                <?php endif; ?>
            </div>
            <div>
                <input type="submit" value="入力内容を確認">
                <p><a href="#">プライバシーポリシー</a>をお読みの上、同意して送信してください。</p>
            </div>
        </form>
    </div>
</body>

</html>