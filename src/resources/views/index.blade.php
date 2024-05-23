@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection
@section('content')


<div class="todo__alert">
    @if(session('message'))
    <div class="todo__alert--success">
        {{session('message')}}
    </div>
    @endif
    @if($errors->any())
    <div class="todo__alert--danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach

        </ul>
    </div>
    @endif
</div>
    <div class="todo__content">
    <form action="/todos" method="post" class="create-form">
        @csrf
        <div class="create-form__item">
            <input type="text" class="create-form__item-input" type="text" name="content">
        </div>
        <div class="create-form__button">
            <button class="create-form__button-submit" type="submit">作成</button>
        </div>
    </form> 
    <div class="todo-table">
        <table class="todo-table__inner">
            <tr>
                <th class="todo-table__header">
                    Todo
                </th>
            </tr>
            @foreach ($todos as $todo)
            <tr class="todo-table__row"> 
                <td class="todo-table__item">
                    <form action="" class="update-form">
                        <p class="update-form__item-input">{{$todo['content']}}</p> 
                        <div class="update-form__button">
                            <button class="update-form__button-submit" type="submit">更新</button>
                        </div>
                </td>
                 <td class="todo-table__item">
                    <form action="" class="delete-form">
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