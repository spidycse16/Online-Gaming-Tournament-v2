<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tournament Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .entry {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            padding: 10px 0;
        }

        .entry:last-child {
            border-bottom: none;
        }

        .entry-title {
            flex: 1;
            font-size: 18px;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 8px 12px;
            border-radius: 5px;
            text-align: center;
        }

        .manage {
            background-color: coral;
            color: white;
        }

        .edit {
            background-color: #28a745;
            color: white;
        }

        .delete {
            background-color: #dc3545;
            color: white;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .delete-box {
            border: 2px solid;
            padding: 2px;
            background-color: red;
        }
    </style>
</head>
<body>
    @if(session('delete'))
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        {{ session('delete') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
    @endif
    <div class="container">
        <h1>Tournament Entries</h1>

        @foreach($results as $tournament)
            <div class="entry">
                <div class="entry-title">{{ $tournament->tournament_name }}</div>
                <div class="button-group">
                    <a href="/admin/manage-versus/{{ $tournament->id }}" class="btn manage">Manage</a>
                    <a href="/admin/edit-tournament/{{ $tournament->id }}" class="btn edit">Edit</a>
                    <form class="delete-box" id="deleteTournamentForm{{ $tournament->id }}" action="/admin/delete/{{$tournament->id}}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn delete" onclick="confirmDelete({{ $tournament->id }})">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function confirmDelete(tournamentId) {
            if (confirm("Are you sure you want to delete this tournament? This action cannot be undone.")) {
                document.getElementById('deleteTournamentForm' + tournamentId).submit();
            }
        }
    </script>
</body>
</html>
