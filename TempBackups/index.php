<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . '/wp-load.php';

if ( ! is_user_logged_in() ) {
    header("HTTP/1.1 403 Forbidden" );
    die();
}

if( ! current_user_can('administrator')) {
    header("HTTP/1.1 403 Forbidden" );
    die();
}

if (isset($_GET["del"])){
    $filename = htmlspecialchars($_GET["del"]);
    if(file_exists($filename)) {
        @chmod($filename, 0777);
        @unlink($filename);
        exit("deleted");
    }
}
if (isset($_GET["file"])){
    $filename = htmlspecialchars($_GET["file"]);
    $lock = htmlspecialchars($_GET["lock"]);
    if(file_exists($filename)) {
        if ($lock=="true"){
            @chmod($filename, 0600);
            exit("locked");
        } else {
            @chmod($filename, 0777);
            exit("unlocked");
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Temp Backup Management</title>
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQEREDwAAAAAAAAAAAAAAAAAAAABAREQPAAAAAAAAAP8AAAAAAAAAAEBERA8AAAAAQEREDwAAAAAAAAAAAAAAAAAAAABAREQPAAAAAAAAAAAAAAAAAAAAAAQEBP8AAAD/AAAA/wAAAAAAAAAAQEREDwAAAP8EBAT/AAAA/wAAAP8AAAD/AAAA/wQEBP8AAADPAAAAAAAAAO8AAAD/BAQE/wAAAP8AAAD/AAAAAAAAAAAAAAD/AAAAAEBERA8AAAAAAAAAAAAAAAAAAAAAQEREDwAAAAAAAAD/AAAA/wAAAP8EBAT/AAAA/wAAAAAAAAAAAAAA/wAAAAAAAAAAQEREDwAAAAAAAAAAAAAAAAAAAAAEBAT/AAAA/wAAAP8AAAD/AAAA/wQEBP8AAAD/AAAAAAAAAP8AAAAAAAAAAAAAAABAREQPAAAAAAAAAAAAAAAAAAAAAEBERA8AAAD/AAAA/wAAAP8AAAAAQEREDwAAAAAEBAT/AAAAAAAAAAAAAAAAAAAAAEBERA8AAAAAAAAAAAAAAAAAAAAABAQE/wAAAP8AAAD/AAAAAAAAAABAREQPAAAA/0BERA8AAAAAAAAAAAAAAAAAAAAAQEREDwAAAAAAAAAAAAAAAAAAAP8EBAT/AAAA/wAAAAAAAAAAAAAAAAAAAP8AAAAAQEREDwAAAAAAAAAAAAAAAAAAAABAREQPAAAAAAAAAAAAAAD/AAAA/wQEBP8AAAAAAAAAAAAAAAAAAAD/AAAAAAAAAAAEBAT/AAAA/wAAAP8AAAD/AAAA/wQEBP8AAAD/AAAAAAAAAAAAAAAAQEREDwAAAAAAAAAAAAAA/wAAAAAAAAAAAAAA/wQEBP8AAAD/AAAA/wAAAL8AAAD/BAQE/wAAAAAAAAAAAAAAAAAAAABAREQPAAAAAAQEBP8AAAAAAAAAAAAAAP8AAAD/BAQE/wAAAP8AAAAAAAAA/wAAAP9AREQPAAAAAAAAAP8AAAAAAAAAAEBERA8AAAD/QEREDwAAAAAAAAD/AAAA/wAAAP8EBAT/AAAAAAAAAP8AAAD/AAAAAEBERA8AAAD/AAAAAAAAAAAAAAAAAAAA/wAAAABAREQPAAAA/wAAAP8AAAD/AAAA/0BERA8AAAD/AAAA/wAAAAAAAAD/BAQE/wAAAAAAAAAAAAAAAAAAAP8AAAD/AAAA/wQEBP8AAAD/AAAA/wAAAP8AAAD/BAQE/wAAAP8AAAD/AAAA/wAAAABAREQPAAAAAAAAAAAAAAD/AAAA/wAAAP8AAAD/BAQE/wAAAP8AAAD/AAAA/wAAAP8EBAT/AAAA/wAAAAAAAAAAAAAAAEBERA8AAAAA/+8AAP/HAAAAgwAAf4MAAH8BAAB/xwAAf8cAAH/HAAB/xwAAYD8AAGA/AABhNwAAYTcAAGEnAAAADwAAAB8AAA==" rel="icon" type="image/x-icon" />
    <style>
        body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        background: #3399ff;
        }
        h1{
            text-align: center;
            color:white;
            margin-bottom: 0px;
            margin-top: 70px;
        }
        .notice{
            text-align: center;
            color:white;
            margin-top: 0px;
            margin-bottom: 0px;
        }
        .filelist li{
            list-style-type: none;
            padding: 20px;
            text-align: center;
            min-height: 25px;
            max-width: 50%;
            margin: 20px auto;
        }
        .filelist li a{
            text-decoration: none;
        }
        ul {
            background: #3399ff;
            padding: 20px;
            margin-top: 0px;
        }

        ul li {
            background: #cce5ff;
            margin: 5px;
            border-radius: 5px;
        }
        ul li:hover{
            background: #fbfdff;
        }
        .deletebtn{
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABsklEQVRIS+2VS0tCQRTHzzk3rcSikigIXEQrIUqvVzfZA9IIok/Qrm2RBO36Bi16CdG6Vas2raJFUUL4uAaBBFG5iIJAW5RF5szEJQIT9V57LKJmdWD+8/+dOTNnBuGHB/6wP/wRwO3goNXEsjJIUvGOU817R6lKZTZUoky/si4E7RAIVmjGQYxzbp5vDYevy0HKAlwur8yBd2sLJ81i6ioPx8Um7URdJwB7al6kkMR9IhbbAgBeqCsJkGXZwpBCgLCiiUclYW+UsL5Ulrs5uEgDvBADJwA8qmp0UxfgcDispnrLgpkwRESSkaucz4tOjrwhEYtt6AI0QY/sDSB7WUNJOtMDMIE2EhDNPT8Ek8lkzhBAE7lkZUmNR4N6AKeiDCPDOlWNbBdrK96id8DdgGe6eT+yqi0ujNM+zwgXcBl4FvYvAdJ9ypLt8G0nhXHGp0yQhKdDWdH0D/jlJcr4PHMtB5EF7ZA/xH2eMU507n9iHZ86ZKdTWU4kojN6fdDrdvuJU23VfdDrVhaRASGBqARhAtpqkM/G4/GbqhpNL3Mj84b+AyNGVf8HXzE1/Nh9B+QVgmEBKLD5+uUAAAAASUVORK5CYII=);
            float: right;
            font-size:0;
            background-repeat: no-repeat;
            background-position: center;
            width: 30px;
            height: 30px;
            border-radius: 5px;
        }
        .deletebtn:hover{
            background-color: #fffca3;
        }
        .filename{
            float: left;
            color: green;
        }
        .lockbtn{
            float: right;
            margin-right: 20px;
            background-repeat: no-repeat;
            background-position: center;
        }
        .lockbtn:hover{
            background-color: #fffca3;
        }
        .locked{
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAoAAAAQCAYAAAAvf+5AAAABQUlEQVQoU5XOsUrDYBAH8P99SW0RBCnSWOOoi0NtCg4uBlFxdfEVBJ0EB6EPIHTQqXkGxdEX0IgtItQswcW6CG1VEBQMTSXNSdJWYhTFb/g4/vfj7gj993Q6N+5J3gEYqwAlmH1T7krbylLtLiAUfHy8LrWUepVBDhFKPtgTjE0ABdnv5DKLN28hbJizGkFcpd7FWHql9hpktj0zlH5O3jOwoerWSQib5/k1YjKyuqUOTglzU6sw0aG6cF3+hGAqT+jWZAxeMNHR/+FDJZchNzFCQjjRiSxjGJ22oyzbj9QwCwaBt6IgXjPYoKapeQCk3yCAbgD5DxS249D1fZ4PGkLQJYDkYMgXSEA9q1vTQbNlarcMTP0Iw5Cx09uF/ehJ324koNTz2I3DNoBUJHzp16ORzKXmWb4IomIMR4e5YN77AOich6Evx3OlAAAAAElFTkSuQmCC);
            font-size:0;
            width: 30px;
            height: 30px;
        }
        .unlocked{
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABWUlEQVQ4T53Tvy9DURjG8e97e9sKQWLgPyiDRWxEYhBCW4tJ0sS9lYhKxGIxmAwkFkHc2/hxEz/CQNJwwmIymERiFYPBJgartvfINXVoL3rW9zmf4bzPEYDs/nhzzPBXBMaADuAJQ1adqaubYB52JLgcN/wHIAHci9ZvWmQQaNciC651tRkKzHqpDYEFLWRcS50E4Zn8UGsk1nAN9GrMLtcuvNZCJOelnoF3x1b9laGclxwAuUOTdbLKCwO0hl3XVjOVoem9kbZYJPohsLZjq6UQIP2C6FPHUsuVofnj0ZZS0XwEnXdstV4TqDVYPBxuKpUbo2EPuGEVPqVaYM5Lz2n0FmCE75DbqkDOS50DE791IJj/FfCBS6Av6Ecl/DdAUI6l0rmDZAaRo/8D8PFVLiaiprktWibrATAMv9MvG2cIPXUBPx8MuoFIvUDVpdTqgaXRLhD/ZZUX3x9gdWYdepUuAAAAAElFTkSuQmCC);
            font-size:0;
            width: 30px;
            height: 30px;
        }
        .copybtn{
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAADxklEQVRIS7XVeUwUVxwH8O/MDksatUZJbWiT/uNBelh7Saxpqol4VKT1SG0XWBC6KLsL3Wa1BttCR8UDcRfU5eg/1RKoMalHOMyyy1bQiuIFBLBFKbWoeLSwBraWnZ15r5mx23QD07JN+pLJm7w38z7zmzfz+zH4nxsz3vULbbuPSZK0Sr5eo9Ec/3hjzurx3BsCHEjmeJGQLaDQBm8mz6yAGBULCgZLlsUpwy5nAxhQcAMXwPbVhjoMBA3D7vmwSsyVJ0KAYh0bSMyt5Tp/GkBzey8opdBqIxC3eBG0kZEhCwl+P9wuDwYHB0EIBaUE86ZzeO6JEbiPlgoP+skEvhFiCFCkY6k+rxblxy9iXUoabt66iabTjYhPWI5r3dcxK2amggTP62pOYsGbCxEzKwY+nw/2Yhsy3yBwflMmPdCSifwhjIwCkj49hvITrfgkJxeHj1Thzp1+GNIzlGj8gh8BUVAOeUFXvRvR0U8hOTEFkiTBuskC43w/6k98qQ4k5hxBeXUH8j7biorKQ5g27Ul0dLSDEBLyiliWxezZc3D//j0kxCdgypQoZFvMMM1/CFd1hTqg21yJsuqr4PO2o/LrCixeFAetNvT9ByVB8MPtaUD8W/EKYM42wvT6MBrqDqsD7208iLKabmzjd+B8SzN6fuwZ9fRBQI5ixvQZyh7IgNG8AeZ5XnicR9WBtZYvUFrXi/xtO+H1DoznU1eukYFMUwZMsb/glLtGHXg3y4GSkz9jZ/5uBei+/j2GfcOq0KSJkxAz81kFWJ9pgHluPxq/rVcH1hjtKHXexq4de8KOwLA+HebX+nC66ZQ6sHpDAUqcd1Gwa2/YEaQb1iHr1Rs4890ZdWClIR8l9b+isMAWdgRpH6TA/HIPzp5rUQfeSfscDpcXtsKisCNITdMj66Uf0HzhijrwdsoWOBqGYd+7L+wI9KlJyJ7TiXOXO9WBFUmb4PA8RLH9QNhAkl6H7Bfb0NJ2TR1YrrPA4RGwv9gRNpCY/D7ML1zGpY5edWDpGhNKmiQU2fYhIiJi3D9aICBAn5oM4/OtaLv6D8CSVRk43yvhYh+r5Phgrn/UUyVtjNXLY69E+xA7uQvt3bfGjkAuOAuWreXAaDAiMkoKplQElQIAkUCJfC7+ORbsJRASAEMCYMXfQIQhdN3wjllwmP2pkwsl0WehhHKMUhTDbRQMy4gMN8Hx0VdDVgA0pODY7fbH/P6hp1mWmyox5G8bwP2LJCrzGsoGCBEHIyMfv221Wn8fVZPlAZ7nWQDy8V8b4Xn+r+r0BwEsSTdAqMTyAAAAAElFTkSuQmCC);
            background-repeat: no-repeat;
            background-position: center;
            float: left;
            width: 30px;
            height: 30px;
            border-radius: 5px;
            margin-right: 15px;
        }
        .copybtn:hover{
            background-color: #fffca3;
            
        }
        
    </style>
</head>
<body>

<h1>Backups</h1>
<p class="notice">Delete these files after use for safety.</p>
<ul class="filelist">
<?php
    $thelist = "";
    $countfiles = 1;
    $fileList = array();
    $filePermStatus = array();

if ($handle = opendir('.')) {
    while (false !== ($file = readdir($handle)))
    {
        if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'gz')
        {
            $thelist .= '<li id="item'.$countfiles.'"><a data-value="'.$countfiles.'" class="copybtn" href="#"></a> <a data-value="'.$countfiles.'" class="filename" href="'.$file.'">'.$file.'</a> <a data-value="'.$countfiles.'" class="deletebtn" href="#'.$file.'">Delete</a> <a data-value="'.$countfiles.'" class="lockbtn '.getFilePermissions($file).'" href="#">Lock File</a></li>';
            $fileList[$countfiles] = $file;
            $filePermStatus[$countfiles] = getFilePermissions($file);
            $countfiles++;
        }
    }
    echo $thelist;
    closedir($handle);
}
function getFilePermissions($file){
 $permission = substr(decoct(fileperms($file)),3);
 if        ($permission == "600"){
    return "locked";
 } else if ($permission == "777") {
    return "unlocked";
 } else if ($permission == "644") {
    return "unlocked";
 } else if ($permission == "755") {
    return "unlocked";
 } else if ($permission == "750") {
    return "locked";
 } else if ($permission == "666") {
    return "unlocked";
 } else if ($permission == "other for future use") {
    return "unlocked";
 } else {
    return "unlocked";
 }
}
?>
</ul>
<input id="cb" type="text" hidden>
<script>
    var totalElements = <?php echo $countfiles; ?>;
    var fileList = <?php echo json_encode($fileList); ?>;
    var filePermStatus = <?php echo json_encode($filePermStatus); ?>;
    var siteurl = "" + document.URL.substr(0,document.URL.lastIndexOf('/'))+"/";
    siteurl = siteurl.replace("#","");

    //copy buttons
    const copyDivs = document.querySelectorAll('.copybtn');
    copyDivs.forEach(el => el.addEventListener('click', event => {
    copy(siteurl + fileList[event.target.getAttribute('data-value')]);
    //console.log(fileList[event.target.getAttribute('data-value')]);
    }));

    //delete buttons
    const deleteDivs = document.querySelectorAll('.deletebtn');
    deleteDivs.forEach(el => el.addEventListener('click', event => {
    //console.log(event.target.getAttribute('data-value'));
    delFile(event.target.getAttribute('data-value'));
    }));

    //lock buttons
    const lockDivs = document.querySelectorAll('.lockbtn');
    lockDivs.forEach(el => el.addEventListener('click', event => {
    console.log(event.target.getAttribute('data-value'));
    var curfile = event.target.getAttribute('data-value');
    if (filePermStatus[curfile] == "locked"){
        ChangeFilePermission(curfile, false);
    } else if (filePermStatus[curfile] == "unlocked"){
        ChangeFilePermission(curfile, true);
    }

    }));

    function copy(txt){
        var cb = document.getElementById("cb");
        cb.value = txt;
        cb.style.display='block';
        cb.select();
        document.execCommand('copy');
        cb.style.display='none';
    }

    function delFile(idNum) {
        var fName = fileList[idNum];
        var xhttp = new XMLHttpRequest();
        var response;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                if (this.responseText.includes("deleted")){
                    document.getElementById("item" + idNum).outerHTML = "";
                }
            }
        };
        xhttp.open("GET", "index.php?del="+fName, true);
        response = xhttp.send();
    }

    function ChangeFilePermission(idNum, lock) { // lock should be true and false, true means lock and false means unlock
        var fName = fileList[idNum];
        var xhttp = new XMLHttpRequest();
        var response;
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                response = this.responseText + "";
                response = response.trim();
                if (response == "locked"){
                    document.getElementsByClassName("lockbtn")[idNum-1].classList.remove('unlocked');
                    document.getElementsByClassName("lockbtn")[idNum-1].classList.add('locked');
                    filePermStatus[idNum] = "locked";
                } else if (response == "unlocked"){
                    document.getElementsByClassName("lockbtn")[idNum-1].classList.remove('locked');
                    document.getElementsByClassName("lockbtn")[idNum-1].classList.add('unlocked');
                    filePermStatus[idNum] = "unlocked";
                }
            }
        };
        xhttp.open("GET", "index.php?file="+fName+"&lock="+lock, true);
        xhttp.send();
        //console.log("index.php?file="+fName+"&lock="+lock);
    }


</script>
</body>
</html>