<html>

<body>
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
</body>

</html>