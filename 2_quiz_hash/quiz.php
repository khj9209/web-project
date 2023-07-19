<?php 
include_once("../head.php"); 
include_once("../sub_common.php");
$_group_path = '..';
include_once ($_group_path.'/_common.php');

// print_r($_POST);

if($_POST['user_name'] == '' && $_POST['user_phone'] == '') {
    echo '<script>alert("정상 경로로 참가 부탁드립니다."); window.location.href = "/html/home.php";</script>';    
    exit; 
}
?>

<?php
$qe_name = $_POST['user_name'];
$qe_phone = $_POST['user_phone'];
$sql = " select * from quiz_event where qe_name = '{$qe_name}' and qe_phone = '{$qe_phone}' ";
$qry = $DB->dbQuery($sql);
$res = $DB->sql_fetch_array($qry);
?>

<style>
.ox_container {display:none;}
.ox_container_active {display:block;}
</style>

    <input type="hidden" id="user_name" value="<?php echo $_POST['user_name'] ?>">
    <input type="hidden" id="user_phone" value="<?php echo $_POST['user_phone'] ?>">

    <div class="ox_quiz page sub_page">
        <div class="area">
            <div class="ox_title">
                OX퀴즈
            </div>
            <!--<form action="/">-->
            <div class="ox_container <?php echo ($res['qe_quiz1'] == '')?'ox_container_active':''; ?>">
                <section class="ox_1 ox_question border_primary">
                    <div class="ox_text">
                        <div class="ox_text1 d_flex align_start justify_center">
                            <figure class="ox_q_mark"><img src="/html/web/img/icon_q1.svg" alt="Q1"></figure>
                            수영성 남문의 양쪽 사각형 돌기둥 위에는 
                        </div>
                        왜적을 감시하는 <strong>용맹스러운 호랑이 한 쌍</strong>이 조각되어 있다. 
                    </div>
                    <div class="ox_select d_flex">
                        
                        <div class="ox_answer_container">
                            <button type="button" class="<?php echo ($res['qe_quiz1'] == '')?'q_sel_yes':''; ?> ox_answer_yes d_flex align_center justify_center quiz_val0 <?php echo ($res['qe_quiz1'] == 'O')?'answer_on':''; ?>" ox-val="O">
                                <img src="/html/web/img/quiz_yes.svg" alt="O">
                            </button>
                        </div>
                        <div class="ox_answer_container ">
                            <button type="button" class="<?php echo ($res['qe_quiz1'] == '')?'q_sel_no':''; ?> ox_answer_no d_flex align_center justify_center quiz_val0 <?php echo ($res['qe_quiz1'] == 'X')?'answer_on':''; ?>" ox-val="X">
                                <img src="/html/web/img/quiz_no.svg" alt="X">
                            </button>
                        </div>
                        
                        
                        <?/*
                        <div class="ox_answer_container">
                            <button type="button" class="q_sel_yes ox_answer_yes d_flex align_center justify_center quiz_val0 <?php echo ($res['qe_quiz1'] == 'O')?'answer_on':''; ?>" ox-val="O">
                                <img src="/html/web/img/quiz_yes.svg" alt="O">
                            </button>
                        </div>
                        <div class="ox_answer_container ">
                            <button type="button" class="q_sel_no ox_answer_no d_flex align_center justify_center quiz_val0 <?php echo ($res['qe_quiz1'] == 'X')?'answer_on':''; ?>" ox-val="X">
                                <img src="/html/web/img/quiz_no.svg" alt="X">
                            </button>
                        </div>
                        */?>
                    </div>
                </section>
                <div class="next_question">
                    <button type="submit" class="btn btn_primary btn_large next_btn">다음</button>
                </div>     
            </div>              

            <div class="ox_container <?php echo ($res['qe_quiz1'] != '' && $res['qe_quiz2'] == '')?'ox_container_active':''; ?>">
                <section class="ox_2 ox_question border_primary">
                    <div class="ox_text">
                        <div class="ox_text1 d_flex align_start justify_center">
                            <figure class="ox_q_mark"><img src="/html/web/img/icon_q2.svg" alt="Q2"></figure>
                            무민사 뒤편에는 ‘흔들바위’라는 집채만 한 바위가 서 있다.
                        </div>
                    </div>
                    <div class="ox_select d_flex">
                        
                        <div class="ox_answer_container">
                            <button type="button" class="<?php echo ($res['qe_quiz2'] == '')?'q_sel_yes':''; ?> ox_answer_yes d_flex align_center justify_center quiz_val1 <?php echo ($res['qe_quiz2'] == 'O')?'answer_on':''; ?>" ox-val="O">
                                <img src="/html/web/img/quiz_yes.svg" alt="O">
                            </button>
                        </div>
                        <div class="ox_answer_container ">
                            <button type="button" class="<?php echo ($res['qe_quiz2'] == '')?'q_sel_no':''; ?> ox_answer_no d_flex align_center justify_center quiz_val1 <?php echo ($res['qe_quiz2'] == 'X')?'answer_on':''; ?>" ox-val="X">
                                <img src="/html/web/img/quiz_no.svg" alt="X">
                            </button>
                        </div>
                        

                        <?/*
                        <div class="ox_answer_container">
                            <button type="button" class="q_sel_yes ox_answer_yes d_flex align_center justify_center quiz_val1 <?php echo ($res['qe_quiz2'] == 'O')?'answer_on':''; ?>" ox-val="O">
                                <img src="/html/web/img/quiz_yes.svg" alt="O">
                            </button>
                        </div>
                        <div class="ox_answer_container ">
                            <button type="button" class="q_sel_no ox_answer_no d_flex align_center justify_center quiz_val1 <?php echo ($res['qe_quiz2'] == 'X')?'answer_on':''; ?>" ox-val="X">
                                <img src="/html/web/img/quiz_no.svg" alt="X">
                            </button>
                        </div>
                        */?>
                        
                    </div>
                </section>
                <div class="next_question">
                    <button type="submit" class="btn btn_primary btn_large next_btn">다음</button>
                </div>      
            </div>


            <div class="ox_container <?php echo ($res['qe_quiz2'] != '' && $res['qe_quiz3'] == '')?'ox_container_active':''; ?>">
                <section class="ox_3 ox_question border_primary">
                    <div class="ox_text">
                        <div class="ox_text1 d_flex align_start justify_center">
                            <figure class="ox_q_mark"><img src="/html/web/img/icon_q3.svg" alt="Q2"></figure>
                            푸조나무와 곰솔나무는 수영사적공원에서 볼 수 있는 천연기념물이다.
                        </div>
                    </div>
                    <div class="ox_select d_flex">
                        
                        <div class="ox_answer_container">
                            <button type="button" class="<?php echo ($res['qe_quiz3'] == '')?'q_sel_yes':''; ?> ox_answer_yes d_flex align_center justify_center quiz_val2 <?php echo ($res['qe_quiz3'] == 'O')?'answer_on':''; ?>" ox-val="O">
                                <img src="/html/web/img/quiz_yes.svg" alt="O">
                            </button>
                        </div>
                        <div class="ox_answer_container ">
                            <button type="button" class="<?php echo ($res['qe_quiz3'] == '')?'q_sel_no':''; ?> ox_answer_no d_flex align_center justify_center quiz_val2 <?php echo ($res['qe_quiz3'] == 'X')?'answer_on':''; ?>" ox-val="X">
                                <img src="/html/web/img/quiz_no.svg" alt="X">
                            </button>
                        </div>
                        

                        <?/*
                        <div class="ox_answer_container">
                            <button type="button" class=" ox_answer_yes d_flex align_center justify_center quiz_val2 <?php echo ($res['qe_quiz3'] == 'O')?'answer_on':''; ?>" ox-val="O">
                                <img src="/html/web/img/quiz_yes.svg" alt="O">
                            </button>
                        </div>
                        <div class="ox_answer_container ">
                            <button type="button" class=" ox_answer_no d_flex align_center justify_center quiz_val2 <?php echo ($res['qe_quiz3'] == 'X')?'answer_on':''; ?>" ox-val="X">
                                <img src="/html/web/img/quiz_no.svg" alt="X">
                            </button>
                        </div>
                        */?>
                        
                    </div>
                </section>
                <div class="next_question">
                    <button type="submit" class="btn btn_primary btn_large next_btn">완료</button>
                </div>    
            </div>

            <!--</form>-->

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function nextStep(_idx) {
            var __idx = _idx + 1;
            $('.ox_container').removeClass('ox_container_active');
            $('.ox_container').eq(__idx).addClass('ox_container_active');
            location.hash = '#' + __idx;

            $('.ox_answer_yes').eq(_idx).addClass('this_disabled');
            $('.ox_answer_no').eq(_idx).addClass('this_disabled');

            // alert(_idx);
            //$('.ox_answer_yes').eq(_idx).removeClass('q_sel_yes');
            //$('.ox_answer_no').eq(_idx).removeClass('q_sel_no');
            // $('.ox_answer_yes').eq(__idx).addClass('q_sel_yes');
            // $('.ox_answer_no').eq(__idx).addClass('q_sel_no');
            // window.location.reload();
        }

        $(function() {
            $(window).bind('hashchange', function(e) {
                var _hash = window.location.hash;
                _hash = parseInt(_hash.replace('#', '') || 0);

                // alert(_hash);
                
                switch (_hash) {
                    case '0':
                        // $('.ox_container').removeClass('ox_container_active');
                        // $('.ox_container').eq(_hash).addClass('ox_container_active');
                    break;

                    case '1':
                        // $('.ox_container').removeClass('ox_container_active');
                        // $('.ox_container').eq(_hash).addClass('ox_container_active');
                    break;

                    case '2':
                        // $('.ox_container').removeClass('ox_container_active');
                        // $('.ox_container').eq(_hash).addClass('ox_container_active');
                    break;


                    default:
                        $('.ox_container').removeClass('ox_container_active');
                        $('.ox_container').eq(_hash).addClass('ox_container_active');
                        // $('.ox_answer_yes').removeClass('q_sel_yes');
                        // $('.ox_answer_no').removeClass('q_sel_no');
                        // $('.ox_answer_yes').eq(_hash).addClass('q_sel_yes');
                        // $('.ox_answer_no').eq(_hash).addClass('q_sel_no');
                    break;
                }
            });

            $('.q_sel_yes').click(function(){
                if($(this).hasClass('this_disabled') == true) {
                    return false;
                }

                var _idx = $('.q_sel_yes').index($(this));
                $('.q_sel_no').eq(_idx).removeClass('answer_on');
                $('.q_sel_yes').eq(_idx).addClass('answer_on');

                var ox_val = $('.q_sel_yes').eq(_idx).attr('ox-val');
                // alert(ox_val);
            });
            $('.q_sel_no').click(function(){
                if($(this).hasClass('this_disabled') == true) {
                    return false;
                }
                
                var _idx = $('.q_sel_no').index($(this));
                $('.q_sel_yes').eq(_idx).removeClass('answer_on');
                $('.q_sel_no').eq(_idx).addClass('answer_on');

                var ox_val = $('.q_sel_no').eq(_idx).attr('ox-val');
                // alert(ox_val);
            });

            $('.next_btn').click(function(){
                var _idx = $('.next_btn').index($(this));
                // var qu_val = $('.quiz_val'+_idx).val().attr('ox-val');
                // alert(_idx);
                // alert(qu_val);
                // var _idx1 = _idx++;
                // var _idx2 = _idx1++;

                if($('.answer_on').eq(_idx).length <= 0) {
                    alert('정답을 선택해주세요.');
                    return false;
                }else{
                    var ox_val = $('.answer_on').eq(_idx).attr('ox-val');
                    var user_name = $('#user_name').val();
                    var user_phone = $('#user_phone').val();

                    $.ajax({
                        url:'../bbs/quiz_event_update.php',
                        type: 'POST',
                        data: {
                            ox_val : ox_val,
                            qe_name : user_name,
                            qe_phone : user_phone,
                            _idx : _idx
                            // _idx1 : _idx1,
                            // _idx2 : _idx2
                        },
                        dataType : 'json',
                        success:function(rst){
                            console.log(rst);
                            if(rst.state == 'success') {
                                Swal.fire({
                                icon: 'info',
                                title: rst.an_title,
                                html: rst.an_txt, 
                                showCancelButton: false,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        if(rst.all_value == 'all_value') {
                                            Swal.fire({
                                            icon: 'success',
                                            title: 'OX 퀴즈를 완료하였습니다.',
                                            html: '퀴즈이벤트_음료쿠폰 이벤트는<br>선착순 마감되었습니다.<br>참여해 주셔서<br>감사합니다.', 
                                            showCancelButton: false,
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href="/html/home.php";
                                                }
                                            });
                                        // if(rst.all_value == 'all_value') {
                                        //     Swal.fire({
                                        //     icon: 'success',
                                        //     title: 'OX 퀴즈를 완료하였습니다.',
                                        //     html: '퀴즈를 1문제 이상 맞히신 분에게는<br>상품으로 ‘아이스 아메리카노’<br>기프티콘이 9월말에 지급될 예정입니다.', 
                                        //     showCancelButton: false,
                                        //     }).then((result) => {
                                        //         if (result.isConfirmed) {
                                        //             window.location.href="/html/home.php";
                                        //         }
                                        //     });
                                        }else{
                                            nextStep(_idx);
                                            return false;
                                        }
                                    }
                                });
                            } else if(rst.state == 'sc_value') {
                                Swal.fire({
                                icon: 'error',
                                title: '이미 푼 문제입니다.',
                                html: '다음 퀴즈를 풀어주세요.', 
                                showCancelButton: false,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        nextStep(_idx);
                                        return false;
                                    }
                                });
                            // } else if(rst.all_value == 'all_value') {
                            //     Swal.fire({
                            //     icon: 'success',
                            //     title: 'OX 퀴즈를 완료하였습니다.',
                            //     html: '퀴즈를 1문제 이상 맞히신 분에게는<br>상품으로 ‘아이스 아메리카노’<br>기프티콘이 9월말에 지급될 예정입니다.', 
                            //     showCancelButton: false,
                            //     }).then((result) => {
                            //         if (result.isConfirmed) {
                            //             window.location.href="/html/home.php";
                            //         }
                            //     });
                            } else if(rst.all_value == 'all_value') {
                                Swal.fire({
                                icon: 'success',
                                title: 'OX 퀴즈를 완료하였습니다.',
                                html: '퀴즈이벤트_음료쿠폰 이벤트는<br>선착순 마감되었습니다.<br>참여해 주셔서<br>감사합니다.', 
                                showCancelButton: false,
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href="/html/home.php";
                                    }
                                });
                            } else{
                                Swal.fire({
                                icon: 'error',
                                title: '문제 출력 실패하였습니다.',
                                text: '다시 시도해주세요.',});
                                window.location.reload();
                                return false;
                            }
                        }
                    });
                }
                return false;
                //var ox_val = $('.quiz_val'+_idx).hasClass('answer_on').attr('ox-val');
                //alert(ox_val);
            });
        });
    </script>

<?php 
include_once("../foot.php"); 
?>