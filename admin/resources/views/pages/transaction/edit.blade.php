@extends("layouts.default")

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Transaksi</strong>
            <small>{{ $item->uuid }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('transactions.update', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="form-control-label" for="">
                        Name Pemesan
                    </label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}"
                        class="form-control @error('name') is-invalid @enderror" />
                    @error('name')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="">
                        Email
                    </label>
                    <input type="text" name="email" value="{{ old('email') ? old('email') : $item->email }}"
                        class="form-control @error('email') is-invalid @enderror" />
                    @error('email')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="">
                        Nomer HP
                    </label>
                    <input type="text" name="number" value="{{ old('number') ? old('number') : $item->number }}"
                        class="form-control @error('number') is-invalid @enderror" />
                    @error('number')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-control-label" for="address">
                        Alamat
                    </label>
                    <input type="text" name="address" value="{{ old('address') ? old('address') : $item->address }}"
                        class="form-control @error('address') is-invalid @enderror" />
                    @error('address')
                        <div class="text-muted">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn-primary btn btn-block" type="submit">
                        Ubah Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
