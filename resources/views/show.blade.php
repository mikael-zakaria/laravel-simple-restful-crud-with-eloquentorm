<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Biodata {{$item->name}}</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">

                {{-- FlashData menggunakan Session Redirect --}}
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Update data <strong>{{ session()->get('message') }}</strong> Success
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <div class="pt-3 d-flex justify-content-end align-items-center">

                    {{-- Untuk Edit --}}
                    <h1 class="h2 mr-auto">Item {{$item->nama}}</h1>
                    <a href="{{ route('edit',['item' => $item->id]) }}" class="btn btn-primary mr-3">
                        Edit
                    </a>

                    {{-- Khusus Untuk Hapus Wajib Pakai Form --}}
                    <form action="{{ route('destroy',['item' => $item->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger ml-3">Hapus</button>
                    </form>

                </div>

                <hr>

                <ul>
                    <li>SKU : {{$item->sku}} </li>
                    <li>Name : {{$item->name}} </li>
                    <li>Description: {{$item->description}} </li>
                    <li>Price: {{$item->price}} </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="/js/jquery-3.3.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>
