@extends('layouts.app')
@section('content')

<div class="card" id="card" style="width: 18rem;">
  <div class="card-body">
    <p class="card-text" id="text">asfkyvmxoicvjxoicbv54515</p>
    <button id="button">Change password to *</button>
  </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

    $('#text').on('click',function(){
        var color = '#'+Math.floor(Math.random()*16777215).toString(16);
        $('#text').css('background-color',color);

        var result ='';
        var characterList ='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        for(var i = 0; i < 20; i++){
            result += characterList.charAt(Math.floor(Math.random() * characterList.length));
        }
        $('#text').text(result);
    })

    $('#button').on('click',function(){
        var p = $('#text').text();
        var result = '';
        for(var i = 0; i < p.length; i++){
            result += '*';
        }
        $('#text').text(result);
    })
</script>

@endsection
