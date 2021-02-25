<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Live Table Edit Delete Mysql Data using Tabledit Plugin in Laravel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        <h3 class="center">Live Table Edit Delete with jQuery Tabledit in Laravel</h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sample Data</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    @csrf
                    <table id="editable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Gender</th>
                                <th>Date of Birth</th>
                                <th>Joining Date</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->position }}</td>
                                <td>{{ $row->salary }}</td>
                                <td>{{ $row->gender }}</td>
                                <td>{{ $row->date_of_birth }}</td>
                                <td>{{ $row->joining_date }}</td>
                                <td>{{ $row->address }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $("input[name=_token]").val()
            }
        });

        $('#editable').Tabledit({
            url: '{{ route("table.action") }}',
            dataType: "json",
            columns: {
                identifier: [0, 'id'],
                editable: [
                    [1, 'name'],
                    [2, 'email'],
                    [3, 'position'],
                    [4, 'salary'],
                    [5, 'gender', '{"1":"Male", "2":"Female"}'],
                    [6, 'date_of_birth'],
                    [7, 'joining_date'],
                    [8, 'address']
                ]
            },
            restoreButton: false,
            onSuccess: function(data, textStatus, jqXHR) {
                if (data.action == 'delete') {
                    $('#' + data.id).remove();
                }
            }
        });

    });
</script>