
<?php
    include 'connection.php';
    include 'session.php';

    $email = $_POST['username'];
    $pw = $_POST['userPassWord'];

    //유효하지않은 데이터입력시 실행되는 함수
    function goSignUpPage($alert){
        echo $alert.'<br>';
        echo "<a href='signUpForm.php'>회원가입창으로 이동</a>";
        return;
    }

    //유효성 검사
    //이메일 검사
    if(!filter_Var($email, FILTER_VALIDATE_EMAIL)){
        goSignUpPage('올바른 이메일이 아닙니다.');
        exit;
    }

    //비밀번호 검사
    if($pw == null || $pw == ''){
        goSignUpPage('비밀번호를 입력해 주세요.');
        exit;
    }

    //비밀번호 암호화
    $pw = sha1('random'.$pw);

    //이메일 중복 검사
    $isEmailCheck = false;

    $sql = "SELECT username FROM user WHERE username = '{$email}'";
    $result = $dbConnect->query($sql);

    if($result) {
        $count = $result->num_rows;
        if($count == 0){
            $isEmailCheck = true;
        } else {
              goSignUpPage('이미 존재하는 이메일 입니다.');
              exit;
        }
    }
    else {
        echo "에러발생";
        exit;
    }


    // 조건을 만족한경우 user테이블에 입력데이터 저장
    if ($isEmailCheck == true) {
        $sql = "INSERT INTO user(username, password)";
        $sql .= "VALUES('{$email}', '{$pw}')";
        $result = $dbConnect->query($sql);

        // 세션에 id저장
        if ($result) {
            $_SESSION['member_id'] = $dbConnect->insert_id;
            Header("Location:index.php");
        }
        else {
            echo '회원가입 실패';
            exit;
        }
    }
    else {
        goSignUpPage('이메일 또는 닉네임이 중복값입니다.');
        exit;
    }
 ?>
