<!DOCTYPE html>
<html>
<head>
    

</head>
<body>
    <div class="container-fluid py-5">
        
            
            
 <a href="index.php">
        <img src="img\foto.png">
    </a>
    


    </div>
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <div class="container" id="container">
        <div class="form-container sign-up-container">
           

            <form method="post" action="">





                <h1>Hesap Oluştur</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span> ya da e-mailinizi kullanarak kayıt olun.</span>
 

                             <input type="text" name="kullaniciAdi" class="form-control p-4" placeholder="Size Nasıl Hitap Edelim" required="required">




            <input type="text" name="eposta" class="form-control p-4" placeholder="E-postanız Bekleniyor" required="required">



            <input type="text" name="password" class="form-control p-4" placeholder="Güçlü Parola Zor Erişilebilirlik" required="required">


<button class="btn btn-primary py-3 px-5" type="submit" name="submit">Gönder</button>            

</form>        </div>
        



        <div class="container">
        <div class="form-container sign-in-container">
            



            <form method="POST" action="">
                <h1>Giriş Ekranı</h1>
                <span>ya da var olan hesabınızı kullanın.</span>
                <input type="text" id="kullaniciAdi" name="girisisim" placeholder="Kullanıcı Adı" required>
                <input type="password" id="password" name="girissifre" placeholder="Şifre" required>
                <a href="#">Şifrenizi mi unuttunuz?</a>
<button class="btn btn-primary py-3 px-5" type="submit" name="girisbuton">Gönder</button>            
            </form>
        </div>





        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Tekrar Hoşgeldiniz!</h1>
                    <p>Bizimle bağlantıda kalmak için lütfen kişisel bilgilerinizle giriş yapın</p>
                    <button class="ghost" id="signIn">Giriş Yap</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Merhaba, Potansiyel Adam!</h1>
                    <p>Bize katılmak için lütfen kişisel bilgilerinizi girin</p>
                    <button class="ghost" id="signUp">Kayıt Ol</button>
                </div>
            </div>
        </div>
    </div>

    

    <script src="js/script.js"></script>



   

</body>



<?php
$link = mysqli_connect('localhost', 'root', '');
mysqli_select_db($link, 'bizeulasin');

if (isset($_POST['submit'])) {
    $kullaniciAdi = $_POST['kullaniciAdi'];
    $eposta = $_POST['eposta'];
    $password = $_POST['password'];

    mysqli_query($link, "INSERT INTO kayitol (kullaniciAdi, eposta, password) VALUES ('$kullaniciAdi', '$eposta', '$password')");
}

if (isset($_POST['girisbuton'])) {
    $kullaniciAdi = $_POST['girisisim'];
    $password = $_POST['girissifre'];

    // Kullanıcı doğrulama sorgusu
    $sql = "SELECT * FROM kayitol WHERE kullaniciAdi = '$kullaniciAdi' AND password = '$password'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) == 1) {
        sleep(2);
        header('Location: index.php');
        exit();
    } else {
        echo "Şifreniz ya da Kullanıcı Adınız Eşleşmiyor";
    }
}
?>







</html>
