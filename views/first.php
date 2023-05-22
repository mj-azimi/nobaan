<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/lib/bootstrap/bootstrap.min.css">
    <style>
        body{
            direction: rtl;
        }

        .main{
            width: 90%;
            margin:  0 auto;
        }
    </style>
</head>

<body>


    <div class="row main">
        <h3>خرید محصول</h3>
        <?php foreach ($product as $item): ?>
        <div class="col-5 card">
            <div class="card-body">
                <h5 class="card-title"> <?= $item->name ?> </h5>
                <img style="width: 100px;" src="/product/<?= $item->img ?>">
                <p class="card-text"><?= $item->price ?> تومان</p>
                <button product-id="<?= $item->id ?>" class="card-link">خرید</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


    <script src="/lib/bootstrap/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.card-link').click(function (e) { 
                e.preventDefault();
                var productId = $(this).attr('product-id');
                var phone = prompt(" برای تکمیل خرید شماره خود را وارد کنید")
                $.post("/order/add", {phone: phone,productId:productId},
                    function (data) {
                        alert(data);
                    }
                );
            });
        });
    </script>
</body>

</html>