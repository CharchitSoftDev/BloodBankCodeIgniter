<html>

<body>
    <?php if(session()->get('success') && session()->get('account_type')=="restaurant"):?>
    <div class="menu-table m-4">
        <table name="blood-sample" class="table table-bordered">
            <thead class="thead-dark">
                <tr name="info">
                    <th scope="col">Request Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($requests as $row): ?>
                <tr>
                    <td><?= $row->email;?></td>
                    <td><?= $row->hospital_name; ?> </td>
                    <td><?= $row->blood_type;?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <?php else:?>
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
</body>

</html>