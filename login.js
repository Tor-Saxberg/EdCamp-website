$('#submit-login').on('click', function(){
	var that = $('#form-login'),
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
					parent_count = parseInt(response[2]),
					type_camps = response[3],
					type_items = response[4],
					camp_count = parseInt(response[5]),
					display = response[6],
					list,
					price = 0,
					button = 0,
					node = 0;

				if( res == 1){
					document.getElementById('login-failed').style.display = "block";

						// if camps
					if(camp_count){
						if (button = document.getElementById('button-anotherItem'))
							button.style.display = 'none';
								// check camps already enrolled in
						for (var i = 7; i < camp_count + 7 ; i++) {
							document.getElementById(response[i]).className += " checked";
						}
					}
						// if items
					if(type_items){
						if (button = document.getElementById('button-anotherCamp'))
							button.style.display = 'none';
								// check items already bought at least once
						
						for (var j = response.length -1; j > 7 + camp_count; j -= 2) {
							node = document.getElementById(response[j-1]);
								node.className += " checked";
							if(!display){
								cnt = node.getElementsByClassName("item-count")[0];
								cnt.innerHTML = "ordered: " + response[j];
								cnt.style.display = 'block';
								document.getElementById("button-anotherItem").style.display = 'none';
							}
						}
					}
					if(parent_count){
							// set discount
						var change = (1 - parent_count * 0.1);
						var discount = 10;
						discount = discount.toFixed(0) + "%";
						list = document.getElementsByClassName('price');
						for (var i = list.length - 1; i >= 0; i--) {
							price = list[i].innerHTML * change;
							list[i].innerHTML = "$" + price.toFixed(0);
						}
					}

					// if display only
					if(display){
						document.getElementById('form1').innerHTML = "welcome " + child;
						document.getElementById('items').style.display = 'block';
						document.getElementById('camps').style.display = 'block';
						list = document.getElementsByClassName('checked');
						for (var i = list.length - 1; i >= 0; i--) {
							list[i].style.display = 'inline-block';
						}
						return false;
					}
						// if buying
					else{
						document.getElementById('logged-in').innerHTML = "welcome " + child;
						if (discount != '0%' && parent_count){
							document.getElementById('message').innerHTML = "your discount is: " + discount; 
						}
						document.getElementById('form1').style.display = "none";
						document.getElementById('form2').style.display = "block";
						document.getElementById('child-name').setAttribute('value', child);
						if(button = document.getElementById('button-anotherItem')){
							button.style.display = 'none';
						}
					}

				}

				else{

					document.getElementById('login-failed').innerHTML = response
					document.getElementById('login-failed').style.display = "block";

				}
			},
			error: function (response) {
					console.error(response)
                    alert(JSON.stringify(response, null, 4)); 
                }
		});
		return false;
});

