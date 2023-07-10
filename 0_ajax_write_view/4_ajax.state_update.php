<?php
include_once('./_common.php');


  $sql = " update apply set state = '완료' where id = '{$id}' ";
  if(sql_query($sql)) {
  $list['msg'] = '변경 되었습니다.';
  }


echo json_encode($list);
?>