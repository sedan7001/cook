<?
//php.ini 파일에  register_globals 부분이 있다.
//웹 호스팅을 하는 업체에서 보안상의 이유로 off로 두는 경우가 있는데
//Off인 채로 변수를 전달하고 싶다면 전역변수인
//$_GET[변수명]
//
//$_POST[변수명]
//
//$_COOKIE[변수명]
//
//$_SESSION[변수명]
//
//$_FILES[변수명]
//
//을 이용한다.
//
//on인 상태로 작성한 소스에는 아래의 함수를 이용해 소스 수정없이 사용 할 수 있다.
extract($_POST);
extract($_GET);
extract($_SERVER);
extract($_FILES);
extract($_ENV);
extract($_COOKIE);
extract($_SESSION);

//db 접속에 필요한 user, password, database 를 각각 입력해 준다.
$conn=mysqli_connect('localhost','1234','1234','1234');
if(!$conn){
    echo "DB 접속실패!".mysqli_connect_error();
}else {
//    echo "DB 접속성공";
}
?>



