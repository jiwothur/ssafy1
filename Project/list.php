<?php
    include 'session.php';
    include 'checkSignSession.php';
    include 'connection.php';
?>

<!doctype html>
<html>
    <link rel="stylesheet" href="list1.css">
        <head>
            <title>게시물 목록</title>
        </head>
            <body>
                <h2>sharing page service</h2>

                <div class="part">
                    <ul>
                        <li><a href="writeForm.php">글작성하기</a></li><br>
                        <li><a href="signOut.php">로그아웃</a></li><br>
                        <li><a href="writeFriend.php">친구추가</a></li><br>
                        <li><a href="deleteFriendForm.php">친구삭제</a></li><br>
                        <li>친구목록<br><br>

                          <?php
                              $sql = "SELECT f.mem_id,u.member_id,u.username from user u join friend f on( f.friend_id = u.member_id)";

                              $result  = $dbConnect->query($sql);
                              if($result) {
                                  $dataCount1 = $result->num_rows;
                                  if($dataCount1 > 0){
                                      for($i = 0; $i < $dataCount1; $i++){
                                          $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                                          if($_SESSION['member_id']==$memberInfo['mem_id']){  //로그인한 사용자와 같은 mem_id인경우  그때의 친구 username출력
                                            echo "$memberInfo[username]";
                                              echo "<br>";
                                           }
                                         }
                                       }

                                  else{
                                    echo "게시글이 없습니다.";
                                  }
                                }
                          ?>
                        </li>
                      </ul>

                <div id=part1>
                    <table>
                        <thead>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>게시일</th>
                        </thead>

                            <tbody>
                              <?php
                                  $sql = "SELECT u.username,b.board_id, b.title, b.regtime,b.author FROM board b ";
                                  $sql .= "JOIN user u ON (b.author =u.member_id)";
                                  $result  = $dbConnect->query($sql);

                                  if($result) {
                                      $dataCount = $result->num_rows;

                                      if($dataCount > 0){
                                        $sql1 = "SELECT f.mem_id,u.member_id,u.username from user u join friend f on( f.friend_id = u.member_id)";
                                         //위에서 친구목록 출력때 썼던 쿼리문 재사용
                                        $result1  = $dbConnect->query($sql1);

                                        $j=0;

                                        for($i = 0; $i < $dataCount1; $i++){

                                            $memberInfo = $result1->fetch_array(MYSQLI_ASSOC);

                                            if($_SESSION['member_id']==$memberInfo['mem_id'])
                                            {
                                              $memberInfo2[$j] =  $memberInfo['username']; //로그인한 사용자의 친구를 배열에 대입
                                              $j++;
                                            }
                                          }

                                          for($i = 0; $i < $dataCount; $i++){
                                                $memberInfo1 = $result->fetch_array(MYSQLI_ASSOC);
                                            if($memberInfo1['author'] == $_SESSION['member_id']) //로그인한 사용자가 작성자인 경우의 글 출력
                                            {

                                                echo "<tr>";
                                                echo "<td><a href='view.php?board_id=";
                                                echo "{$memberInfo1['board_id']}'>";
                                                echo $memberInfo1['title'];
                                                echo "</a></td>";
                                                echo "<td> {$memberInfo1['username']}</td>";
                                                echo "<td> {$memberInfo1['regtime']}</td>";
                                                echo "</tr>";
                                           }
                                          }

                                          $sql = "SELECT u.username,b.board_id, b.title, b.regtime,b.author FROM board b ";
                                          $sql .= "JOIN user u ON (b.author =u.member_id)";
                                          $result  = $dbConnect->query($sql);
                                          for($k = 0; $k < $dataCount; $k++){
                                            $memberInfo1 = $result->fetch_array(MYSQLI_ASSOC);
                                            for($i = 0; $i < $j; $i++){
                                              if($memberInfo1['username'] == $memberInfo2[$i]) //로그인한 사용자의 친구의 글 출력
                                              {
                                                  echo "<tr>";
                                                  echo "<td><a href='view.php?board_id=";
                                                  echo "{$memberInfo1['board_id']}'>";
                                                  echo $memberInfo1['title'];
                                                  echo "</a></td>";
                                                  echo "<td> {$memberInfo1['username']}</td>";
                                                  echo "<td> {$memberInfo1['regtime']}</td>";
                                                  echo "</tr>";
                                             }
                                            }
                                          }
                                        }
                                      }
                              ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </body>
      </html>
