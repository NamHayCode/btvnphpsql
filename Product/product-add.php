<meta charset="utf-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fashion MyLiShop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Fashion MyLiShop - fashion mylishop"/>
    <meta name="description" content="Fashion MyLiShop - fashion mylishop" />
    <meta name="keywords" content="Fashion MyLiShop - fashion mylishop" />
    <meta name="author" content="Hôih My" />
    <meta name="author" content="Y Blir" />
    <link rel="icon" type="image/png" href="images/logohong.png">
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="admin/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'> -->

    <!-- customer js -->
    <script src='../Product/js/wow.js'></script>
    <script type="text/javascript" src="../Product/js/mylishop.js"></script>
    <!-- customer css -->
    <link rel="stylesheet" type="text/css" href="../Product/css/animate.css">
    <link rel="stylesheet" type="text/css" href="../Product/css/style.css">

</head>
<?php
    include 'header.php';
    require_once('../Product/model/connect.php');
    error_reporting(2);

    if (isset($_GET['notimage'])) {
        $noimage = 'Vui lòng chọn hình ảnh hợp lệ!';
    } else {
        $noimage = '';
    }
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Thêm sản phẩm </h1>
            </div><!-- /.col-lg-12 -->

            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="productadd-back.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label> Tên sản phẩm </label>
                        <input type="text" class="form-control" name="txtName" placeholder="Nhập tên sản phẩm" required/>
                    </div>
                    <!-- //Tên sản phẩm -->

                    <div class="form-group">
                        <label> Danh mục sản phẩm </label>
                        <select class="form-control" name="category">
                        <?php
                            $sql = "SELECT * FROM categories";
                            $result = mysqli_query($conn,$sql);
                            if($result)
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                        ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>   
                        <?php
                                }
                            }
                       ?>
                        </select>
                    </div>
                    <!-- //Danh mục sản phẩm -->
                       
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label> Giá sản phẩm </label>
                                <input type ="number"  class="form-control" name="txtPrice" placeholder="Nhập giá sản phẩm" min="20000" required/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label> Phần trăm giảm (nếu có) </label>
                                <input type = "number" class="form-control" name="txtSalePrice" placeholder="Nhập phần trăm giá giảm" value="0" min="0" max="50"/>
                            </div>
                        </div>
                    </div>
                    <!-- //Giá sản phẩm -->
                    
                    <div class="form-group">
                        <label> Số lượng sản phẩm </label>
                        <input type="number" class="form-control" name="txtNumber" placeholder="Nhập số lượng sản phẩm" required/>
                    </div>
                    <!-- //Số lượng sản phẩm -->

                    <div class="form-group">
                        <label> Chọn hình ảnh sản phẩm </label>
                        <input type="file" name="FileImage" required>
                        <span style="color: red"><?php echo $notimage; ?></span>
                    </div>
                    <!-- //Chọn hình ảnh sản phẩm -->

                    <div class="form-group">
                        <label> Nhập từ cho khách hàng tìm kiếm </label>
                        <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa tìm kiếm" />
                    </div>
                    <!-- //Nhập từ cho khách hàng tìm kiếm -->

                    <div class="form-group">
                        <label> Mô tả sản phẩm </label>
                        <textarea class="form-control" rows="3" name="txtDescript"></textarea>
                    </div>
                    <!-- //Mô tả sản phẩm -->
                   
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" name="addProduct" class="btn btn-warning btn-block btn-lg"> Thêm </button>
                        </div>
                        <!-- //Button Thêm -->

                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <button type="reset" class="btn btn-default btn-block btn-lg" style="background: gray; color:white;"> Thiết lập lại </button>
                        </div>
                        <!-- //Button Reset -->
                    </div>
                    <!-- /.row -->
                </form>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
