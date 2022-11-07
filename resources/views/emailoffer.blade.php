@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Home </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Customer List
                    </div>
                    <div class="card-body">
                        @if (Auth()->user()->role==2)
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th class="text-center">Check</th>
                                <th>Sl. N</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Action</th>
                            </tr>
                            <form action="{{ route('check.email.offer') }}" method="post">
                                @csrf
                                @foreach ($customer as $customers)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="check[]" value="{{ $customers->id }}" class="form-control">
                                        </td>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $customers->name }}</td>
                                        <td>{{ $customers->email }}</td>
                                        <td>
                                            <a href="{{ route('single.email.offer', $customers->id) }}"
                                                class="btn btn-success btn-sm" type="submit">Send</a>
                                        </td>
                                    </tr>
                                @endforeach
                             <tr>
                                <td class="text-center">
                                    <button class="btn btn-success" type="submit">Mail-Send</button>
                                </td>
                            </tr>
                            </form>
                        </table>
                        @else
                            <div class="alert alert-danger">
                                <span>You are not allowed this page</span>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
