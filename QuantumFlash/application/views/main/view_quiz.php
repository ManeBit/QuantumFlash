<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<script type="text/javascript">
    // pretty chem stuff

    var reValid = /[0-9]*([A-Z][a-z]?[0-9]*)+([\+\-][0-9]?)?/; // is it a valid chemical expression?
    var reComp = /[A-Z][a-z]?[0-9]*/g; // matches components of the expression
    var reCharge = /[\+\-][0-9]?/; // matches charge
    var reElement = /[A-Z][a-z]?/; // matches the element in the component
    var reNumber = /[0-9]+/; // matches the number in the component
    var reCoefficient = /^[0-9]+/; //matches the coefficient in front of expression

    var isChem = function(s) {
        
        if (s.match(reValid)[0] != s) {
            return false;
        }
        
        return true;
        
    }

    var pretty = function(s) {
        
        result = "";

        coefficient = s.match(reCoefficient);
        if (coefficient != null) {
            coefficient = coefficient[0]
        } else {
            coefficient = "";
        }
        result = coefficient;

        compArray = s.match(reComp);
        for (var i = 0; i < compArray.length; i++) {
            comp = compArray[i];
            element = comp.match(reElement)[0];
            number = comp.match(reNumber);
            if (number != null) {
                number = "<sub>" + number[0] + "</sub>";
            } else {
                number = "";
            }
            comp = element + number;
            result = result + comp;
        }

        charge = s.match(reCharge);
        if (charge != null) {
            charge = "<sup>" + charge[0] + "</sup>";
        } else {
            charge = "";
        }
        result = result + charge;
        
        return result;
        
    }

    var updateAllChemTagged = function() {
        
        var chems = document.getElementsByTagName("chem");
        for (var i = 0; i < chems.length; i++) {
            chems[i].innerHTML = pretty(chems[i].innerHTML);
        }
        
    }

    // end pretty chem stuff

    var quiz = '<?php echo $quiz; ?>';
    var praises = '<?php echo $praises; ?>';
    var taunts = '<?php echo $taunts; ?>';

    console.log(quiz);
    console.log(praises);
    console.log(taunts);

    // and then js goes here after it loads from the certain set.
    // add some error checking if the set doesnt exist.

    // the object quiz will probs be null or something lol

    if (quiz == null) {
        console.log("WTF?");
    }

    // parse the json like this.
    var parsedQ = JSON.parse(quiz).data;
    console.log(parsedQ);
    var parsedP = JSON.parse(praises).data;
    var parsedT = JSON.parse(taunts).data;

    // you can load the test data with
    // http://localhost/QuantumFlash/main/quiz/test
    // http://localhost/QuantumFlash/main/quiz/{set_name}

    var currentIndex = 0;

    var loadNextQuestion = function() {

        if (currentIndex >= parsedQ.length) {
            console.log("we're done! wheee");
            return;
        }

        resultHTML = parsedQ[currentIndex][0];
        if (isChem(resultHTML)) {
            resultHTML = pretty(resultHTML);
        }

        pQuestion.innerHTML = resultHTML;

        iAnswer.removeAttribute("disabled");
        iAnswer.value = "";

        button.innerHTML = "Check Answer";
        button.setAttribute("onclick", "checkAnswer()");
        
        pInfo.innerHTML = "<br/>";
        pInfo.removeAttribute("class");

    }

    var checkAnswer = function() {

        iAnswer.setAttribute("disabled", true);
        answer = iAnswer.value;
        
        if (answer == parsedQ[currentIndex][1]) {
            
            pInfo.innerHTML = parsedP[Math.floor(Math.random() * parsedP.length)];
            pInfo.setAttribute("class", "bg-success");

        } else {

            pInfo.innerHTML = parsedT[Math.floor(Math.random() * parsedT.length)];
            pInfo.setAttribute("class", "bg-danger");

        }

        button.innerHTML = "Next";
        button.setAttribute("onclick", "loadNextQuestion()");
        
        currentIndex++;
        
    }

    $(document).ready(function(e) {
        
        //make all these DOM stuff global so I don't have to get them every time
        pQuestion = document.getElementById("p-question");
        iAnswer = document.getElementById("input-answer");
        pInfo = document.getElementById("p-praise-taunt");
        button = document.getElementById("button-next");
        
        loadNextQuestion();
        
    });

</script>

<div class="container">

    <!-- navbar here -->
    <?php $this->load->view('navbar'); ?>

        <div class="jumbotron">
            
            <h2>Set Name Goes Here</h3>
            
            <hr/>

            <form>

                <div class="form-group">

                    <label>Question</label>

                    <p id="p-question"></p>

                </div>
                
                <hr/>

                <div class="form-group">

                    <label>Answer</label>

                    <input type="text" class="form-control" id="input-answer" />

                </div>
                
                <div class="form-group">
                    
                    <small id="p-praise-taunt">Click "Check Answer" to, uh, check answer.</small>
                
                </div>

                <div class="form-group">

                    <button class="btn btn-primary" type="button" onclick="checkAnswer();" id="button-next">Check Answer</button>

                </div>

            </form>

        </div>

        <!-- internal footer here -->
        <?php $this->load->view('internal_footer'); ?>

</div>
<!-- /container -->
