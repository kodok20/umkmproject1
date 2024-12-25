
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            body {
                background-color: #f9f6f2;
                font-family: 'Arial', sans-serif;
            }

            .card {
                border-radius: 15px;
                box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
                transition: transform 0.2s;
            }

            .card:hover {
                transform: scale(1.05);
            }

            .card img {
                border-radius: 15px 15px 0 0;
                height: 200px;
                object-fit: cover;
                width: 70%;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }

            .btn-primary {
                border-radius: 20px;
            }

            .btn-info, .btn-warning, .btn-danger {
                border-radius: 20px;
            }

            .form-inline .form-control {
                border-radius: 20px;
            }

            .form-inline .btn {
                border-radius: 20px;
            }

            .pagination {
                justify-content: center;
            }

            .pagination .page-item .page-link {
                border-radius: 20px;
            }

            .cards-wrapper {
                display: flex;
                justify-content: center;
            }

            .card img {
                max-width: 100%;
                max-height: 100%;
            }

            .card {
                margin: 0 0.5em;
                box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
                border: none;
                border-radius: 0;
            }

            .carousel-inner {
                padding: 1em;
            }

            .carousel-control-prev,
            .carousel-control-next {
                background-color: #e1e1e1;
                width: 5vh;
                height: 5vh;
                border-radius: 50%;
                top: 50%;
                transform: translateY(-50%);
            }

            @media (min-width: 768px) {
                .card img {
                    height: 11em;
                }
            }
        </style>
    </head>

    <body>
        <div class="container py-5">
            <div class="mb-4">
                <form action="{{ route('umkm.index') }}" method="GET" class="form-inline">
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="search" class="form-label">Cari</label>
                        <input type="text" name="search" id="search" class="form-control" placeholder="Cari UMKM">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label for="limit" class="form-label">Batas</label>
                        <select name="limit" id="limit" class="form-control">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Cari</button>
                </form>
            </div>
            <a href="{{ route('umkm.create') }}" class="btn btn-primary mb-4">Tambah UMKM Baru</a>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($umkms as $umkm)
                <div class="col">
                    <div class="card">
                        <img src="{{ $umkm->foto ? Storage::url($umkm->foto) : 'https://via.placeholder.com/300x200' }}" class="card-img-top" alt="Foto UMKM">
                        <div class="card-body">
                            <h5 class="card-title">{{ $umkm->nama_umkm }}</h5>
                            <p class="card-text">
                                <strong>ID:</strong> {{ $umkm->id_umkm }}<br>
                                <strong>NIB:</strong> {{ $umkm->nib }}<br>
                                <strong>Tahun Berdiri:</strong> {{ $umkm->tahun_berdiri }}<br>
                                <strong>Jenis Usaha:</strong> {{ $umkm->jenis_usaha }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('umkm.show', $umkm->id_umkm) }}" class="btn btn-info btn-sm">Lihat</a>
                            <a href="{{ route('umkm.edit', $umkm->id_umkm) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('umkms.destroy', $umkm->id_umkm) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $umkms->links() }}
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
