@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Upcoming Rides</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Route</th>
                                <th scope="col">Time</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ridesDates as $date => $rides)
                                <tr>
                                    <td class="text-center" colspan="3">
                                        <strong>{{ $date }}</strong>
                                    </td>
                                </tr>
                                @foreach ($rides as $ride)
                                    <tr>
                                        <td>
                                            {{ $ride->departure_place }} - {{ $ride->arrival_place }}
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($ride->departure_time)->format('H:i') }}
                                            -
                                            {{ Carbon\Carbon::parse($ride->arrival_time)->format('H:i') }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary">
                                                Book now
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td class="text-center" colspan="3">
                                        There are no upcoming rides.
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
@endsection
