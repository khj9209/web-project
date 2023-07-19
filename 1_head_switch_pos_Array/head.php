<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>
<link rel="stylesheet" href="/js/functions.js">
<link rel="stylesheet" href="/js/grayscale.js">

<!-- 상단 시작 { -->
<div id="hd">

    <!-- Header STR -->
    <div style="background:#fff; margin:60px 0 25px;">

        <div class="nav_btn" style="width:1200px;" >
            <ul class="nav_clear" style="">
                <li class="list_head_btn_logo" style="margin-right:80px;">
                    <div class="logo" style="">
                        <a href="<?php echo G5_URL ?>"><img style="" src="<?php echo G5_THEME_URL ?>/img/logo.png" alt="꿈드림키즈로고"></a>
                    </div>
                </li>
                <?php
                    
                ?>
                <li class="list_head_btn_lm" >
                    <a href="/bbs/contents.php?co_id=contents&step=1" class="<?php if($_GET['co_id'] == 'contents' && $_GET['step'] == 1) {echo 'list_head_btn_lm_act';} ?>">
                        <p style="font-size:19px;">소개</p>
                    </a>
                </li>
                <li class="list_head_btn_lm">
                    <a href="/bbs/contents.php?co_id=contents&step=2" class="<?php if($_GET['co_id'] == 'contents' && $_GET['step'] == 2) {echo 'list_head_btn_lm_act';} ?>">
                        <p style="font-size:19px;">띠올라</p>
                    </a>
                </li>
                <li class="list_head_btn_lm">
                    <a href="/bbs/contents.php?co_id=contents&step=3" class="<?php if($_GET['co_id'] == 'contents' && $_GET['step'] == 3) {echo 'list_head_btn_lm_act';} ?>">
                        <p style="font-size:19px;">스토리플</p>
                    </a>
                </li>
                <li class="list_head_btn_lm">
                    <a href="/bbs/contents.php?co_id=contents&step=4" class="<?php if($_GET['co_id'] == 'contents' && $_GET['step'] == 4) {echo 'list_head_btn_lm_act';} ?>">
                        <p style="font-size:19px;">청소년프로그램</p>
                    </a>
                </li>
                <li class="list_head_btn_lm">
                    <a href="/bbs/contents.php?co_id=contents&step=5" class="<?php if($_GET['co_id'] == 'contents' && $_GET['step'] == 5) {echo 'list_head_btn_lm_act';} ?>">
                        <p style="font-size:19px;">골프</p>
                    </a>
                </li>
                <li class="list_head_btn_lm">
                    <a href="/bbs/contents.php?co_id=contents&step=6" class="<?php if($_GET['co_id'] == 'contents' && $_GET['step'] == 6) {echo 'list_head_btn_lm_act';} ?>">
                        <p style="font-size:19px;">꿈드림이벤트</p>
                    </a>
                </li>
                <li class="list_head_btn_lm list_head_btn_rm">
                    <a href="/bbs/board.php?bo_table=notice" class="<?php if($bo_table == 'notice' || $bo_table == 'qa' || $bo_table == 'free') {echo 'list_head_btn_lm_act';} ?>">
                        <p style="font-size:19px;">커뮤니티</p>
                    </a>
                </li>
                <li class="list_head_btn_ul list_head_btn_ul_btn">
                    <div class="login">
                        <div class="login-bt login-bt2">
                            <?php if($is_member) { ?>
                            <a style="display:block; color:#4d56ca;" href="<?php echo G5_BBS_URL ?>/logout.php">
                            <span>LOGOUT</span>
                            <? } else { ?>
                            <a style="display:block; color:#4d56ca;" href="<?php echo G5_BBS_URL ?>/login.php">
                            <span>LOGIN <img src="<?php echo G5_THEME_URL ?>/img/plus.png" alt="로그인"></span>
                            <? } ?>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>

        </div>

    </div>

    <!-- Header END -->

</div>
<div style="clear: both;"></div>
<!-- } 상단 끝 -->


<hr>


<!-- 콘텐츠 시작 { -->
<div id="wrapper">

    <!-- 링크 이동 -->
    <?php
    if($bo_table == 'notice' || $bo_table == 'qa' || $bo_table == 'free') {
        switch($bo_table) {
            case 'notice':
                $line_left = -4;
                break;

            case 'qa':
                $line_left = 158;
                break;

            case 'free':
                $line_left = 328;
                break;

            default:
            break;
        }
    ?>



    <!-- 배너 이미지 -->
    <div style="width:100%; position:relative;">
        <div style="width: 100%; height: 240px; background-image: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ),url(/theme/basic/img/sub/banner/community.png);"></div>
        <?/* ie 버전에서 filter이 먹히지 않아 background url 으로 변경
        <img style="width:100%; filter:brightness(0.6);" src="<?php echo G5_THEME_URL ?>/img/sub/banner/community.png" >
        */?>
        <div class="banner_txt"><p>꿈드림키즈 커뮤니티</p></div>
    </div>



    <div class="">
        <div class="nav_btn">
            <ul class="nav_clear">
                <li class="list_head_btn_ul">
                    <a href="/bbs/board.php?bo_table=notice">
                        <p>공지사항</p>
                    </a>
                </li>
                <li class="list_head_btn_ul">
                    <a href="/bbs/board.php?bo_table=qa">
                        <p>교육신청</p>
                    </a>
                </li>
                <li class="list_head_btn_ul">
                    <a href="/bbs/board.php?bo_table=free">
                        <p>자유게시판</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="list_line">
            <div class="list_line_pos">
                <div class="list_select" style="width:74px; left:<?php echo $line_left ?>px;"></div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>


    <?php
    if( $co_id == 'contents' && ($step >= 1 && $step <= 6 ) ) {
        $banner1_t = Array('사회적기업 꿈드림키즈');
        $banner2_t = Array('감성체육 띠올라');
        $banner3_t = Array('영유아 통합놀이 스토리플');
        $banner4_t = Array('자기주도적 청소년 프로그램');
        $banner5_t = Array('국내 유일 골프 프로그램 올라운드 골프');
        $banner6_t = Array('');
        $banner1_img = Array('introduce');
        $banner2_img = Array('jump');
        $banner3_img = Array('storyplay');
        $banner4_img = Array('youth_program');
        $banner5_img = Array('golf');

    ?>




    <div style="width:100%; position:relative;">
        <?php for($i=0; $i<count(${'banner'.$step.'_img'}); $i++) { ?>
        <div style="width: 100%; height: 240px; background-image: linear-gradient( rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3) ),url(/theme/basic/img/sub/banner/<?php echo ${'banner'.$step.'_img'}[$i] ?>.png);"></div>

        <?php } ?>
        <?php for($i=0; $i<count(${'banner'.$step.'_t'}); $i++) { ?>
        <div class="banner_txt">
            <p><?php echo ${'banner'.$step.'_t'}[$i] ?></p>
        </div>
        <?php } ?>
    </div>
    <?php  }?>

    <!-- nav 내부 이동  -->

    <?php
    if( $co_id == 'contents' && ($step >= 1 && $step <= 6) ) {
        $step1_arr = Array('인사말', '설립배경', '연혁');
        $step2_arr = Array('소개', '연령별 프로그램', '계절별 프로그램', '수업모습');
        $step3_arr = Array('소개', '수업구성', '동화연계스토리플', '수업모습');
        $step4_arr = Array('소개', '축구클럽', '비만교실', '키크는교실');
        $step5_arr = Array('소개', '스내그골프', '자주하는 질문', '수업모습');

        //$step1_arr;
        //${'step'.$step.'_arr'}
    ?>




    <div class="nav_click" style="background:#fff; width:100%; z-index:9999;">    
        <div class="nav_btn">
            <ul class="nav_clear">
                <?php for($i=0; $i<count(${'step'.$step.'_arr'}); $i++) { ?>
                <li class="list_head_btn_ul">
                    <a class="step_link" style="cursor:pointer;">
                        <p style="line-height:20px;"><?php echo ${'step'.$step.'_arr'}[$i] ?></p>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="list_line">
            <div class="list_line_pos">
                <div class="list_select" style="left:<?php echo $line_left ?>px;"></div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>



    <script>
    $(function(){
        $('.step_link').click(function(){
            var _idx = $('.step_link').index($(this));

            var step = '<?php echo $step ?>';


            switch(step) {
                case '1':
                    var step_w_arr = new Array('49','65','32');
                    var step_p_arr = new Array('0','147','309');
                    var step_pos_arr = new Array('415','1800','3350');
                break;

                case '2':
                    var step_w_arr = new Array('32','120','121','65');
                    var step_p_arr = new Array('0','131','348','565');
                    var step_pos_arr = new Array('415','1750','2680','3600');
                break;

                case '3':
                    var step_w_arr = new Array('32','65','131','65');
                    var step_p_arr = new Array('0','130','292','520');
                    var step_pos_arr = new Array('415','1500','2560','3640');
                break;

                case '4':
                    var step_w_arr = new Array('32','65','65','82');
                    var step_p_arr = new Array('0','130','293','455');
                    var step_pos_arr = new Array('415','1120','2020','3065');
                break;

                case '5':
                    var step_w_arr = new Array('32','82','105','65');
                    var step_p_arr = new Array('0','130','309','510');
                    var step_pos_arr = new Array('415','1180','2150','3840');
                break;

                case '6':
                    var step_w_arr = new Array('36','76','95','60');
                    var step_p_arr = new Array('0','124','294','483');
                    var step_pos_arr = new Array('415','1740','2100','3550');
                break;

                default:
                break;
            }
            $('.list_select').css('left',step_p_arr[_idx] + 'px').css('width',step_w_arr[_idx] + 'px');

            $('html, body').animate({scrollTop : step_pos_arr[_idx]}, 400);
            var scrollTop = $(document).scrollTop();
            console.log(scrollTop);

        });
    });

    window.onload = function() {
        var _idx = 0;

        var step = '<?php echo $step ?>';

        switch(step) {
            case '1':
                var step_w_arr = new Array('49','65','32');
                var step_p_arr = new Array('0','147','309');
            break;

            case '2':
                var step_w_arr = new Array('32','120','121','65');
                var step_p_arr = new Array('0','131','348','565');
            break;

            case '3':
                var step_w_arr = new Array('32','65','131','65');
                var step_p_arr = new Array('0','130','292','520');
            break;

            case '4':
                var step_w_arr = new Array('32','65','65','82');
                var step_p_arr = new Array('0','130','293','455');
            break;

            case '5':
                var step_w_arr = new Array('32','82','105','65');
                var step_p_arr = new Array('0','130','309','510');
            break;

            case '6':
                var step_w_arr = new Array('0','76','95','60');
                var step_p_arr = new Array('-4','124','294','483');
            break;

            default:
            break;
        }

        $('.list_select').css('left',step_p_arr[_idx] + 'px').css('width',step_w_arr[_idx] + 'px');



    }
    </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script>
			// 메뉴 스크롤했을때
			$(window).scroll(function(){
				var scrollTop = $(document).scrollTop();
				if(scrollTop < 365){
					$('.nav_click').css('position','inherit');
				}else{
					$('.nav_click').css('position','fixed');
					$('.nav_click').css('top','0');
				}

			});

		</script>



    <div id="container_wr">

    <div id="container">
        <?/*
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }
        */?>
