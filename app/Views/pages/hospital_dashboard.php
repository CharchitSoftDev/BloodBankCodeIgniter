<?php if(session()->get('success') && session()->get('account_type')=="restaurant"):?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Dashboard</title>
    </head>
    <body>
    <h3 class="text-center mt-4"> Welcome to Blood Bank </h3>
    <div>
    <a class="btn btn-success " href="/blood/view/add_blood_info"> Add blood info </a></br></br></br>
    <a class="btn btn-success" href="/blood/requests"> View Requests </a></br></br></br>
    </div>
    <div class="dash-table m-4">
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Hospital Name</th>
                <th scope="col">Type</th>
                <th scope="col">status</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($food as $row):?>
            <tr>
                <td><?= $row->hospital_name?></td>
                <td><?= $row->blood_type; ?> </td>
                <td><?= $row->status;?> </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    </div>
    </body>
</html>
<?php else : ?>
<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead">The page you are looking for was not found.</div>
                <a href="/blood/menu/" class="btn btn-info">Back to Home</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>