@extends("layouts.default")

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="form-control-label" for="products_id">
                        Name barang
                    </label>
                    <select name="products_id" class="form-control @error('products_id') is-invalid @enderror">
                        @foreach ($products as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    @error('products_id')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="photo">
                        Foto Barang
                    </label>
                    <input type="file" name="photo" value="{{ old('photo') }}"
                        class="form-control p-6 @error('photo') is-invalid @enderror" accept="image/*" />
                    {{-- <input type="text" name="photo" value="{{ old('photo') }}"
                        class="form-control @error('photo') is-invalid @enderror" placeholder="Masukan Link Gambar"> --}}
                    @error('photo')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="
                        form-controll">
                    <label for="is_default">Jadikan Default</label>
                    <br>
                    <label for="">
                        <input type="radio" name="is_default" value="1"
                            class="form-controll @error('is_default') is-invalid @enderror"> Ya
                    </label>
                    &nbsp;
                    <label for="">
                        <input type="radio" name="is_default" value="0"
                            class="form-controll @error('is_default') is-invalid @enderror"> Tidak
                    </label>
                    @error('photo')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn-primary btn btn-block" type="submit">
                        Tambah Foto Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
