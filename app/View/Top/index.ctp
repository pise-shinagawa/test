<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
$(function(){
	var data = new Object();
	$.getJSON("files/search/search_config.json" , function(json) {
		data = json;
		setSelect(data,'music');
	    }
	);
	
	$('select[name=media]').on('change',function(){
		var key = this.value;
		$('select[name=entity]').empty();
		$('select[name=attribute]').empty();
		setSelect(data,key);
	});

	function setSelect(data,key){
		for(i in data[key]['entity']){
			$('select[name=entity]').append('<option value="'+data[key]['entity'][i]+'">'+data[key]['entity'][i]+'</option>');
		}
		for(i in data[key]['attribute']){
			$('select[name=attribute]').append('<option value="'+data[key]['attribute'][i]+'">'+data[key]['attribute'][i]+'</option>');
		}
	}
});
</script>
<form id="myForm" action="Api/test" method="post">
	<div>
		<input type="text" name="term">
	</div>
	<div>
		<select name="media">
			<option value="movie">movie</option>
			<option value="podcast">podcast</option>
			<option value="music" selected>music</option>
			<option value="musicVideo">musicVideo</option>
			<option value="audiobook">audiobook</option>
			<option value="shortFilm">shortFilm</option>
			<option value="tvShow">tvShow</option>
			<option value="software">software</option>
			<option value="ebook">ebook</option>
			<option value="all">all</option>
		</select>
	</div>

	<div>
		<select name="entity">
		</select>
	</div>
	
	<div>
		<select name="attribute">
		</select>
	</div>
	
	<div>
		<select name="country">
				<option value="jp">jp</option>
		</select>
	</div>
	<div>
		<input type="number" name="limit" value="50" min="1" max="200">
	</div>
	<div>
		<select name="lang">
			<option value="ja_jp" selected>ja</option>
			<option value=en_us>en</option>
		</select>
	</div>
	<input type="submit" value="send">
</form>

<div class="result"></div>