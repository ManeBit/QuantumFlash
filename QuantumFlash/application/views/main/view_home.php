<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<div class="container">
    
    <!-- navbar here -->
    <?php $this->load->view('navbar'); ?>

    <div class="jumbotron">
        
        <h1>QuantumFlash</h1>
        
        <p class="lead">We reinvented Quizlet this time around!</p>
        
        <hr/>
        
        <form>
                
            <div class="form-group">

                <p>Pick a set to start:</p>

                <select class="form-control" id="select-set"></select>
                
            </div>
            
            <div class="form-group">

                <a class="btn btn-success" href="main/quiz/test" role="button">Go!</a>

            </div>
            
        </form>

    </div>

    <!-- internal footer here -->
    <?php $this->load->view('internal_footer'); ?>
</div> <!-- /container -->