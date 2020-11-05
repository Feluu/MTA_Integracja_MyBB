<?php 
  define('IN_PHPBB', true);
  
  require_once('vendor/autoload.php');
  
  use MultiTheftAuto\Sdk\Mta;
  
  $phpbb_root_path = dirname(__FILE__) . '/./';
  $phpEx = substr(strrchr(__FILE__, '.'), 1);
  $input = Mta::getInput();
  
  require($phpbb_root_path . 'includes/functions_user.' . $phpEx);
  require($phpbb_root_path . 'common.' . $phpEx);

  $user_row = array(
    'username'              => $input[0],
	'user_password'         => phpbb_hash($input[1]),
    'user_email'            => $input[2],
    'group_id'              => 2,
    'user_type'             => USER_NORMAL,
	'user_lang'             => 'pl',
	'user_timezone'         => '2',
	'user_regdate'          => time(),
	'user_ip'               => $input[3],
  );
  
  $result = user_add($user_row);
  
  Mta::doReturn($result);
?>  