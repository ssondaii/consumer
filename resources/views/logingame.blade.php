<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  position: relative;
  text-align: center;
  color: white;
  padding: 0px;
  margin: 0px;
}

.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

.top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}

.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

.bottom-right {
  position: absolute;
  bottom: 8px;
  right: 16px;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 0px;
}
.btn-login{
    color: red;
    font-size: 18px;
    font-weight: bold;
    border-radius: 15px;
    padding: 20px;
    text-decoration: none;
    border-color: red;
    border: 2px solid red;
  }
  .btn-login:hover{
    background-color: white;
    color: green;
    border-color: green;
    border: 2px solid green;
  }
  img{
    padding: 0px;
  }
  body{
    padding: 0px;
  }

</style>
</head>
<body>

<div class="container">
  <img src="/image/background2.jpg" alt="Snow" style=" height: 630px;">
  <div class="centered">
    <a class="btn-login" href="/auth/passport">LOGIN PASSPORT</a>
  </div>
</div>

</body>
</html>