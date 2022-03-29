@extends("layouts.default")

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">
                            Daftar Foto Barang <small>"{{ $products->name }}"</small>
                        </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Name Barang
                                        </th>
                                        <th>
                                            Foto
                                        </th>
                                        <th>
                                            Default
                                        </th>
                                        {{-- <th>
                                            Actions
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($items as $items)
                                        <tr>
                                            <td>
                                                {{ $items->id }}
                                            </td>
                                            <td>
                                                {{ $items->product->name }}
                                            </td>
                                            <td><img src="{{ url($items->photo) }}" alt=""></td>
                                            <td>
                                                {{ $items->is_default ? 'Ya' : 'No' }}
                                            </td>

                                            {{-- <td>
                                                <form action="{{ route('product-galleries.destroy', $items->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center p-5">
                                                Data Tidak Tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
