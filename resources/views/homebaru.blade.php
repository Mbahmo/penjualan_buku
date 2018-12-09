@extends('layouts.appbaru')

@section('content')
  <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <h2>Selamat Datang, {{ Auth::user()->name }} !</h2>
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>
  <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                {{-- <select class="custom-select pull-right">
                                    <option selected>January</option>
                                    <option value="1">February</option>
                                    <option value="2">March</option>
                                    <option value="3">April</option>
                                </select> --}}
                                <h4 class="card-title">Daftar User </h4>
                                <div class="table-responsive m-t-40">
                                    <table class="table stylish-table">
                                        <thead>
                                            
                                            <tr>
                                                <th colspan="2">User</th>
                                                <th>Email</th>
                                                <th>Terdaftar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>@foreach ($user as $user)
                                                <td style="width:50px;"><span class="round">
                                                    <img src="{{ asset('images/users').'/'.$user->image}}" alt="user" width="50" /></span></td>
                                                <td>
                                                    <h6>{{$user->name}}</h6><small class="text-muted">Admin</small></td>
                                                <td>{{$user->email}}</td>
                                                <td>{{date_format($user->created_at,'d M Y')}}</td>
                                            </tr>    
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
