$('#submit-create').on('click', function(){
	var that = $('#form-create'),
		url = that.attr('action'),
		type = that.attr('method'),
		data = {};

		that.find('[name]').each(function(index, value){
		var that = $(this),
			name = that.attr('name'),
			value = that.val();

			data[name] = value;
		});

		$.ajax({
			url: url,
			type: type,
			data: data,
			dataType: "json",
			success: function(response){
				console.log(response);

				var res =response[0], 
					child = response[1];
					if( res == 1){
						document.getElementById('logged-in').innerHTML = "welcome " + child;
						document.getElementById('form1').style.display = "none";
						document.getElementById('form2').style.display = "block";
						document.getElementById('child-name').setAttribute('value', child);
						}
					else{

						document.getElementById('login-failed').innerHTML = response;
						document.getElementById('login-failed').style.display = "block";

					}
			},
			error: function (e) {
					console.error(e)
					alert(JSON.stringify(response, null, 4));
                }
		});
		return false;
});

