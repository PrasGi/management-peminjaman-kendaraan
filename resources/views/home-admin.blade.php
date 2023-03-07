<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-secondary">

    <nav class="p-3 navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand text-light" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="#proces">Info Process</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#submit">Submit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="proces" style="margin-top: 50px;">
        <div class="row justify-content-center bg-light">
            @if ($submiteds != null)
                @foreach ($submiteds as $value)
                    <div class="col-3 p-5">
                        <div class="card shadow" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $value->name_admin }}</h5>
                                <p>{{ $value->tanggal_peminjaman }}, {{ $value->jam_peminjaman }}</p>
                                <p>{{ $value->tanggal_pengembalian }}, {{ $value->jam_pengembalian }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{ $value->company->name_company }}</li>
                                <li class="list-group-item">{{ $value->unit->name_unit }}</li>
                                <li class="list-group-item">{{ $value->transport->name_transport }}</li>
                            </ul>
                            <div class="mt-2 p-3 bg-info bg-opacity-10 border border-info border-start-0 rounded-end">
                                {{ $value->status->name_status }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    <section id="submit">
        <div class="" style="margin-top: 100px; margin-bottom: 50px;">
            <form action="/submit" method="post">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Tanggal Peminjaan"
                                aria-label="tanggal_peminjama" name="tanggal_peminjaman">
                            @error('tanggal_peminjaman')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="jam peminjaman"
                                aria-label="jam_peminjaman" name="jam_peminjaman">
                            @error('jam_peminjaman')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="pb-3">
                            <select class="form-select" aria-label="Default select example" name="transport_id">
                                @foreach ($transports as $value)
                                    <option value="{{ $value->id }}">{{ $value->name_transport }}</option>
                                @endforeach
                            </select>
                            @error('transport_type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Tanggal pengembalian"
                                aria-label="tanggal_pengembaliana" name="tanggal_pengembalian">
                            @error('tanggal_pengembalian')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="jam pengembalian"
                                aria-label="jam_pengembalian" name="jam_pengembalian">
                            @error('jam_pengembalian')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="pb-3">
                            <select class="form-select" aria-label="Default select example" name="unit_id">
                                @foreach ($units as $value)
                                    <option value="{{ $value->id }}">{{ $value->name_unit }}</option>
                                @endforeach
                            </select>
                            @error('unit')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="company_id">
                                @foreach ($companies as $value)
                                    <option value="{{ $value->id }}">{{ $value->name_company }}</option>
                                @endforeach
                            </select>
                            @error('company_type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
