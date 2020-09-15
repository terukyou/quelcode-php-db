<?php require('dbconnect.php');
session_start();
// セレクトタグの選択した内容をselectedにする
function selected($key,$option)
{
    echo array_key_exists($key, $_POST) && $_POST[$key] == $option ? 'selected' : '';
}

if (!empty($_POST)) {
    // 項目に入力されてない場合
// 名前
    if (empty($_POST['name']) && trim($_POST['name'] === '')) {
        $error['name'] = 'blank';
    }elseif (strlen($_POST['name'])>100) {
    // 文字数が半角100文字以上の時
        $error['name']='length';
    }
// ふりがな
    if (empty($_POST['phonetic']) && trim($_POST['phonetic']==='')) {
        $error['phonetic'] = 'blank';
    }elseif (strlen($_POST['phonetic'])>100) {
    // 文字数が半角100文字以上の時
        $error['phonetic']='length';
    }
// メールアドレス
    if (empty($_POST['email']) && trim($_POST['email']==='')) {
        $error['email'] = 'blank';
    }elseif (strlen($_POST['phonetic'])>100) {
    // 文字数が半角100文字以上の時
        $error['phonetic']='length';
    }
// 電話番号
    if (empty($_POST['phone']) && trim($_POST['phone']==='')) {
        $error['phone'] = 'blank';
    }
// 生年月日
    if (empty($_POST['year']) || empty($_POST['month']) || empty($_POST['day'])) {
        $error['birthday'] = 'blank';
    }
// 都道府県
    if (empty($_POST['prefecture']) && trim($_POST['prefecture']==='')) {
        $error['prefecture'] = 'blank';
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
                <input type="text" name="name" placeholder="山田太郎" value="<?php echo htmlspecialchars($_POST['name'], ENT_QUOTES); ?>">
                <p>漢字/フルネームでご記入ください</p>
                <?php if ($error['name'] === 'blank') : ?>
                    <p class="error">お名前は必須項目です</p>
                <?php endif; ?>
                <?php if($error['name']):?>
                    <p class="error">お名前は半角100文字以内で入力してください。</p>
                <?php endif; ?>
            </div>
            <div>
                <label>ふりがな<span class="red">必須</span></label>
                <input type="text" name="phonetic" placeholder="やまだ たろう" value="<?php echo htmlspecialchars($_POST['phonetic'], ENT_QUOTES); ?>">
                <?php if ($error['phonetic'] === 'blank') : ?>
                    <p class="error">ふりがなは必須項目です</p>
                <?php endif; ?>
                <?php if($error['phonetic']):?>
                    <p class="error">ふりがなは半角100文字以内で入力してください。</p>
                <?php endif; ?>
            </div>
            <div>
                <label>メールアドレス<span class="red">必須</span></label>
                <input type="email" name="email" placeholder="example@mail.com" value="<?php echo htmlspecialchars($_POST['email'], ENT_QUOTES); ?>">
                <p>確認メールが届きます。入力の間違いがないようにご確認ください。</p>
                <?php if ($error['email'] === 'blank') : ?>
                    <p class="error">メールアドレスは必須項目です</p>
                <?php endif; ?>
                <?php if($error['phonetic']):?>
                    <p class="error">メールアドレスは半角100文字以内で入力してください。</p>
                <?php endif; ?>
            </div>
            <div>
                <label>電話番号<span class="red">必須</span></label>
                <input type="tel" name="phone" placeholder="09012345678" value="<?php echo htmlspecialchars($_POST['phone'], ENT_QUOTES); ?>">
                <?php if ($error['phone'] === 'blank') : ?>
                    <p class="error">電話番号は必須項目です</p>
                <?php endif; ?>
            </div>
            <div>
                <label>生年月日<span class="red">必須</span></label>
                <select name="year">
                    <option value="">-</option>
<option value="1900" <?php selected('year','1900'); ?>>1900</option>
                    <option value="1901" <?php selected('year','1901'); ?>>1901</option>
                    <option value="1902" <?php selected('year','1902'); ?>>1902</option>
                    <option value="1903" <?php selected('year','1903'); ?>>1903</option>
                    <option value="1904" <?php selected('year','1904'); ?>>1904</option>
                    <option value="1905" <?php selected('year','1905'); ?>>1905</option>
                    <option value="1906" <?php selected('year','1906'); ?>>1906</option>
                    <option value="1907" <?php selected('year','1907'); ?>>1907</option>
                    <option value="1908" <?php selected('year','1908'); ?>>1908</option>
                    <option value="1909" <?php selected('year','1909'); ?>>1909</option>
                    <option value="1910" <?php selected('year','1910'); ?>>1910</option>
                    <option value="1911" <?php selected('year','1911'); ?>>1911</option>
                    <option value="1912" <?php selected('year','1912'); ?>>1912</option>
                    <option value="1913" <?php selected('year','1913'); ?>>1913</option>
                    <option value="1914" <?php selected('year','1914'); ?>>1914</option>
                    <option value="1915" <?php selected('year','1915'); ?>>1915</option>
                    <option value="1916" <?php selected('year','1916'); ?>>1916</option>
                    <option value="1917" <?php selected('year','1917'); ?>>1917</option>
                    <option value="1918" <?php selected('year','1918'); ?>>1918</option>
                    <option value="1919" <?php selected('year','1919'); ?>>1919</option>
                    <option value="1920" <?php selected('year','1920'); ?>>1920</option>
                    <option value="1921" <?php selected('year','1921'); ?>>1921</option>
                    <option value="1922" <?php selected('year','1922'); ?>>1922</option>
                    <option value="1923" <?php selected('year','1923'); ?>>1923</option>
                    <option value="1924" <?php selected('year','1924'); ?>>1924</option>
                    <option value="1925" <?php selected('year','1925'); ?>>1925</option>
                    <option value="1926" <?php selected('year','1926'); ?>>1926</option>
                    <option value="1927" <?php selected('year','1927'); ?>>1927</option>
                    <option value="1928" <?php selected('year','1928'); ?>>1928</option>
                    <option value="1929" <?php selected('year','1929'); ?>>1929</option>
                    <option value="1930" <?php selected('year','1930'); ?>>1930</option>
                    <option value="1931" <?php selected('year','1931'); ?>>1931</option>
                    <option value="1932" <?php selected('year','1932'); ?>>1932</option>
                    <option value="1933" <?php selected('year','1933'); ?>>1933</option>
                    <option value="1934" <?php selected('year','1934'); ?>>1934</option>
                    <option value="1935" <?php selected('year','1935'); ?>>1935</option>
                    <option value="1936" <?php selected('year','1936'); ?>>1936</option>
                    <option value="1937" <?php selected('year','1937'); ?>>1937</option>
                    <option value="1938" <?php selected('year','1938'); ?>>1938</option>
                    <option value="1939" <?php selected('year','1939'); ?>>1939</option>
                    <option value="1940" <?php selected('year','1940'); ?>>1940</option>
                    <option value="1941" <?php selected('year','1941'); ?>>1941</option>
                    <option value="1942" <?php selected('year','1942'); ?>>1942</option>
                    <option value="1943" <?php selected('year','1943'); ?>>1943</option>
                    <option value="1944" <?php selected('year','1944'); ?>>1944</option>
                    <option value="1945" <?php selected('year','1945'); ?>>1945</option>
                    <option value="1946" <?php selected('year','1946'); ?>>1946</option>
                    <option value="1947" <?php selected('year','1947'); ?>>1947</option>
                    <option value="1948" <?php selected('year','1948'); ?>>1948</option>
                    <option value="1949" <?php selected('year','1949'); ?>>1949</option>
                    <option value="1950" <?php selected('year','1950'); ?>>1950</option>
                    <option value="1951" <?php selected('year','1951'); ?>>1951</option>
                    <option value="1952" <?php selected('year','1952'); ?>>1952</option>
                    <option value="1953" <?php selected('year','1953'); ?>>1953</option>
                    <option value="1954" <?php selected('year','1954'); ?>>1954</option>
                    <option value="1955" <?php selected('year','1955'); ?>>1955</option>
                    <option value="1956" <?php selected('year','1956'); ?>>1956</option>
                    <option value="1957" <?php selected('year','1957'); ?>>1957</option>
                    <option value="1958" <?php selected('year','1958'); ?>>1958</option>
                    <option value="1959" <?php selected('year','1959'); ?>>1959</option>
                    <option value="1960" <?php selected('year','1960'); ?>>1960</option>
                    <option value="1961" <?php selected('year','1961'); ?>>1961</option>
                    <option value="1962" <?php selected('year','1962'); ?>>1962</option>
                    <option value="1963" <?php selected('year','1963'); ?>>1963</option>
                    <option value="1964" <?php selected('year','1964'); ?>>1964</option>
                    <option value="1965" <?php selected('year','1965'); ?>>1965</option>
                    <option value="1966" <?php selected('year','1966'); ?>>1966</option>
                    <option value="1967" <?php selected('year','1967'); ?>>1967</option>
                    <option value="1968" <?php selected('year','1968'); ?>>1968</option>
                    <option value="1969" <?php selected('year','1969'); ?>>1969</option>
                    <option value="1970" <?php selected('year','1970'); ?>>1970</option>
                    <option value="1971" <?php selected('year','1971'); ?>>1971</option>
                    <option value="1972" <?php selected('year','1972'); ?>>1972</option>
                    <option value="1973" <?php selected('year','1973'); ?>>1973</option>
                    <option value="1974" <?php selected('year','1974'); ?>>1974</option>
                    <option value="1975" <?php selected('year','1975'); ?>>1975</option>
                    <option value="1976" <?php selected('year','1976'); ?>>1976</option>
                    <option value="1977" <?php selected('year','1977'); ?>>1977</option>
                    <option value="1978" <?php selected('year','1978'); ?>>1978</option>
                    <option value="1979" <?php selected('year','1979'); ?>>1979</option>
                    <option value="1980" <?php selected('year','1980'); ?>>1980</option>
                    <option value="1981" <?php selected('year','1981'); ?>>1981</option>
                    <option value="1982" <?php selected('year','1982'); ?>>1982</option>
                    <option value="1983" <?php selected('year','1983'); ?>>1983</option>
                    <option value="1984" <?php selected('year','1984'); ?>>1984</option>
                    <option value="1985" <?php selected('year','1985'); ?>>1985</option>
                    <option value="1986" <?php selected('year','1986'); ?>>1986</option>
                    <option value="1987" <?php selected('year','1987'); ?>>1987</option>
                    <option value="1988" <?php selected('year','1988'); ?>>1988</option>
                    <option value="1989" <?php selected('year','1989'); ?>>1989</option>
                    <option value="1990" <?php selected('year','1990'); ?>>1990</option>
                    <option value="1991" <?php selected('year','1991'); ?>>1991</option>
                    <option value="1992" <?php selected('year','1992'); ?>>1992</option>
                    <option value="1993" <?php selected('year','1993'); ?>>1993</option>
                    <option value="1994" <?php selected('year','1994'); ?>>1994</option>
                    <option value="1995" <?php selected('year','1995'); ?>>1995</option>
                    <option value="1996" <?php selected('year','1996'); ?>>1996</option>
                    <option value="1997" <?php selected('year','1997'); ?>>1997</option>
                    <option value="1998" <?php selected('year','1998'); ?>>1998</option>
                    <option value="1999" <?php selected('year','1999'); ?>>1999</option>
                    <option value="2000" <?php selected('year','2000'); if(empty($_POST['year'])){echo 'selected';} ?>>2000</option>
                    <option value="2001" <?php selected('year','2001'); ?>>2001</option>
                    <option value="2002" <?php selected('year','2002'); ?>>2002</option>
                    <option value="2003" <?php selected('year','2003'); ?>>2003</option>
                    <option value="2004" <?php selected('year','2004'); ?>>2004</option>
                    <option value="2005" <?php selected('year','2005'); ?>>2005</option>
                    <option value="2006" <?php selected('year','2006'); ?>>2006</option>
                    <option value="2007" <?php selected('year','2007'); ?>>2007</option>
                    <option value="2008" <?php selected('year','2008'); ?>>2008</option>
                    <option value="2009" <?php selected('year','2009'); ?>>2009</option>
                    <option value="2010" <?php selected('year','2010'); ?>>2010</option>
                    <option value="2011" <?php selected('year','2011'); ?>>2011</option>
                    <option value="2012" <?php selected('year','2012'); ?>>2012</option>
                    <option value="2013" <?php selected('year','2013'); ?>>2013</option>
                    <option value="2014" <?php selected('year','2014'); ?>>2014</option>
                    <option value="2015" <?php selected('year','2015'); ?>>2015</option>
                    <option value="2016" <?php selected('year','2016'); ?>>2016</option>
                    <option value="2017" <?php selected('year','2017'); ?>>2017</option>
                    <option value="2018" <?php selected('year','2018'); ?>>2018</option>
                    <option value="2019" <?php selected('year','2019'); ?>>2019</option>
                    <option value="2020" <?php selected('year','2020'); ?>>2020</option>
                </select>年
                <select name="month">
                    <option value="">-</option>
                    <option value="1" <?php selected('month','01'); ?>>01</option>
                    <option value="2" <?php selected('month','02'); ?>>02</option>
                    <option value="3" <?php selected('month','03'); ?>>03</option>
                    <option value="4" <?php selected('month','04'); ?>>04</option>
                    <option value="5" <?php selected('month','05'); ?>>05</option>
                    <option value="6" <?php selected('month','06'); ?>>06</option>
                    <option value="7" <?php selected('month','07'); ?>>07</option>
                    <option value="8" <?php selected('month','08'); ?>>08</option>
                    <option value="9" <?php selected('month','09'); ?>>09</option>
                    <option value="10" <?php selected('month','10'); ?>>10</option>
                    <option value="11" <?php selected('month','11'); ?>>11</option>
                    <option value="12" <?php selected('month','12'); ?>>12</option>
                </select>月
                <select name="day">
                    <option value="">-</option>
                    <option value="01" <?php selected('day','01'); ?>>01</option>
                    <option value="02" <?php selected('day','02'); ?>>02</option>
                    <option value="03" <?php selected('day','03'); ?>>03</option>
                    <option value="04" <?php selected('day','04'); ?>>04</option>
                    <option value="05" <?php selected('day','05'); ?>>05</option>
                    <option value="06" <?php selected('day','06'); ?>>06</option>
                    <option value="07" <?php selected('day','07'); ?>>07</option>
                    <option value="08" <?php selected('day','08'); ?>>08</option>
                    <option value="09" <?php selected('day','09'); ?>>09</option>
                    <option value="10" <?php selected('day','10'); ?>>10</option>
                    <option value="11" <?php selected('day','11'); ?>>11</option>
                    <option value="12" <?php selected('day','12'); ?>>12</option>
                    <option value="13" <?php selected('day','13'); ?>>13</option>
                    <option value="14" <?php selected('day','14'); ?>>14</option>
                    <option value="15" <?php selected('day','15'); ?>>15</option>
                    <option value="16" <?php selected('day','16'); ?>>16</option>
                    <option value="17" <?php selected('day','17'); ?>>17</option>
                    <option value="18" <?php selected('day','18'); ?>>18</option>
                    <option value="19" <?php selected('day','19'); ?>>19</option>
                    <option value="20" <?php selected('day','20'); ?>>20</option>
                    <option value="21" <?php selected('day','21'); ?>>21</option>
                    <option value="22" <?php selected('day','22'); ?>>22</option>
                    <option value="23" <?php selected('day','23'); ?>>23</option>
                    <option value="24" <?php selected('day','24'); ?>>24</option>
                    <option value="25" <?php selected('day','25'); ?>>25</option>
                    <option value="26" <?php selected('day','26'); ?>>26</option>
                    <option value="27" <?php selected('day','27'); ?>>27</option>
                    <option value="28" <?php selected('day','28'); ?>>28</option>
                    <option value="29" <?php selected('day','29'); ?>>29</option>
                    <option value="30" <?php selected('day','30'); ?>>30</option>
                    <option value="31" <?php selected('day','31'); ?>>31</option>
                </select>日
                <p>満16歳以上の方を対象としています。</p>
                <?php if ($error['birthday'] === 'blank') : ?>
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
                <?php if ($error['prefecture'] === 'blank') : ?>
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
