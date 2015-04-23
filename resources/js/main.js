$(document).ready(function(){


  $('input[type=radio][name=has_job]').change(function() {
        if (this.value == 'false') {
          $('#work-situation').slideUp()
        }
        else if (this.value == 'true') {
          $('#work-situation').slideDown();
        }
    });

});
