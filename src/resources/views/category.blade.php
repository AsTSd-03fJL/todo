@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/category.css') }}">
@endsection
@section('content')

<div class="categogry__alert">
    @if(session('message'))
    <div class="category__alert--success">{{session('message')}}</div>
    @endif
    @if($errors->any())
    <div class="category__alert--danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>    
    </div>
    @endif
</div>
<div class="category__content">
<form class="create-form" action="/categories" method="post">
    @csrf
     <div class="create-form__item">
    <input type="text" class="create-form__item-input" value="{{old('name')}}"
    name="name" >
    </div>
    <div class="create-form__button">
        <div class="create-form__button-submit" type="submit">作成</div>
    </div>
</form>
<div class="category-table">
    <table class="category-table_inner">
        <tr class="category-table__row">
            <th class="category-table__header">
                category
            </th>
        </tr>
        @foreach($categories as $category)
        <tr class="category-table__row">
            <td class="category-table__item">
                <form action="/categories/update" method="post"  class="update-form">
                @method('patch')
                @csrf
                    <div class="update-form__item">
                        <input type="text" value="{{$category['name']}}"   name ="name" class="update-form__item-input">
                        <input type="hidden" name="id" value="{{$category['id']}}">
                    </div>
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                    </form>
                </td>
                <td class="category-table__item">
                    <form class="delete-form__button" action="/categories/delete" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" value="{{$category['id']}}">
                        <div class="delete-form__button">
                        <button class="delete-form__button-submit" type="submit">削除</button>
                        </div>
                    </form>
                </td>
        </tr>
        @endforeach
    </table>    

</div>
</div>
@endsection

