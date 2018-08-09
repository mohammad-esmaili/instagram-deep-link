<?php
session_start();
include('DB.php');



if (isset($_POST['submit'])) {
    if (isset($_POST['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']) {
        
        
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $recaptcha = $_POST['g-recaptcha-response'];
            
            if (!empty($recaptcha)) {
                include("getCurlData.php");
                $google_url = "https://www.google.com/recaptcha/api/siteverify";
                $secret     = '6LefoE4UAAAAANGMLOQuVo82IvQ53NQCFDw4pMvd';
                $ip         = $_SERVER['REMOTE_ADDR'];
                $url        = $google_url . "?secret=" . $secret . "&response=" . $recaptcha . "&remoteip=" . $ip;
                $res        = getCurlData($url);
                $res        = json_decode($res, true);
                if ($res['success']) {
                    
                    
                    
                    if (isset($_POST['instalink'])) {
                        $instaLink = $_POST['instalink'];
                        
                        function file_get_contents_curl($url)
                        {
                            $ch = curl_init();
                            
                            curl_setopt($ch, CURLOPT_HEADER, 0);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_URL, $url);
                            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                            
                            $data = curl_exec($ch);
                            curl_close($ch);
                            
                            return $data;
                        }
                        
                        $html = file_get_contents_curl("$instaLink");
                        
                        //parsing begins here:
                        $doc = new DOMDocument();
                        @$doc->loadHTML($html);
                        $nodes = $doc->getElementsByTagName('title');
                        
                        //get and display what you need:
                        $title = $nodes->item(0)->nodeValue;
                        
                        $metas = $doc->getElementsByTagName('meta');
                        
                        for ($i = 0; $i < $metas->length; $i++) {
                            $meta = $metas->item($i);
                            if ($meta->getAttribute('property') == 'al:ios:url')
                                $description = $meta->getAttribute('content');
                            if ($meta->getAttribute('name') == 'keywords')
                                $keywords = $meta->getAttribute('content');
                            if ($meta->getAttribute('property') == 'al:android:url')
                                $androisPro = $meta->getAttribute('content');
                        }
                        
                        
                        $iosChar  = explode("instagram://media?id=", $description);
                        $iosmedia = $iosChar[1];
                        
                        $androidChar  = explode("https://www.instagram.com/p/", $androisPro);
                        $androidmedia = $androidChar[1];
                        
                        $webmdeia = $androidChar[1];
                        
                        $createdurl = substr(md5(microtime()), rand(0, 26), 8);
                        
                        
                        
                        // code for insert data in DB
                        $query = $pdo->prepare("INSERT INTO `links` (`createdurl`,`iosmedia`,`androidmedia`,`webmdeia`) VALUES (:createdurl, :iosmedia, :androidmedia, :webmdeia)");
                        $query->bindParam("createdurl", $createdurl);
                        $query->bindParam("iosmedia", $iosmedia);
                        $query->bindParam("androidmedia", $androidmedia);
                        $query->bindParam("webmdeia", $webmdeia);
                        if ($query->execute()) {
                            echo "<div style='text-align: center;' class=\"col-md-9\">
دیپ‌ لینک شما ساخته شد. دیپ لینک  خود را کپی و از آن برای اشتراک‌گذاری استفاده کنید

</div>";

                            $genURL = "http://instagram.mykeyboard.ir/" . $createdurl;
//                            echo "<input id='copyTarget' class=\"form-control\" type=\"text\" value='$genURL'>";
//
//
//                            echo "<button id=\"copyButton\">Copy</button>";
//


                            echo "<div class=\"input-group mb-3\">
                    <input id=\"copyTarget\" type=\"text\" class=\"form-control\" placeholder=\"Recipient's username\" aria-label=\"Recipient's username\" aria-describedby=\"basic-addon2\" value='$genURL'>
                    <div class=\"input-group-append\">
                        <button id=\"copyButton\" class=\"btn btn-outline-secondary\" type=\"button\">کپی کردن لینک</button>
                    </div>
                </div>";

                            echo "<script src=\"js/copy.js\"></script>";


                        }
                        
                        else {
                            echo "<script>alert('Error!'); </script>";
                            
                        }
                        
                        
                        
                        
                        
                    }
                    
                    // else user browser javascript is disable and he/she send empty form
                    else {
                        echo "لطفا تمام فیلدها را پرکنید";
                    }
                    
                    
                }
                
                else {
                    echo "لطفا کدامنیتی را پر کنید";
                }
            } else {
                echo "لطفا کدامنیتی را پر کنید";
            }
        }
        
        
        
        
        
        
        
        
        
        
        
        
    } else {
        echo 'Token was not valid or was not set !';
    }
}









?>