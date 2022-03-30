<table class="table table-bordered">
    <tr>
        <th>
            Nama
        </th>
        <td>
            {{ $item->name }}
        </td>
    </tr>
    <tr>
        <th>
            email
        </th>
        <td>
            {{ $item->email }}
        </td>
    </tr>
    <tr>
        <th>
            Nomor
        </th>
        <td>
            {{ $item->number }}
        </td>
    </tr>
    <tr>
        <th>
            Alamat
        </th>
        <td>
            {{ $item->address }}
        </td>
    </tr>
    <tr>
        <th>
            Total Transaksi
        </th>
        <td>
            {{ $item->transaction_total }}
        </td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $item->transaction_status }}</td>
    </tr>
    <tr>
        <th>
            Pembelian Product
        </th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Type</th>
                    <th>Harga</th>
                </tr>
                @foreach ($item->details as $details)
                    <tr>
                        <td>
                            {{ $details->product->name }}
                        </td>
                        <td>
                            {{ $details->product->type }}
                        </td>
                        <td>
                            {{ $details->product->price }}
                        </td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
</table>
<div class="row">
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=success" class="btn btn-success btn-block">
            <i class="fa fa-check">Set Success</i>
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=failed" class="btn btn-warning btn-block">
            <i class="fa fa-times">Set gagal</i>
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transactions.status', $item->id) }}?status=pending" class="btn btn-info btn-block">
            <i class="fa fa-spinner">Set Pending</i>
        </a>
    </div>
</div>
