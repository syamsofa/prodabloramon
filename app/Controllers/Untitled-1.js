(regexMatch('/^[A-Za-z]*$/',anak_SQ001_SQ001))
and
(regexMatch('/^[A-Za-z]*$/',anak_SQ002_SQ001))
and
(regexMatch('/^[A-Za-z]*$/',anak_SQ003_SQ001))
and
(regexMatch('/^[A-Za-z]*$/',anak_SQ004_SQ001))
and
(regexMatch('/^[A-Za-z]*$/',anak_SQ005_SQ001))
and
(regexMatch('/^[A-Za-z]*$/',anak_SQ006_SQ001))
and
(regexMatch('/^[A-Za-z]*$/',anak_SQ007_SQ001))

and
(regexMatch('/^\d{4}$/',anak_SQ001_SQ002))
and
(regexMatch('/^\d{4}$/',anak_SQ002_SQ002))
and
(regexMatch('/^\d{4}$/',anak_SQ003_SQ002))
and
(regexMatch('/^\d{4}$/',anak_SQ004_SQ002))
and
(regexMatch('/^\d{4}$/',anak_SQ005_SQ002))
and
(regexMatch('/^\d{4}$/',anak_SQ006_SQ002))
and
(regexMatch('/^\d{4}$/',anak_SQ007_SQ002))
and
(anak_SQ001_SQ001=='ok')

{if((regexMatch('/^[A-Za-z]*$/', anak_SQ001_SQ001)), '', 'Mohon isikan nama dengan benar nggih.<br />')}
{if((regexMatch('/^[A-Za-z]*$/', anak_SQ002_SQ001)), '', 'Mohon isikan nama dengan benar nggih.<br />')}
{if((regexMatch('/^[A-Za-z]*$/', anak_SQ003_SQ001)), '', 'Mohon isikan nama dengan benar nggih.<br />')}
{if((regexMatch('/^[A-Za-z]*$/', anak_SQ004_SQ001)), '', 'Mohon isikan nama dengan benar nggih.<br />')}
{if((regexMatch('/^[A-Za-z]*$/', anak_SQ005_SQ001)), '', 'Mohon isikan nama dengan benar nggih.<br />')}
{if((regexMatch('/^[A-Za-z]*$/', anak_SQ006_SQ001)), '', 'Mohon isikan nama dengan benar nggih.<br />')}
{if((regexMatch('/^[A-Za-z]*$/', anak_SQ007_SQ001)), '', 'Mohon isikan nama dengan benar nggih.<br />')}

{if((regexMatch('/^\d{4}$/', anak_SQ001_SQ002)), '', 'Mohon isikan tahun lahir dengan benar nggih.<br />')}
{if((regexMatch('/^\d{4}$/', anak_SQ002_SQ002)), '', 'Mohon isikan tahun lahir dengan benar nggih.<br />')}
{if((regexMatch('/^\d{4}$/', anak_SQ003_SQ002)), '', 'Mohon isikan tahun lahir dengan benar nggih.<br />')}
{if((regexMatch('/^\d{4}$/', anak_SQ004_SQ002)), '', 'Mohon isikan tahun lahir dengan benar nggih.<br />')}
{if((regexMatch('/^\d{4}$/', anak_SQ005_SQ002)), '', 'Mohon isikan tahun lahir dengan benar nggih.<br />')}
{if((regexMatch('/^\d{4}$/', anak_SQ006_SQ002)), '', 'Mohon isikan tahun lahir dengan benar nggih.<br />')}
{if((regexMatch('/^\d{4}$/', anak_SQ007_SQ002)), '', 'Mohon isikan tahun lahir dengan benar nggih.<br />')}

{if((anak_SQ001_SQ001=='ok'), 'oke banget', 'salah tuh.<br />')}


(regexMatch('/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/', G02Q24_SQ004_SQ001))


{if((regexMatch('/^[0-9]{2}[-|\/]{1}[0-9]{2}[-|\/]{1}[0-9]{4}$/', G02Q24_SQ004_SQ001)), '', 'Mohon isikan nama dengan benar nggih.<br />')}


<script type="text/javascript" charset="utf-8">
	
	$(document).on('ready pjax:scriptcomplete',function(){
		var thisQuestion = $('#question{QID}');
 
		// Insert selects into row 5
			$('tr.subquestion-list:eq(2) .answer-item', thisQuestion).addClass('with-select').append('<select class="inserted-select form-control list-question-select">\
				<option value="">Please choose...</option>\
				<option value="1">Belum Lulus SD</option>\
				<option value="2">SD</option>\
				<option value="3">SLTP</option>\
				<option value="4">SLTA</option>\
<option value="5">D3</option>\
<option value="6">D4/S1</option>\
<option value="7">S2</option>\
<option value="8">S3</option>\
			</select>');

 $('tr.subquestion-list:eq(3) .answer-item', thisQuestion).addClass('with-select').append('<select class="inserted-select form-control list-question-select">\
	<option value="">Please choose...</option>\
<option value="2">SD</option>\
				<option value="3">SLTP</option>\
				<option value="4">SLTA</option>\
<option value="5">D3</option>\
<option value="6">D4/S1</option>\
<option value="7">S2</option>\
<option value="8">S3</option>\
			</select>');

       $('tr.subquestion-list:eq(4) .answer-item', thisQuestion).addClass('with-select').append('<select class="inserted-select form-control list-question-select">\
	<option value="">Please choose...</option>\
<option value="1">1</option>\
<option value="2">2</option>\
				<option value="3">3</option>\
				<option value="4">4</option>\
<option value="5">5</option>\
<option value="6">6</option>\
<option value="7">7</option>\
<option value="8">8</option>\
			</select>');


       $('tr.subquestion-list:eq(5) .answer-item', thisQuestion).addClass('with-select').append('<select class="inserted-select form-control list-question-select">\
	<option value="">Please choose...</option>\
<option value="1">Tidak</option>\
				<option value="2">Terbina</option>\
			</select>');

 $('tr.subquestion-list:eq(6) .answer-item', thisQuestion).addClass('with-select').append('<select class="inserted-select form-control list-question-select">\
	<option value="">Please choose...</option>\
<option value="1">L0</option>\
				<option value="2">L1</option>\
<option value="3">L2</option>\
				<option value="4">L3</option>\
			</select>');

 $('tr.subquestion-list:eq(7) .answer-item', thisQuestion).addClass('with-select').append('<select class="inserted-select form-control list-question-select">\
	<option value="">Please choose...</option>\
<option value="1">Belum</option>\
				<option value="2">Sudah</option>\
			</select>');


		// Listeners on select elements
		$('.inserted-select', thisQuestion).on('change', function(i) {
			if($(this).val() != '') {
				$(this).closest('.answer-item').find('input:text').val($.trim($('option:selected', this).text())).trigger('change');
			}
			else {
				$(this).closest('.answer-item').find('input:text').val('').trigger('change');
			}
		});
 
		// Returning to page
		$('.with-select input:text', thisQuestion).each(function(i) {
			var thisCell = $(this).closest('.answer-item');
			var inputText = $.trim($(this).val());
			var selectval = $('select.inserted-select option', thisCell).filter(function () { return $(this).html() == inputText; }).val();
			$('select.inserted-select', thisCell).val(selectval);
		});
 
		
		// Clean-up styles
		$('select.inserted-select', thisQuestion).css({
			'max-width': '100%'
		});
		$('.with-select input:text', thisQuestion).css({
			'position': 'absolute',
			'left': '-9999em'
		});
	});
</script>

<script type="text/javascript" charset="utf-8">

	$(document).on('ready pjax:scriptcomplete',function(){
		var thisQuestion = $('#question{QID}');
	
		// Insert selects
		$('.answer-item.answer_cell_X001', thisQuestion).addClass('with-select').append('<select class="inserted-select form-control list-question-select">\
													<option value="">...</option>\
													<option value="1">1 hour</option>\
													<option value="2">2 hours</option>\
													<option value="3">3 hours</option>\
													<option value="4">4 hours</option>\
													<option value="5">5 hours</option>\
													<option value="6">6 hours</option>\
													<option value="7">7 hours</option>\
													<option value="8">8 hours</option>\
													<option value="9">9 hours</option>\
													<option value="10">10 hours</option>\
													<option value="11">11 hours</option>\
													<option value="12">12 hours</option>\
												</select>'); 
		$('.answer-item.answer_cell_X002', thisQuestion).addClass('with-select').append('<select class="inserted-select form-control list-question-select">\
													<option value="">...</option>\
													<option value="5">5 minutes</option>\
													<option value="10">10 minutes</option>\
													<option value="15">15 minutes</option>\
													<option value="20">20 minutes</option>\
													<option value="25">25 minutes</option>\
													<option value="30">30 minutes</option>\
													<option value="35">35 minutes</option>\
													<option value="40">40 minutes</option>\
													<option value="45">45 minutes</option>\
													<option value="50">50 minutes</option>\
													<option value="55">55 minutes</option>\
												</select>'); 
	
		// Listeners
		$('.inserted-select', thisQuestion).on('change', function(i) {
			if($(this).val() != '') {
				$(this).closest('.answer-item').find('input:text').val($.trim($('option:selected', this).text())).trigger('change');
			}
			else {
				$(this).closest('.answer-item').find('input:text').val('').trigger('change');
			}
		});
					
		// Returning to page
		$('.with-select input:text', thisQuestion).each(function(i) {
			var thisCell = $(this).closest('.answer-item');
			var inputText = $.trim($(this).val());
			var selectval = $('select.inserted-select option', thisCell).filter(function () { return $(this).html() == inputText; }).val();
			$('select.inserted-select', thisCell).val(selectval);
		});
	
		// Clean-up styles
		$('select.inserted-select', thisQuestion).css({
			'max-width': '100%'
		});
		$('.with-select input:text', thisQuestion).css({
			'position': 'absolute',
			'left': '-9999em'
		});
	});
</script>
