<!doctype html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>
                <p>{{ $post->updated_at }}</p>
            </div>
        </div>
        <p class="edit">[<a href="/posts/{{ $post->id }}/edit">edit</a>]</p>
        <form action="/posts/delete/{{ $post->id }}" id="form_delete" method="post" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" onClick="deletePost(event);return false;">delete</button> 
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
            function deletePost(e){ 
              "use strict"; 
              if(window.confirm('本当に削除しますか？')){ 
                document.getElementById('form_' + e.dataset.id).submit(); 
              }else{ 
                window.alert('キャンセルされました'); 
                return false; 
              } 
            } 
        </script>
    </body>
</html>