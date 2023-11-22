<?php
// include 'connect.php';
// $email_error = $success_message = "";

// if (isset($_POST['submit'])) {
//     $email = $_POST['email'];

//     if (empty($email)) {
//         $email_error = "Vui lòng nhập địa chỉ email";
//     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         $email_error = "Định dạng email không hợp lệ";
//     } else {
//         $sql = "SELECT * FROM nguoidung WHERE email = ?";
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param("s", $email);
//         $stmt->execute();
//         $result = $stmt->get_result();

//         if ($result->num_rows === 1) {
//             $user = $result->fetch_assoc();
//             $new_password = substr(md5(rand(0, 999999)), 0, 8); // Tạo mật khẩu mới với md5

//             // Cập nhật mật khẩu người dùng trong cơ sở dữ liệu
//             $update_sql = "UPDATE nguoidung SET matKhau = '" . $new_password . "' WHERE email = ?";
//             $update_stmt = $conn->prepare($update_sql);
//             $update_stmt->bind_param("s", $email);
//             $update_stmt->execute();

//             // Gửi mật khẩu mới cho người dùng 
//             send_mail($email, $new_password);
//             $success_message = "Hướng dẫn đặt lại mật khẩu đã được gửi đến địa chỉ email của bạn.";
//         } else {
//             $email_error = "Email chưa đăng ký";
//         }
//     }
// }
?>
<?php
// function send_mail($email, $new_password){
//     require __DIR__ . '/../assets/PHPMailer-master/src/PHPMailer.php';
//     require __DIR__ . '/../assets/PHPMailer-master/src/SMTP.php';
//     require __DIR__ . '/../assets/PHPMailer-master/src/Exception.php';
    
//     $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
//     try {
//         $mail->SMTPDebug = 0; //0,1,2: chế độ debug
//         $mail->isSMTP();  
//         $mail->CharSet  = "utf-8";
//         $mail->Host = 'smtp.gmail.com';  //SMTP servers
//         $mail->SMTPAuth = true; // Enable authentication
//         $mail->Username = 'duchaib838@gmail.com'; // SMTP username
//         $mail->Password = 'qnma dlqu lxij flyb';   // SMTP password
//         $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
//         $mail->Port = 465;  // port to connect to                
//         $mail->setFrom('duchaib838@gmail.com', 'Quản trị hệ thống' ); 
//         $mail->addAddress($email); 
//         $mail->isHTML(true);  // Set email format to HTML
//         $mail->Subject = 'Thư cấp lại mật khẩu';
//         $noidungthu = "<pre>
//         Chào người dùng,
//         Chúng tôi nhận được yêu cầu cấp lại mật khẩu từ bạn và đã thực hiện việc đổi mật khẩu cho tài khoản của bạn trong hệ thống.
//         Mật khẩu mới của bạn là: {$new_password}.
//         Vui lòng đăng nhập bằng mật khẩu mới này và đảm bảo rằng bạn thay đổi mật khẩu ngay sau khi đăng nhập thành công để bảo đảm tính bảo mật cho tài khoản của mình.
        
//         Nếu bạn có bất kỳ câu hỏi hoặc cần sự hỗ trợ nào khác, đừng ngần ngại liên hệ với chúng tôi.
        
//         Trân trọng,
//         Quản trị viên
//         </pre>"; 
//         $mail->Body = $noidungthu;
//         $mail->smtpConnect( array(
//             "ssl" => array(
//                 "verify_peer" => false,
//                 "verify_peer_name" => false,
//                 "allow_self_signed" => true
//             )
//         ));
//         $mail->send();
//         // echo 'Đã gửi mail xong';
//     } catch (Exception $e) {
//         // echo 'Error: '. $mail->ErrorInfo;
//         // var_dump('$mail->ErrorInfo') ;
//         var_dump($mail->send());

//     }
// }
?>