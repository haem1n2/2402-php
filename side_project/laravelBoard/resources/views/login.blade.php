@extends('inc.layout')

@section('title', '로그인')

@section('bodyClassVh', 'vh-100')
{{-- <body class="vh-100">
@endsection --}}

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <form action="{{route('post.login')}}" method="post">
      @csrf
      {{-- 에러 메세지 표시 --}}
      @if ($errors->any())
      <div class="form-text text-danger">
      {{-- 에러 메세지 루프 처리 --}}
      @foreach($errors->all() as $error)
      <span>{{$error}}</span>
      <br>
      @endforeach()
      </div>
      @endif

      <label for="email" class="form-label">이메일</label>
      <input type="text" class="form-control mb-3" name="email">
      <label for="password" class="form-label mb-3">비밀번호</label>
      <input type="text" class="form-control mb-3" name="password" id="password">
      <button type="submit" class="btn btn-dark mb-3">로그인</button>
    </form>
</main>
@endsection