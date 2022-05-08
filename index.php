<?php
include 'config/app.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>לוח עסקאות</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="https://use.fontawesome.com/f945fb7183.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
</head>
<body>
<h1 class="title">לוח עסקאות</h1>

<?php
include 'modells/model.php';
$model = new Model();

$deals = $model->getDeals();

?>
    <div class="container">
        <div class="addDeal">
            <a href="<?php base_url('addNewDeal.php') ?>">
                <i class="fas fa-plus"></i>
            </a>
        </div>
        <div class="profile">
            <a href="<?php base_url('profile.php') ?>">
                <i class="far fa-user"></i>
            </a>
        </div>
        

<?php
foreach($deals as $deal){

?>

        <div class="card_wrap">
            <div class="cardNumber">
                <h5><?php  echo $deal['deal_id'] ?></h5>
            </div>
            <div class="profileImage">
                <img src="./uploads/<?=$deal['image'] ?>" alt="<?php echo $deal['name']." profile image" ?>" alt="">
            </div>
            <div class="row agentNmae">
                <h3><?php echo $deal['name'] ?></h3>
            </div>
            <div class="row dealType">
                <h4><?php echo $deal['type'] ?></h4>
            </div>
            <div class="row dealAddress">
               <h4><?php echo $deal['address'] ?> </h4>
            </div>
            <div class="row price">
                <h4><?php echo $deal['price'] ?></h4>
            </div>
            <div class="action">
                <a href="<?php base_url('updateDeal.php') ?>">
                <i class="far fa-edit"></i>
                </a>
                <a href="<?php base_url('deleteDeal.php') ?>">
                <i class="far fa-trash-alt"></i>
                </a>
            </div>
        </div>

        <?php
}?>






    </div>
</body>
</html>