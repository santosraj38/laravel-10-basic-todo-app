<x-app-layout>
    <!-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-8">
            {{ __('Index') }} <a href="{{route('todos.create')}}">Add ToDo</a>
        </h2>
    </x-slot> -->

    <div class="py-12">
<div class="grid grid-cols-6 gap-4 justify-items-center">
@include('layouts.flash-message')
  <div class="col-start-2 col-span-6">
   	<div class="bg-gray-400 rounded shadow-2xl p-6 m-4 w-full lg:w-2/4 lg:max-w-lg grid grid-cols-2">
        
        <div class="mb-4">
            <h1 class=" display-3 text-grey-darkest">Todo List</h1>
            <div class="flex mt-4">
                <form class="flex" action="{{route('todos.store')}}" method="post">
                    @csrf
                <input type="text" name="title" class="grow shadow appearance-none border rounded w-full py-2 px-3 mr-4 text-grey-darker" placeholder="Add Todo">
                @error('title')
                    <div class="text-red-500 alert alert-danger">{{ $message }}</div>
                @enderror
                <button class="flex-1 p-2 border-green-500 rounded text-teal border-teal hover:text-white hover:bg-teal">Add</button>
</form>
            </div>
        </div>
        <div>
            @foreach($todos as $todo)
            <div class="flex mb-4 items-center">
                @if($todo['is_complete']==false)
                    <p class="w-full text-grey-darkest">{{$todo['title']}}</p>
                    <form action="{{route('todos.update',$todo->id)}}" method="post">
                    @csrf    
                    @method('PUT')
                        <input type="hidden" name="is_complete" value="1"/>
                        <input type="hidden" name="title" value="{{$todo->title}}"/>
                        <button class="@if($todo->is_complete==false) flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-green border-green hover:bg-green @else w-full line-through text-green @endif">Done</button>
                    </form>
                @else
                    <p class="w-full line-through text-green">{{$todo->title}}</p>
                    <form action="{{route('todos.update',$todo->id)}}" method="post">
                    @csrf    
                    @method('PUT')
                        <input type="hidden" name="is_complete" value="0"/>
                        <input type="hidden" name="title" value="{{$todo->title}}"/>
                        <button class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:text-white text-grey border-grey hover:bg-grey">Not Done</button>
                    </form>
                @endif
                <form action="{{route('todos.destroy',$todo->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="flex-no-shrink p-2 ml-2 border-2 rounded text-red border-red hover:text-white hover:bg-red">Remove</button>
                </form> 
            </div>
            @endforeach
        </div>
    </div>
  </div>
</div>
</div>
</x-app-layout>