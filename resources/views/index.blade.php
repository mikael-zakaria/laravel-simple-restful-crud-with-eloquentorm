<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Item List Data</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">

                <div class="py-4 d-flex justify-content-end align-items-center">
                    <h1  class="mr-auto">ITEM LIST</h1>
                    <a href="{{ route('create') }}" class="btn btn-dark"> + Add Item</a>
                </div>

                {{-- FlashData menggunakan Session Redirect --}}
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                    </div>
                @endif

                <table class="table table-striped table-dark table-hover">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SKU</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ( $items as $item )

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td> <a href="{{ route( 'show', ['item' => $item->id] ) }}"> {{$item->sku}} </a></td>
                            <td> {{$item->name}} </td>
                            <td> {{$item->description}} </td>
                            <td> {{$item->price}} </td>
                        </tr>

                        @empty

                        @endforelse

                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <script src="/js/jquery-3.3.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>

</html>
