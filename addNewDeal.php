<?php
include 'config/app.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/main.css"> -->
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                

                <div class="card" style="margin-bottom: 3rem;">
                    <div class="card-header">
                    <h4>הוספת עסקה</h4>
                    </div>
                    
                    <div class="card-body" >
                        <?php
                            include 'modells/model.php';
                            $model = new Model();
                            $insert = $model->insert();
                            $getIds = $model->getDeals();
                        ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <!-- <input type="text" name="deal_id" value="<?php var_dump($getIds['id'])  ?>">
                            <input type="text" name="agent_id" value="<?php echo $getIds['agent_id'] ?>"> -->
                            <div class="md-3">
                                <label for="">שם סוכנת</label>
                                <select class="form-select form-control" name="agentName" aria-label="Default select example">
                                    <option selected>שם הסוכנת מרשימת בחירה</option>
                                    <option value="1">תמר</option>
                                    <option value="2">הילדה</option>
                                    <option value="3">רינה</option>
                                </select>
                            </div>
                            <div class="md-3">
                                <label for="">כתובת הנכס</label>
                               <input class="form-control" name="address" type="text" name="" id="">
                            </div>
                            <div class="md-3">
                                <label for="">סוג העסקה</label>
                                <select class="form-select form-control" name="typeDeal" aria-label="Default select example">
                                    <option selected>סוג העסקה מרשימת בחירה</option>
                                    <option value="מכירה">מכירה</option>
                                    <option value="קניה">קניה</option>
                                    <option value="השכרה">השכרה</option>
                                </select>
                            </div>
                            <div class="md-3">
                                <label for="">סכום העסקה</label>
                               <input class="form-control" name="price" type="text" name="" id="">
                            </div>
                            <!-- <div class="md-3">
                                <label for="">Book Image</label>
                                <input type="file" name="image_url" class="form-control" >
                            </div> -->

                            <div class="md-3 mt-3">
                                <button type="submit" name="submit_deal" class="btn btn-primary">הוספת עסקה</button>
                            </div>
                        </form>
                </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
</body>
</html>


