<script type="text/javascript">
	var quiz = '<?php echo $quiz; ?>';
	var praises = '<?php echo $praises; ?>';
	var taunts = '<?php echo $taunts; ?>';
	
	console.log(quiz);
	console.log(praises);
	console.log(taunts);
	
	// parse the json like this.
	var parsedQ = JSON.parse(quiz);
	console.log(parsedQ);
	
	// you can load the test data with
	// http://localhost/QuantumFlash/main/quiz/test
	// http://localhost/QuantumFlash/main/quiz/{set_name}
	
	/*
	// some demos
	
	var row = $("<tr id='bet_"+i+"' />");
		row.append(td + timeRow + end_td);
		row.append(td + typeRow + end_td);
		row.append(td + amountRow + end_td);
		row.append(td + resultRow + end_td);
		
	$("#view_pending_table").append(row);
	
	$("#confirmed_balance_info").html(symbol.icon + confirmed);
	
	
	*/
</script>

<div class="container">
      <!-- navbar here -->
		<?php $this->load->view('navbar'); ?>
		
      <div class="jumbotron">
        <h1>Jumbotron heading</h1>
        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>

        <div class="col-lg-6">
          <h4>Subheading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

          <h4>Subheading</h4>
          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

          <h4>Subheading</h4>
          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
        </div>
      </div>

	<!-- internal footer here -->
	<?php $this->load->view('internal_footer'); ?>
</div> <!-- /container -->