<?php
include_once('./_common.php');

if($_POST['phone'] != '') {

	$apply_date = date('Y-m-d H:i:s');
	$sql = " INSERT INTO apply SET guest_name = '$guest_name', phone = '$phone', state = '대기', apply_date = '$apply_date' ";

	if(sql_query($sql)) {
        $list['msg'] = '상담 신청이 되었습니다!';
    }
}
echo json_encode($list);
?>
