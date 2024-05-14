@extends('inc.layout')

{{-- 타이틀 --}}
@section('title', '에러페이지')

@section('bodyClassVh', 'vh-100')

@section('main')
<main class="d-flex justify-content-center align-items-center h-75">
    <div>
    <h2>500 에러</h2>
    <p>아익모ㅓ띢앙기모띠앙기모띠 그걸틀리노 니가 사람이가 응틀렸쥬 아무말도 못타쥬 응 틀렸티비 아아아앙앙ㅇ익모띠</p>
    <a href="{{route('get.login')}}">로그인 페이지로 돌아가기</a>
</div>
</main>
@endsection