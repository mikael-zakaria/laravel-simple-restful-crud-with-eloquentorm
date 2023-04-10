<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Edit</title>
</head>
<body>

    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12 ">

                <h1>Edit Item</h1>
                <hr>

                <form action="{{ route('update', ['item' => $item->id]) }}" method="POST">

                    {{-- CSRF adalah singkatan dari Cross-Site Request Forgery,
                        yakni sebuah celah keamanan dengan cara mengirim form yang nilainya sudah di manipulasi. --}}
                    {{-- Kode Ini Wajib Digunakan Apabila Menggunakan Method POST --}}
                    @csrf

                    {{-- Karena HTTP Tidak memiliki method Patch maka perlu ditulis bagian ini --}}
                    @method('PATCH')

                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ $item->sku }}">

                        {{-- Pesan Error Secara Terpisah --}}
                        @error('sku')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">

                        {{-- Pesan Error Secara Terpisah --}}
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">

                        {{-- Pesan Error Secara Terpisah --}}
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">

                        {{-- Pesan Error Secara Terpisah --}}
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark mb-2">Save Item</button>

                </form>

            </div>
        </div>
    </div>

</body>
</html>
