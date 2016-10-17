$('#submit-register').on('click', function(){
	var that = $('#form-register'),
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
					child = response[1],
					bought = response[2],
					parent_count = response[3],
					type_camps = response[4],
					type_items = response [5],
					price = response[6],
					item_count = response[7];
					item = document.getElementById(bought);

						// enrolling
					if( res == 1){
										// camps
						if(type_camps){
							document.getElementById('message').innerHTML = child + " has been enrolled in " + bought;
							document.getElementById('message').style.display = 'block';
							document.getElementById('logged-in').style.display = 'none';
							document.getElementById('form-register').style.display = 'none';
							document.getElementById('button-anotherCamp').style.display = 'block';
							document.getElementById(bought).className += " checked";
							document.getElementById('dropping').style.display = "inline-block";
						}
										// items
						if(type_items){
							if( item_count){
								item.className += " checked";
							}
							item.getElementsByClassName('item-count')[0].innerHTML= "ordered: " + item_count;
							item.getElementsByClassName('item-count')[0].style.display = 'block';


							document.getElementById('message').innerHTML = child + " has purchased " + bought;
							document.getElementById('message').style.display = 'block';
							document.getElementById('logged-in').style.display = 'none';
							document.getElementById('form-register').style.display = 'none';
							document.getElementById('button-anotherItem').style.display = 'block';
							document.getElementById('dropping').style.display = "inline-block";
							document.getElementById('dropping').style.display = "inline-block";


								// only ckeck it once
							

						}
					}
						// dropping
					else if(res == 2){
										// camps
						if(type_camps){
							document.getElementById('message').innerHTML = child + " has been deregistered from " + bought;
							document.getElementById('message').style.display = 'block';
							document.getElementById('logged-in').style.display = 'none';
							document.getElementById('form-register').style.display = 'none';
							document.getElementById('button-anotherCamp').style.display = 'inline-block';
							document.getElementById(bought).className = "camp-list campID";
						}
										// items
						if(type_items){
							document.getElementById('message').innerHTML = child + " has dropped " + bought + " from cart"
							document.getElementById('message').style.display = 'block';
							document.getElementById('logged-in').style.display = 'none';
							document.getElementById('form-register').style.display = 'none';
							document.getElementById('button-anotherItem').style.display = 'inline-block';
							document.getElementById('dropping').style.display = "block";

							if( !item_count){
								item.className = "item-list";
								item.getElementsByClassName('item-count')[0].style.display = 'none';
							}
							if(item_count)
							item.getElementsByClassName('item-count')[0].innerHTML= "ordered: " + item_count;

						}
					}
					else {
						document.getElementById('message').innerHTML = response;
						document.getElementById('message').style.display = 'block';
						document.getElementById('dropping').style.display = "block";
					}
			},
			error: function (response) {
					alert(JSON.stringify(response, null, 4)); 
            }
		});
		return false;
});

