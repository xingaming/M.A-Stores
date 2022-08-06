<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

</head>

<body>
    <section>
        <!--Bắt Đầu Phần Hình Ảnh-->
        <div class="img-bg">
            <img src="img/sh.jpg"
                alt="Hình Ảnh Minh Họa">
        </div>
        <!--Kết Thúc Phần Hình Ảnh-->
        <!--Bắt Đầu Phần Nội Dung-->
        <div class="noi-dung">
            <div class="form">
                <h2>Trang Đăng Ký</h2>
                    <form action="{{ url('admin/addUser') }}" method="post">
                        {{ csrf_field() }}

                        <div><label for="">Email: </label> <input name="email" required /></div>
                        <div><label for="">Password:</label> <input type="password" name="password" required /></div>
                        <div><label for="">Confirm:</label> <input type="password" name="confirm" required /></div>
                        <div><label for="">Fullname:</label> <input name="fullname" required /></div>
                        <div><label for="">Role:</label> <select name="role" required>
                                <option value="">Please choose one</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div><label for="">Active:</label> <select name="active" required>
                                <option value="">Please choose one</option>
                                <option value="1">Active</option>
                                <option value="2">Disable</option>
                            </select>
                        </div>
                </form>
            </div>
        </div>
        <!--Kết Thúc Phần Nội Dung-->
    </section>
</body>
</html>
