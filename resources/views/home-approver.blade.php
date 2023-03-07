<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

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
                        <a class="nav-link active text-light" aria-current="page" href="#detil">Detil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#data">Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="chart" id="detil" style="margin-top: 50px;">
        <div class="row justify-content-center">
            <div class="col-6 p-5">
                <div class="row justify-content-center mb-2">
                    <div class="col">
                        <h5 class="text-dark text-center">Data Unit Peminjam Terbanyak</h5>
                    </div>
                </div>
                @foreach ($data_unit as $value)
                    <div class="row">
                        <div class="col-2">
                            <p class="border border-success text-center">{{ $value->name_unit }} {{ $value->total }}%
                            </p>
                        </div>
                        <div class="col">
                            <div class="progress mt-1">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: {{ $value->total }}%" aria-valuenow="25" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col ms-5 mb-4 text-center">
                <a href="/export" class="card-link text-decoration-none">
                    <button type="button" class="btn btn-warning">Export Data</button>
                </a>
            </div>
        </div>
    </section>

    <section id="data">
        <div class="row justify-content-center bg-secondary">
            @foreach ($data_submited as $value)
                <div class="col-3 p-5">
                    <div class="card" style="width: 18rem;">
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
                        <div class="card-body">
                            <a href="/approver-edit-page/{{ $value->id }}"
                                class="card-link text-decoration-none d-inline">
                                <button type="button" class="btn btn-info text-light">Edit</button>
                            </a>
                            <form action="/approver-delete/{{ $value->id }}" class="d-inline" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="/js/backend.js"></script>
</body>

</html>
