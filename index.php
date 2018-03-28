<?php
    
    print_r(get_content('https://itviec.com/blog/'));
    // print_r(get_content('http://localhost:90/curl_php/text.php'));

    function get_content($url)
    {
        $ch=curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $result=curl_exec($ch);
        curl_close($ch);
        $pattern='/<div class="post teaser">(.*)<\/div>/si';
        // $pattern='/(<div id="(.*)">)(.*)(<\/div>)/si';
        preg_match_all($pattern,$result,$data);
        return $data;
    }
?>
<script src="jquery.js"></script>
<script>
    $('a').click(function(){
        var current=$(this);
        var url=current["0"].href;
        current["0"].href='http://localhost:90/curl_php/index2.php?url='+url;
        // window.location.href('http://localhost:90/curl_php/index2.php?url='+url);
        return true;
    })
</script>