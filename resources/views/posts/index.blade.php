<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<title>CalendarShareApp</title>

<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
      </head>
      <body>
          <x-app-layout>
            <x-slot name="header">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Here's HOME
                    <x-primary-button class="ml-3">
                        <a href='/calendar'>{{ __('Create') }}</a>
                    </x-primary-button>
                    
                </h2>
            </x-slot>
            
            <div id='calendar'></div>
            
        
        
        
        
        
        
        
        
        
        
        <a href='/posts/create'>create</a>
          <div class='posts'>
            @foreach ($posts as $post) <div class='post'>
            <h2 class='title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
          <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>

            <p class='body'>{{ $post->body }}</p> 
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
            </form>
            </div>
            
              @endforeach
          </div>
          
<div class='paginate'>
{{ $posts->links() }}
          </div>
          
          
<style scoped>
     #calendar{
        height: 700px;
        width: 800px;
        padding: 30px;
     }
            </style>
</x-app-layout>
      </body>
</html>
