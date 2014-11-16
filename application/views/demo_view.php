<!DOCTYPE html>
<html>
    <head>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    </head>
    <body style="background-image: url(<?php echo base_url() . 'assets/background.jpg'; ?>);">
        <div class="row" style="margin-bottom:20px;">
            
            <div class="col-md-5"></div>
            <div class="col-md-4" style="margin-top: 50px;">
                <h3 style="color:white;">Timeago Demo</h3>
                <form method="post" action="<?php echo base_url();?>demo/add_visitor" class="form-inline" role="form">
                    <div class="form-group">
                        <input type="text" id="name" autocomplete="off" name="name" class="form-control" placeholder="Enter your name">
                        <input type="submit" name="submit" value="submit" class="btn btn-success">
                    </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" id="addName">
                <?php foreach ($names as $name){?>
                <p style="text-transform: uppercase;text-align: center;" ><strong><?php echo $name['name'];?> </strong> was here. <?php echo  $this->mtimeago->time_ago($name['timestamp']);?></p>
                <hr>
                <?php }?>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>
