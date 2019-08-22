if ($('#user_table').length) {
	var DatatableDataLocalDemo=function(){var e=function(){
		// var e=JSON.parse('[{"RecordID":1,"name":"54473-251","email":"GT","kaj":"San Pedro Ayampuc","position_id":"Sanford-Halvorson","ShipAddress":"897 Magdeline Park","CompanyEmail":"sgormally0@dot.gov","CompanyAgent":"Shandra Gormally","CompanyName":"Eichmann, Upton and Homenick","Currency":"GTQ","Notes":"sit amet cursus id turpis integer aliquet massa id lobortis convallis","Department":"Computers","Website":"house.gov","Latitude":"14.78667","Longitude":"-90.45111","ShipDate":"5/21/2016","TimeZone":"America/Guatemala","Status":1,"Type":2}]'),
		// var e=JSON.parse('[{"RecordID":1,"name":"54473-251","email":"GT","kaj":"San Pedro Ayampuc","position_id":"Sanford-Halvorson","ShipAddress":"897 Magdeline Park","CompanyEmail":"sgormally0@dot.gov","CompanyAgent":"Shandra Gormally","CompanyName":"Eichmann, Upton and Homenick","Currency":"GTQ","Notes":"sit amet cursus id turpis integer aliquet massa id lobortis convallis","Department":"Computers","Website":"house.gov","Latitude":"14.78667","Longitude":"-90.45111","ShipDate":"5/21/2016","TimeZone":"America/Guatemala","Status":1,"Type":2}]');
		var e= data,
			a=$("#user_table").mDatatable({
			data:{
				type:"local",
				source:e,
				pageSize:10
				},
			layout:{
				theme:"default",class:"",scroll:!1,height:450,footer:!1},sortable:!0,pagination:!0,
			columns:[
				{field:"rownumber",title:"#",width:50,sortable:!1,selector:!1,textAlign:"center"},
				{field:"name",title:"Name"},
				{field:"email",title:"E-mail",responsive:{visible:"lg"}},
				{field:"phone",title:"Phone",responsive:{visible:"lg"}},
				{field:"kaj",title:"No. KAJ",width:100},
				{field:"position_id",title:"Position",template:function(e){var a={1:{title:"Gembala",state:"primary"},2:{title:"Wakil Gembala",state:"info"},3:{title:"MOI",state:"success"}};return'<span class="m-badge m-badge--'+a[e.position_id].state+' m-badge--dot"></span>&nbsp;<span class="m--font-bold m--font-'+a[e.position_id].state+'">'+a[e.position_id].title+"</span>"}},
				{field:"status",title:"Status",template:function(e){var a={1:{title:"Active",class:"m-badge--success"},2:{title:"Inactive",class:" m-badge--metal"},3:{title:"Pending",class:" m-badge--primary"}};return'<span class="m-badge '+a[e.status].class+' m-badge--wide">'+a[e.status].title+"</span>"}},
				{field:"Action",width:110,title:"Action",sortable:!1,overflow:"visible",template:function(e){return'\t\t\t\t\t\t  \t</div>\t\t\t\t\t\t</div>\t\t\t\t\t\t<a href="" data-toggle="modal" data-target="#edit_user_modal" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_user" data-id='+e.id+' data-name='+e.name+' data-email='+e.email+' data-phone='+e.phone+' data-kaj='+e.kaj+' data-pos='+e.position_id+' data-status='+e.status+' title="View">                            <i class="la la-edit"></i>                        </a>\t\t\t\t\t'}}
			]}),i=a.getDataSourceQuery();$("#m_form_search").on("keyup",function(e){a.search($(this).val().toLowerCase())}).val(i.generalSearch),$("#m_form_status").on("change",function(){a.search($(this).val(),"Status")}).val(void 0!==i.Status?i.Status:""),$("#m_form_type").on("change",function(){a.search($(this).val(),"Type")}).val(void 0!==i.Type?i.Type:""),$("#m_form_status, #m_form_type").selectpicker()};return{init:function(){e()}}}();jQuery(document).ready(function(){DatatableDataLocalDemo.init()});
}

if ($('#event_table').length) {
	var eventTable=function(){var e=function(){
		// var e=JSON.parse('[{"RecordID":1,"name":"54473-251","email":"GT","kaj":"San Pedro Ayampuc","position_id":"Sanford-Halvorson","ShipAddress":"897 Magdeline Park","CompanyEmail":"sgormally0@dot.gov","CompanyAgent":"Shandra Gormally","CompanyName":"Eichmann, Upton and Homenick","Currency":"GTQ","Notes":"sit amet cursus id turpis integer aliquet massa id lobortis convallis","Department":"Computers","Website":"house.gov","Latitude":"14.78667","Longitude":"-90.45111","ShipDate":"5/21/2016","TimeZone":"America/Guatemala","Status":1,"Type":2}]'),
		// var e=JSON.parse('[{"RecordID":1,"name":"54473-251","email":"GT","kaj":"San Pedro Ayampuc","position_id":"Sanford-Halvorson","ShipAddress":"897 Magdeline Park","CompanyEmail":"sgormally0@dot.gov","CompanyAgent":"Shandra Gormally","CompanyName":"Eichmann, Upton and Homenick","Currency":"GTQ","Notes":"sit amet cursus id turpis integer aliquet massa id lobortis convallis","Department":"Computers","Website":"house.gov","Latitude":"14.78667","Longitude":"-90.45111","ShipDate":"5/21/2016","TimeZone":"America/Guatemala","Status":1,"Type":2}]');
		var e= data,
			a=$("#event_table").mDatatable({
			data:{
				type:"local",
				source:e,
				pageSize:10
				},
			layout:{
				theme:"default",class:"",scroll:!1,height:450,footer:!1},sortable:!0,pagination:!0,
			columns:[
				{field:"rownumber",title:"#",width:50,sortable:!1,selector:!1,textAlign:"center"},
				{field:"name",title:"Name"},
				{field:"status",title:"Status",template:function(e){var a={1:{title:"Active",class:"m-badge--success"},2:{title:"Inactive",class:" m-badge--metal"},3:{title:"Pending",class:" m-badge--primary"}};return'<span class="m-badge '+a[e.status].class+' m-badge--wide">'+a[e.status].title+"</span>"}},
				{field:"Action",width:110,title:"Action",sortable:!1,overflow:"visible",template:function(e){return'\t\t\t\t\t\t  \t</div>\t\t\t\t\t\t</div>\t\t\t\t\t\t<a href="" data-toggle="modal" data-target="#edit_event_modal" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill edit_event" data-id='+e.id+' data-name='+e.name+' data-status='+e.status+' title="View">                            <i class="la la-edit"></i>                        </a>\t\t\t\t\t'}}
			]}),i=a.getDataSourceQuery();$("#m_form_search").on("keyup",function(e){a.search($(this).val().toLowerCase())}).val(i.generalSearch),$("#m_form_status").on("change",function(){a.search($(this).val(),"Status")}).val(void 0!==i.Status?i.Status:""),$("#m_form_type").on("change",function(){a.search($(this).val(),"Type")}).val(void 0!==i.Type?i.Type:""),$("#m_form_status, #m_form_type").selectpicker()};return{init:function(){e()}}}();jQuery(document).ready(function(){eventTable.init()});
}

// var DatatableHtmlTableDemo;
if ($('#html_table').length) {
	var DatatableHtmlTableDemo=function(){var e=function(){
		var e= data,
			a=$("#html_table").mDatatable({
			data:{
				type:"local",
				source:e,
				pageSize:10
				},
			layout:{
				theme:"default",class:"",scroll:!1,height:450,footer:!1},sortable:!0,pagination:!0,
			columns:[
				// {field:"rownumber",title:"#",width:50,sortable:!1,selector:!1,textAlign:"center"},
				{field:"user_name",title:"Name",textAlign:"center"},
				{field:"user_phone",title:"Phone",textAlign:"center"},
				{field:"user_kaj",title:"No. KAJ",textAlign:"center"},
				{field:"event_name",title:"Event",textAlign:"center"},
				{field:"event_date",title:"Event Date",textAlign:"center"},
				{field:"attend_date",title:"Attend Date",textAlign:"center"}
			]}),i=a.getDataSourceQuery();$("#m_form_search").on("keyup",function(e){a.search($(this).val().toLowerCase())}).val(i.generalSearch)};return{init:function(){e()}}}();jQuery(document).ready(function(){DatatableHtmlTableDemo.init()});
}

$(document).ready(function() {

	$(".generate_qrcode").click(function () { 
		var selectbox = $('#qrcode_modal select[name="activity"]');

	    $.ajax(
        {
          url: base_url + '/event/fetch/',
          type:'GET',
          dataType : "json",
          data: {},
          success:function(data)
          {
            selectbox.html('');

            if (data.length != 0) {
            	var append = '';
            	jQuery.each(data, function(index, item) {
            		append += '<option value='+item.id+'>' + item.name + '</option>';
            	});
            	selectbox.append(append);
          	}
          }
        });
	});


	$(document).on('click','.edit_user',function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var email = $(this).data('email');
		var phone = $(this).data('phone');
		var kaj = $(this).data('kaj');
		var position = $(this).data('pos');
		var status = $(this).data('status');

		$('#edit_user_modal input[name="id"]').val(id);
		$('#edit_user_modal input[name="name"]').val(name);
		$('#edit_user_modal input[name="email"]').val(email);
		$('#edit_user_modal input[name="phone"]').val(phone);
		$('#edit_user_modal input[name="kaj"]').val(kaj);
		$('#edit_user_modal select[name="position"] option[value='+position+']').prop('selected',true);
		$('#edit_user_modal input[name="status"][value='+status+']').prop('checked',true);
	});

	$(document).on('click','.edit_event',function(){
		var id = $(this).data('id');
		var name = $(this).data('name');
		var status = $(this).data('status');

		$('#edit_event_modal input[name="id"]').val(id);
		$('#edit_event_modal input[name="name"]').val(name);
		$('#edit_event_modal input[name="status"][value='+status+']').prop('checked',true);

		var table = $('#details_event_table');
		var loader = $('#edit_event_modal .loader');

		$.ajax(
        {
          url: base_url + '/event/dates/' + id,
          type:'GET',
          dataType : "json",
          data: {},
          beforeSend:function()
          {
          	loader.show();
          },
          success:function(data)
          {
          	loader.hide();
            var table_data = $('#edit_event_modal .table_data');
            table_data.html('');

            if (data.length != 0) {
            	var ct = 1;
            	jQuery.each(data, function(index, item) {
            		var append = '';
            		append += '<tr><th scope="row">' + ct + '</th>';
            		append += '<td>' + item.date + '</td></tr>';
            		ct++;
            		table_data.append(append);
            	});
          	} else {
          		table_data.append('<tr><td colspan=2>No dates found.</td></tr>')
          	}
          }
        });
	});

	$(document).on('click','.ranges li, .range_inputs .applyBtn', function(){
		if ($(this).attr('data-range-key') != "Custom Range") {
			// console.log($('.home_daterange').html());
			var daterange = $('.home_daterange').html()

			$.ajax(
	        {
	          url: base_url + '/fetchattendance/' + daterange,
	          type:'GET',
	          dataType : "json",
	          data: {},
	          beforeSend:function()
	          {
	          	$("#html_table").remove();
	            $('#home_body').append('<div class="m-loader m-loader--primary m-loader--lg"></div>');
	            $('#home_footer_text').html("Showing records from <span class='m--font-brand m--font-boldest'>" + daterange + "</span>");
	          },
	          success:function(data)
	          {
	            $('#home_body .m-loader').remove();

            	$('#home_body').append('<div class="m_datatable" id="html_table"></div>');

            	var DatatableHtmlTableDemo=function(){var e=function(){
				var e= data,
					a=$("#html_table").mDatatable({
					data:{
						type:"local",
						source:e,
						pageSize:10
						},
					layout:{
						theme:"default",class:"",scroll:!1,height:450,footer:!1},sortable:!0,pagination:!0,
					columns:[
						// {field:"rownumber",title:"#",width:50,sortable:!1,selector:!1,textAlign:"center"},
						{field:"user_name",title:"Name",textAlign:"center"},
						{field:"user_phone",title:"Phone",textAlign:"center"},
						{field:"user_kaj",title:"No. KAJ",textAlign:"center"},
						{field:"event_name",title:"Event",textAlign:"center"},
						{field:"event_date",title:"Event Date",textAlign:"center"},
						{field:"attend_date",title:"Attend Date",textAlign:"center"}
					]}),i=a.getDataSourceQuery();$("#m_form_search").on("keyup",function(e){a.search($(this).val().toLowerCase())}).val(i.generalSearch)};return{init:function(){e()}}}();jQuery(document).ready(function(){DatatableHtmlTableDemo.init()});

	          }
	        });
		}
	});
});