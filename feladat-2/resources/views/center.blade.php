<div class="card" id="card" style="width: 18rem;">
  <div class="card-body">
    <p class="card-text" id="text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>

    $('#text').on('mouseover',function(){
        var color = '#'+Math.floor(Math.random()*16777215).toString(16);
        $('#text').css('background-color',color);
    })

</script>

