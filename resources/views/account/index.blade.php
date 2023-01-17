@extends('layouts.stisla.index', ['title' => 'Account', 'page_heading' => 'Account'])

@section('content')

@if ($message = Session::get('message'))
          <div class="alert alert-{{Session::get('alert')}} alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>×</span>
                </button>
                <strong>{{ $message }}</strong>
            </div>
          </div>
    @endif

    <?php
    $path = Storage::url(Auth::user()->ttd);
    ?>

    <div class="card">
        <div class="row px-3 py-3">
          <div class="col-lg-12">
          <div class="card-body">
            <h5 class="card-title">Settings</h5>
            <form action="/account/save" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="hidden" name="id" id="id" value="{{Auth::id()}}">
                                <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{Auth::user()->name}}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{Auth::user()->email}}">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Password">Password Lama</label>
                                <input type="Password" name="old_password" id="password" class="form-control" placeholder="password">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Password">Password Baru</label>
                                <input type="Password" name="password" id="password" class="form-control" placeholder="password">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="Password"> Konfirmasi Password Baru</label>
                                <input type="Password" name="password_confirmation" id="password" class="form-control" placeholder="password">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="ttd">TTD</label>
                                <input type="file" name="ttd" id="ttd" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">TTD Lama</label> <br>
                                <img src="{{url($path)}}" width="100px" alt="Logo {{Auth::user()->ttd}}">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
          </div>
          </div>
        </div>
      </div>

@endsection
