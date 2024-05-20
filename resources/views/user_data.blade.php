<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.css">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('build/app-IKr7qQe6.css') }}">
</head>

<body>

    <table data-toggle="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody id="user_data">
            @foreach($users as $user)
            <tr >
                <td>{{ $user->name  }}</td>
                <td>{{ $user->email  }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.6/dist/bootstrap-table.min.js"></script>

    <script>

        {!! Vite::content('resources/js/app.js') !!}
    </script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
            Echo.channel('user-data')
                .listen('UserEvent', (e) => {
                    console.log("Received Data: ");
                    console.log(e);
                    
                    var userData = document.getElementById('user_data');
                    userData.innerHTML = ''; // Clear the existing content
                    var data = e.users;
                    var appenddata = '';
                    for(var i = 0; i < data.length; i++){
                        appenddata += '<tr>';   
                        appenddata += '<td>' + data[i].name + '</td>';   
                        appenddata += '<td>' + data[i].email + '</td>';  
                        appenddata += '</tr>';      
                    }
                    userData.innerHTML = appenddata; // Append the new data
                });
        });
    </script>
</body>

</html>