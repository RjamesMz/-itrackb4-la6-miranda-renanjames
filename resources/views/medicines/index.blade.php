
@extends('layouts.app')

@section('title', 'All Medicines')

@section('content')

@if($type === 'all' && $stock === 'all')
    <p> Showing all medicines</p>
@elseif($type !== 'all' && $stock !== 'all')
    <p> Showing medicines: {{ $type }} with stock {{ $stock }}</p>
@elseif($type !== 'all')
    <p> Showing medicines: {{ $type }}</p>
@elseif($stock !== 'all')
    <p> Showing stock of medicines: {{ $stock }}</p>
@endif
    
    <table class="table table-striped table-primary" border="1" cellpadding="8">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Stock</th>
            <th>Type</th>
            <th>Expiry Date</th>
        </tr>
 
        @forelse ($medicines as $medicine)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <a href="{{ route('medicines.show', $medicine['id']) }}"> 
                             {{ $medicine['name'] }}
                    </a>
                 </td>

                <td>{{ $medicine['stock'] }}</td>

                <td>{{ $medicine['type'] }}</td>

                <td>{{ $medicine['expiry_date'] }}</td>
            </tr>

        @empty
             <tr>
                <td colspan="4">  
                    <b >No Medicine Found </b>
                </td>
            </tr>

        @endforelse
    </table>
@endsection
