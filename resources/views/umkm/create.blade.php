<form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="foto">
    <button type="submit">Simpan</button>
</form>
