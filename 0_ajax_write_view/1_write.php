<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}

if(G5_COMMUNITY_USE === false) {
    include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
    return;
}
?>

<style>
    .taill_test_btn{display:flex;}
    .taill_test_btn>a{display:flex; padding-right:30px;}
    .blue_btn{background:blue; padding:20px 40px;}
    .red_btn{background:red; padding:20px 40px; color:white; font-weight:bold;}
    .taill_test_btn>a>span>p{color:white; font-weight:bold;}
    #layer_wrap{display:none; position:fixed; left:50%; top:50%; transform:translate(-50%,-50%); background:#fff; width:500px; background:#fff; z-index:10001;}
    #layer_bg{display:none; position:fixed; left:0; top:0; margin:0; padding:0; width:100%; height:130%; background:rgba(0,0,0,0.8); z-index:10000;}
    a{cursor: pointer;}
    .apply_b1{background:#2f6ae1; padding: 30px 0 0;}
    .apply_b2{margin: 22px auto; width: 90%;}

    .close_btn_img{display: block; float: right; margin: 0 20px; font-size:37px; color:red;}
    .apply_head_img{display: block; margin: 0 auto;}

    .apply_inp{font-size: 22px; padding: 8px 165px 8px 20px; border:none;} 
     input:focus {outline: none !important;}
    .apply_chk{float: left; margin-right: 7px; cursor: pointer;}
    .apply_chk_txt{float: left; font-size: 16px; line-height: 9px; cursor: pointer;}

    .line1{border-top: 1.6px solid #535353; margin: 20px 0 20px;}
    .line2{border-top: 1px solid #dcdcdc; margin: 45px 0 15px;}
    .apply_txt{font-size: 14px; color: #545454;}


    .head_bg{background:#fff;  position:absolute; width:100%; z-index:1; padding:20px 0;}
    .head_logo{display:block; margin:0 auto; width:1200px;}
    .apply_btimg_tail3{width: 501px; height: 80px; border: none; font-size:23px; font-weight:500;}
</style>

    </div>
    <div id="aside">
        <?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
        <?php echo poll('theme/basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
    </div>
</div>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">


    <div id="ft_wr">
        <div id="layer_wrap">
            <form action="" onsubmit="return checks2()">

                <div class="apply_b1">
                    <div id="close_btn mouse_pointer">
                       <div><a class="close_btn_img">x</a></div>
                    </div>
                    <div class="clear"></div>
                
                </div>
                <div class="apply_b2">
                    <div style="font-size:20px; font-weight:bold; margin-bottom:10px;">
                            <p><bold style="color:#2f6ae1;">*</bold> 이름</p>
                        </div>
                        <input name="guest_name1_1" id="guest_name1_1" class="apply_inp" type="text" style="margin-bottom:15px;" value="<?php echo $write['guest_name'] ?>" placeholder="이름을 입력해주세요.">

                    <div style="font-size:20px; font-weight:bold; margin-bottom:10px;">
                        <p><bold style="color:#2f6ae1;">*</bold> 연락처</p>
                    </div>
                    <input name="phone1_1" id="phone1_1" class="apply_inp" type="text" value="<?php echo $write['phone'] ?>" placeholder="'-'없이 숫자만 입력">
                    <div class="line1"></div>
                    <div>
                        <input name="check_tail2" id="check_tail2" class="apply_chk" type="checkbox">
                        <label for="check_tail2" class="apply_chk_txt"><bold style="color: red; font-weight: 700;">[필수]</bold> 개인정보 수집/이용 및 위탁 동의</label>
                    </div>
                    <div class="clear"></div>
                    <div class="line2"></div>
                    <div class="apply_txt">
                        수집항목 : 연락처<br>
                        이용목적 : TEST 의 사유로 가입상담 연락<br>
                        보유기간 : 상담 신청일로부터 3개월<br>
                        위탁업체 : TEST 위탁업체 , 123 , 123 <br>
                        위탁업무 : 가입상담 업무 수행
                    </div>
                    </div>
                <div><input class="apply_btimg_tail3" type="submit" value="등록하기"></div>
            </form>
</div>
<div id="layer_bg"></div>



        
<script>

    $(function(){
            $('.apply_btn').click(function(){
                $('#layer_wrap').css('display','block');
                $('#layer_bg').css('display','block');
            });

            $('#layer_bg').click(function(){
                $('#layer_wrap').css('display','none');
                $('#layer_bg').css('display','none');
            });

            $('.close_btn_img').click(function(){
                $('#layer_wrap').css('display','none');
                $('#layer_bg').css('display','none');
            });

            $('.aside_tel, .aside_kakao, .kakao_img').click(function(){
                //naver_script();
                //console.log(1);
                if (!wcs_add) var wcs_add={};
                wcs_add["wa"] = "s_35cea1d6fdf3";
                if (!_nasa) var _nasa={};
                _nasa["cnv"] = wcs.cnv("4","1");
                wcs_do(_nasa);

                kakaoPixel('2311875167241943050').pageView();
                kakaoPixel('2311875167241943050').participation('Consulting');

            });
        });
</script>

<script>
    function checks2(){
        var getName= RegExp(/^[가-힣]+$/);
        var getphone2= RegExp(/^((01[1|6|7|8|9])[1-9]+[0-9]{6,7})|(010[0-9][0-9]{7})$/);
        
        // 이름 공백 검사
        if($("#guest_name1_1").val() == ""){
            alert("이름을 입력해주세요");
            $("#guest_name1_1").focus();
            return false;
        }

        // 이름 유효성 검사
        if(!getName.test($("#guest_name1_1").val())){
            alert("이름형식에 맞게 입력해주세요")
            $("#guest_name1_1").val("");
            $("#guest_name1_1").focus();
            return false;
        }

        // 연락처 공백 검사
        if($("#phone1_1").val() == ""){
            alert("연락처를 입력해주세요");
            $("#phone1_1").focus();

            return false;
        }

        // 연락처 유효성 검사
        if(!getphone2.test($("#phone1_1").val())){
            alert("연락처 형식에 맞게 입력해주세요")
            $("#phone1_1").val("");
            $("#phone1_1").focus();
            return false;
        }

        // 개인정보 수집/이용 및 위탁 동의 유효성 검사
        if( $("input[name=check_tail2]").is(":checked") == false ) {
            alert("개인정보동의에 체크하세요.");
            return false;
        }
        

        var guest_name = $("#guest_name1_1").val();
        var phone = $('#phone1_1').val();

        $.ajax({
            url: g5_bbs_url + '/ajax.apply_write2.php', // 요청 할 주소
            type:'POST',
            data: {'guest_name': guest_name, 'phone':phone},// 전송할 데이터
            dataType:'json',
            success:function(rst) {
                alert(rst.msg);
                $('#layer_wrap').css('display','none');
                $('#layer_bg').css('display','none');
            }
        });

        return false;
    }
</script>
    
    <button type="button" id="top_btn">
    	<i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span>
    </button>
    <script>
    $(function() {
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });
    </script>
</div>

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");