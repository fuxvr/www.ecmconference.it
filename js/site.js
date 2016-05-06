$(document).ready(
	function(){
	
		$.getJSON(

		'http://www.ecmconference.it/DB/lista_partecipanti_json.php',
//		'http://maps.googleapis.com/maps/api/geocode/json?address=1600+Amphitheatre+Parkway,+Mountain+View,+CA&sensor=true',
//			'../json.php',
			function(data){
					 $.each(data, function(index ,record){
					 var  content  = '<a>';
						 content +=  record.id + ' ' + record.nome + ' '+ record.evento + ' ' + record.evento + ' ' + record.notestampate + ' ' + record.note;
						 content += '</a><br>';
						if($.isNumeric(index)){
							 
							 $.ajax({ method: "POST", url: "insert_part_java.php",data: {id: record.id, evento: record.evento, partecipante: record.nome, notestampate: record.notestampate, note: record.note }})
  							$('div.unite').append(content);
							// $.ajax({type: "POST",url: "DB/ajaxjs.php",data: content ,cache: false,success: function(html) {alert(html);}});
							}

       				 });
		
			}
		);
	}
);







