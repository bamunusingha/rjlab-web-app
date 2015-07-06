<?php
	include_once 'phpcode/config.php';
	
	include "header.php";

?>

 <div class="section" id="calander-main">
            <div class="container">
            <br/>
	<h1 class="headerfont text-center color-black-header">Check With Your Schedule</h1>
	<br/>

	

	<div class="row">
		
		<div id='script-warning'>
		<code>php/get-events.php</code> must be running.
		</div>

		<div id='loading'>loading...</div>

		<div id='calendar'></div>  
		
	</div>


</div>

        </div>


		<?php
		
		
		
			echo "
				<script>

	$(document).ready(function() {
	
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '".date('Y-m-d')."',
			editable: true,
			eventLimit: true, // allow 'more' link when too many events
			events: {
				url: 'php/get-events.php',
				error: function() {
					$('#script-warning').show();
				}
			},
			loading: function(bool) {
				$('#loading').toggle(bool);
			}
		});
		
	});

</script>
			";
		?>

		
       

<?php
	include "footer.php";
?>