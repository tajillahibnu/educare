<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Dashboard</h2>
        <p>Welcome, {{ auth()->user()->name }}!</p>
        
        <!-- Tampilkan Menu -->
        <ul class="list-group mb-3">
            @foreach($menus as $menu)
                <li class="list-group-item">
                    <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                    
                    <!-- Tampilkan Submenu -->
                    @if($menu->children->count() > 0)
                        <ul class="list-group mt-2">
                            @foreach($menu->children as $child)
                                <li class="list-group-item">
                                    <a href="{{ $child->url }}">{{ $child->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>

        <!-- Tampilkan Permissions -->
        <div class="mt-4">
            <h4>Permissions:</h4>
            <ul>
                @foreach ($permissions as $permission)
                    <li>{{ $permission->name }} - {{ $permission->description }}</li>
                @endforeach
            </ul>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>
</html>
