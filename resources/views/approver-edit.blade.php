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

    <section>
        <div class="" style="margin-top: 260px;">
            <form action="/approver-edit/{{ $data->id }}" method="post">
                @csrf
                <div class="row justify-content-center">
                    <input type="hidden" name="_method" value="put">
                    <div class="col-3">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="{{ $data->tanggal_peminjaman }}"
                                aria-label="tanggal_peminjama" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="{{ $data->jam_peminjaman }}"
                                aria-label="jam_peminjaman" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="{{ $data->tanggal_pengembalian }}"
                                aria-label="tanggal_pengembaliana" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="{{ $data->jam_pengembalian }}"
                                aria-label="jam_pengembalian" disabled>
                        </div>

                    </div>
                    <div class="col-3">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" disabled>
                                <option selected>{{ $data->company->name_company }}</option>
                            </select>
                        </div>
                        <div class="pb-3">
                            <select class="form-select" aria-label="Default select example" disabled>
                                <option selected>{{ $data->unit->name_unit }}</option>
                            </select>
                        </div>
                        <div class="pb-3">
                            <select class="form-select" aria-label="Default select example" disabled>
                                <option selected>{{ $data->transport->name_transport }}</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="{{ $data->name_admin }}"
                                aria-label="name" disabled>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <select class="form-select" aria-label="Default select example" name="status_id">
                            @foreach ($status as $value)
                                <option value="{{ $value->id }}">{{ $value->name_status }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Save</button>
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
