<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Blood Samples</title>
</head>

<body>
    <h3 class="text-center mt-4"> Welcome to Blood Bank </h3>
    <h5 class="m-4"> Available Blood Samples </h5>
    <?php foreach($food as $row): ?>
    <?php if($row['status'] == "Available"): ?>
    <div class="blood-sample">
    <?php if(session()->get('success')):?>
    <form method="POST" action="/blood/order" enctype="multipart/form-data">
    <?php else:?>
    <form method="POST" action="/blood/view" enctype="multipart/form-data">
    <?php endif; ?>
        <div class="card" style="width: 18rem;float:left;margin-left:100px;">
            <div class="card-body">
                <h5 class="card-title">Blood Sample</h5>
                <input type="hidden" name="hospital_name" value="<?=$row['hospital_name']?>"><?=$row['hospital_name']?></br>
                <input type="hidden" name="type" value="<?= $row['blood_type']; ?>"><?= $row['blood_type']; ?></br>
                <input type="hidden" name="status" value="<?= $row['status'];?>"><?= $row['status'];?></br>
                <input name="request" value="Request" type="submit" class="btn btn-success order-btn">
            </div>
        </div>
    </form>
    </div>
    <?php endif;?>
    <?php endforeach;?>
</body>
<script>
    $(document).ready(function () {
        var accountType = "<?php echo session()->get('account_type') ?>";
        if (accountType == "restaurant") {
            $("input").prop('disabled',true);
            // document.getElementByClassName('order-btn').classList.add('disabled');
        }
    });
</script>

</html>