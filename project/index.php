<?php
include './inc/conn.php';
include './inc/form.php';

$sql = 'SELECT * FROM users ORDER BY RAND() LIMIT 3 ';
$inform = mysqli_query($conn,$sql);
$users = mysqli_fetch_all($inform, MYSQLI_ASSOC);

mysqli_free_result($inform);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/S-Cods.css">
    <title>khalid_projet</title>
</head>
<body>

<div class="container">

  <div id="back" class='position-relative text-center'>
    <div style="background-image: url('img/money.gif');" class="col-md-5 p-lg-5 mx-auto my-5">

          <h1 style="color: rgb(255, 255, 255);" class="display-4 fw-normal">اربح المليون</h1>
          <p class="lead fw-normal">هذي صفحه مزيفا لربح المليون المزيفا</p>

          <ol id="lool" class="list-group list-group-numbered">
          <p>المراكز الثلاثه</p>
          <li class="list-group-item">مليون</li>
          <li class="list-group-item">نص مليون</li>
          <li class="list-group-item">ربع مليون</li></ol>

          <h3>الوقت المتبقي على السحب</h3>
          <p id="C_D" class ="C_D"></p>
    </div>
  </div>
</div>
<div class='position-relative text-center'>
  <div class='col-md-5 p-lg-5 mx-auto my-5'>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <h3>ادخال المعلومات</h3>
      <div class="mb-3">
        <label for="FristName" class="form-label">الاسم الاول</label>
        <input type="text" name="FristName" class="form-control"  value="<?php echo $FristName ?>" id="FristName">
        <div id="emailHelp" class="form-text-error"><?php echo'<p class="ErrorT">'.$errors['FristNameError'].'</p>';?></div>
      </div>
      <div class="mb-3">
        <label for="LastName" class="form-label">الاسم الاخير</label>
        <input type="text" name="LastName" class="form-control" value="<?php echo $LastName ?>" id="LastName">
        <div id="emailHelp" class="form-text-error"><?php echo'<p class="ErrorT">'. $errors['LastNameError'].'</p>';?></div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">الايمال</label>
        <input type="text" name="email" class="form-control" value="<?php echo $email ?>" id="email">
        <div id="emailHelp" class="form-text-error"><?php echo'<p class="ErrorT">'. $errors['emailError'].'</p>';?></div>
      </div>

      <button type="submit" name="submit" class="btn btn-primary">ارسال</button>
    </form>
  </div>
</div>


<!-- Button trigger modal -->
<div class=" d-grid gap-2 col-6 mx-auto ">
<button id="winner" type="button">
السحب على الفأزين
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="myModalLabel">الفائيزين</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <?php
      foreach ($users as $user) {
          $fullName = htmlspecialchars($user['FristName']) . ' ' .
                      htmlspecialchars($user['LastName']) ;

          $email =    htmlspecialchars($user['email']);
          echo "<h1>$fullName <br> $email</h1>"."<hr>";
            }
          ?>
      </div>
    </div>
  </div>
</div>
<div class="loader-con">
  <div id="loader">
    <canvas id="circularLoader" width="200" height="200"></canvas>
  </div>
</div>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jj.js"></script>
<script src="./js/loadeing.js"></script>
</body>
</html>