<script type="text/javascript">
  // Standard Priority Calculator

  var display1 = {
    operation: "",
    evaluation: "",
    answer: "",
  };

  // default flag values
  var flag = {
    ansAllowed: false,
  };

  // default display values
  $("#display1").val("");
  $("#display2").val("");

  // Set default theme (light)
  $(".container").addClass("container-light");
  $("form").addClass("form-light");
  $("form input").addClass("form-input-light");
  $(".operand-group").addClass("operand-group-light");
  $(".operator-group").addClass("operator-group-light");
  $("#equal").addClass("equal-light");
  $("#clear").addClass("clear-light");
  $("#backspace").addClass("backspace-light");

  function evaluate() {
    try {
      math.eval(display1.operation);
      display1.evaluation = math.eval(display1.operation);
      return true; // no exception occured
    } catch (e) {
      if (e instanceof SyntaxError) {
        // Syntax error exception
        display1.evaluation = "E";
        return false; // exception occured
      } else {
        // Unspecified exceptions
        display1.evaluation = "UE";
        return false; // exception occured
      }
    }
  }

  // Digits
  $("#zero").on("click", function() {
    display1.operation = display1.operation + "0";
    $("#display1").val($("#display1").val() + "\u0030");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#one").on("click", function() {
    display1.operation = display1.operation + "1";
    $("#display1").val($("#display1").val() + "\u0031");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#two").on("click", function() {
    display1.operation = display1.operation + "2";
    $("#display1").val($("#display1").val() + "\u0032");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#three").on("click", function() {
    display1.operation = display1.operation + "3";
    $("#display1").val($("#display1").val() + "\u0033");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#four").on("click", function() {
    display1.operation = display1.operation + "4";
    $("#display1").val($("#display1").val() + "\u0034");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#five").on("click", function() {
    display1.operation = display1.operation + "5";
    $("#display1").val($("#display1").val() + "\u0035");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#six").on("click", function() {
    display1.operation = display1.operation + "6";
    $("#display1").val($("#display1").val() + "\u0036");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#seven").on("click", function() {
    display1.operation = display1.operation + "7";
    $("#display1").val($("#display1").val() + "\u0037");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#eight").on("click", function() {
    display1.operation = display1.operation + "8";
    $("#display1").val($("#display1").val() + "\u0038");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#nine").on("click", function() {
    display1.operation = display1.operation + "9";
    $("#display1").val($("#display1").val() + "\u0039");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#decimal").on("click", function() {
    display1.operation = display1.operation + ".";
    $("#display1").val($("#display1").val() + "\u002e");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  // Operators
  $("#left-parenthesis").on("click", function() {
    display1.operation = display1.operation + "(";
    $("#display1").val($("#display1").val() + "\u0028");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#right-parenthesis").on("click", function() {
    display1.operation = display1.operation + ")";
    $("#display1").val($("#display1").val() + "\u0029");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#add").on("click", function() {
    display1.operation = display1.operation + "+";
    $("#display1").val($("#display1").val() + "\u002b");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#subtract").on("click", function() {
    display1.operation = display1.operation + "-";
    $("#display1").val($("#display1").val() + "\u2212");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#multiply").on("click", function() {
    display1.operation = display1.operation + "*";
    $("#display1").val($("#display1").val() + "\u002A");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  $("#divide").on("click", function() {
    display1.operation = display1.operation + "/";
    $("#display1").val($("#display1").val() + "\u00f7");
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  // Clear
  $("#clear").on("click", function() {
    (display1.operation = ""), (display1.evaluation = ""), $("#display1").val("");
    $("#display2").val("");
  });

  // Backspace
  $("#backspace").on("click", function() {
    display1.operation = display1.operation.slice(
      0,
      display1.operation.length - 1
    );
    $("#display1").val(
      $("#display1")
      .val()
      .slice(0, $("#display1").val().length - 1)
    );
    evaluate();
    $("#display2").val(display1.evaluation);
  });

  // Custom variable
  <?php
  foreach ($data['variable'] as $key => $value) {
    echo '
		$("#' . $value['var_code'] . '").on("click", function() {
			display1.operation = display1.operation + "$' . $value['var_code'] . '";
			$("#display1").val($("#display1").val() + "$' . $value['var_code'] . '");
			evaluate();
		});
	';
  }
  ?>
</script>

