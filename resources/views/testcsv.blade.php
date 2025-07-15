<form action="{{ route('import-excel') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <input type="file" accept=".xlsx" name="file" class="form-control">
    <button class="btn btn-primary" type="submit">Import User Data</button>

</form>