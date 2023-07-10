<?php
$sub_menu = '100000';
require_once './_common.php';

@require_once './safe_check.php';
if (function_exists('social_log_file_delete')) {
    social_log_file_delete(86400);      //소셜로그인 디버그 파일 24시간 지난것은 삭제
}

$g5['title'] = '관리자메인';
require_once './admin.head.php';

/*
$new_member_rows = 5;
$new_point_rows = 5;
$new_write_rows = 5;

$sql_common = " from {$g5['member_table']} ";

$sql_search = " where (1) ";

if ($is_admin != 'super') {
    $sql_search .= " and mb_level <= '{$member['mb_level']}' ";
}

if (!$sst) {
    $sst = "mb_datetime";
    $sod = "desc";
}

$sql_order = " order by {$sst} {$sod} ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

// 탈퇴회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_leave_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$leave_count = $row['cnt'];

// 차단회원수
$sql = " select count(*) as cnt {$sql_common} {$sql_search} and mb_intercept_date <> '' {$sql_order} ";
$row = sql_fetch($sql);
$intercept_count = $row['cnt'];

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$new_member_rows} ";
$result = sql_query($sql);

$colspan = 12;

?>


<section>
    <h2>신규가입회원123 <?php echo $new_member_rows ?>건 목록</h2>
    <div class="local_desc02 local_desc">
        총회원수 <?php echo number_format($total_count) ?>명 중 차단 <?php echo number_format($intercept_count) ?>명, 탈퇴 : <?php echo number_format($leave_count) ?>명
    </div>

    <div class="tbl_head01 tbl_wrap">
        <table>
            <caption>신규가입회원</caption>
            <thead>
                <tr>
                    <th scope="col">회원아이디</th>
                    <th scope="col">이름</th>
                    <th scope="col">닉네임</th>
                    <th scope="col">권한</th>
                    <th scope="col">포인트</th>
                    <th scope="col">수신</th>
                    <th scope="col">공개</th>
                    <th scope="col">인증</th>
                    <th scope="col">차단</th>
                    <th scope="col">그룹</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $row = sql_fetch_array($result); $i++) {
                    // 접근가능한 그룹수
                    $sql2 = " select count(*) as cnt from {$g5['group_member_table']} where mb_id = '{$row['mb_id']}' ";
                    $row2 = sql_fetch($sql2);
                    $group = "";
                    if ($row2['cnt']) {
                        $group = '<a href="./boardgroupmember_form.php?mb_id=' . $row['mb_id'] . '">' . $row2['cnt'] . '</a>';
                    }

                    if ($is_admin == 'group') {
                        $s_mod = '';
                        $s_del = '';
                    } else {
                        $s_mod = '<a href="./member_form.php?$qstr&amp;w=u&amp;mb_id=' . $row['mb_id'] . '">수정</a>';
                        $s_del = '<a href="./member_delete.php?' . $qstr . '&amp;w=d&amp;mb_id=' . $row['mb_id'] . '&amp;url=' . $_SERVER['SCRIPT_NAME'] . '" onclick="return delete_confirm(this);">삭제</a>';
                    }
                    $s_grp = '<a href="./boardgroupmember_form.php?mb_id=' . $row['mb_id'] . '">그룹</a>';

                    $leave_date = $row['mb_leave_date'] ? $row['mb_leave_date'] : date("Ymd", G5_SERVER_TIME);
                    $intercept_date = $row['mb_intercept_date'] ? $row['mb_intercept_date'] : date("Ymd", G5_SERVER_TIME);

                    $mb_nick = get_sideview($row['mb_id'], get_text($row['mb_nick']), $row['mb_email'], $row['mb_homepage']);

                    $mb_id = $row['mb_id'];
                ?>
                    <tr>
                        <td class="td_mbid"><?php echo $mb_id ?></td>
                        <td class="td_mbname"><?php echo get_text($row['mb_name']); ?></td>
                        <td class="td_mbname sv_use">
                            <div><?php echo $mb_nick ?></div>
                        </td>
                        <td class="td_num"><?php echo $row['mb_level'] ?></td>
                        <td><a href="./point_list.php?sfl=mb_id&amp;stx=<?php echo $row['mb_id'] ?>"><?php echo number_format($row['mb_point']) ?></a></td>
                        <td class="td_boolean"><?php echo $row['mb_mailling'] ? '예' : '아니오'; ?></td>
                        <td class="td_boolean"><?php echo $row['mb_open'] ? '예' : '아니오'; ?></td>
                        <td class="td_boolean"><?php echo preg_match('/[1-9]/', $row['mb_email_certify']) ? '예' : '아니오'; ?></td>
                        <td class="td_boolean"><?php echo $row['mb_intercept_date'] ? '예' : '아니오'; ?></td>
                        <td class="td_category"><?php echo $group ?></td>
                    </tr>
                <?php
                }
                if ($i == 0) {
                    echo '<tr><td colspan="' . $colspan . '" class="empty_table">자료가 없습니다.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="btn_list03 btn_list">
        <a href="./member_list.php">회원 전체보기</a>
    </div>

</section>

<?php
$sql_common = " from {$g5['board_new_table']} a, {$g5['board_table']} b, {$g5['group_table']} c where a.bo_table = b.bo_table and b.gr_id = c.gr_id ";

if ($gr_id) {
    $sql_common .= " and b.gr_id = '$gr_id' ";
}
if (isset($view) && $view) {
    if ($view == 'w') {
        $sql_common .= " and a.wr_id = a.wr_parent ";
    } elseif ($view == 'c') {
        $sql_common .= " and a.wr_id <> a.wr_parent ";
    }
}
$sql_order = " order by a.bn_id desc ";

$sql = " select count(*) as cnt {$sql_common} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$colspan = 5;
?>

<section>
    <h2>최근게시물</h2>

    <div class="tbl_head01 tbl_wrap">
        <table>
            <caption>최근게시물</caption>
            <thead>
                <tr>
                    <th scope="col">그룹</th>
                    <th scope="col">게시판</th>
                    <th scope="col">제목</th>
                    <th scope="col">이름</th>
                    <th scope="col">일시</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = " select a.*, b.bo_subject, c.gr_subject, c.gr_id {$sql_common} {$sql_order} limit {$new_write_rows} ";
                $result = sql_query($sql);
                for ($i = 0; $row = sql_fetch_array($result); $i++) {
                    $tmp_write_table = $g5['write_prefix'] . $row['bo_table'];

                     // 원글
                    if ($row['wr_id'] == $row['wr_parent']) {
                        $comment = "";
                        $comment_link = "";
                        $row2 = sql_fetch(" select * from $tmp_write_table where wr_id = '{$row['wr_id']}' ");

                        $name = get_sideview($row2['mb_id'], get_text(cut_str($row2['wr_name'], $config['cf_cut_name'])), $row2['wr_email'], $row2['wr_homepage']);
                        // 당일인 경우 시간으로 표시함
                        $datetime = substr($row2['wr_datetime'], 0, 10);
                        $datetime2 = $row2['wr_datetime'];
                        if ($datetime == G5_TIME_YMD) {
                            $datetime2 = substr($datetime2, 11, 5);
                        } else {
                            $datetime2 = substr($datetime2, 5, 5);
                        }
                    } else // 코멘트
                    {
                        $comment = '댓글. ';
                        $comment_link = '#c_' . $row['wr_id'];
                        $row2 = sql_fetch(" select * from {$tmp_write_table} where wr_id = '{$row['wr_parent']}' ");
                        $row3 = sql_fetch(" select mb_id, wr_name, wr_email, wr_homepage, wr_datetime from {$tmp_write_table} where wr_id = '{$row['wr_id']}' ");

                        $name = get_sideview($row3['mb_id'], get_text(cut_str($row3['wr_name'], $config['cf_cut_name'])), $row3['wr_email'], $row3['wr_homepage']);
                        // 당일인 경우 시간으로 표시함
                        $datetime = substr($row3['wr_datetime'], 0, 10);
                        $datetime2 = $row3['wr_datetime'];
                        if ($datetime == G5_TIME_YMD) {
                            $datetime2 = substr($datetime2, 11, 5);
                        } else {
                            $datetime2 = substr($datetime2, 5, 5);
                        }
                    }
                ?>

                    <tr>
                        <td class="td_category"><a href="<?php echo G5_BBS_URL ?>/new.php?gr_id=<?php echo $row['gr_id'] ?>"><?php echo cut_str($row['gr_subject'], 10) ?></a></td>
                        <td class="td_category"><a href="<?php echo get_pretty_url($row['bo_table']) ?>"><?php echo cut_str($row['bo_subject'], 20) ?></a></td>
                        <td><a href="<?php echo get_pretty_url($row['bo_table'], $row2['wr_id']); ?><?php echo $comment_link ?>"><?php echo $comment ?><?php echo conv_subject($row2['wr_subject'], 100) ?></a></td>
                        <td class="td_mbname">
                            <div><?php echo $name ?></div>
                        </td>
                        <td class="td_datetime"><?php echo $datetime ?></td>
                    </tr>

                <?php
                }
                if ($i == 0) {
                    echo '<tr><td colspan="' . $colspan . '" class="empty_table">자료가 없습니다.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="btn_list03 btn_list">
        <a href="<?php echo G5_BBS_URL ?>/new.php">최근게시물 더보기</a>
    </div>
</section>

<?php
$sql_common = " from {$g5['point_table']} ";
$sql_search = " where (1) ";
$sql_order = " order by po_id desc ";

$sql = " select count(*) as cnt {$sql_common} {$sql_search} {$sql_order} ";
$row = sql_fetch($sql);
$total_count = $row['cnt'];

$sql = " select * {$sql_common} {$sql_search} {$sql_order} limit {$new_point_rows} ";
$result = sql_query($sql);

$colspan = 7;
?>

<section>
    <h2>최근 포인트 발생내역</h2>
    <div class="local_desc02 local_desc">
        전체 <?php echo number_format($total_count) ?> 건 중 <?php echo $new_point_rows ?>건 목록
    </div>

    <div class="tbl_head01 tbl_wrap">
        <table>
            <caption>최근 포인트 발생내역</caption>
            <thead>
                <tr>
                    <th scope="col">회원아이디</th>
                    <th scope="col">이름</th>
                    <th scope="col">닉네임</th>
                    <th scope="col">일시</th>
                    <th scope="col">포인트 내용</th>
                    <th scope="col">포인트</th>
                    <th scope="col">포인트합</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row2['mb_id'] = '';
                for ($i = 0; $row = sql_fetch_array($result); $i++) {
                    if ($row2['mb_id'] != $row['mb_id']) {
                        $sql2 = " select mb_id, mb_name, mb_nick, mb_email, mb_homepage, mb_point from {$g5['member_table']} where mb_id = '{$row['mb_id']}' ";
                        $row2 = sql_fetch($sql2);
                    }

                    $mb_nick = get_sideview($row['mb_id'], $row2['mb_nick'], $row2['mb_email'], $row2['mb_homepage']);

                    $link1 = $link2 = "";
                    if (!preg_match("/^\@/", $row['po_rel_table']) && $row['po_rel_table']) {
                        $link1 = '<a href="' . get_pretty_url($row['po_rel_table'], $row['po_rel_id']) . '" target="_blank">';
                        $link2 = '</a>';
                    }
                ?>

                    <tr>
                        <td class="td_mbid"><a href="./point_list.php?sfl=mb_id&amp;stx=<?php echo $row['mb_id'] ?>"><?php echo $row['mb_id'] ?></a></td>
                        <td class="td_mbname"><?php echo get_text($row2['mb_name']); ?></td>
                        <td class="td_name sv_use">
                            <div><?php echo $mb_nick ?></div>
                        </td>
                        <td class="td_datetime"><?php echo $row['po_datetime'] ?></td>
                        <td><?php echo $link1 . $row['po_content'] . $link2 ?></td>
                        <td class="td_numbig"><?php echo number_format($row['po_point']) ?></td>
                        <td class="td_numbig"><?php echo number_format($row['po_mb_point']) ?></td>
                    </tr>

                <?php
                }

                if ($i == 0) {
                    echo '<tr><td colspan="' . $colspan . '" class="empty_table">자료가 없습니다.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="btn_list03 btn_list">
        <a href="./point_list.php">포인트내역 전체보기</a>
    </div>

</section>
*/
?>


<style>
    .apply_list_th{border: 1px solid #ddd; background:#efefef; font-size:16px; padding:8px;}
    .apply_list_td{border: 1px solid #ddd; padding:6px; font-size:15px;}
    .state_change{cursor:pointer; color:red; font-weight:bold; background:#fff; border-style:none;}
</style>


<?php
$sql = " select count(*) as cnt from apply ";
$qry = sql_query($sql);
$row = sql_fetch_array($qry);
$total_count = $row['cnt'];
// DB 합 계산
$page_rows = 10;
$list_page_rows = 10;
// 페이징 수 최대 페이징 표시 수
if($page < 1) { $page = 1; }

$total_page = ceil($total_count / $page_rows);
$from_record = ($page - 1) * $page_rows;
// 페이징 출력 조건 
$sql_order = " order by id desc ";

$sql = " select * from apply where phone != '' {$sql_order} limit {$from_record}, $page_rows ";
$qry = sql_query($sql);
$num = sql_num_rows($qry);
// 조건에 의한 DB 출력 
$write_pages = get_paging($list_page_rows, $page, $total_page, "?page=");
// 그누보드 페이징 함수 사용
?>



<div>
    <table style="text-align:center; width:100%; max-width:800px;">
        <th class="apply_list_th" >연락처..<?php echo $total_count; ?></th>
        <th class="apply_list_th">이름</th>
        <th class="apply_list_th">신청일</th>
        <th class="apply_list_th">상태</th>
            <!-- 연락처 이름 신청일 상태 -->
            <?php
                if($num > 0) {
                    for($i=0; $ap_row = sql_fetch_array($qry); $i++) {
            ?>
        <tr >
            <td class="apply_list_td"><?php echo $ap_row['phone'] ?></td>
            <td class="apply_list_td"><?php echo $ap_row['guest_name'] ?></td>
            <td class="apply_list_td"><?php echo $ap_row['apply_date'] ?></td>
            <?php if($ap_row['state'] == '대기') { ?>
            <td class="apply_list_td">
                <button class="state_change" type="submit" id="<?php echo $ap_row['id'] ?>"><?php echo $ap_row['state'] ?></button>
            </td>
            <?php } else if($ap_row['state'] == '완료') { ?>
            <td class="apply_list_td"><?php echo $ap_row['state'] ?></td>
            <?php } ?>
        </tr>
            <?php
                    }
                }
            ?>
    </table>
    <div style="max-width:800px; width:100%;">
        <?php echo $write_pages; ?>
    </div>
</div>

<script>
    $(".state_change").click(function() {

        if(confirm("'완료'상태로 변경하시겠습니까? 변경되면 다시 복구할 수 없습니다.") == true) {
            
            var id = $(this).attr('id');
            
            $.ajax({
                url: g5_bbs_url + '/ajax.state_update.php',
                type:'POST',
                data: {'id': id},
                dataType: 'json',
                success:function(rst) {
                alert(rst.msg);
                location.reload();
                }
            });
        }
        else {
            return;
        }

        return false;


        alert(id);
    });

</script>

<div class="paging">
    <ul>
        <!-- <?php echo get_paging(10,$page,$total_page,'/meet/html_file.php?file=all_blog_list.html&file2=default_all.html&blog_sch_val='.$_GET['blog_sch_val']); ?> -->
    </ul>
</div>

<?php
require_once './admin.tail.php';
