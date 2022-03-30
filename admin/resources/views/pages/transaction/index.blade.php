@extends("layouts.default")

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">
                            Transaction List
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
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Nomor
                                        </th>
                                        <th>
                                            Total Transaction
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transactions as $product)
                                        <tr>
                                            <td>
                                                {{ $product->id }}
                                            </td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->email }}</td>
                                            <td>{{ $product->number }}</td>
                                            <td>${{ $product->transaction_total }}</td>
                                            <td>
                                                @if ($product->transaction_status == 'pending')
                                                    <span class="badge badge-info">
                                                    @elseif($product->transaction_status == 'success')
                                                        <span class="badge badge-success">
                                                        @else
                                                            <span class="badge badge-info">
                                                @endif
                                                {{ $product->transaction_status }}
                                                </span>
                                            </td>
                                            <td>
                                                @if ($product->transaction_status == 'pending')
                                                    <a href="{{ route('transactions.status', $product->id) }}?status=success"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fa fa-check">
                                                        </i>
                                                    </a>
                                                    <a href="{{ route('transactions.status', $product->id) }}?status=failed"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-times">
                                                        </i>
                                                    </a>
                                                @endif
                                                <a href="#mymodal"
                                                    data-remote="{{ route('transactions.show', $product->id) }}"
                                                    data-toggle="modal" data-target="#mymodal"
                                                    data-title="Detail Transaction {{ $product->uuid }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('transactions.edit', $product->id) }}"
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('transactions.destroy', $product->id) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
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
