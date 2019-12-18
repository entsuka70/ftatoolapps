@extends('layouts.flame')

@section('title', 'FTATOOL')

@section('content')

<div class="container my-4">
  <div class="row justify-content-center">
    <div class="col-10">
      <div class="card">
        <div class="card-header">
          <h4>プロフィール</h4>
        </div>
        <div class="profile_content row">
          <div class="profile_left col-6">
            <div class="profile_left_content ">
              <form class="profile_left_form" action="profile" method="post" enctype="multipart/form-data">
                @csrf
                @if($user->profile_fileName)
                <figure>
                  <label>
                    <input type="file" name="profile_fileName" hidden/>
                    <img class="profile_image" src="{{ $user->profile_fileName }}" width="100px" height="100px" alt="プロフィール画像">
                    <figcaption>現在のプロフィール画像</figcaption>
                  </label>
                </figure>
                @else
                <label>
                  <input type="file" name="profile_fileName" hidden/>
                  <img class="profile_image" src="{{ secure_asset('assets/img/profile_default.png') }}" alt="profile" width="100px" hieght="100px">
                </label>
                @endif
                <button class="btn btn-primary" type="submit">画像更新</button>
              </form>
              @if($errors->has('profile_fileName'))
                <div class="alert alert-danger">
                  <ul>
                    <li>{{ $errors->first('profile_fileName')}}</li>
                  </ul>
                </div>
              @endif
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
            </div>
          </div>
          <div class="profile_right col-6">
            <div class="profile_right_content">
              <h5>ユーザー名:{{ $user->name }}</h5>
              <form action="profile/updateName" method="post">
                @csrf
                <input class="edit-input" type="text" name="name" placeholder="変更後ユーザー名" value="{{ old('name') }}">
                <button class="edit-button" type="submit"><i class="fas fa-edit"></i></button>
              </form>
              @if($errors->has('name'))
                <div class="alert alert-danger">
                  <ul>
                    <li>{{ $errors->first('name') }}</li>
                  </ul>
                </div>
              @endif
            </div>
            <div class="profile_right_content">
              <h5>メールアドレス:{{ $user->email }}</h5>
              <form action="profile/updateEmail" method="post">
                @csrf
                <input class="edit-input" type="text" name="email" placeholder="変更後メールアドレス" value="{{ old('email') }}">
                <button class="edit-button" type="submit"><i class="fas fa-edit"></i></button>
              </form>
              @if($errors->has('email'))
              <div class="alert alert-danger">
                <ul>
                  <li>{{ $errors->first('email') }}</li>
                </ul>
              </div>
              @endif
            </div>
          </div>
        </div>
        <div class="profile_change">
          <form class="deleteMember" action="profile/remove" method="post">
            @csrf
            <button class="btn btn-danger" type="submit">退会</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
