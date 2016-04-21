<script>
$(function(){
	$('#myForm').on('submit', function() {
		//form送信
		event.preventDefault();
		var $form = $(this);

		$.ajax({
	        url: $form.attr('action'),
	        type: $form.attr('method'),
	        dataType: 'jsonp',
	        data: $form.serialize()+ '&media=music&attribute=songTerm&country=jp',
			success: function(json, textStatus, xhr) {
				console.log($form.attr('action')+$form.serialize()+ '&media=music&attribute=songTerm&country=jp');
				var result = '';
				var count = json.results.length;
				for(i=0;i<count;i++){
					result = result + '<div>'+json.results[i].artistName+' / '+json.results[i].trackName+'</div>'
					}
				$('.result').empty();
				$('.result').append(result);
			},
            error: function(xhr, textStatus, error) {
            	console.log(xhr);
            	console.log($form.serialize()+ '&country=jp');
            	}
			});
	});
});
</script>
<form id="myForm" action="https://itunes.apple.com/search" method="post">
<input type="radio" name="entity" value="song" checked="checked">musicTrack<br>
<input type="radio" name="entity" value="musicArtist">musicArtist<br>
<input type="text" name="term">
<input type="number" name="limit" value="10" min="1" max="200">
<input type="submit" value="send">
</form>
<div class="result"></div>