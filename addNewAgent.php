<?php
include './config/app.php';


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
                    <h4>הוספת סוכנת</h4>
                    </div>
                    
                    <div class="card-body" >
                        <?php
                        include 'profileModel.php';
                        $model = new ProfileModel();
                        $insert = $model->insert();
                        
                        
                        ?>
                        <form action="" method="POST">
                            <div class="md-3">
                                <label for="">שם סוכנת</label>
                                <input type="text" name="agentNmae" class="form-control">
                            </div>
                            <div class="md-3">
                                <label for=""> מספר סוכנת (1-99)</label>
                                <input type="number" name="agentId" class="form-control" min="1" max="99">
                            </div>
                            <div class="md-3">
                                <label for="">תמונת פרופיל</label>
                                <input type="file" name="image" class="form-control" >
                            </div>

                            <div class="md-3 mt-3">
                                <button type="submit" name="submit_agent" class="btn btn-primary">הוספת סוכנת</button>
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


